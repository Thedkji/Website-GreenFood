<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductdetailController extends Controller
{
    public function productDetail(){
        return view("clients.product-detail.product-detail");
    }
}
