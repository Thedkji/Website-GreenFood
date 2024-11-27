<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Variant;
use App\Models\VariantGroup;
use App\Models\Gallery;
use App\Models\Comment;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::with('children')->where('parent_id', null)->get();
        
        $query = Product::with(['categories', 'galleries', 'variantGroups']);
        $products = $query->limit(8)->get();
        
        $productHot = Product::orderByDesc('view')->limit(6)->get();
        
        $bestSellingProducts = Product::with(['categories', 'galleries'])
            ->withSum('orderDetails as total_sold', 'product_quantity')
            ->orderByDesc('total_sold')
            ->take(8)
            ->get();
        
        $topRatedComments = Comment::with(['rates', 'product', 'user'])
        ->whereHas('rates')  
        ->get()
        ->sortByDesc(function ($comment) {
            return $comment->rates->avg('star');  
        })
        ->take(5);;  
        
        return view('clients.homes.home', compact(
            'products', 'categories', 'productHot', 'bestSellingProducts', 'topRatedComments'
        ));
    }   

}
