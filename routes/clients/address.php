<?php

use App\Http\Controllers\clients\AddressController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(AddressController::class)
    ->group(function () {
        Route::post('/addressInfo/districts', 'getDistricts')->name('getDistricts');
        Route::post('/addressInfo/wards', 'getWards')->name('getWards');
    });
