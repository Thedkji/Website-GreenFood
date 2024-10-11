<?php

use App\Http\Controllers\admins\VariantController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::prefix('variants')
    ->name('variants.')
    ->group(function () {
        Route::resource('variants', VariantController::class);
        Route::get('/add_child_variant', [VariantController::class, 'addChildVariant'])->name('add_child_variant');
        Route::get('/list_child_variant', [VariantController::class, 'listChildVariant'])->name('list_child_variant');
        Route::get('/edit_child_variant', [VariantController::class, 'editChildVariant'])->name('edit_child_variant');
    });
