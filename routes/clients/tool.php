<?php

use App\Http\Controllers\clients\ToolController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(ToolController::class)
    ->group(function () {
        Route::get('bmi', 'bmi')->name('bmi');
        Route::get('bmr', 'bmr')->name('bmr');
    });
