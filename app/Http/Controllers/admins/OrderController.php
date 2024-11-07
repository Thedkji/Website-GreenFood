<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
                    $q->where('product_sku', 'like', '%' . $search . '%');
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

    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $status = $request->input('status');
            $order->update(['status' => $status]);
        }
        return redirect()->back();
    }

    public function cancelOrder(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->update(['status' => 5, 'cancel_reson' => $request->input('cancel_reason')]);
        }
        return redirect()->back();
    }
}
