<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\PassRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Information extends Controller
{

    public function index()
    {
        $user = auth()->user();
        // Lọc đơn hàng theo các trạng thái 0, 1, 2, 5
        $orders = Order::whereIn('status', [0, 1, 2])->with('user')->get();
        $oders = Order::whereIn('status', [3, 4, 5])->with('user')->get();

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
        $order = Order::with('user')->findOrFail($id);
        $orderDetails = OrderDetail::with('order')->where('order_id', $id)->get();

        return view('clients.information.order-detail', compact('order', 'orderDetails'));
    }
}
