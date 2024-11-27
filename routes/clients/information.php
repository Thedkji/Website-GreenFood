<?php

use App\Http\Controllers\clients\Information;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('information', [Information::class, 'index'])->name('information.index');
    Route::put('information/update/', [Information::class, 'update'])->name('information.update');
    Route::get('information/editPass', [Information::class, 'editPass'])->name('information.editPass');
    Route::post('information/updatePass', [Information::class, 'updatePass'])->name('information.updatePass');

});
