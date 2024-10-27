<?php

use App\Http\Controllers\admins\TrashController;
use App\Http\Controllers\admins\UserController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */


        Route::resource('trashs', TrashController::class);

        Route::group(['prefix' => 'trashs', 'as' => 'trashs.'], function (){
            Route::get('/restore/{id}', [TrashController::class, 'restore'])->name('restore');
        });


