<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('admins.products.list-product');
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
