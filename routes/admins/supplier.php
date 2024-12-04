<?php

use App\Http\Controllers\admins\SupplierController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */


Route::resource('suppliers', SupplierController::class);
Route::post('bulk-delete', [SupplierController::class, 'bulkDelete'])->name('suppliers.bulkDelete');

Route::get('suppliers-detail/{id}', [SupplierController::class, 'supplierDetail'])->name('suppliers.detail');


