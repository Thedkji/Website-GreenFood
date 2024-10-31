<?php

use App\Http\Controllers\clients\AccountController;
use App\Http\Controllers\clients\CartController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(CartController::class)
    ->group(function () {
        Route::get('cart', 'cart')->name('cart');
        Route::post('add-cart', 'addToCart')->name('addToCart');
        Route::get('showCart', 'showCart')->name('showCart');
        Route::post('deleteCart', 'deleteCart')->name('deleteCart');
        Route::post('removeCart/{id}', 'removeCart')->name('removeCart');
        Route::post('updateCart', 'updateCart')->name('updateCart');
    });
