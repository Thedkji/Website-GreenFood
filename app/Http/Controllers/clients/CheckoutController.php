<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\admins\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\VariantGroup;
use Darryldecode\Cart\Facades\CartFacade as CartSession;

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
        $variantDetails = [];
        $totalPrice = array_reduce($decodedItems, function ($carry, $item) use (&$variantDetails) {
            if ($item['product']['status'] === 0) {
                $itemTotal = $item['quantity'] * $item['product']['price_sale'];
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
        $userId = auth()->check() ? auth()->id() : null;
        return view("clients.checkouts.checkout", compact('decodedItems', 'totalPrice', 'datas', 'userId', 'variantDetails'));
    }

    public function getCheckOut(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
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
            $cartItems = json_decode($request->data[0], true);
            foreach ($cartItems as $item) {
                $order->orderDetails()->create([
                    'order_id' => $order->id,
                    'product_sku' => $item['attributes']['sku'],
                    'product_img' => 'abc.jpg',
                    'product_name' => $item['name'],
                    'product_price' => $item['price'],
                    'product_quantity' => $item['quantity'],
                ]);
                CartSession::remove($item['id']);
                if ($item['attributes']['status'] == 0) {
                    Product::where('sku', $item['attributes']['sku'])
                        ->update(['quantity' => DB::raw('quantity - ' . $item['quantity'])]);
                } else {
                    VariantGroup::where('sku', $item['attributes']['sku'])
                        ->update(['quantity' => DB::raw('quantity - ' . $item['quantity'])]);
                }
            }
            DB::commit();
            return redirect()->route('client.home')->with('success', 'Đơn hàng đã được đặt thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi đặt hàng: ' . $e->getMessage());
            return redirect()->route('client.home')->with('error', 'Đơn hàng đã được đặt không thành công!');
        }
    }
}
