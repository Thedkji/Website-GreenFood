<?php

use App\Http\Controllers\admins\SupplierController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */


Route::resource('suppliers', SupplierController::class);
