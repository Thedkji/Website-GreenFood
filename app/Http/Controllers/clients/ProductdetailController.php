<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\VariantGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductdetailController extends Controller
{
    public function productDetail(Request $request)
    {
        $product = Product::with(['categories', 'galleries', 'variantGroups', 'comments'])->find($request->id);

        // Kiểm tra nếu sản phẩm này đã được xem trong session
        if (!$request->ajax() && !$request->is('api/*')) {
            $sessionKey = 'viewed_product_' . $product->id;
            if (!session()->has($sessionKey)) {
                $product->increment('view');
                session()->put($sessionKey, true);
            }
        }
        // session()->forget($sessionKey);



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
            ->take(5);

        $relatedProducts = Product::with(['variantGroups' => function ($query) {
            // Sắp xếp biến thể theo giá thấp nhất
            $query->orderBy('price_sale', 'asc')->get();
        }])
            ->whereHas('categories', function ($query) use ($product) {
                $query->whereIn('categories.id', $product->categories->pluck('id'));
            })
            ->limit(15)
            ->get();


        if ($request->variantGroupID) {
            return response()->json([
                'status' => 'success',
                'data' => VariantGroup::find($request->variantGroupID),
            ]);
        }
        return view("clients.product-detail.product-detail", compact("product", "productHot", "relatedProducts"));
    }
}
