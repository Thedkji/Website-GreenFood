<?php

use App\Http\Controllers\clients\IntroduceController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(IntroduceController::class)
    ->group(function () {
        Route::get('introduce', 'introduce')->name('introduce.index');
        // Route::post('introduce', 'sendIntroduce')->name('introduce.sendIntroduce');
    });
