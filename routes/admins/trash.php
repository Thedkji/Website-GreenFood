<?php

use App\Http\Controllers\admins\TrashController;
use App\Http\Controllers\admins\UserController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */


Route::resource('trashs', TrashController::class);

Route::group(['prefix' => 'trashs', 'as' => 'trashs.'], function () {

    Route::post('/restore/{type}/{id}', [TrashController::class, 'restore'])->name('restore');
    Route::delete('/destroy/{type}/{id}', [TrashController::class, 'destroy'])->name('destroy');
    // Định nghĩa route cho việc xóa nhiều mục
    Route::delete('/destroy-bulk/{type}', [TrashController::class, 'destroyBulk'])->name('destroyBulk');

    // Route::delete('/bulkDelete', [TrashController::class, 'bulkDelete'])->name('bulkDelete');
});
