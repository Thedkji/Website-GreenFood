<?php

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

Route::get('/', function () {
    $a = "1230";
    $b = "đâsdas";
    $c = 123;
    $b = 123;
    $d = "đâsd";
    $e = 123123;
    $f = 123123;
    return view('welcome');
});

