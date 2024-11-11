@php
    $variantGroups = $product->variantGroups()->with('variants')->orderByDesc('id')->get();
@endphp


<script>
    $(document).ready(function() {
        let category = $('#category');
        let childCategory = $('#childCategory');
        let childCategoryContainer = $('#childCategoryContainer');
        let productType = $('#product_type');
        let variant = $('#variant');
        let childVariant = $('#childVariant');
        let childVariantContainer = $('#childVariantContainer');
        let selectedVariantValuesContainer = $('#selectedVariantValuesContainer');
        let variantValuesTableBody = $('#variantValuesTableBody');

        // Đối tượng toàn cục để lưu trữ các giá trị biến thể
        let variantValues = {};

        // Khởi tạo Select2
        category.select2({
            placeholder: 'Chọn danh mục',
            allowClear: true
        });
        childCategory.select2({
            placeholder: 'Chọn danh mục con',
            allowClear: true
        });
        $('#variant').select2({
            placeholder: 'Chọn biến thể',
            allowClear: true
        });
        $('#childVariant').select2({
            placeholder: 'Chọn giá trị',
            allowClear: true
        });

        // Ẩn các phần không cần thiết ban đầu
        $('#selectVariant').hide();
        $('#childVariantContainer').hide();
        $('#selectedVariantValuesContainer').hide();

        // Xử lý khi thay đổi loại sản phẩm
        $('#product_type').change(function(e) {
            e.preventDefault();

            let productTypeValue = $(this).val();

            if (productTypeValue == 'no_variant') {
                // Hiển thị giá và số lượng cho sản phẩm không có biến thể
                $('.price_no_variant').show();
                $('.quantity_no_variant').show();

                // Ẩn các phần liên quan đến biến thể
                $('#selectVariant').hide();
                $('#childVariantContainer').hide();
                $('#selectedVariantValuesContainer').hide();
            } else {
                // Ẩn giá và số lượng chung
                $('.price_no_variant').hide();
                $('.quantity_no_variant').hide();

                // Hiển thị các phần liên quan đến biến thể
                $('#selectVariant').show();
                $('#childVariantContainer').show();
            }
        });

        // Gọi lại sự kiện change để cập nhật giao diện cho phù hợp với giá trị hiện tại của product_type
        $('#product_type').trigger('change');

        // Dữ liệu danh mục con (truyền từ PHP sang JavaScript)
        let categories = @json($product->categories->whereNotNull('parent_id')->pluck('id')); // Mảng các id đã chọn
        let allCategories = @json($allCategories); // Mảng tất cả các danh mục con

        // Duyệt qua tất cả các danh mục con và thêm vào thẻ <select>
        allCategories.forEach(function(category) {
            let isSelected = categories.includes(category
                .id); // Kiểm tra xem category.id có trong categories không

            // Tạo option cho mỗi danh mục
            let option = new Option(category.name, category.id, isSelected, isSelected);

            // Thêm option vào thẻ select
            $('#childCategory').append(option);
        });

        // Xử lý danh mục cha thay đổi
        $('#category').change(function(e) {
            e.preventDefault();

            // Gọi AJAX để lấy giá trị biến thể con
            $.ajax({
                type: "GET",
                url: "{{ route('admin.products.create') }}",
                data: {
                    'category_id': category.val()
                },
                success: function(response) {
                    let currentChildCategory = childCategory.val();

                    childCategory.empty();
                    response.categories.map((item) => {
                        childCategory.append(new Option(item.name, item.id, false,
                            false));
                    });

                    childCategory.val(currentChildCategory).trigger('change');

                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra:', error);
                }
            });
        });

        // Xử lý khi thay đổi biến thể cha
        $('#variant').change(function(e) {
            e.preventDefault();

            // Gọi AJAX để lấy giá trị biến thể con
            $.ajax({
                type: "GET",
                url: "{{ route('admin.products.create') }}",
                data: {
                    'variant_id': variant.val()
                },
                success: function(response) {
                    let currentChildVariant = childVariant.val();
                    childVariant.empty();
                    response.variants.map((item) => {
                        childVariant.append(new Option(item.name, item.id, false,
                            false));
                    });

                    childVariant.val(currentChildVariant).trigger('change');

                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra:', error);
                }
            });
        });

        // Dữ liệu biến thể con (truyền từ PHP sang JavaScript)
        let variants = {!! json_encode(
            $product->variantGroups->map(function ($group) {
                    return $group->variants->filter(function ($variant) {
                            return $variant->parent_id !== null;
                        })->pluck('id');
                })->flatten(),
        ) !!};
        console.log(variants); // Kiểm tra mảng variants đã nhận từ PHP

        let allVariants = @json($allVariants); // Mảng tất cả các biến thể

        // Duyệt qua tất cả các biến thể và thêm vào thẻ <select>
        allVariants.forEach(function(variant) {
            // Kiểm tra nếu `variant.parent_id` khác null (nghĩa là biến thể con)
            if (variant.parent_id !== null) {
                // Kiểm tra xem variant.id có trong mảng variants đã chọn hay không
                let isSelected = variants.includes(variant.id);

                // Tạo option cho mỗi biến thể con
                let option = new Option(variant.name, variant.id, isSelected, isSelected);

                // Thêm option vào thẻ select
                $('#childVariant').append(option);
            }
        });



        // Xử lý sự kiện khi chọn biến thể con (child variant)
        $('#childVariant').change(function(e) {
            e.preventDefault();

            // Xóa tất cả các dòng cũ trong bảng khi chọn biến thể con mới
            variantValuesTableBody.empty();

            let selectedVariantValues = $(this).val();
            if (selectedVariantValues && selectedVariantValues.length > 0) {
                $('#selectedVariantValuesContainer').show();
            } else {
                $('#selectedVariantValuesContainer').hide();
            }

            // Dữ liệu variantGroups (truyền từ PHP sang JS)
            let variantGroups = @json($variantGroups);

            // Duyệt qua từng biến thể con đã chọn
            selectedVariantValues.forEach(function(value) {
                let name = $(`#childVariant option[value="${value}"]`).text();

                // Tìm dữ liệu biến thể trong variantGroups
                let existingData = null;
                variantGroups.forEach(function(group) {
                    group.variants.forEach(function(variant) {
                        if (variant.id == value) {
                            existingData = {
                                price_regular: group.price_regular || '',
                                price_sale: group.price_sale || '',
                                quantity: group.quantity || '',
                                imgSrc: group.img || ''
                            };
                        }
                    });
                });

                // Nếu không tìm thấy dữ liệu, khởi tạo dữ liệu rỗng
                if (!existingData) {
                    existingData = {
                        price_regular: '',
                        price_sale: '',
                        quantity: '',
                        imgSrc: ''
                    };
                }

                // Hiển thị dữ liệu vào bảng
                variantValuesTableBody.append(`
            <tr>
                <td>
                    <h5 class="text-success">${name}</h5>
                </td>
                <td>
                    <button class="btn btn-primary variant_value_setup" type="button" data-item="${value}">Thiết lập</button>
                </td>
            </tr>
            <tr id="variantSettingsRow-${value}" style="display: none;">
                <td colspan="2">
                    <div id="variantSettings-${value}" class="variant-settings-dropdown" data-index="${value}">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="price-${value}" class="form-label">Giá gốc</label>
                                <input type="number" id="price-${value}" name="variant_child_values[${value}][price_regular]" class="form-control" placeholder="Nhập giá gốc" value="${existingData.price_regular}">
                            </div>
                            <div class="col-md-6">
                                <label for="salePrice-${value}" class="form-label">Giá bán <span class="text-danger">*</span></label>
                                <input type="number" id="salePrice-${value}" name="variant_child_values[${value}][price_sale]" class="form-control" placeholder="Nhập giá bán" value="${existingData.price_sale}">
                                <div id="err_price_sale-${value}" class="my-3 text-danger"></div> 
                            </div>
                            <div class="my-3">
                                <label for="quantity-${value}" class="form-label">Số lượng <span class="text-danger">*</span></label>
                                <input type="number" id="quantity-${value}" name="variant_child_values[${value}][quantity]" class="form-control" placeholder="Nhập số lượng" value="${existingData.quantity}">
                                <div id="err_quantity-${value}" class="my-3 text-danger"></div> 
                            </div>
                            <div class="">
                                <label for="image-${value}" class="form-label">Ảnh</label>
                                <input type="file" id="image-${value}" name="variant_child_values[${value}][img]" class="form-control" onchange="previewImage(event, 'preview-${value}')">
                                <img id="preview-${value}" src="{{ env('VIEW_IMG') }}/${existingData.imgSrc}" alt="Preview ảnh" class="mt-2" style="max-width: 150px; display: ${existingData.imgSrc ? 'block' : 'none'};">
                                <div id="err_img_variant-${value}" class="my-3 text-danger"></div> 
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        `);
            });
        });


        // Kích hoạt lại sự kiện change sau khi append option vào select
        $('#childVariant').trigger('change');



        // Lưu trữ giá trị khi người dùng nhập vào input
        $(document).on('input change', '.variant-settings-dropdown input', function() {
            let index = $(this).closest('.variant-settings-dropdown').data('index');

            if (!variantValues[index]) {
                variantValues[index] = {};
            }

            let inputName = $(this).attr('name').split('[').pop().replace(']', '');
            variantValues[index][inputName] = $(this).val();
        });


        // Xử lý sự kiện click vào nút "Thiết lập"
        $(document).on('click', '.variant_value_setup', function(e) {
            e.preventDefault();

            let item = $(this).data('item');
            $(`#variantSettingsRow-${item}`).toggle();
        });

    });
</script>
