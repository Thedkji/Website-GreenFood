<?php

use App\Http\Controllers\admins\OrderController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::prefix('orders')
    ->name('orders.')
    ->group(function () {
        Route::get('/', [OrderController::class, 'showOder'])->name('showOder');
        Route::get('/show-order-detail/{id}', [OrderController::class, 'showOrderDetail'])->name('showOrderDetail');

        Route::get('/edit-order/{id}', [OrderController::class, 'editOrder'])->name('editOrder');
        Route::put('/update-order/{id}', [OrderController::class, 'updateOrder'])->name('updateOrder');
        Route::delete('/destroy-order/{id}', [OrderController::class, 'destroyOrder'])->name('destroyOrder');
    });
