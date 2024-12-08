<?php

use App\Http\Controllers\admins\ProductController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::resource('products', ProductController::class);

Route::post('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');
