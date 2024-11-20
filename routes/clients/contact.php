<?php

use App\Http\Controllers\clients\ContactController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(ContactController::class)
    ->group(function () {
        Route::get('contact', 'contact')->name('contact.index');
        Route::post('contact', 'sendContact')->name('contact.sendContact');
    });
