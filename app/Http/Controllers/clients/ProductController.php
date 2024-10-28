<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::with('categories', 'variantGroups')->paginate(8);
        $categories = Category::get();
        return view("clients.homes.home", compact('products', 'categories'));
    }
}
