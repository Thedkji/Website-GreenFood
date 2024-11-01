@extends('admins.layouts.master')

@section('title', 'Product | Thêm mới sản phẩm')

@section('start-page-title', 'Thêm mới sản phẩm')

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

    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-8">
                <!-- Các trường nhập liệu sản phẩm -->
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 mb-3">
                        <label for="price_regular" class="form-label">Giá gốc - VNĐ</label>
                        <input type="number" class="form-control" name="price_regular" id="price_regular"
                            value="{{ old('price_regular', 0) }}">
                        @error('price_regular')
                            <div class="text-danger my-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="price_sale" class="form-label">Giá bán - VNĐ</label>
                        <input type="number" class="form-control" name="price_sale" id="price_sale"
                            value="{{ old('price_sale', 0) }}">
                        @error('price_sale')
                            <div class="text-danger my-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description_short">Mô tả ngắn</label>
                    <textarea name="description_short" id="product-ckeditor" class="form-control">{{ old('description_short') }}</textarea>
                    @error('description_short')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="product-ckeditor2" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Ảnh sản phẩm -->
                <div class="mb-3">
                    <label for="inputFileAvatar">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="img" id="inputFileAvatar"
                        onchange="previewImage(event, 'imagePreviewAvatar')">
                    <div class="form-group mt-2">
                        <img id="imagePreviewAvatar" src="#" alt="Preview ảnh đại diện"
                            style="max-width: 150px; display: none;">
                    </div>
                </div>

                @error('img')
                    <div class="text-danger my-3">{{ $message }}</div>
                @enderror

                <!-- Slide sản phẩm -->
                <div class="mb-3">
                    <label for="inputFileAvatar">Thư viện ảnh</label>
                    <input type="file" class="form-control" id="inputFileAvatar" name="galleries[]"
                        onchange="previewMultipleImages(event)" multiple>
                    <div class="form-group mt-2" id="imagePreviewSlideContainer">
                        <!-- Container sẽ chứa các ảnh preview -->
                    </div>
                </div>

                @error('galleries.*')
                    <div class="text-danger my-3">{{ $message }}</div>
                @enderror

                <!-- Danh mục -->
                <div class="mb-3">
                    <label for="category">Danh mục</label>
                    <select name="categories[]" id="category" multiple="multiple">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-children="{{ json_encode($category->children) }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Danh mục con (ẩn mặc định) -->
                <div id="childCategoryContainer" class="mb-3" style="display: none;">
                    <label for="childCategory">Danh mục con</label>
                    <select name="categories[]" id="childCategory" multiple="multiple">
                    </select>
                </div>

                <!-- Lựa chọn sản phẩm có biến thể hay không -->
                <div class="mb-3">
                    <label for="product_type">Loại sản phẩm</label>
                    <select name="product_type" id="product_type" class="form-control">
                        <option value="no_variant" {{ old('product_type') == 'no_variant' ? 'selected' : '' }}>Không có
                            biến thể</option>
                        <option value="has_variant" {{ old('product_type') == 'has_variant' ? 'selected' : '' }}>Có biến
                            thể</option>
                    </select>
                </div>

                <!-- Biến thể -->
                <div class="mb-3 selectVariant d-none">
                    <label for="variant">Biến thể</label>
                    <select name="variants[]" id="variant" multiple="multiple">
                        @foreach ($variants as $variant)
                            <option value="{{ $variant->id }}" data-children="{{ json_encode($variant->children) }}">
                                {{ $variant->name }}</option>
                        @endforeach
                    </select>
                    @error('variants')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Biến thể con (ẩn mặc định) -->
                <div id="childVariantContainer" class="mb-3" style="display: none;">
                    <label for="childVariants">Biến thể con</label>
                    <select name="variants[]" id="childVariant" multiple="multiple">
                    </select>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#category, #childCategory, #variant, #childVariant').select2({
                placeholder: "Chọn",
                allowClear: true
            });

            $('#product_type').on('change', function() {
                if ($(this).val() === 'has_variant') {
                    $('.selectVariant').removeClass('d-none'); // Hiện ô chọn biến thể
                } else {
                    $('.selectVariant').addClass('d-none'); // Ẩn ô chọn biến thể
                    $('#variant').val(null).trigger('change'); // Reset lựa chọn biến thể
                    $('#childVariantContainer').hide(); // Ẩn biến thể con
                }
            });

            $('#category').on('change', function() {
                updateChildSelect($(this), $('#childCategory'));
                $('#childCategoryContainer').toggle($(this).val().length >
                0); // Hiện danh mục con nếu có lựa chọn
            });

            $('#variant').on('change', function() {
                updateChildSelect($(this), $('#childVariant'));
                $('#childVariantContainer').toggle($(this).val().length >
                0); // Hiện biến thể con nếu có lựa chọn
            });

            // Xử lý sự kiện khi xóa lựa chọn
            $('#category, #variant').on('select2:unselect', function(e) {
                const childSelect = $(this).is('#category') ? $('#childCategory') : $('#childVariant');

                // Thiết lập lại giá trị của childSelect và xóa tất cả tùy chọn
                childSelect.val(null).trigger('change');
                if ($(this).is('#category')) {
                    $('#childCategoryContainer').hide(); // Ẩn danh mục con
                } else {
                    $('#childVariantContainer').hide(); // Ẩn biến thể con
                }
            });

            function updateChildSelect(parentSelect, childSelect) {
                const selectedOptions = parentSelect.val();

                // Xóa tất cả các tùy chọn trước khi thêm mới
                childSelect.empty(); // Xóa tất cả tùy chọn trong select con

                if (selectedOptions) {
                    selectedOptions.forEach(id => {
                        const option = parentSelect.find(`option[value="${id}"]`);
                        const children = JSON.parse(option.attr('data-children'));

                        if (children && children.length > 0) {
                            children.forEach(child => {
                                const childOption = new Option(child.name, child.id, false, false);
                                childSelect.append(childOption); // Thêm biến thể con vào select
                            });
                        }
                    });
                }
                childSelect.trigger('change'); // Cập nhật select con
            }

            function previewImage(event, previewElementId) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById(previewElementId);
                    output.src = reader.result;
                    output.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            }

            function previewMultipleImages(event) {
                const container = document.getElementById('imagePreviewSlideContainer');
                container.innerHTML = ''; // Xóa tất cả preview cũ

                Array.from(event.target.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '100px'; // Đặt kích thước tối đa cho ảnh
                        img.style.margin = '5px';
                        container.appendChild(img); // Thêm ảnh vào container
                    }
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
@endsection
