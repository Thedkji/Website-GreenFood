<?php

use Illuminate\Support\Facades\Route;
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
    ->group(function () {
        require_once base_path("routes/admins/dashboard.php");
        require_once base_path("routes/admins/product.php");
        require_once base_path("routes/admins/variant.php");
        require_once base_path("routes/admins/order.php");
        require_once base_path("routes/admins/comment.php");
        require_once base_path("routes/admins/category.php");
        require_once base_path("routes/admins/supplier.php");
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
 