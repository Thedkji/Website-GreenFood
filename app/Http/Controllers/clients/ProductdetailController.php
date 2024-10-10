<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductdetailController extends Controller
{
    public function productdetail(){
        return view("clients.product-detail.product-detail");
    }
}
