<?php

use App\Http\Controllers\admins\CommentController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */

Route::prefix('comments')
    ->name('comments.')
    ->group(function () {
        Route::get('/', [CommentController::class, 'showComment'])->name('comment');
        Route::get('/create/{id}', [CommentController::class, 'create'])->name('create');
        Route::post('/store/{id}', [CommentController::class, 'store'])->name('store');
        Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('destroy');
        Route::get('/detail/{id}', [CommentController::class, 'detail'])->name('detail');
        Route::post('bulk-delete', [CommentController::class, 'bulkDelete'])->name('bulkDelete');
    });