<?php

use App\Http\Controllers\admins\UserController;
use Illuminate\Support\Facades\Route;


/* Viết route ở đây */


        Route::resource('users', UserController::class);


