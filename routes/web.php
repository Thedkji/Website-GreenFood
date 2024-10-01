<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ClientController::class, 'index']);
Route::get('/shop', [ClientController::class, 'shop']);
Route::get('/shop-detail', [ClientController::class, 'shopDetail']);
Route::get('/cart', [ClientController::class, 'cart']);
Route::get('/chackout', [ClientController::class, 'chackout']);
Route::get('/404page', [ClientController::class, 'errPage']);
Route::get('/contact', [ClientController::class, 'contact']);
Route::get('/register', [ClientController::class, 'register']);
Route::get('/login', [ClientController::class, 'login']);
