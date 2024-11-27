<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckoutStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('checkoutStatus')) {
            if (url()->previous() === route('client.cart')) {
                session()->put('checkoutStatus', 'Đang thanh toán');
                return $next($request);
            }
            // Ngược lại, không cho phép truy cập
            return redirect()->back()->with('error', 'Đơn hàng đã tồn tại');
        }

        return $next($request);
    }
}
