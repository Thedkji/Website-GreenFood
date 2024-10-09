<?php
use Illuminate\Support\Facades\Route;

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
Route::prefix('client')
    ->name('client.')
    ->group(function () {
        require_once base_path("routes/clients/product.php");
        require_once base_path("routes/clients/account.php");
        require_once base_path("routes/clients/shop.php");
        require_once base_path("routes/clients/product-detail.php");
    });
