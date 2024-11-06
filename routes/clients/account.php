<?php

use App\Http\Controllers\clients\AccountController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(AccountController::class)
    ->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register', 'postRegister')->name('postRegister');

        Route::get('login', 'login')->name('login');
        Route::post('login', 'postLogin')->name('postLogin');

        Route::get('forgot-pass', 'forgotPass')->name('forgotPass');
        Route::post('forgot-pass', 'postForgotPassword')->name('postForgotPassword');
        Route::get('/logout', 'logout')->name('logout');

        Route::get('reset-password/{token}', 'resetPassword')->name('resetPassword');
        Route::post('reset-password/{token}', 'postResetPassword')->name('postResetPassword');
    });

    // Route::group(['prefix' => 'authens', 'as' => 'authens.'], function () {
    //     Route::get('/login', [AuthenController::class, 'login'])->name('login');
    //     Route::post('/login', [AuthenController::class, 'postLogin'])->name('postLogin');

    //     Route::get('/register', [AuthenController::class, 'register'])->name('register');
    //     Route::post('/register', [AuthenController::class, 'postRegister'])->name('postRegister');

    //     Route::get('/logout', [AuthenController::class, 'logout'])->name('logout');

        // Route::get('/forgotpassword', [AuthenController::class, 'forgotpassword'])->name('forgotpassword');
        // Route::post('/forgotpassword', [AuthenController::class, 'authSendEmail'])->name('authSendEmail');


        // Route::get('/PasswordChange', [AuthenController::class, 'PasswordChange'])->name('PasswordChange');
        // Route::get('/notificationDone', [AuthenController::class, 'notificationDone'])->name('notificationDone');
    // });
