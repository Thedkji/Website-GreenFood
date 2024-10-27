<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use NumberFormatter;

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
    }
}
