<?php

use App\Http\Controllers\admins\TrashController;
use App\Http\Controllers\admins\UserController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */


        Route::resource('trashs', TrashController::class);

        Route::group(['prefix' => 'trashs', 'as' => 'trashs.'], function (){
            Route::get('/restoreUser/{id}', [TrashController::class, 'restoreUser'])->name('restoreUser');
            Route::get('/restoreProduct/{id}', [TrashController::class, 'restoreProduct'])->name('restoreProduct');
            Route::get('/restoreCategory/{id}', [TrashController::class, 'restoreCategory'])->name('restoreCategory');
            Route::get('/restoreOrder/{id}', [TrashController::class, 'restoreOrder'])->name('restoreOrder');
            Route::get('/restoreVariant/{id}', [TrashController::class, 'restoreVarian'])->name('restoreVarian');
            Route::get('/restoreComment/{id}', [TrashController::class, 'restoreComment'])->name('restoreComment');


            Route::get('/destroyUser/{id}', [TrashController::class, 'destroyUser'])->name('destroyUser');
            Route::get('/destroyProduct/{id}', [TrashController::class, 'destroyProduct'])->name('destroyProduct');
            Route::get('/destroyCategory/{id}', [TrashController::class, 'destroyCategory'])->name('destroyCategory');
            Route::get('/destroyOrder/{id}', [TrashController::class, 'destroyOrder'])->name('destroyOrder');
            Route::get('/destroyVariant/{id}', [TrashController::class, 'destroyVarian'])->name('destroyVarian');
            Route::get('/destroyComment/{id}', [TrashController::class, 'destroyComment'])->name('destroyComment');
        });


