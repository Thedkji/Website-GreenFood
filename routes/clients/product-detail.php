<?php

use App\Http\Controllers\clients\ProductdetailController;
use Illuminate\Support\Facades\Route;

/* Viết route ở đây */

Route::controller(ProductdetailController::class)
    ->group(function () {
        Route::get('/productdetail', 'productdetail')->name('product-detail');
    });