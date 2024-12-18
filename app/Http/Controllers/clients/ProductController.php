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
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::with('children')->where('parent_id', null)->get();

        // Get products and calculate sale percentage
        $products = Product::with(['categories', 'galleries', 'variantGroups'])
            ->get()
            ->map(function ($product) {
                // Initialize sale percentage
                $salePercent = 0;

                if ($product->status == 0) {
                    // No variant
                    if ($product->price_sale && $product->price_regular > 0) {
                        $salePercent = round((($product->price_regular - $product->price_sale) / $product->price_regular) * 100);
                    }
                } elseif ($product->status == 1) {
                    // Has variant
                    $variantGroup = $product->variantGroups->sortBy('price_sale')->first();
                    if ($variantGroup && $variantGroup->price_sale && $variantGroup->price_regular > 0) {
                        $salePercent = round((($variantGroup->price_regular - $variantGroup->price_sale) / $variantGroup->price_regular) * 100);
                    }
                }

                $product->setAttribute('sale_percent', $salePercent);
                return $product;
            })
            ->sortByDesc('sale_percent') // Sort by sale percentage from highest to lowest
            ->take(10); // Show only the top 10 products

        $productHot = Product::with(['comments.rates'])
            ->get()
            ->map(function ($product) {
                $avgRating = $product->comments->flatMap(function ($comment) {
                    return $comment->rates;
                })->avg('star');

                $daysSinceCreated = Carbon::now()->diffInDays($product->created_at); //Tính số ngày từ khi sản phẩm được tạo (created_at) đến hôm nay.
                $freshnessScore = max(0, 30 - $daysSinceCreated); // Sản phẩm mới có điểm cao hơn

                $product->setAttribute('avg_rating', $avgRating);
                $product->setAttribute('views', $product->view);
                // Tính điểm cho sản phẩm dựa trên trung bình rating, số lượt xem và freshness score
                // 50 điểm cho mỗi sao, 50 điểm cho số lượt xem, 20 điểm cho freshness score
                $product->setAttribute('score', ($avgRating * 50) + ($product->view * 30) + ($freshnessScore * 20));

                return $product;
            })
            ->sortByDesc('score')
            ->take(6);


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
            ->take(5);

        if ($request->ajax() && $request->has('keySearch')) {
            $productSearch = Product::with('categories', 'variantGroups')
                ->where('name', 'like', '%' . $request->keySearch . '%')
                ->limit(5)
                ->orderByDesc('id')
                ->get();
            return response()->json($productSearch);
        }

        return view('clients.homes.home', compact(
            'products',
            'categories',
            'productHot',
            'bestSellingProducts',
            'topRatedComments'
        ));
    }
}
