<?php

use App\Http\Controllers\clients\AccountController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(AccountController::class)
    ->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register', 'postRegister')->name('postRegister');
        Route::get('verify-email/{email}', 'verify')->name('verify');

        Route::get('login', 'login')->name('login');
        Route::post('login', 'postLogin')->name('postLogin');

        Route::get('forgot-pass', 'forgotPass')->name('forgotPass');
        Route::post('forgot-pass', 'postForgotPassword')->name('postForgotPassword');
        Route::get('/logout', 'logout')->name('logout');

        Route::get('reset-password/{token}', 'resetPassword')->name('resetPassword');
        Route::post('reset-password/{token}', 'postResetPassword')->name('postResetPassword');
    });

