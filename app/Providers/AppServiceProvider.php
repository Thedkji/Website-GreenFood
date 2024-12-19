<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use NumberFormatter;
use App\Http\View\Composers\CartComposer;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Hàm chuyển đổi giá trị số sang dạng tiền vnđ
        $this->app->singleton('formatPrice', function () {
            return function ($amount) {
                $formatter = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
                $formattedAmount = $formatter->formatCurrency($amount, 'VND');
                return str_replace('₫', '', $formattedAmount); // Loại bỏ ký hiệu ₫
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Blade::componentNamespace('App\\View\\Components', 'admins');
        view()->composer('*', CartComposer::class);

        //Hàm lấy danh mục cho nav

        if (!app()->runningInConsole() && Schema::hasTable('categories') && Schema::hasTable('products')) {
            // Hàm lấy danh mục cho nav
            $categories = Category::with('children')->whereNull('parent_id')->get();
            $productHot2 = Product::with(['comments.rates'])
            ->get()
            ->map(function ($product) {
                $avgRating = $product->comments->flatMap(function ($comment) {
                    return $comment->rates;
                })->avg('star');

                $daysSinceCreated = Carbon::now()->diffInDays($product->created_at); //Tính số ngày từ khi sản phẩm được tạo (created_at) đến hôm nay.
                $freshnessScore = max(0, 30 - $daysSinceCreated); // Sản phẩm mới có điểm cao hơn

                $product->setAttribute('avg_rating', $avgRating);
                $product->setAttribute('views', $product->view);
                // Tính điểm cho sản phẩm dựa trên trung bình rating, số lượt xem và freshness score
                // 50 điểm cho mỗi sao, 50 điểm cho số lượt xem, 20 điểm cho freshness score
                $product->setAttribute('score', ($avgRating * 50) + ($product->view * 30) + ($freshnessScore * 20));

                return $product;
            })
            ->sortByDesc('score')
            ->take(6);

            view()->share('categories', $categories);
            view()->share('productHot2', $productHot2);
        }
    }
}
