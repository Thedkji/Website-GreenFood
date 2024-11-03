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
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                        placeholder="Nhập tên sản phẩm">
                    @error('name')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
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

                <div class="row price_no_variant">
                    <div class="col-lg-6 mb-3">
                        <label for="price_regular" class="form-label">Giá gốc - VNĐ</label>
                        <input type="number" class="form-control" name="price_regular" id="price_regular"
                            value="{{ old('price_regular') }}">
                        @error('price_regular')
                            <div class="text-danger my-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="price_sale" class="form-label">Giá bán - VNĐ</label>
                        <input type="number" class="form-control" name="price_sale" id="price_sale"
                            value="{{ old('price_sale') }}">
                        @error('price_sale')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Các trường nhập liệu sản phẩm -->
                <div class="mb-3 quantity_no_variant">
                    <label for="name" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" name="quantity" id="name"
                        value="{{ old('quantity') }}">
                    @error('quantity')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Biến thể -->
                <div class="mb-3 selectVariant d-none">
                    <label for="variant">Biến thể</label>
                    <select name="variants[]" id="variant" multiple="multiple">
                        @foreach ($variants as $variant)
                            <option value="{{ $variant->id }}"
                                {{ in_array($variant->id, old('variants', [])) ? 'selected' : '' }}
                                data-children="{{ json_encode($variant->children) }}">
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
                    <p style="font-size: 12px">(Giá trị đầu tiên sẽ là giá trị mặc định của sản phẩm)</p>
                    <select name="variants_child[]" id="childVariant" multiple="multiple">
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
            $('#childVariant').select2({
                placeholder: "Chọn",
                allowClear: true
            });

            $('#product_type').on('change', function() {
                var isVariant = $(this).val() === 'has_variant';
                $('.selectVariant').toggleClass('d-none', !isVariant);
                $('.price_no_variant, .quantity_no_variant').toggleClass('d-none', isVariant);

                if (!isVariant) {
                    // Reset variant selections
                    $('#variant').val(null).trigger('change');
                    $('#childVariantContainer').hide();
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
                childSelect.empty(); // Clear existing options

                if (selectedOptions) {
                    const allChildren = [];

                    selectedOptions.forEach(id => {
                        const option = parentSelect.find(`option[value="${id}"]`);
                        const children = JSON.parse(option.attr('data-children') || '[]');
                        allChildren.push(...children);
                    });

                    allChildren.forEach(child => {
                        const childOption = new Option(child.name, child.id, false, false);
                        childSelect.append(childOption);
                    });
                }

                childSelect.trigger('change');
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

                // Thêm input hidden để lưu ID của variant được chọn
                const selectedVariants = $(this).val();
                selectedVariants.forEach(variantId => {
                    if ($(`input[name="variants_child[${variantId}][id]"]`).length === 0) {
                        $('#variantValuesTableBody').append(`
                            <input type="hidden" name="variants_child[${variantId}][id]" value="${variantId}">
                        `);
                    }
                });

                // Hàm toggle hiển thị form thiết lập
                window.toggleVariantSettings = function(index) {
                    const settingsRow = $(`#variantSettingsRow-${index}`);
                    settingsRow.toggle();
                }
            });

            // Initialize product type
            var oldProductType = '{{ old('product_type') }}';
            if (oldProductType) {
                $('#product_type').val(oldProductType).trigger('change');
            }

            // Initialize selected variants
            var oldVariants = @json(old('variants', []));
            if (oldVariants.length > 0) {
                $('#variant').val(oldVariants).trigger('change');
            }

            // Initialize selected variant children
            var oldVariantChildren = [];
            for (var key in oldVariantSettings) {
                oldVariantChildren.push(key);
            }

            if (oldVariantChildren.length > 0) {
                // Delay to ensure options are populated
                setTimeout(function() {
                    // Populate childVariant options based on selected variants
                    updateChildSelect($('#variant'), $('#childVariant'));

                    $('#childVariant').val(oldVariantChildren).trigger('change');

                    // Recreate the variant settings
                    updateVariantTable(); // Ensures the variant settings rows are created

                    // Set the old values for the settings
                    oldVariantChildren.forEach(function(variantId) {
                        var variantData = oldVariantSettings[variantId];

                        // Open the settings row
                        toggleVariantSettings(variantId);

                        // Set the values
                        $('#price-' + variantId).val(variantData['price_regular']);
                        $('#salePrice-' + variantId).val(variantData['price_sale']);
                        $('#quantity-' + variantId).val(variantData['quantity']);

                        // If image preview is needed
                        // Note: Browsers don't allow setting file input values for security reasons.
                        // You can handle image previews if you save the image paths temporarily.

                        // Close the settings row (if desired)
                        // toggleVariantSettings(variantId);
                    });
                }, 500);
            }

            // Existing code...
        });
    </script>

    <script>
        $(document).ready(function() {
            // Khởi tạo đối tượng để lưu trữ dữ liệu biến thể
            let variantData = {
                ...oldVariantSettings
            };

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

                // Clear the table
                container.empty();

                selectedVariants.forEach((variant) => {
                    const variantId = variant.id;
                    const variantName = variant.text;

                    // Get existing data if available
                    const existingData = variantData[variantId] || oldVariantSettings[variantId] || {};

                    // Check for validation errors for this variant
                    const variantErrorKey = `variants_child.${variantId}`;
                    const priceRegularErrors = validationErrors?.[`${variantErrorKey}.price_regular`] || [];
                    const priceSaleErrors = validationErrors?.[`${variantErrorKey}.price_sale`] || [];
                    const quantityErrors = validationErrors?.[`${variantErrorKey}.quantity`] || [];
                    const imageErrors = validationErrors?.[`${variantErrorKey}.img`] || [];

                    const hasErrors = priceRegularErrors.length > 0 || priceSaleErrors.length > 0 ||
                        quantityErrors.length > 0 || imageErrors.length > 0;

                    // Create the row
                    const row = `
                    <tr data-variant-id="${variantId}">
                        <td class="text-success"><b>${variantName}</b></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="toggleVariantSettings('${variantId}')">Thiết lập</button>
                        </td>
                    </tr>
                    <tr id="variantSettingsRow-${variantId}" style="display: ${hasErrors ? 'table-row' : 'none'};" data-variant-id="${variantId}">
                        <td colspan="2">
                            <div id="variantSettings-${variantId}" class="variant-settings-dropdown">
                                <div class="mb-3">
                                    <label for="price-${variantId}" class="form-label">Giá gốc</label>
                                    <input type="number" id="price-${variantId}" name="variants_child[${variantId}][price_regular]" class="form-control" placeholder="Nhập giá gốc" value="${existingData.price_regular || ''}">
                                    ${priceRegularErrors.map(error => `<div class="text-danger">${error}</div>`).join('')}
                                </div>
                                <div class="my-3">
                                    <label for="salePrice-${variantId}" class="form-label">Giá bán</label>
                                    <input type="number" id="salePrice-${variantId}" name="variants_child[${variantId}][price_sale]" class="form-control" placeholder="Nhập giá bán" value="${existingData.price_sale || ''}">
                                    ${priceSaleErrors.map(error => `<div class="text-danger">${error}</div>`).join('')}
                                </div>
                                <div class="my-3">
                                    <label for="quantity-${variantId}" class="form-label">Số lượng</label>
                                    <input type="number" id="quantity-${variantId}" name="variants_child[${variantId}][quantity]" class="form-control" placeholder="Nhập số lượng" value="${existingData.quantity || ''}">
                                    ${quantityErrors.map(error => `<div class="text-danger">${error}</div>`).join('')}
                                </div>
                                <div class="mb-3">
                                    <label for="image-${variantId}" class="form-label">Ảnh</label>
                                    <input type="file" id="image-${variantId}" name="variants_child[${variantId}][img]" class="form-control" onchange="previewImage(event, 'preview-${variantId}')">
                                    ${imageErrors.map(error => `<div class="text-danger">${error}</div>`).join('')}
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

    <script>
        var oldVariantSettings = @json(old('variants_child', []));
        window.toggleVariantSettings = function(variantId) {
            $(`#variantSettingsRow-${variantId}`).toggle();
        };
    </script>

    <script>
        var validationErrors = @json($errors->getMessages());
    </script>

@endsection
