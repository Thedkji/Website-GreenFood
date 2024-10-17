<?php

use App\Http\Controllers\clients\AccountController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(AccountController::class)
    ->group(function () {
        Route::get('register', 'register')->name('register');
        Route::get('login', 'login')->name('login');
        Route::get('forgot-pass', 'forgotPass')->name('forgotPass');
    });
