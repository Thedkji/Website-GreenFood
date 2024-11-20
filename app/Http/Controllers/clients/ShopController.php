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

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $categories = Category::with('children')->where('parent_id', null)->get();

        if (request()->input('search-product')) {
            $products = Product::with(['categories', 'galleries', 'variantGroups' => function ($query) {
                // Sắp xếp theo giá bán giảm dần và chỉ lấy variant có giá thấp nhất
                $query->orderBy('price_sale', 'asc')->limit(1);
            }])
                ->where('name', 'like', '%' . request()->input('search-product') . '%') // Lọc theo tên sản phẩm
                ->orderByDesc('id')
                ->paginate(12);
        } else {

            $products = Product::with(['categories', 'galleries', 'variantGroups' => function ($query) {
                // Sắp xếp theo giá bán giảm dần và chỉ lấy variant có giá thấp nhất
                $query->orderBy('price_sale', 'asc')->limit(1);
            }])->orderByDesc('id')->paginate(12);
        }


        if (request()->input("select_arrange")) {

            if (request()->input('select_arrange') == 'price_min') {
                $products = Product::with(['categories', 'galleries', 'variantGroups' => function ($query) {
                    // Sắp xếp theo giá bán giảm dần và chỉ lấy variant có giá thấp nhất
                    $query->orderBy('price_sale', 'asc')->limit(1);
                }])->orderBy('price_sale', 'asc')->paginate(12);
            } elseif (request()->input('select_arrange') == 'price_max') {
                $products = Product::with(['categories', 'galleries', 'variantGroups' => function ($query) {
                    // Sắp xếp theo giá bán giảm dần và chỉ lấy variant có giá thấp nhất
                    $query->orderBy('price_sale', 'asc')->limit(1);
                }])->orderBy('price_sale', 'desc')->paginate(12);
            }
        }

        if (request('rangeInput')) {
            $products = Product::with(['categories', 'galleries', 'variantGroups' => function ($query) {
                $query->orderBy('price_sale', 'asc'); // Sắp xếp theo giá bán giảm dần trong biến thể
            }])
                ->where('price_sale', '<=', request('rangeInput'))
                ->paginate(12);
        }

        if ($request->input('category_id')) {

            $products = Product::with(['categories', 'galleries', 'variantGroups' => function ($query) {
                $query->orderBy('price_sale', 'asc')->limit(1);
            }])
                ->whereHas('categories', function ($query) {
                    $query->where('category_id', request('category_id'));
                })
                ->paginate(12);
        }

        $productHot = Product::orderByDesc('view')->limit(4)->get();

        return view("clients.shops.shop", compact("products", 'categories', 'productHot'));
    }
}
