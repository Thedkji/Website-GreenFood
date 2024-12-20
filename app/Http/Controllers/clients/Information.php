<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\PassRequest;
use App\Models\Comment;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use App\Models\VariantGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class Information extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $orders = $user->load('orders');
        $provinces = DB::table('provinces')->get();

        if (request()->ajax() && request('province_code')) {
            $districts = DB::table('districts')
                ->where('province_code', request('province_code'))
                ->get();
            return response()->json($districts);
        }

        if (request()->ajax() && request('district_code')) {
            $wards = DB::table('wards')
                ->where('district_code', request('district_code'))
                ->get();
            return response()->json($wards);
        }

        $orders = Order::where('user_id', $user->id)
            ->whereIn('status', [0, 1, 2])
            ->with('user')
            ->orderBy('created_at', 'desc') 
            ->paginate(5);

        $oders = Order::where('user_id', $user->id)
            ->whereIn('status', [3, 4, 5, 6, 7])
            ->with('user')
            ->orderBy('created_at', 'desc') 
            ->paginate(5);

            $isNewUser = $user->created_at->diffInDays(now()) <= 7;
            $hasNoOrders = $orders->count() == 0;
        
            $isEligibleForCoupon = $isNewUser && $hasNoOrders;
        if($isNewUser && $hasNoOrders){
            if ($isEligibleForCoupon) {
                $coupons = Coupon::where('status', 2)
                    ->where('expiration_date', '>=', now())
                    ->get();
            } else {
                $coupons = collect();
            }
        }else {
            $coupons = collect();
        }
            $viewType = request('view_type', 'information'); 
        
            if ($viewType === 'tab-menu') {
                return view('clients.information.tab-menu', compact('isEligibleForCoupon'));
            }
        
            return view('clients.information.information', compact('user', 'orders', 'oders', 'provinces', 'coupons', 'isEligibleForCoupon'));
        }


    public function editPass($id)
    {
        $user = Auth::user();

        return view('clients.information.pass', compact('user'));
    }

    public function updatePass(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user->update($data);

        return redirect()->route('client.information.index')->with('success', 'Mật khẩu đã được cập nhật!')
            ->header('Cache-Control', 'no-store');
    }

    public function checkPass(Request $request)
    {
        $user = Auth::user();

        if ($request->ajax() && $request->old_password) {
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json(['valid' => false, 'message' => 'Mật khẩu cũ không chính xác']);
            } else {
                return response()->json(['valid' => true]);
            }
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('clients.information.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu

        $user = User::findOrFail($id);
        $data = $request->all();
        if ($request->province) {
            $data['province'] = DB::table('provinces')->where('code', $request->province)->first()->name;
        }
        if ($request->district) {
            $data['district'] = DB::table('districts')->where('code', $request->district)->first()->name;
        }
        if ($request->ward) {
            $data['ward'] = DB::table('wards')->where('code', $request->ward)->first()->name;
        }

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $data['avatar'] = $img->storeAs('avatars', $filename);
        }


        $user->update($data);

        return redirect()->route('client.information.index')->with('success', 'Thông tin đã được cập nhật!')
            ->header('Cache-Control', 'no-store');
    }

    public function checkStatus($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status == 0) {

            return response()->json(['status' => 'allowed', 'message' => 'Đơn hàng đã được xác nhận!']);
        }

        return response()->json(['status' => 'not_allowed']);
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Kiểm tra trạng thái đơn hàng
        if ($order->status != 0) {
            return redirect()->back()->with('error', 'Đơn hàng này không thể hủy vì đã được xác nhận hoặc đang giao.');
        }

        $order->status = 5;

        $order->update(['status' => 5, 'cancel_reson' => $request->input('cancel_reason')]);
        $orderDetails = $order->orderDetails()->get();
        foreach ($orderDetails as $detail) {
            $product = Product::where('sku', $detail->product_sku)->first();
            if ($product) {
                $product->increment('quantity', $detail->product_quantity);
            } else {
                $variant = VariantGroup::where('sku', $detail->product_sku)->first();
                if ($variant) {
                    $variant->increment('quantity', $detail->product_quantity);
                }
            }
            if (!empty($detail->coupon_name)) {
                $coupon = Coupon::where('name', "{$detail->coupon_name}")->first();
                $coupon->quantity += 1;
            }
        }

        $order->save();

        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công!');
    }


    public function show($id)
    {
        $user = auth()->user();
        $order = Order::with('user')->findOrFail($id);
        $orderDetails = OrderDetail::with('order')->where('order_id', $id)->get();
        $oders = Order::where('user_id', $user->id)
            ->whereIn('status', [0, 1, 2, 3, 4, 5, 6])
            ->with('user')
            ->get();
        return view('clients.information.order-detail', compact('order', 'orderDetails'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $orderDetail = OrderDetail::find($request->order_detail_id);
        // dd($request->all());

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

        // Thêm đánh giá mới
        $commentsData = [
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'content' => $request->comment,
        ];

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $commentsData['img'] = $img->storeAs('comments', $filename);
        }

        if ($orderDetail->review == 0) {
            $comment = Comment::create($commentsData);

            Rate::create([
                'comment_id' => $comment->id,
                'star' => $request->star,
            ]);

            session(['comment_id' => $comment->id]);
        } else if ($orderDetail->review == 1) {
            $comment_id = session('comment_id');
            $comment = Comment::where('product_id', $request->product_id)
                ->where('id', $comment_id)
                ->where('user_id', Auth::id())->first();
            $comment->update($commentsData);

            Rate::where('comment_id', $comment->id)->update([
                'star' => $request->star,
            ]);
            session()->remove('comment_id');
        }

        $orderDetail->update([
            'review' => $request->review
        ]);

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi!');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('client.home');
    }
    
}
