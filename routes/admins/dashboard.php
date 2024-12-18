<?php

use App\Http\Controllers\admins\DashboardController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::controller(DashboardController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/sales-report', 'salesReport')->name('salesReport');
        Route::get('/product-statistics', 'getProductStatistics')->name('getProductStatistics');
        Route::get('/commentsDashboard',  'commentsDashboard')->name('commentsDashboard');

    });
