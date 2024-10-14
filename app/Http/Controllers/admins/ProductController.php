<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::paginate(5);
        return view('admins.products.list-product', compact('products'));
    }

    public function create()
    {
        return view('admins.products.add-product');
    }

    public function show($id)
    {
        return view('admins.products.edit-product');
    }
}
