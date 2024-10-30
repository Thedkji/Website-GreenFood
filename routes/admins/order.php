<?php

use App\Http\Controllers\admins\OrderController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::prefix('orders')
    ->name('orders.')
    ->group(function () {
        Route::get('/', [OrderController::class, 'showOder'])->name('showOder');
        Route::get('/show-order-detail/{id}', [OrderController::class, 'showOrderDetail'])->name('showOrderDetail');
        Route::put('/update-order/{id}', [OrderController::class, 'updateOrder'])->name('updateOrder');
    });
