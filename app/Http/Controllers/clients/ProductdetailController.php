<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductdetailController extends Controller
{
    public function productDetail(Request $request)
    {
        $product = Product::with(['categories', 'galleries', 'variantGroups', 'comments'])->find($request->id);
        $view = $product->view;
        $product->update([
            'view' => $view + 1,
        ]);
        return view("clients.product-detail.product-detail", compact("product"));
    }
}
