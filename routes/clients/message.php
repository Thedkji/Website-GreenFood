<?php

use App\Http\Controllers\clients\MessageController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(MessageController::class)
    ->group(function () {
        Route::get('success', 'showSuccess')->name('showSuccess');
        Route::get('failure', 'showFailure')->name('showFailure');
    });
