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

        $productHot = Product::withCount('comments')  // Đếm số lượng comment cho mỗi sản phẩm
            ->with(['comments' => function ($query) {
                $query->with(['rates' => function ($rateQuery) {
                    $rateQuery->orderBy('star', 'desc'); // Lấy rate cao nhất trong mỗi comment
                }]);
            }])
            ->with(['variantGroups' => function ($variantQuery) {
                // Kiểm tra nếu có mối quan hệ với variantGroups và lấy giá sale thấp nhất
                $variantQuery->orderBy('price_sale', 'asc')->limit(1); // Lấy biến thể có giá sale thấp nhất
            }])
            ->selectRaw('products.*, 
        (select count(*) from comments where comments.product_id = products.id and comments.deleted_at is null) as comments_count')
            ->addSelect([
                'max_star' => Rate::selectRaw('MAX(star)')
                    ->join('comments', 'rates.comment_id', '=', 'comments.id')
                    ->whereColumn('comments.product_id', 'products.id')
                    ->whereNull('comments.deleted_at')
                    ->whereNull('rates.deleted_at')
                    ->limit(1)
            ])
            ->orderByDesc('comments_count')  // Sắp xếp theo số lượng comment giảm dần
            ->orderByDesc('max_star')  // Sắp xếp theo rating cao nhất giảm dần
            ->limit(6)  // Lấy 4 sản phẩm nổi bật nhất
            ->get();

        return view("clients.shops.shop", compact("products", 'categories', 'productHot'));
    }
}
