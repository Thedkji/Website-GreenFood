<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ProductController extends Controller
{
    public function __construct()
    {
        // Chia sẻ dữ liệu giỏ hàng với tất cả các view
        $cartItems = Cart::getContent();
        $cartTotal = Cart::getSubTotal();
        $cartQuantity = Cart::getTotalQuantity();
        view()->share('cartItems', $cartItems);
        view()->share('cartTotal', $cartTotal);
        view()->share('cartQuantity', $cartQuantity);
    }
    public function home()
    {
        $products = Product::with('categories', 'variantGroups')->paginate(8);
        $categories = Category::get();
        $cartItems = Cart::getContent();
        $cartQuantity = Cart::getTotalQuantity();
        return view("clients.homes.home", compact('products', 'categories', 'cartItems', 'cartQuantity'));
    }
}
