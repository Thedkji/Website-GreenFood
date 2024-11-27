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
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::with('children')->where('parent_id', null)->get();
        // Bắt đầu với một truy vấn chung
        $query = Product::with(['categories', 'galleries', 'variantGroups']);
        // Lấy danh sách sản phẩm
        $products = $query->paginate(8);
        $productHot = Product::orderByDesc('view')->limit(6)->get();

        if ($request->ajax() && $request->has('keySearch')) {
            $productSearch = Product::with('categories', 'variantGroups')
                ->where('name', 'like', '%' . $request->keySearch . '%')
                ->limit(5)
                ->orderByDesc('id')
                ->get();
            return response()->json($productSearch);
        }

        return view("clients.homes.home", compact("products", 'categories', 'productHot'));
    }
}
