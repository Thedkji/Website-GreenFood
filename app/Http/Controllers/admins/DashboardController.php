<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {


        $totalEarnings = Order::sum('total');
        $orderCounts = Order::where('status','3')->count();
        $orderCountCompleted = Order::where('status', 'completed')->count();


        $orderCountsByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $orderCountsByMonthJson = $orderCountsByMonth->pluck('order_count')->toJson();


        $userCounts = User::where('role', '1')->count();

        $bestSellerProducts = Order::where('status', 5)
            ->with(['orderDetails.product'])  // Eager load orderDetails và product
            ->get()
            ->flatMap(function ($order) {
                return $order->orderDetails;  // Trả về tất cả các chi tiết đơn hàng của mỗi đơn
            })
            ->groupBy('product_id')  // Nhóm theo product_id để tính tổng
            ->map(function ($group) {
                $product = $group->first()->product;  // Lấy sản phẩm từ group (vì tất cả đều cùng sản phẩm)
                $totalSold = $group->sum('product_quantity');  // Tính tổng số lượng đã bán
                $totalRevenue = $group->sum(function ($item) use ($product) {
                    return $item->product_quantity * $product->price_sale;  // Tính tổng doanh thu
                });
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'img' => $product->img,
                    'price' => $product->price_sale,
                    'stock_left' => $product->quantity - $totalSold,  // Số lượng còn lại = Số lượng ban đầu - Số lượng đã bán
                    'total_sold' => $totalSold,
                    'total_revenue' => $totalRevenue
                ];
            })
            ->sortByDesc('total_sold')  // Sắp xếp theo số lượng bán được từ cao xuống thấp
            ->take(5);  // Lấy 5 sản phẩm bán chạy nhất


        // Doanh thu hôm nay
        $todayEarnings = Order::whereDate('created_at', now()->toDateString())->sum('total');

        // Doanh thu hôm qua
        $yesterdayEarnings = Order::whereDate('created_at', now()->subDay()->toDateString())->sum('total');

        // Tính phần trăm thay đổi doanh thu
        if ($yesterdayEarnings > 0) {
            $percentChange = (($todayEarnings - $yesterdayEarnings) / $yesterdayEarnings) * 100;
        } else {
            $percentChange = $todayEarnings > 0 ? 100 : 0; // Nếu hôm qua không có doanh thu
        }

        return view("admins.dashboards.dashboard", compact(
            'totalEarnings',
            'orderCounts',
            'orderCountCompleted',
            'orderCountsByMonthJson',
            'userCounts',
            'bestSellerProducts',
            'todayEarnings',
            'yesterdayEarnings',
            'percentChange'
        ));
    }

    public function salesReport(Request $request)
    {
        // Tổng doanh thu
        $totalEarnings = Order::sum('total');
        // Số lượng đơn hàng
        $orderCounts = Order::count();
        // Số lượng đơn hàng hoàn thành
        $orderCountCompleted = Order::where('status', 'completed')->count();

        $orderCountsByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $earningsByMonth = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total_earnings')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // $refundsByMonth = Refund::selectRaw('MONTH(created_at) as month, COUNT(*) as refund_count') // Assuming Refund model
        //     ->groupBy('month')
        //     ->orderBy('month')
        //     ->get();

        $orderCountsByMonthJson = $orderCountsByMonth->pluck('order_count')->toArray();
        $earningsByMonthJson = $earningsByMonth->pluck('total_earnings')->toArray();
        // $refundsByMonthJson = $refundsByMonth->pluck('refund_count')->toArray();

        // Dữ liệu JSON để sử dụng trong biểu đồ
        $months = range(1, 12);
        $orderCountsByMonthArray = $orderCountsByMonth->pluck('order_count', 'month')->toArray();
        $orderCountsForChart = array_map(fn($month) => $orderCountsByMonthArray[$month] ?? 0, $months);

        $bestSellerProducts = Order::where('status', 5)
            ->with(['orderDetails.product'])  // Eager load orderDetails và product
            ->get()
            ->flatMap(function ($order) {
                return $order->orderDetails;  // Trả về tất cả các chi tiết đơn hàng của mỗi đơn
            })
            ->groupBy('product_id')  // Nhóm theo product_id để tính tổng
            ->map(function ($group) {
                $product = $group->first()->product;  // Lấy sản phẩm từ group (vì tất cả đều cùng sản phẩm)
                $totalSold = $group->sum('product_quantity');  // Tính tổng số lượng đã bán
                $totalRevenue = $group->sum(function ($item) use ($product) {
                    return $item->product_quantity * $product->price_sale;  // Tính tổng doanh thu
                });
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'img' => $product->img,
                    'price' => $product->price_sale,
                    'stock_left' => $product->quantity - $totalSold,  // Số lượng còn lại = Số lượng ban đầu - Số lượng đã bán
                    'total_sold' => $totalSold,
                    'total_revenue' => $totalRevenue
                ];
            })
            ->sortByDesc('total_sold')  // Sắp xếp theo số lượng bán được từ cao xuống thấp
            ->take(5);  // Lấy 5 sản phẩm bán chạy nhất

        return view("admins.dashboards.sales-report", compact(
            'totalEarnings',
            'orderCounts',
            'orderCountCompleted',
            'orderCountsByMonthJson',
            'earningsByMonthJson',
            // 'refundsByMonthJson',
            // 'userCounts',
            'bestSellerProducts' // Dữ liệu cho biểu đồ
        ));
    }
}
