<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function showOder(Request $request)
    {
        $query = Order::query()->with('user');
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%")
                ->orWhereHas('orderDetails', function ($q) use ($search) {
                    $q->where('product_name', 'like', '%' . $search . '%');
                    $q->where('sku', 'like', '%' . $search . '%');
                });
        }
        $statusFilter = $request->input('statusFilter');
        $orders = $query->sortable()
            ->when($statusFilter !== null, function ($query) use ($statusFilter) {
                $query->where('status', $statusFilter);
            })
            ->paginate(8);
        return view("admins.orders.order", compact('orders', 'statusFilter'));
    }



    public function showOrderDetail($id)
    {
        $orders = Order::find($id);
        $orderDetails = $orders->orderDetails()->get();
        $user = $orders->user()->firstOr();
        return view("admins.orders.order-detail", compact('orders', 'orderDetails', 'user'));
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
