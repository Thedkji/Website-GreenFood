<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\VariantGroup;
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


        $productHot = Product::orderByDesc('view')->limit(4)->get();

        $relatedProducts = Product::with(['variantGroups' => function ($query) {
            // Sắp xếp biến thể theo giá thấp nhất
            $query->orderBy('price_sale','asc')->get();
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
