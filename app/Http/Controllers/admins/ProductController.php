<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ProductRequest;
use App\Http\Requests\admins\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantDetail;
use App\Models\VariantGroup;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);

        $status = request()->input('statusProduct');

        if (request()->has('statusProduct')) {
            switch ($status) {
                case 'allPro':
                    $products = Product::paginate(8);
                    break;
                case '0':
                    $products = Product::where('status', 0)->paginate(8);
                    break;
                case '1':
                    $products = Product::where('status', 1)->paginate(8);
                    break;
                default:
                    echo "Không tìm thấy trạng thái sản phẩm";
                    break;
            }
        }

        $variantGroups = [];

        if (request()->has('showProVariant')) {
            $product = Product::find(request()->input('showProVariant'));

            $variantGroups = $product->load('variantGroups');
        }

        return view('admins.products.list-product', compact('products', 'variantGroups'));
    }

    public function create()
    {

        return view('admins.products.add-product');
    }

    public function store(ProductRequest $request) {}

    public function show(Product $product)
    {

        $product = Product::findOrFail($product->id);

        $product->load('categories', 'galleries');

        return view('admins.products.detai-product', compact('product'));
    }

    public function update($id, ProductUpdateRequest $request) {}
    public function destroy($id) {}
}
