<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\PassRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use App\Models\VariantGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Information extends Controller
{

    public function index()
    {
        $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập

        $orders = Order::where('user_id', $user->id)
            ->whereIn('status', [0, 1, 2])
            ->with('user')
            ->get();

        $oders = Order::where('user_id', $user->id)
            ->whereIn('status', [3, 4, 5, 6, 7])
            ->with('user')
            ->get();

        // Trả dữ liệu về view
        return view('clients.information.information', compact('user', 'orders', 'oders'));
    }


    public function editPass($id)
    {
        $user = User::findOrFail($id);
        return view('clients.information.pass', compact('user'));
    }

    public function updatePass(PassRequest $request, $id)
    {
        $user = $request->validated();
        $user = User::findOrFail($id);
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu cũ không chính xác']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('clients.information.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:10',
            'address' => 'nullable|max:255',
        ]);
        // dd($request->all());
        // Cập nhật thông tin người dùng
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        // Chuyển hướng với thông báo thành công
        // return redirect()->route('clients.information.index')->with('success', 'Thông tin đã được cập nhật!');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status == 0) {
            $order->status = 5;
            $order->save();
            return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công!');
        }

        return redirect()->back()->with('error', 'Không thể hủy đơn hàng này!');
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

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

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

        $comment = Comment::create($commentsData);

        Rate::create([
            'comment_id' => $comment->id,
            'star' => $request->star,
        ]);
        Order::where('id', $request->order_id)
        ->where('user_id', Auth::id())
        ->update(['status' => 7]);


        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi!');
    }
}
