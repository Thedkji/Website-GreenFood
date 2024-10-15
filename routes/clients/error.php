<?php

use App\Http\Controllers\clients\ErrorController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(ErrorController::class)
    ->group(function () {
        Route::get('error-404', 'showError404')->name('showError404');
        Route::get('error-500', 'showError500')->name('showError500');
    });
