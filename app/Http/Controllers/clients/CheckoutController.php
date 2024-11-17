<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\admins\OrderRequest;
use App\Mail\MailCheckOut;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\VariantGroup;
use Darryldecode\Cart\Facades\CartFacade as CartSession;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $datas = $request->selectBox;
        if (!$datas) {
            return redirect()->back()->with('error', 'Bạn chưa chọn sản phẩm');
        }
        $decodedItems = array_map(function ($itemJson) {
            return json_decode($itemJson, true);
        }, $datas);

        $couponsAll = Coupon::with(['categories.children', 'products'])->get();

        // Lấy các product_id từ $decodedItems
        $productIds = array_column($decodedItems, 'product_id');

        // Lấy các sản phẩm liên kết với $productIds
        $Products = Product::with('categories')->whereIn('id', $productIds)->get();

        // Lấy ID của các danh mục liên kết với các sản phẩm
        $categoryIds = $Products->flatMap(function ($product) {
            return $product->categories->pluck('id');
        })->unique();

        $variantDetails = [];
        if (auth()->check()) {
            $totalPrice = array_reduce($decodedItems, function ($carry, $item) use (&$variantDetails) {
                if ($item['product']['status'] === 0) {
                    $itemTotal = $item['quantity'] *  $item['product']['price_sale'];
                    $variantDetails[$item['id']] = null;
                } else {
                    $variant = VariantGroup::where('product_id', $item['product_id'])
                        ->where('sku', $item['sku'])
                        ->first();
                    $itemTotal = $variant ? $item['quantity'] * $variant->price_sale : $item['quantity'] * $item['price'];
                    $variantDetails[$item['id']] = $variant;
                }
                return $carry + $itemTotal;
            }, 0);
        } else {
            $totalPrice = array_reduce($decodedItems, function ($carry, $item) use (&$variantDetails) {
                $itemTotal = $item['quantity'] * $item['price'];
                $variantDetails[$item['id']] = null;
                return $carry + $itemTotal;
            }, 0);
        }

        // Lọc các mã giảm giá khả dụng dựa trên sản phẩm hoặc danh mục
        $availableCoupons = $couponsAll->filter(function ($coupon) use ($productIds, $categoryIds, $totalPrice) {
            // Kiểm tra trạng thái phát hành
            if ($coupon->status != 0) {
                return false;
            }
            // Không hiển thị mã nếu giá trị tối thiểu lớn hơn tổng giá trị đơn hàng
            if ($coupon->minimum_spend > $totalPrice || $totalPrice > $coupon->maximum_spend) {
                return false;
            }
            // Kiểm tra số lượng còn đủ không
            if ($coupon->quantity == 0) {
                return false;
            }

            // Kiểm tra xem có mã nào có tác dụng cho toàn bộ sản phẩm không
            if ($coupon->type == 0) {
                return true;
            }
            // Nếu không có thì xét điều kiện
            $isProductMatch = false;
            $isCategoryMatch = false;
            // Kiểm tra sản phẩm liên kết với coupon
            foreach ($coupon->products as $product) {
                if (in_array($product->id, $productIds)) {
                    $isProductMatch = true;
                    break;
                }
            }
            // Kiểm tra danh mục liên kết với coupon
            foreach ($coupon->categories as $category) {
                if (in_array($category->id, $categoryIds->toArray())) {
                    $isCategoryMatch = true;
                    break;
                }
            }

            // Mã giảm giá được coi là hợp lệ khi có cả sự khớp sản phẩm và danh mục
            return $isProductMatch || $isCategoryMatch;
        });
        $userInfo = auth()->user() ?? null;
        return view("clients.checkouts.checkout", compact('decodedItems', 'totalPrice', 'userInfo', 'datas', 'variantDetails', 'availableCoupons'));
    }

    public function applyCoupon(Request $request)
    {
        $couponId = $request->coupon_id;
        $couponInfo = Coupon::find($couponId);

        if ($couponInfo) {
            $coupon = [
                'id' => $couponInfo->id,
                'discount_type' => $couponInfo->discount_type,
                'type' => $couponInfo->type,
                'amount' => $couponInfo->coupon_amount,
                'name' => $couponInfo->name,
                'discount' => $couponInfo->maximum_spend,
                'product_id' => $couponInfo->products?->pluck('id')->toArray(),
                'category_id' => $couponInfo->categories?->pluck('id')->toArray(),
            ];
            return redirect()->back()->with([
                'success' => 'Mã giảm giá đã được thêm thành công',
                'coupon' => $coupon,
            ]);
        }
        return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ');
    }


    public function getCheckOut(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $paymentMethod = $request->input('payment_method');
            // Kiểm tra phương thức thanh toán
            if (!$paymentMethod) {
                return redirect()->back()->with('error', 'Vui lòng chọn phương thức thanh toán');
            }
            $coupon = $request->has('coupon') ? $request->coupon : null;
            $order = Order::create([
                'user_id' => auth()->check() ? auth()->id() : 0,
                'phone' => $request->phone,
                'email' => $request->email,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'address' => $request->address,
                'note' => $request->note,
                'total' => $request->total,
            ]);

            DB::commit();
            // Kiểm tra phương thức thanh toán, nếu là Paypal thì chuyển sang VNPay Checkout
            if ($paymentMethod === "VNPay") {
                session(['cart_items' => $request->data[0]]);
                return $this->VnPayCheckOut($request, $order);
            }

            $this->finalizeOrder($order, $request->data[0], $coupon);

            return redirect()->route('client.showSuccessCheckOut')->with('success', 'Đơn hàng đã được đặt thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi đặt hàng: ' . $e->getMessage());
            return redirect()->route('client.showFailureCheckOut')->with('error', 'Đơn hàng đã không thành công! Vui lòng thử lại sau.');
        }
    }

    private function VnPayCheckOut(Request $request, $order)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $vnp_TmnCode = env('VNPAY_TMNCODE');
        $vnp_HashSecret = env('VNPAY_HASHSECRET');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.vnpay.callback', ['orderId' => $order->id]);
        $vnp_TxnRef = time();
        $vnp_OrderInfo = "Thanh toán hóa đơn #";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" =>  date('YmdHis', strtotime('+15 minutes')),
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        return redirect($vnp_Url);
    }

    public function handleVnPayResponse(Request $request, $orderId)
    {
        Log::info('VNPAY Callback received', ['orderId' => $orderId, 'request' => $request->all()]);

        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_SecureHash = $request->get('vnp_SecureHash');
        $vnp_HashSecret = env('VNPAY_HASHSECRET');
        // Xây dựng chuỗi dữ liệu cần kiểm tra SecureHash
        $inputData = $request->except(['vnp_SecureHash']);
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');
        $checkHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($vnp_SecureHash === $checkHash && $vnp_ResponseCode == "00") {
            try {
                DB::beginTransaction();

                $order = Order::find($orderId);
                if (!$order) {
                    Log::error('Không tìm thấy đơn hàng với ID: ' . $orderId);
                    return redirect()->route('client.showFailureCheckOut')->with('error', 'Không tìm thấy đơn hàng!');
                }
                // Xóa giỏ hàng và gửi email xác nhận
                $this->finalizeOrder($order, session('cart_items'));
                DB::commit();
                return redirect()->route('client.showSuccessCheckOut')->with('success', 'Thanh toán thành công!');
            } catch (\Exception $e) {
                DB::rollBack();
                $order = Order::find($orderId);
                $this->rollbackOrder($order);
                Log::error('Lỗi xử lý thanh toán: ' . $e->getMessage());
                return redirect()->route('client.showFailureCheckOut')->with('error', 'Lỗi xử lý thanh toán!');
            }
        } else {
            DB::rollBack();
            // Tìm đơn hàng và xóa nếu cần
            $order = Order::find($orderId);
            if ($order) {
                // Restore lại số lượng sản phẩm, xóa chi tiết đơn hàng và đơn hàng
                $this->rollbackOrder($order);
                $order->delete();
            }
            Log::error('Thanh toán thất bại. ResponseCode: ' . $vnp_ResponseCode . ', SecureHash mismatch');
            return redirect()->route('client.showFailureCheckOut')->with('error', 'Thanh toán thất bại!');
        }
    }
    private function finalizeOrder($order, $cartData, $coupon = null)
    {
        $cartItems = json_decode($cartData, true);
        // Giảm số lượng mã giảm giá trong bảng Coupon
        if ($coupon) {
            $decodedCoupon = json_decode($coupon[0], true);
            if (is_array($decodedCoupon) && isset($decodedCoupon['id'])) {
                // Giảm số lượng mã giảm giá
                Coupon::where('id', $decodedCoupon['id'])->decrement('quantity', 1);
            }
            $couponName = $decodedCoupon['name'];
        }
        foreach ($cartItems as $item) {
            $productSku = auth()->check() ? $item['sku'] : $item['attributes']['sku'];
            $productQuantity = $item['quantity'];
            $productName = auth()->check() ? $item['product']['name'] : $item['name'];
            $productPrice = auth()->check()
                ? ($item['product']['status'] === 0 ? $item['product']['price_sale'] : (VariantGroup::where('sku', $productSku)->first()->price_sale))
                : $item['price'];
            $productImg = auth()->check()
                ? $item['product']['img'] ?? 'abc.jpg'
                : $item['attributes']['img'] ?? 'abc.jpg';

            // Thêm chi tiết đơn hàng
            $order->orderDetails()->create([
                'product_sku' => $productSku,
                'product_name' => $productName,
                'product_price' => $productPrice,
                'product_quantity' => $productQuantity,
                'product_img' => $productImg,
                'coupon_name' => !empty($coupon) ? $couponName : null,
            ]);

            // Cập nhật số lượng sản phẩm trong kho
            if (auth()->check() && $item['product']['status'] === 0) {
                Product::where('sku', $productSku)->decrement('quantity', $productQuantity);
            } elseif (auth()->check()) {
                VariantGroup::where('sku', $productSku)->decrement('quantity', $productQuantity);
            }
        }

        // Xóa giỏ hàng và gửi email xác nhận
        $this->removeCartItems($cartItems);
        Mail::to($order->email)->send(new MailCheckOut($order));
        session(['check' => true]);
    }


    private function removeCartItems($cartItems)
    {

        foreach ($cartItems as $item) {
            auth()->check() ? Cart::where('id', $item['id'])->delete() : CartSession::remove($item['id']);
        }
    }
    // Rollback order with improved deletion handling
    private function rollbackOrder($order)
    {
        if ($order) {
            foreach ($order->orderDetails as $item) {
                $productSku = $item->product_sku;
                // Restore stock quantity
                if (auth()->check()) {
                    if ($item->product->status === 0) {
                        Product::where('sku', $productSku)
                            ->increment('quantity', $item->product_quantity);
                    } elseif ($item->product->status === 1) {
                        VariantGroup::where('sku', $productSku)
                            ->increment('quantity', $item->product_quantity);
                    }
                    $this->restoreUserCart($item);
                } else {
                    $this->restoreSessionCart($item);
                }
            }
            $order->orderDetails()->delete();
            $order->delete();
        }
    }

    // Refactored cart restoration method for users
    private function restoreUserCart($item)
    {
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $item->product->id)
            ->where('sku', $item->product_sku)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->increment('quantity', $item->product_quantity);
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $item->product->id,
                'sku' => $item->product_sku,
                'quantity' => $item->product_quantity,
            ]);
        }
    }


    private function restoreSessionCart($item)
    {
        $existingSessionItem = CartSession::get($item->product_id);
        if ($existingSessionItem) {
            CartSession::update($item->product_id, [
                'quantity' => [
                    'relative' => true,
                    'value' => $item->product_quantity,
                ],
            ]);
        } else {
            CartSession::add([
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'attributes' => [
                    'added_order' => CartSession::getContent()->count() + 1,
                    'sku' => $item->sku,
                    'img' => $item->img,
                    'status' => $item->status,
                ],
            ]);
        }
    }
}
