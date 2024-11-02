<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ProductRequest;
use App\Http\Requests\admins\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Gallery;
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
            // Xử lý sản phẩm không có biến thể
            $data = $request->all();
            $data['slug'] = Str::slug($data['name']);
            $data['sku'] = "SP" . mt_rand('100000', '999999');
            // dd($request->variants);
            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension(); // Thay đổi này để sử dụng getClientOriginalExtension()
                $data['img'] = $img->storeAs('products', $filename);
            }

            if ($request->product_type == "has_variant") {
                $dataPro = [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'status' => 1,
                ];
                if ($request->hasFile('img')) {
                    $dataPro['img'] = $data['img'];
                }
                $product = Product::create($dataPro);

                if ($request->variants && is_array($request->variants)) {
                    foreach ($request->variants_child as $key => $variant) {
                        // Kiểm tra nếu biến thể con thiếu dữ liệu cần thiết
                        if (empty($variant['id']) || empty($variant['price_regular']) || empty($variant['price_sale'])) {
                            continue; // Bỏ qua biến thể con này
                        }

                        // Khởi tạo lại $dataVariantGroups trong mỗi lần lặp
                        $dataVariantGroups = [
                            'product_id' => $product->id,
                            'sku' => "SPBT" . mt_rand('100000', '999999'),
                            'price_regular' => $variant['price_regular'],
                            'price_sale' => $variant['price_sale'],
                            'quantity' => $variant['quantity'] ?? 0,
                        ];

                        // Xử lý ảnh cho biến thể nếu có
                        if ($request->hasFile("variants_child.{$key}.img")) {
                            $img = $request->file("variants_child.{$key}.img");
                            $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                            $dataVariantGroups['img'] = $img->storeAs('products', $filename);
                        }

                        // Tạo VariantGroup
                        $variantGroup = VariantGroup::create($dataVariantGroups);

                        // Gắn kết với biến thể
                        $variantGroup->variants()->attach($variant['id']);
                    }
                }
            } else {
                $product = Product::create($data);
            }

            if ($request->hasFile('galleries')) {
                foreach ($request->file('galleries') as $gallery) { // Đảm bảo sử dụng file 'galleries'
                    if ($gallery) { // Kiểm tra xem $gallery có khác null không
                        $filename = time() . '_' . uniqid() . '.' . $gallery->getClientOriginalExtension(); // Thay đổi này để sử dụng getClientOriginalExtension()
                        $galleryPath = $gallery->storeAs('products', $filename);

                        $dataGallery = [
                            'product_id' => $product->id,
                            'path' => $galleryPath, // Sử dụng đường dẫn của ảnh đã lưu
                        ];
                        // Lưu vào bảng galleries
                        $product->galleries()->create($dataGallery);
                    }
                }
            }

            if ($request->categories) {
                $product->categories()->attach($request->categories);
            }
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
