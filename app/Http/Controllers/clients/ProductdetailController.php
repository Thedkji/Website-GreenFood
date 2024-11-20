<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\VariantGroup;
use Illuminate\Http\Request;

class ProductdetailController extends Controller
{
    public function productDetail(Request $request)
    {
        $product = Product::with(['categories', 'galleries', 'variantGroups', 'comments'])->find($request->id);
        $view = $product->view;
        $product->update([
            'view' => $view + 1,
        ]);

        $productHot = Product::orderByDesc('view')->limit(4)->get();

        $relatedProducts = Product::with(['variantGroups' => function ($query) {
            $query->orderBy('price_sale', 'asc'); // Sắp xếp biến thể theo giá thấp nhất
        }])
            ->where(function ($query) use ($product) {
                $query->whereHas('categories', function ($query) use ($product) {
                    // Lấy sản phẩm thuộc cùng danh mục
                    $query->whereIn('categories.id', $product->categories->pluck('id'));
                })
                    ->orWhereHas('variantGroups', function ($query) use ($product) {
                        // Lấy biến thể có product_id thuộc danh mục
                        $query->whereHas('product.categories', function ($subQuery) use ($product) {
                            $subQuery->whereIn('categories.id', $product->categories->pluck('id'));
                        });
                    });
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
