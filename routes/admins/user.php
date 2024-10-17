<?php

use App\Http\Controllers\admins\UserController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::prefix('users')
    ->name('users.')
    ->group(function () {
        Route::resource('users', UserController::class);
    });
