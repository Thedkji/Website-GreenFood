<?php

use App\Http\Controllers\admins\VariantController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::middleware(['web'])
    ->prefix('variants')
    ->name('variants.')
    ->group(function () {
        Route::resource('variants', VariantController::class);
        Route::prefix('child')->group(function () {
            Route::get('/add_test', [VariantController::class, 'add_test'])->name('add_test');
            Route::post('/create_test', [VariantController::class, 'create_test'])->name('create_test');
            Route::get('/add', [VariantController::class, 'addChildVariant'])->name('add_child_variant');
            Route::post('/create', [VariantController::class, 'createChildVariant'])->name('create_child_variant');
            Route::get('/list', [VariantController::class, 'listChildVariant'])->name('list_child_variant');
            Route::get('/edit/{id}', [VariantController::class, 'editChildVariant'])->name('edit_child_variant');
            Route::post('/update/{id}', [VariantController::class, 'updateChildVariant'])->name('update_child_variant');
            Route::post('/delete/{id}', [VariantController::class, 'deleteChildVariant'])->name('delete_child_variant');
        });
    });
