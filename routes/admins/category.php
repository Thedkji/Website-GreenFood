<?php

use App\Http\Controllers\admins\CategoryController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::middleware(['web'])
    ->prefix('categories')
    ->group(function () {
        Route::resource('categories', CategoryController::class);
    });
