<?php

use App\Http\Controllers\admins\CouponController;
use Illuminate\Support\Facades\Route;

/* Viết route ở đây */

Route::prefix('coupons')
    ->name('coupons.')
    ->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('showCoupon');
        Route::get('/add', [CouponController::class, 'addCoupon'])->name('addCoupon');
        Route::post('/store', [CouponController::class, 'store'])->name('store'); 
       
        Route::get('/edit/{id}', [CouponController::class, 'editCoupon'])->name('editCoupon');
        Route::put('/update/{id}', [CouponController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [CouponController::class, 'destroy'])->name('destroy');
    });
