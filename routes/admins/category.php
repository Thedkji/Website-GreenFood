<?php

use App\Http\Controllers\admins\CategoryController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::resource('categories', CategoryController::class);

Route::post('/categories/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('categories.bulkDelete');

