<?php

use App\Http\Controllers\clients\Information;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('information', [Information::class, 'index'])->name('information.index');
    Route::get('information/editPass/{id}', [Information::class, 'editPass'])->name('information.editPass');
    Route::post('information/updatePass/{id}', [Information::class, 'updatePass'])->name('information.updatePass');
    Route::get('information/edit/{id}', [Information::class, 'edit'])->name('information.edit');
    Route::post('information/update/{id}', [Information::class, 'update'])->name('information.update');
    Route::delete('information/{id}', [Information::class, 'cancel'])->name('orders.cancel');
    Route::get('information/detail/{id}', [Information::class, 'show'])->name('orders.details');
});
