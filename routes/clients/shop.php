<?php

use App\Http\Controllers\clients\AccountController;
use App\Http\Controllers\clients\ShopController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(ShopController::class)
    ->group(function () {
        Route::get('/shop', 'shop')->name('shop');

    });
