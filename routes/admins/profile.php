<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\ProfileController;



/* Viết route ở đây */

// Route::resource('profiles', ProfileController::class);

Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function (){
    Route::get('profileDetail', [ProfileController::class, 'profileDetail'])->name('profileDetail');
});
