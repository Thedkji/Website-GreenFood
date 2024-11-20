<?php

use App\Http\Controllers\clients\Information;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(Information::class)
    ->group(function () {
        Route::get('information', 'index')->name('information.index');
    });
