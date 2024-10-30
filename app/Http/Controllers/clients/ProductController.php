<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\VariantGroup;

class ProductController extends Controller
{
    public function home(Request $request)
    {
        $products = Product::with(['categories', 'variantGroups.variants.parent'])->paginate(8);
        $categories = Category::all();
        return view("clients.homes.home", compact('products', 'categories'));
    }
}
