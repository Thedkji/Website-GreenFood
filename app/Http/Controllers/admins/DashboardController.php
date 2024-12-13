<?php

namespace App\Http\Controllers\admins;

use Log;
use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
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
        $orderCounts = Order::where('status', '6')->whereYear('created_at', now()->year)->count();
        $orderCountCompleted = Order::where('status', '6')->whereYear('created_at', now()->year)->count();
        // Bình luận theo tháng
        $commentsByMonth = Comment::selectRaw('MONTH(created_at) as month, COUNT(*) as total_comments')
            ->whereYear('created_at', now()->year) // Chỉ lấy bình luận trong năm hiện tại
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Chuyển dữ liệu bình luận thành mảng theo tháng
        $commentsByMonthArray = $commentsByMonth->pluck('total_comments', 'month')->toArray();

        // Lấy số lượng bình luận trong tháng hiện tại
        $currentMonthComments = $commentsByMonthArray[now()->month] ?? 0;

        $orderCountsByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
            ->where('status', '6')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $earningsByMonth = Order::where('status', '6')->selectRaw('MONTH(created_at) as month, SUM(total) as total_earnings')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $orderCountsByMonthJson = $orderCountsByMonth->pluck('order_count')->toJson();
        $earningsByMonthArray = $earningsByMonth->pluck('total_earnings', 'month')->toArray();

        $userCounts = User::where('role', '1')->count();

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


        // danh mục sản phẩm
        $categories = Category::withCount('products')->get();

        // Lấy số lượng sản phẩm theo từng danh mục
        $categoryData = $categories->map(function ($category) {
            return $category->products_count;
        });

        // Lấy tên danh mục
        $categoryNames = $categories->pluck('name');

        // Doanh thu theo tháng
        $currentMonthEarnings = Order::where('status', '6')->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');

        // Doanh thu hôm qua
        // $yesterdayEarnings = Order::whereDate('created_at', now()->subDay()->toDateString())->sum('total');

        // // Tính phần trăm thay đổi doanh thu
        // if ($yesterdayEarnings > 0) {
        //     $percentChange = (($todayEarnings - $yesterdayEarnings) / $yesterdayEarnings) * 100;
        // } else {
        //     $percentChange = $todayEarnings > 0 ? 100 : 0; // Nếu hôm qua không có doanh thu
        // }

        return view("admins.dashboards.dashboard", compact(
            'totalEarnings',
            'orderCounts',
            'orderCountCompleted',
            'orderCountsByMonthJson',
            'userCounts',
            'earningsByMonthJson',
            'orderCountsForChart',
            'categoryData',
            'categoryNames',
            'bestSellerProducts',
            'currentMonthEarnings',
            'currentMonthComments',
            // 'percentChange'
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


        // danh mục sản phẩm
        $categories = Category::withCount('products')->get();

        // Lấy số lượng sản phẩm theo từng danh mục
        $categoryData = $categories->map(function ($category) {
            return $category->products_count;
        });

        // Lấy tên danh mục
        $categoryNames = $categories->pluck('name');
        // dd($bestSellerProducts);

        return view("admins.dashboards.sales-report", compact(
            'totalEarnings',
            'orderCounts',
            'orderCountCompleted',
            'orderCountsByMonthJson',
            'earningsByMonthJson',
            'orderCountsForChart',
            'categoryData',
            'categoryNames',
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

    public function commentsDashboard(Request $request)
    {

        // Lấy danh sách sản phẩm với biến thể, đánh giá, và số lượng bình luận
        $products = Product::with(['variantGroups', 'comments.rates'])
            ->withCount('comments') // Đếm số lượng bình luận
            ->get()
            ->map(function ($product) {
                // Tính giá thấp nhất (giá sản phẩm hoặc giá biến thể)
                $variantPrices = $product->variantGroups->pluck('price_sale')->filter()->toArray();
                $basePrice = $product->price_sale ?? $product->price_regular;

                $product->lowest_price = min(array_merge([$basePrice], $variantPrices));

                // Tính trung bình đánh giá
                $totalStars = $product->comments->flatMap->rates->sum('star');
                $totalRates = $product->comments->flatMap->rates->count();
                $product->average_rating = $totalRates > 0 ? round($totalStars / $totalRates, 1) : 0;

                return $product;
            })
            ->sortByDesc(function ($product) {
                // Ưu tiên sắp xếp theo đánh giá trung bình, sau đó theo số lượng bình luận
                return [$product->average_rating, $product->comments_count];
            })
            ->take(10); // Lấy tối đa 10 sản phẩm

        return view("admins.dashboards.comment-dashboard", compact(
            'products',
            // Các dữ liệu khác...
        ));
    }
}
