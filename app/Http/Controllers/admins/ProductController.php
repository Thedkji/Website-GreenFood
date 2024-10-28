<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ProductRequest;
use App\Http\Requests\admins\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantGroup;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy giá trị bộ lọc từ query string
        $status = request()->input('statusProduct');

        // Kiểm tra trạng thái sản phẩm và áp dụng bộ lọc
        if (request()->has('statusProduct')) {
            switch ($status) {
                case 'allPro':
                    $products = Product::orderByDesc('id')->paginate(8)->appends(['statusProduct' => 'allPro']);
                    break;
                case '0':
                    $products = Product::where('status', 0)->orderByDesc('id')->paginate(8)->appends(['statusProduct' => '0']);
                    break;
                case '1':
                    $products = Product::where('status', 1)->orderByDesc('id')->paginate(8)->appends(['statusProduct' => '1']);
                    break;
                default:
                    echo "Không tìm thấy trạng thái sản phẩm";
                    break;
            }
        } else {
            $products = Product::orderByDesc('id')->paginate(8);
        }

        return view('admins.products.list-product', compact('products'));
    }

    public function create()
    {
        $variants = VariantGroup::with('variant')->get()->groupBy('variant_id');
        $categories = Category::get();
        return view('admins.products.add-product', compact('variants', 'categories'));
    }

    public function store(ProductRequest $request) {}

    public function show(Product $product)
    {

        if (request('showVariantproduct') == true) {
            $product = Product::findOrFail($product->id);

            $variantGroups = $product->variantGroups()->orderByDesc('id')->paginate(8);

            return view('admins.products.list-product-variant', compact('product', 'variantGroups'));
        } else {
            $product = Product::with('categories', 'galleries')->orderByDesc('id')->findOrFail($product->id);

            $variantGroups = VariantGroup::where('sku', request('sku'))->first();

            $variant = [];
            $parentName = '';

            if ($product->status == 1) {

                $variant = $variantGroups->variants()->first();

                $parentName = $variant->parent->name;
            }


            return view('admins.products.detai-product', compact('product', 'variant', 'parentName'));
        }
    }

    public function update($id, ProductUpdateRequest $request) {}
    public function destroy($id) {}
}
