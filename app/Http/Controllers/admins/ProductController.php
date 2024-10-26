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
        $variants = VariantGroup::with('variant')->get()->groupBy('variant_id');
        $categories = Category::get();
        return view('admins.products.add-product', compact('variants', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('img')) {
                $avatar = $request->file('img');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatarPath = $avatar->storeAs('products/avatars', $avatarName, 'public');
                $data['img'] = $avatarPath;
            }
            $product = Product::create($data);
            if ($request->hasFile('slides')) {
                foreach ($request->file('slides') as $slide) {
                    $slideName = time() . '_' . $slide->getClientOriginalName();
                    $slidePath = $slide->storeAs('products/slides', $slideName, 'public');
                    $product->galleries()->create(['path' => $slidePath]);
                }
            }
            if ($request->has('variants')) {
                $product->variantDetails()->attach($request->input('variants'));
            }
            if ($request->has('category_ids')) {
                $product->categories()->attach($request->input('category_ids'));
            }
            DB::commit();
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm mới thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm. Vui lòng thử lại.');
        }
    }

    public function show($id)
    {
        $product = Product::with('variantDetails', 'categories', 'galleries')->findOrFail($id);
        $variants = VariantDetail::with('variant')->get()->groupBy('variant_id');
        $categories = Category::get();
        return view('admins.products.edit-product', compact('product', 'variants', 'categories'));
        // dd($product->categories);
    }

    public function update($id, ProductUpdateRequest $request) {}
    public function destroy($id) {}
}
