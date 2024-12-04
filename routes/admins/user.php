<?php

use App\Http\Controllers\admins\UserController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */


        Route::resource('users', UserController::class);
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('detail/{id}', [UserController::class, 'detail'])->name('detail');
            Route::post('bulkDelete', [UserController::class, 'bulkDelete'])->name('bulkDelete');
        });
