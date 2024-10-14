<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::paginate(5);
        return view('admins.products.list-product', compact('products'));
    }

    public function create()
    {
        $variants = VariantDetail::with('variant')->get()->groupBy('variant_id');
        $categories = Category::get();
        return view('admins.products.add-product', compact('variants', 'categories'));
    }

    public function store(ProductRequest $request)
    {
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
                $product->galleries()->create([
                    'path' => $slidePath,
                ]);
            }
        }
        if ($request->has('variants')) {
            $product->variantDetails()->attach($request->input('variants'));
        }
        return redirect()->route('admin.products.products.index')->with('success', 'Sản phẩm đã được thêm mới thành công.');
    }

    public function show($id)
    {
        return view('admins.products.edit-product');
    }
}
