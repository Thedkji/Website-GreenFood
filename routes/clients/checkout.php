<?php

use App\Http\Controllers\clients\CheckoutController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(CheckoutController::class)
    ->group(function () {
        Route::get('thanh-toan', 'checkout')->name('checkout');
        Route::post('thanh-toan-don-hang', 'getCheckOut')->name('getCheckOut');
    });
