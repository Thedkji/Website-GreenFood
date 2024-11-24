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

        // Bắt đầu với một truy vấn chung
        $query = Product::with(['categories', 'galleries', 'variantGroups']);

        // Lọc theo tên sản phẩm nếu có
        if ($search = $request->input('search-product')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Lọc theo danh mục nếu có
        if ($categoryId = $request->input('category_id')) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        // Lọc theo khoảng giá nếu có
        if ($rangeInput = $request->input('rangeInput')) {
            $query->where(function ($q) use ($rangeInput) {
                $q->where(function ($subQuery) use ($rangeInput) {
                    // Sản phẩm không có biến thể
                    $subQuery->where('status', 0)
                        ->where('price_sale', '<=', $rangeInput);
                })->orWhere(function ($subQuery) use ($rangeInput) {
                    // Sản phẩm có biến thể
                    $subQuery->where('status', 1)
                        ->whereHas('variantGroups', function ($variantQuery) use ($rangeInput) {
                            $variantQuery->where('price_sale', '<=', $rangeInput);
                        });
                });
            });
        }

        // Sắp xếp theo giá nếu có yêu cầu
        if ($arrange = $request->input('select_arrange')) {
            if ($arrange == 'price_min') {
                $query->orderByRaw('
                CASE 
                    WHEN status = 0 THEN price_sale 
                    WHEN status = 1 THEN (SELECT MIN(price_sale) FROM variant_group WHERE product_id = products.id)
                    ELSE price_sale
                END ASC
            ');
            } elseif ($arrange == 'price_max') {
                $query->orderByRaw('
                CASE 
                    WHEN status = 0 THEN price_sale 
                    WHEN status = 1 THEN (SELECT MIN(price_sale) FROM variant_group WHERE product_id = products.id)
                    ELSE price_sale
                END DESC
            ');
            } else {
                // Sắp xếp mặc định
                $query->orderBy('id', 'desc');
            }
        } else {
            // Sắp xếp mặc định
            $query->orderBy('id', 'desc');
        }

        // Lấy danh sách sản phẩm
        $products = $query->paginate(12);

        // Sản phẩm xem nhiều
        $productHot = Product::orderByDesc('view')->limit(4)->get();

        return view("clients.shops.shop", compact("products", 'categories', 'productHot'));
    }
}
