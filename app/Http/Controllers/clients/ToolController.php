<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function bmi(){
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
        ->take(10);
        return view('clients.tools.bmi',compact('productHot'));
    }

    public function bmr(){
        return view('clients.tools.bmr');
    }
}
