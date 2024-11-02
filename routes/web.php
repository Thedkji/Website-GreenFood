<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\admins\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("client.home");
});

/* require các file route khác ở đây để chạy route */

// Admin
Route::prefix('admin')
    ->name('admin.')
    ->middleware('checkAdmin')
    ->group(function () {
        require_once base_path("routes/admins/dashboard.php");
        require_once base_path("routes/admins/user.php");
        require_once base_path("routes/admins/product.php");
        require_once base_path("routes/admins/variant.php");
        require_once base_path("routes/admins/order.php");
        require_once base_path("routes/admins/comment.php");
        require_once base_path("routes/admins/category.php");
        require_once base_path("routes/admins/supplier.php");

        require_once base_path("routes/admins/trash.php");

        require_once base_path("routes/admins/coupon.php");


    });

// Client
Route::prefix('client')
    ->name('client.')
    ->group(function () {
        require_once base_path("routes/clients/product.php");
        require_once base_path("routes/clients/shop.php");
        require_once base_path("routes/clients/product-detail.php");
        require_once base_path("routes/clients/account.php");
        require_once base_path("routes/clients/contact.php");
        require_once base_path("routes/clients/tool.php");
        require_once base_path("routes/clients/cart.php");
        require_once base_path("routes/clients/checkout.php");
        require_once base_path("routes/clients/error.php");
        require_once base_path("routes/clients/message.php");
    });


    Route::group(['prefix' => 'authens', 'as' => 'authens.'], function () {
        Route::get('/login', [AuthenController::class, 'login'])->name('login');
        Route::post('/login', [AuthenController::class, 'postLogin'])->name('postLogin');

        Route::get('/register', [AuthenController::class, 'register'])->name('register');
        Route::post('/register', [AuthenController::class, 'postRegister'])->name('postRegister');

        Route::get('/logout', [AuthenController::class, 'logout'])->name('logout');

        // Route::get('/forgotpassword', [AuthenController::class, 'forgotpassword'])->name('forgotpassword');
        // Route::post('/forgotpassword', [AuthenController::class, 'authSendEmail'])->name('authSendEmail');


        // Route::get('/PasswordChange', [AuthenController::class, 'PasswordChange'])->name('PasswordChange');
        // Route::get('/notificationDone', [AuthenController::class, 'notificationDone'])->name('notificationDone');
    });
