@extends('admins.layouts.master')

@section('title', 'Product | Sửa sản phẩm')

@section('start-page-title', "Sửa sản phẩm $product->name | ID: $product->id")

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data"
        id="form-add-product">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-lg-8">
                <!-- Các trường nhập liệu sản phẩm -->
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ old('name', $product->name) }}" placeholder="Nhập tên sản phẩm">
                    <div id="err_name" class="my-3 text-danger">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description_short">Mô tả ngắn</label>
                    <textarea name="description_short" id="product-ckeditor" class="form-control">{{ old('description_short', $product->description_short) }}</textarea>
                    @error('description_short')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="product-ckeditor2" class="form-control">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <button class="btn btn-primary" type="button" id="btn-submit">Sửa</button>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Ảnh sản phẩm -->
                <div class="mb-3">
                    <label for="inputFileAvatar">Ảnh sản phẩm</label>
                    <input type="file" class="form-control img" name="img" id="inputFileAvatar"
                        onchange="previewImage2(event, 'imagePreviewAvatar')">
                    <div class="form-group mt-2">
                        <img id="imagePreviewAvatar" src="#" alt="Preview ảnh đại diện"
                            style="max-width: 150px; display: none;">
                    </div>
                </div>

                @if ($product->img)
                    <div class="mt-2">
                        <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt="Preview ảnh đại diện" id="img"
                            style="max-width: 150px;">
                    </div>
                @endif

                <div id="err_img" class="my-3 text-danger">
                </div>

                <!-- Slide sản phẩm -->
                <div class="mb-3">
                    <label for="inputFileAvatar">Thư viện ảnh</label>
                    <input type="file" class="form-control gallery" id="inputFileGallery" name="galleries[]"
                        onchange="previewMultipleImages2(event)" multiple>
                    <div class="form-group mt-2" id="imagePreviewSlideContainer">
                        <!-- Container sẽ chứa các ảnh preview -->
                    </div>
                </div>

                @if ($product->galleries)
                    <div class="mt-2" id="existingGallery">
                        @foreach ($product->galleries as $gallery)
                            <img src="{{ env('VIEW_IMG') }}/{{ $gallery->path }}" alt="Preview ảnh đại diện"
                                style="max-width: 150px; margin: 5px;">
                        @endforeach
                    </div>
                @endif


                <div id="err_galleries" class="my-3 text-danger">
                </div>

                <!-- Danh mục -->
                <div class="mb-3">
                    <select name="categories[]" id="category" multiple="multiple">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', $product->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>


                    <div id="err_category" class="my-3 text-danger">
                    </div>
                </div>

                <!-- Danh mục con (ẩn mặc định) -->
                <div id="childCategoryContainer" class="mb-3">
                    <label for="childCategory">Danh mục con</label>
                    <select name="categories[]" id="childCategory" multiple="multiple">
                    </select>
                </div>

                <div id="err_childCategory" class="my-3 text-danger">
                </div>

                <!-- Lựa chọn sản phẩm có biến thể hay không -->
                <div class="mb-3">
                    <label for="product_type">Loại sản phẩm</label>
                    <select name="product_type" id="product_type" class="form-control">
                        <option value="no_variant"
                            {{ old('product_type') == 'no_variant' || $product->status == 0 ? 'selected' : '' }}>Không có
                            biến thể</option>
                        <option value="has_variant"
                            {{ old('product_type') == 'has_variant' || $product->status == 1 ? 'selected' : '' }}>Có biến
                            thể</option>
                    </select>
                </div>

                <div class="row price_no_variant">
                    <div class="col-lg-6 mb-3">
                        <label for="price_regular" class="form-label">Giá gốc - VNĐ</label>
                        <input type="number" class="form-control" name="price_regular" id="price_regular"
                            value="{{ old('price_regular', $product->price_regular) }}" placeholder="nhập giá gốc">
                        <div id="err_price_regular" class="my-3 text-danger">
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="price_sale" class="form-label">Giá bán - VNĐ <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price_sale" id="price_sale"
                            value="{{ old('price_sale', $product->price_sale) }}" placeholder="nhập giá bán">

                        <div id="err_price_sale" class="mt-2 text-danger">
                        </div>
                    </div>
                </div>

                <!-- Các trường nhập liệu sản phẩm -->
                <div class="mb-3 quantity_no_variant">
                    <label for="quantity" class="form-label">Số lượng <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="quantity" id="quantity"
                        value="{{ old('quantity', $product->quantity) }}" placeholder="nhập số lượng">

                    <div id="err_quantity" class="my-3 text-danger">
                    </div>
                </div>

                <!-- Biến thể -->
                <div class="mb-3" id="selectVariant">
                    <label for="variant">Biến thể</label>
                    <select name="variants[]" id="variant" multiple="multiple">
                        @foreach ($variants as $variant)
                            <option value="{{ $variant->id }}"
                                {{ in_array($variant->id, old('variants', $parentIds)) ? 'selected' : '' }}>
                                {{ $variant->name }}
                            </option>
                        @endforeach
                    </select>

                    <div id="err_variant" class="my-3 text-danger">
                    </div>
                </div>

                <!-- Giá trị biến thể (ẩn mặc định) -->
                <div id="childVariantContainer" class="mb-3">
                    <label for="childVariants">Giá trị biến thể</label>
                    <select name="variants_child[]" id="childVariant" multiple="multiple">
                    </select>
                </div>

                <!-- Bảng hiển thị giá trị của giá trị biến thể -->
                <div id="selectedVariantValuesContainer" class="mb-3">
                    <label for="variantValuesTable">Giá trị đã chọn</label>
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Giá trị biến thể</th>
                                <th>Thiết lập</th>
                            </tr>
                        </thead>
                        <tbody id="variantValuesTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    @include('admins.products.script-edit')
    @include('admins.products.validate')

    <script>
        // Hàm để xem trước ảnh được chọn
        function previewImage2(event, previewId) {
            // Ẩn ảnh cũ lấy từ cơ sở dữ liệu nếu có
            const oldImage = document.getElementById('img');
            if (oldImage) {
                oldImage.style.display = 'none';
            }

            // Hiển thị ảnh mới
            const preview = document.getElementById(previewId);
            if (event.target.files && event.target.files[0]) {
                preview.src = URL.createObjectURL(event.target.files[0]);
                preview.style.display = 'block';

                // Giải phóng bộ nhớ sau khi ảnh đã được tải
                preview.onload = function() {
                    URL.revokeObjectURL(preview.src);
                }
            } else {
                // Ẩn phần preview nếu không có ảnh được chọn
                preview.style.display = 'none';
                preview.src = ''; // Đảm bảo đường dẫn ảnh không còn được giữ
            }
        }

        // Hàm để xem trước nhiều ảnh được chọn cho thư viện
        function previewMultipleImages2(event) {
            const previewContainer = document.getElementById('imagePreviewSlideContainer');
            previewContainer.innerHTML = ''; // Xóa các ảnh cũ nếu có

            // Ẩn thư viện ảnh cũ nếu có ảnh mới được chọn
            const existingGallery = document.getElementById('existingGallery');
            if (existingGallery) {
                existingGallery.style.display = 'none';
            }

            if (event.target.files) {
                Array.from(event.target.files).forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '150px';
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);

                    // Giải phóng bộ nhớ sau khi ảnh đã được tải
                    img.onload = function() {
                        URL.revokeObjectURL(img.src);
                    };
                });
            }
        }
    </script>
@endsection
