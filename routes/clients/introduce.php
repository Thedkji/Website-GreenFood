<?php

use App\Http\Controllers\clients\ContactController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(ContactController::class)
    ->group(function () {
        Route::get('introduce', 'introduce')->name('introduce.index');
        // Route::post('introduce', 'sendIntroduce')->name('introduce.sendIntroduce');
    });
