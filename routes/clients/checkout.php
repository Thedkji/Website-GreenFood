<?php

use App\Http\Controllers\clients\CheckoutController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(CheckoutController::class)
    ->group(function () {
        Route::get('thanh-toan', 'checkout')->name('checkout');
        Route::post('removeCheck', 'removeCheck')->name('removeCheck');
        Route::post('ma-giam-gia', 'applyCoupon')->name('applyCoupon');
        Route::post('thanh-toan-don-hang', 'getCheckOut')->name('getCheckOut');
        Route::get('/vnpay-return/{orderId}', 'handleVnPayResponse')->name('vnpay.callback');
    });
