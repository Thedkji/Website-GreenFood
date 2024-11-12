<?php

use App\Http\Controllers\admins\ProductController;
use App\Http\Controllers\admins\VariantController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::resource('variants', VariantController::class);

Route::post('/variants/bulk-delete', [VariantController::class, 'bulkDelete'])->name('variants.bulkDelete');
