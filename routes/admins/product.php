<?php

use App\Http\Controllers\admins\ProductController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::resource('/', ProductController::class);
    });
