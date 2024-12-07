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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function shop(Request $request)
    {
        $categories2 = Category::with('children')->whereNotNull('parent_id')->get();

        // Bắt đầu với một truy vấn chung
        $query = Product::with(['categories', 'galleries', 'variantGroups', 'comments.rates']);


        // Lọc theo tên sản phẩm nếu có
        if ($search = $request->input('search-product')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Lọc theo danh mục nếu có
        if ($categoryId = $request->input('category_id')) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        } else {
            $products = $query->paginate(12)->appends(request()->query());
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
        }

        // Lấy danh sách sản phẩm
        $products = $query->orderByDesc('id')->paginate(9)->appends(request()->query());

        // Sản phẩm xem nhiều




        $productHot = Product::where('created_at', '>=', Carbon::now()->subWeek())  // Lọc sản phẩm trong tuần qua
            ->with(['comments.rates'])  // Eager load comments và rates
            ->get()
            ->map(function ($product) {
                // Tính toán trung bình đánh giá của sản phẩm
                $avgRating = $product->comments->flatMap(function ($comment) {
                    return $comment->rates;
                })->avg('star');  // Tính trung bình của trường 'star'

                $product->avg_rating = $avgRating;  // Gán giá trị trung bình vào sản phẩm
                return $product;
            })
            ->sortByDesc(function ($product) {
                // Sắp xếp theo đánh giá trung bình và lượt xem
                return $product->avg_rating * 100 + $product->view;  // Kết hợp 2 tiêu chí, có thể điều chỉnh tỉ lệ cho phù hợp
            });


        return view("clients.shops.shop", compact("products", 'categories2', 'productHot'));
    }
}
