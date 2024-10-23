<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ProductRequest;
use App\Http\Requests\admins\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantDetail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('variantDetails', 'categories')->paginate(5);
        // dd($products);
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
            if ($request->has('category_id')) {
                $product->categories()->attach($request->input('category_id'));
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

    public function update($id, ProductUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('img')) {
                if ($product->img) {
                    Storage::disk('public')->delete($product->img);
                }
                $avatar = $request->file('img');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatarPath = $avatar->storeAs('products/avatars', $avatarName, 'public');
                $data['img'] = $avatarPath;
            }
            $product->update($data);
            if ($request->hasFile('slides')) {
                $oldSlides = $product->galleries()->get();
                foreach ($oldSlides as $oldSlide) {
                    Storage::disk('public')->delete($oldSlide->path);
                }
                $product->galleries()->delete();
                foreach ($request->file('slides') as $slide) {
                    $slideName = time() . '_' . $slide->getClientOriginalName();
                    $slidePath = $slide->storeAs('products/slides', $slideName, 'public');
                    $product->galleries()->create(['path' => $slidePath]);
                }
            }
            if ($request->has('variants')) {
                $product->variantDetails()->sync($request->input('variants'));
            }
            if ($request->has('category_id')) {
                $product->categories()->sync($request->input('category_id'));
            }
            DB::commit();
            return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm. Vui lòng thử lại.');
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            if ($product->img && Storage::disk('public')->exists($product->img)) {
                Storage::disk('public')->delete($product->img);
            }
            $oldSlides = $product->galleries()->get();
            foreach ($oldSlides as $oldSlide) {
                if ($oldSlide->path && Storage::disk('public')->exists($oldSlide->path)) {
                    Storage::disk('public')->delete($oldSlide->path);
                }
            }
            $product->galleries()->delete();
            $product->variantDetails()->detach();
            $product->delete();
            DB::commit();
            return redirect()->route('admin.products.products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm. Vui lòng thử lại.');
        }
    }
}
