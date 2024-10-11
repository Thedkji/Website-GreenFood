<?php

use App\Http\Controllers\clients\CheckoutController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(CheckoutController::class)
    ->group(function () {
        Route::get('checkout', 'checkout')->name('checkout');
    });
