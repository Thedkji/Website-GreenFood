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
                    <select name="variants[][id]" id="variant" multiple="multiple">
                        @foreach ($variants as $variant)
                            <option value="{{ $variant->id }}" data-children="{{ json_encode($variant->children) }}">
                                {{ $variant->name }}</option>
                        @endforeach
                    </select>
                    @error('variants')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Giá trị biến thể (ẩn mặc định) -->
                <div id="childVariantContainer" class="mb-3" style="display: none;">
                    <label for="childVariants">Giá trị biến thể</label>
                    <select name="variants_child[][id]" id="childVariant" multiple="multiple">
                    </select>
                </div>

                <!-- Bảng hiển thị giá trị của giá trị biến thể -->
                <div id="selectedVariantValuesContainer" class="mb-3" style="display: none;">
                    <label for="variantValuesTable">Giá trị đã chọn</label>
                    <table class="table">
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

    <script>
        $(document).ready(function() {
            $('#category, #childCategory, #variant, #childVariant').select2({
                placeholder: "Chọn",
                allowClear: true
            });
            $('#variant').select2({
                placeholder: "Chọn",
                allowClear: true
            });

            $('#product_type').on('change', function() {
                if ($(this).val() === 'has_variant') {
                    $('.selectVariant').removeClass('d-none'); // Hiện ô chọn biến thể
                    $('#variant').select2({
                        placeholder: "Chọn",
                        allowClear: true
                    });
                } else {
                    $('.selectVariant').addClass('d-none'); // Ẩn ô chọn biến thể
                    $('#variant').val(null).trigger('change'); // Reset lựa chọn biến thể
                    $('#childVariantContainer').hide(); // Ẩn giá trị biến thể
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
                    0); // Hiện giá trị biến thể nếu có lựa chọn
            });

            $('#category, #variant').on('select2:unselect', function(e) {
                const childSelect = $(this).is('#category') ? $('#childCategory') : $('#childVariant');
                childSelect.val(null).trigger('change');
                if ($(this).is('#category')) {
                    $('#childCategoryContainer').hide(); // Ẩn danh mục con
                } else {
                    $('#childVariantContainer').hide(); // Ẩn giá trị biến thể
                }
            });

            function updateChildSelect(parentSelect, childSelect) {
                const selectedOptions = parentSelect.val();
                childSelect.empty(); // Xóa tất cả tùy chọn trong select con

                if (selectedOptions) {
                    selectedOptions.forEach(id => {
                        const option = parentSelect.find(`option[value="${id}"]`);
                        const children = JSON.parse(option.attr('data-children'));

                        if (children && children.length > 0) {
                            children.forEach(child => {
                                const childOption = new Option(child.name, child.id, false, false);
                                childSelect.append(childOption); // Thêm giá trị biến thể vào select
                            });
                        }
                    });
                }
                childSelect.trigger('change'); // Cập nhật select con
            }

            // Hàm preview ảnh
            function previewImage(event, previewElementId) {
                const input = event.target;
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById(previewElementId);
                    output.src = reader.result;
                    output.style.display = 'block';
                }
                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#childVariant').on('change', function() {
                $('#variantValuesTableBody').empty();

                if ($('#childVariant').val().length > 0) {
                    $('#selectedVariantValuesContainer').show();
                } else {
                    $('#selectedVariantValuesContainer').hide();
                }

                $('#childVariant option:selected').each(function(index) {
                    const valueId = $(this).val();
                    const valueName = $(this).text();

                    // Tạo hàng chính hiển thị tên và nút "Thiết lập"
                    const row = `
                <tr>
                    <td class="text-success"><b>${valueName}</b></td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="toggleVariantSettings(${index})">Thiết lập</button>
                    </td>
                </tr>
                <tr id="variantSettingsRow-${index}" style="display: none;">
                    <td colspan="2">
                        <div id="variantSettings-${index}" class="variant-settings-dropdown">
                            <div class="mb-3">
                                <label for="price-${index}" class="form-label">Giá gốc</label>
                                <input type="number" id="price-${index}" name="variants_child[${index}][price_regular]" class="form-control" placeholder="Nhập giá gốc" value="">
                            </div>
                            <div class="my-3">
                                <label for="salePrice-${index}" class="form-label">Giá bán</label>
                                <input type="number" id="salePrice-${index}" name="variants_child[${index}][price_sale]" class="form-control" placeholder="Nhập giá bán" value="">
                            </div>
                            <div class="my-3">
                                <label for="quantity-${index}" class="form-label">Số lượng</label>
                                <input type="number" id="quantity-${index}" name="variants_child[${index}][quantity]" class="form-control" placeholder="Nhập số lượng" value="">
                            </div>
                            <div class="mb-3">
                                <label for="image-${index}" class="form-label">Ảnh</label>
                                <input type="file" id="image-${index}" name="variants_child[${index}][img]" class="form-control" onchange="previewImage(event, 'preview-${index}')">
                                <img id="preview-${index}" src="#" alt="Preview ảnh" class="mt-2" style="max-width: 150px; display: none;">
                            </div>
                        </div>
                    </td>
                </tr>
                `;

                    $('#variantValuesTableBody').append(row);
                });

                // Hàm toggle hiển thị form thiết lập
                window.toggleVariantSettings = function(index) {
                    const settingsRow = $(`#variantSettingsRow-${index}`);
                    settingsRow.toggle();
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Khởi tạo đối tượng để lưu trữ dữ liệu biến thể
            let variantData = {};

            // Event delegation để lắng nghe sự kiện trên các input trong bảng biến thể
            $('#variantValuesTableBody').on('input change', 'input', function() {
                const variantId = $(this).closest('tr[data-variant-id]').data('variant-id');
                if (variantId) {
                    // Cập nhật dữ liệu cho biến thể cụ thể
                    variantData[variantId] = {
                        price_regular: $(`#price-${variantId}`).val(),
                        price_sale: $(`#salePrice-${variantId}`).val(),
                        quantity: $(`#quantity-${variantId}`).val(),
                        // Lưu thêm các dữ liệu khác nếu cần
                    };
                }
            });

            // Sự kiện khi thay đổi giá trị biến thể
            $('#childVariant').on('change', function() {
                updateVariantTable();
            });

            // Hàm cập nhật bảng biến thể
            function updateVariantTable() {
                const selectedVariants = $('#childVariant').select2('data');
                const container = $('#variantValuesTableBody');

                // Xóa bảng
                container.empty();

                // Tạo lại bảng với dữ liệu đã lưu
                selectedVariants.forEach((variant) => {
                    const variantId = variant.id;
                    const variantName = variant.text;

                    // Lấy dữ liệu đã lưu nếu có
                    const existingData = variantData[variantId] || {};

                    const row = `
                    <tr data-variant-id="${variantId}">
                        <td class="text-success"><b>${variantName}</b></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="toggleVariantSettings('${variantId}')">Thiết lập</button>
                        </td>
                    </tr>
                    <tr id="variantSettingsRow-${variantId}" style="display: none;" data-variant-id="${variantId}">
                        <td colspan="2">
                            <div id="variantSettings-${variantId}" class="variant-settings-dropdown">
                                <input type="hidden" name="variants_child[${variantId}][id]" value="${variantId}">
                                <div class="mb-3">
                                    <label for="price-${variantId}" class="form-label">Giá gốc</label>
                                    <input type="number" id="price-${variantId}" name="variants_child[${variantId}][price_regular]" class="form-control" placeholder="Nhập giá gốc" value="${existingData.price_regular || ''}">
                                </div>
                                <div class="my-3">
                                    <label for="salePrice-${variantId}" class="form-label">Giá bán</label>
                                    <input type="number" id="salePrice-${variantId}" name="variants_child[${variantId}][price_sale]" class="form-control" placeholder="Nhập giá bán" value="${existingData.price_sale || ''}">
                                </div>
                                <div class="my-3">
                                    <label for="quantity-${variantId}" class="form-label">Số lượng</label>
                                    <input type="number" id="quantity-${variantId}" name="variants_child[${variantId}][quantity]" class="form-control" placeholder="Nhập số lượng" value="${existingData.quantity || ''}">
                                </div>
                                <div class="mb-3">
                                    <label for="image-${variantId}" class="form-label">Ảnh</label>
                                    <input type="file" id="image-${variantId}" name="variants_child[${variantId}][img]" class="form-control" onchange="previewImage(event, 'preview-${variantId}')">
                                    <img id="preview-${variantId}" src="#" alt="Preview ảnh" class="mt-2" style="max-width: 150px; display: none;">
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
                    container.append(row);
                });
            }

            // Hàm toggle hiển thị thiết lập biến thể
            window.toggleVariantSettings = function(variantId) {
                $(`#variantSettingsRow-${variantId}`).toggle();
            };

            // Khởi tạo bảng lần đầu nếu cần
            updateVariantTable();
        });
    </script>

@endsection
