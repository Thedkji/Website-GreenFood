<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function showOder()
    {
        $orders = Order::orderBy('id')->paginate(8);

        return view("admins.orders.order", compact('orders'));
    }

    public function showOrderDetail($id)
    {
        $orders = Order::find($id);

        $orderDetails = $orders->orderDetails()->paginate(8);

        return view("admins.orders.order-detail", compact('orders', 'orderDetails'));
    }

    public function editOrder($id)
    {
        $order = Order::find($id);

        $statuses = Order::groupBy('status')->pluck('status');

        return view("admins.orders.edit-order-detail", compact('statuses', 'order'));
    }

    public function updateOrder(OrderRequest $request, $id)
    {
        $data = $request->all();

        $order = Order::find($id);

        $updateOrder = $order->update($data);

        if ($updateOrder) {
            return redirect()->route('admin.orders.showOder')->with('success', 'Sửa thành công đơn hàng');
        }
    }
    public function destroyOrder() {}
}
