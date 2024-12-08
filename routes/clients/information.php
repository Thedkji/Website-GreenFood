<?php

use App\Http\Controllers\clients\Information;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('information', [Information::class, 'index'])->name('information.index');
    Route::get('information/editPass/{id}', [Information::class, 'editPass'])->name('information.editPass');
    Route::put('information/updatePass/{id}', [Information::class, 'updatePass'])->name('information.updatePass');
    Route::post('information/checkPass', [Information::class, 'checkPass'])->name('information.checkPass');


    Route::get('information/edit/{id}', [Information::class, 'edit'])->name('information.edit');

    Route::put('information/update/{id}', [Information::class, 'update'])->name('information.update');
// Kiểm tra trạng thái đơn hàng
Route::post('orders/check-status/{id}', [Information::class, 'checkStatus'])->name('client.orders.checkStatus');

    Route::put('information/{id}', [Information::class, 'cancel'])->name('orders.cancel');
    Route::get('information/detail/{id}', [Information::class, 'show'])->name('orders.details');
    Route::post('/rate-order', [Information::class, 'store'])->name('rate.order');
    Route::post('information/logout', [Information::class, 'logout'])->name('information.logout');
});
