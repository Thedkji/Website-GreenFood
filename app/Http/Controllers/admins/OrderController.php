<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\OrderRequest;
use App\Mail\MailCheckOut;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\VariantGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $orders = $query->with('orderDetails') // Lấy kèm orderDetails
            ->sortable() // Sắp xếp theo cột
            ->when($statusFilter !== null, function ($query) use ($statusFilter) {
                $query->where('status', $statusFilter); // Lọc theo trạng thái nếu có
            })
            ->whereHas('orderDetails') // Chỉ lấy các đơn hàng có orderDetails
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
            Mail::to($order->email)->queue(new MailCheckOut($order));
        }

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }

    public function cancelOrder(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->update(['status' => 5, 'cancel_reson' => $request->input('cancel_reason')]);
            Mail::to($order->email)->send(new MailCheckOut($order));
        }
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }
}
