<?php

use App\Http\Controllers\clients\AccountController;
use App\Http\Controllers\clients\CartController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(CartController::class)
    ->group(function () {
        Route::get('cart', 'cart')->name('cart');
    });
