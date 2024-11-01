<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ProductRequest;
use App\Http\Requests\admins\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantGroup;
use Illuminate\Support\Str;
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
        $categories = Category::with('children')->whereNull('parent_id')->orderByDesc('id')->get();;
        $variants = Variant::with('children')->whereNull('parent_id')->orderByDesc('id')->get();


        return view('admins.products.add-product', compact('categories', 'variants'));
    }

    public function store(ProductRequest $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->all();
            $slug = Str::slug($request->name);

            // Tạo SKU
            $currentYear = date('y'); // Lấy năm hiện tại (2 ký tự)
            $randomNumber = mt_rand(1000, 9999); // Tạo chuỗi ngẫu nhiên 6 số
            $sku = "SP{$currentYear}{$randomNumber}"; // Kết hợp lại thành SKU

            $data['slug'] = $slug;
            $data['sku'] = $sku;

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $imgName = "products/" . time() . '_' . $img->getClientOriginalName();
                $img->storeAs('imgs', $imgName);
                $data['img'] = $imgName;
            }

            $product = Product::create($data);

            if ($request->hasFile('galleries')) {
                $galleries = $request->file('galleries');

                foreach ($galleries as $gallery) {
                    // Tạo tên mới cho ảnh
                    $galleryName = "products/" . time() . '_' . $gallery->getClientOriginalName();
                    // Di chuyển ảnh vào thư mục
                    $gallery->storeAs('imgs', $galleryName);

                    // Tạo dữ liệu để lưu vào bảng galleries
                    $data = [
                        'product_id' => $product->id,
                        'path' => $galleryName,
                    ];

                    // Lưu từng ảnh vào bảng galleries
                    $product->galleries()->create($data);
                }
            }

            $product->categories()->attach($request->categories);
        });
        return back()->with('success', 'Thêm sản phẩm thành công');
    }

    public function show(Product $product)
    {

        if (request('showVariantproduct') == true) {
            $product = Product::findOrFail($product->id);

            $variantGroups = $product->variantGroups()->orderByDesc('id')->paginate(8);

            return view('admins.products.list-product-variant', compact('product', 'variantGroups'));
        } else {
            $product = Product::with('categories', 'galleries')->orderByDesc('id')->findOrFail($product->id);
            $variantGroup = VariantGroup::with('variants.parent')->where('sku', request('sku'))->first();

            $variant = null;
            $parentName = ''; // Mặc định nếu không có giá trị
            if ($product->status == 1 && $variantGroup) {
                // Lấy biến thể duy nhất của SKU sản phẩm
                $variant = $variantGroup->variants->first(); // Chỉ lấy một giá trị đầu tiên

                if ($variant && $variant->parent) {
                    $parentName = $variant->parent->name ?? 'Không có giá trị';
                }
            }

            return view('admins.products.detai-product', compact('product', 'variant', 'parentName'));
        }
    }

    public function update($id, ProductUpdateRequest $request) {}
    public function destroy($id) {}
}
