<?php

use App\Http\Controllers\clients\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clients.homes.home');
});

Route::prefix("client")->group(function () {
    Route::resource('user', ProductController::class);
});
