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


            Route::delete('/destroyUser/{id}', [TrashController::class, 'destroyUser'])->name('destroyUser');
            Route::delete('/destroyProduct/{id}', [TrashController::class, 'destroyProduct'])->name('destroyProduct');
            Route::delete('/destroyCategory/{id}', [TrashController::class, 'destroyCategory'])->name('destroyCategory');
            Route::delete('/destroyOrder/{id}', [TrashController::class, 'destroyOrder'])->name('destroyOrder');
            Route::delete('/destroyVariant/{id}', [TrashController::class, 'destroyVarian'])->name('destroyVarian');
            Route::delete('/destroyComment/{id}', [TrashController::class, 'destroyComment'])->name('destroyComment');
        });


