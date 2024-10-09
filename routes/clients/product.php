<?php

use App\Http\Controllers\clients\ProductController;
use Illuminate\Support\Facades\Route;

/* Viết route ở đây */

Route::controller(ProductController::class)
    ->group(function () {
        Route::get('/home', 'home')->name('home');
    });
