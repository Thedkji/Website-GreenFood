<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {


        $totalEarnings = Order::where('status', '6')->sum('total');
        $orderCounts = Order::where('status', '6')->count();
        $orderCountCompleted = Order::where('status', 'completed')->count();


        $orderCountsByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $orderCountsByMonthJson = $orderCountsByMonth->pluck('order_count')->toJson();


        $userCounts = User::where('role', '1')->count();


        // Doanh thu hôm nay
        $todayEarnings = Order::whereDate('created_at', now()->toDateString())

            ->sum('total');


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
            // 'bestSellerProducts',
            'todayEarnings',
            'yesterdayEarnings',
            'percentChange'
        ));
    }

    public function salesReport(Request $request)
    {
        // Tổng doanh thu
        $totalEarnings = Order::where('status', '6')->sum('total');
        // Số lượng đơn hàng
        $orderCounts = Order::count();
        // Số lượng đơn hàng hoàn thành
        $orderCountCompleted = Order::where('status', '6')->count();

        $orderCountsByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
            ->where('status', 'completed') // Chỉ lấy đơn hàng đã hoàn thành
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
        $earningsByMonthArray = $earningsByMonth->pluck('total_earnings', 'month')->toArray();
        // $refundsByMonthJson = $refundsByMonth->pluck('refund_count')->toArray();

        // Dữ liệu JSON để sử dụng trong biểu đồ
        $months = range(1, 12);
        $orderCountsByMonthArray = $orderCountsByMonth->pluck('order_count', 'month')->toArray();
        $orderCountsForChart = array_map(fn($month) => $orderCountsByMonthArray[$month] ?? 0, $months);
        $earningsByMonthJson = array_map(fn($month) => $earningsByMonthArray[$month] ?? 0, $months);

        // Lấy danh sách sản phẩm bán chạy, sắp xếp theo số lượng bán

        $bestSellerProducts = Product::with(['variantGroups', 'orderDetails'])

            ->get()
            ->filter(function ($product) {
                return $product->total_sold > 0; // Chỉ lấy sản phẩm đã bán
            })
            ->sortByDesc(function ($product) {
                return $product->total_sold; // Sắp xếp theo số lượng bán
            })
            ->take(5); // Lấy 5 sản phẩm bán chạy nhất


        // dd($bestSellerProducts);

        return view("admins.dashboards.sales-report", compact(
            'totalEarnings',
            'orderCounts',
            'orderCountCompleted',
            'orderCountsByMonthJson',
            'earningsByMonthJson',
            'orderCountsForChart',
            // 'userCounts',
            'bestSellerProducts' // Dữ liệu cho biểu đồ
        ));
    }

    public function getProductStatistics()
    {
        $categories = Category::withCount('products')->get();

        $data = [
            'labels' => $categories->pluck('name'), // Lấy tên danh mục
            'series' => $categories->pluck('products_count'), // Lấy số lượng sản phẩm
        ];

        return response()->json($data);
    }
}
