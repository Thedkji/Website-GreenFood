<?php

use App\Http\Controllers\clients\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clients.homes.home');
});

Route::prefix("client")->group(function () {});

Route::get("client/trang-chu", [ProductController::class, 'index'])->name('client.trang-chu');


Route::prefix("client")
    ->controller(ProductController::class)
    ->name("client.")
    ->group(function () {
        Route::get("trang-chu", 'index')->name('trang-chu');
    });
