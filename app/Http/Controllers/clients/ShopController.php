<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::with(['categories', 'galleries', 'variantGroups' => function ($query) {
            $query->orderBy('created_at', 'asc');
        }])->orderByDesc('id')->paginate(12);

        // dd($products);

        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();


        return view("clients.shops.shop", compact("products", "categories"));
    }
}
