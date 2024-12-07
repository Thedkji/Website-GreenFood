<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\ProductRequest;
use App\Http\Requests\admins\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Supplier;
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
        // Xử lý xóa nhiều sản phẩm
        if (request('ids')) {
            // Lấy danh sách sản phẩm với các mối quan hệ cần thiết
            $products = Product::whereIn('id', request('ids'))->get();

            DB::transaction(function () use ($products) {
                foreach ($products as $product) {
                    if ($product->status == 1) {
                        $variantGroups = VariantGroup::where('product_id', $product->id)->get();

                        foreach ($variantGroups as $variantGroup) {
                            $variantGroup->variants()->sync([]);
                        }

                        $product->variantGroups()->delete();
                    }

                    if ($product->categories) {
                        $product->categories()->sync([]);
                    }

                    $product->carts()->delete();
                    $product->delete();

                    $product->galleries()->delete();
                }
            });

            return response([
                'message' => 'Xóa sản phẩm thành công',
            ]);
        }

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

        //Tìm kiếm sản phẩm
        if (request()->input('search')) {
            $products = Product::where('name', 'like', '%' . request()->input('search') . '%')->paginate(8);
        }

        return view('admins.products.list-product', compact('products'));
    }

    public function create(Request $request)
    {
        $categories = Category::with('children')->whereNull('parent_id')->orderByDesc('id')->get();;
        $variants = Variant::with('children')->whereNull('parent_id')->orderByDesc('id')->get();
        $suppliers = Supplier::orderByDesc('id')->get();


        if ($request->category_id) {
            $categories = Category::whereIn('parent_id', $request->category_id)->get();
            return response()->json([
                'categories' => $categories,
            ]);
        }

        if ($request->variant_id) {
            $variants = Variant::whereIn('parent_id', $request->variant_id)->get();
            return response()->json([
                'variants' => $variants,
            ]);
        }

        return view('admins.products.add-product', compact('categories', 'variants', 'suppliers'));
    }

    public function store(Request $request)
    {
        try {
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
                        'description_short' => $request->description_short,
                        'description' => $request->description,
                        'status' => 1,
                    ];
                    if ($request->hasFile('img')) {
                        $dataPro['img'] = $data['img'];
                    }
                    $product = Product::create($dataPro);

                    // Debug data
                    Log::info('Request data:', [
                        'variants' => $request->variants,
                        'variants_child' => $request->variants_child
                    ]);

                    // Xử lý variants_child
                    if ($request->has('variants_child') && is_array($request->variants_child)) {
                        foreach ($request->variant_child_values as $key => $value) {
                            // Bỏ qua nếu thiếu dữ liệu cần thiết
                            if (empty($value['price_sale']) || !isset($value['quantity'])) {
                                continue;
                            }

                            // Khởi tạo mảng dữ liệu cho mỗi `variant_child`
                            $dataVariantGroups = [
                                'product_id' => $product->id,
                                'sku' => "SPBT" . mt_rand('100000', '999999'),
                                'price_regular' => $value['price_regular'] ?? 0,
                                'price_sale' => $value['price_sale'],
                                'quantity' => $value['quantity'],
                            ];

                            // Xử lý ảnh riêng biệt cho từng `variant_child`
                            if ($request->hasFile("variant_child_values.{$key}.img")) {
                                $img = $request->file("variant_child_values.{$key}.img");
                                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                                $dataVariantGroups['img'] = $img->storeAs('product_variants', $filename);
                            } else {
                                $dataVariantGroups['img'] = null; // Không có ảnh thì đặt là null
                            }

                            // Tạo bản ghi variant group cho từng `variant_child`
                            $variantGroup = VariantGroup::create($dataVariantGroups);

                            $variantGroup->variants()->attach($key);
                        }
                        // dd($request->variants_child);
                    }
                } else {
                    $product = Product::create($data);
                }

                if ($request->hasFile('galleries')) {
                    foreach ($request->file('galleries') as $gallery) { // Đảm bảo sử dụng file 'galleries'
                        if ($gallery) { // Kiểm tra xem $gallery có khác null không
                            $filename = time() . '_' . uniqid() . '.' . $gallery->getClientOriginalExtension(); // Thay đổi này để sử dụng getClientOriginalExtension()
                            $galleryPath = $gallery->storeAs('galleries', $filename);

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
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm: ' . $e->getMessage());
        }
    }


    public function edit(Product $product, Request $request)
    {

        $categories = Category::with('children')->whereNull('parent_id')->orderByDesc('id')->get();;
        $variants = Variant::with('children')->whereNull('parent_id')->orderByDesc('id')->get();
        $allCategories = Category::whereNotNull('parent_id')->get();
        $productVariant = Product::with(['variantGroups.variants'])->find($product->id);
        $allVariants = Variant::all();
        $suppliers = Supplier::orderByDesc('id')->get();

        $variantGroups = $product->variantGroups()->with('variants')->orderByDesc('id')->get();

        $parentIds = $variantGroups->flatMap(function ($variantGroup) {
            return $variantGroup->variants->pluck('parent_id'); // Lấy tất cả parent_id của variants trong variantGroup
        })->unique()->toArray();

        if ($request->category_id) {
            $categories = Category::whereIn('parent_id', $request->category_id)->get();
            return response()->json([
                'categories' => $categories,
            ]);
        }

        if ($request->variant_id) {
            $variants = Variant::whereIn('parent_id', $request->variant_id)->get();
            return response()->json([
                'variants' => $variants,
            ]);
        }

        return view('admins.products.edit-product', compact(
            'variantGroups',
            'categories',
            'variants',
            'productVariant',
            'allCategories',
            'allVariants',
            'product',
            'parentIds',
            'suppliers'
        ));
    }

    public function update(Product $product, Request $request)
    {

        DB::transaction(function () use ($request, $product) {
            // Xử lý sản phẩm không có biến thể
            $data = $request->all();
            $data['slug'] = Str::slug($data['name']);

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                $data['img'] = $img->storeAs('products', $filename);
            }

            // Xử lý ảnh của sản phẩm
            if ($request->hasFile('galleries')) {
                $product->galleries()->delete(); // Xóa ảnh cũ
                foreach ($request->file('galleries') as $gallery) {
                    if ($gallery) {
                        $filename = time() . '_' . uniqid() . '.' . $gallery->getClientOriginalExtension();
                        $galleryPath = $gallery->storeAs('galleries', $filename);

                        $dataGallery = [
                            'product_id' => $product->id,
                            'path' => $galleryPath,
                        ];

                        $product->galleries()->create($dataGallery);
                    }
                }
            }

            if ($request->categories) {
                $product->categories()->sync($request->categories);
            }
            // dd($request->all());


            if ($request->product_type == 'no_variant') {
                $data['status'] = 0;
                if (!$product->sku) {
                    $data['sku'] = "SP" . mt_rand('100000', '999999');
                }
                $product->update($data);

                foreach ($product->variantGroups as $variantGroup) {
                    $variantGroup->variants()->sync([]);
                };

                $product->variantGroups()->delete();
            } else {
                $data['status'] = 1;
                $data['sku'] = null;
                $data['price_sale'] = null;
                $data['price_regular'] = null;
                $data['quantity'] = null;

                $product->update($data);

                if ($request->variants && $request->variants_child && $request->variant_child_values) {
                    foreach ($request->variant_child_values as $variantId => $variantGroupData) {
                        // Tìm `VariantGroup` liên kết với `Variant` thông qua bảng pivot
                        $existingVariantGroup = VariantGroup::where('product_id', $product->id)
                            ->whereHas('variants', function ($query) use ($variantId) {
                                $query->where('variants.id', $variantId);
                            })
                            ->first();

                        // Chuẩn bị dữ liệu để cập nhật hoặc tạo mới
                        $dataVariantGroups = [
                            'price_regular' => $variantGroupData['price_regular'] ?? 0,
                            'price_sale'    => $variantGroupData['price_sale'] ?? 0,
                            'quantity'      => $variantGroupData['quantity'] ?? 0,
                        ];

                        // Xử lý ảnh nếu có
                        if (isset($variantGroupData['img']) && $variantGroupData['img']) {
                            $img = $variantGroupData['img'];
                            $name = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                            $dataVariantGroups['img'] = $img->storeAs('product_variants', $name);
                        }

                        if ($existingVariantGroup) {
                            // Cập nhật `VariantGroup` hiện có
                            $existingVariantGroup->update($dataVariantGroups);
                        } else {
                            // Tạo mới `VariantGroup`
                            $dataVariantGroups['sku'] = "SPBT" . mt_rand(100000, 999999);
                            $dataVariantGroups['product_id'] = $product->id;

                            $newVariantGroup = VariantGroup::create($dataVariantGroups);
                            // Gắn quan hệ với `Variant` thông qua bảng pivot
                            $newVariantGroup->variants()->attach($variantId);
                        }
                    }

                    // Xóa `VariantGroup` không còn trong yêu cầu
                    $variantIds = array_keys($request->variant_child_values);
                    $product->variantGroups()
                        ->whereDoesntHave('variants', function ($query) use ($variantIds) {
                            $query->whereIn('variants.id', $variantIds);
                        })
                        ->each(function ($variantGroup) {
                            // Xóa quan hệ với `Variant`
                            $variantGroup->variants()->detach();
                            // Xóa `VariantGroup`
                            $variantGroup->delete();
                        });
                }
            }
        });

        return back()->with('success', 'Sửa sản phẩm thành công');
    }

    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {

            if ($product->status == 1) {
                $variantGroups = VariantGroup::where('product_id', $product->id)->get();
                // dd($variantGroups);

                // foreach ($variantGroups as $variantGroup) {
                //     $variantGroup->variants()->sync([]);

                //     // if ($variantGroup->img) {
                //     //     Storage::delete($variantGroup->img);
                //     // }
                // }

                $product->variantGroups()->delete();
            }

            // if ($product->categories) {
            //     $product->categories()->sync([]);
            // }
            $product->carts()->delete();
            $product->delete();


            // if ($product->img) {
            //     Storage::delete($product->img);
            // }


            // if ($product->galleries) {
            //     foreach ($product->galleries as $gallery) {
            //         Storage::delete($gallery->path);
            //     }
            // }
            $product->galleries()->delete();
        });

        return back()->with('success', 'Xóa sản phẩm thành công');
    }
}
