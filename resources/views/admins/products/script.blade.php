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

        // Xử lý danh mục cha thay đổi
        $('#category').change(async function(e) {
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
        $('#variant').change(async function(e) {
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
                        childVariant.append(new Option(item.name, item.id,
                            false,
                            false));
                    });

                    childVariant.val(currentChildVariant).trigger('change');

                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra:', error);
                }
            });
        });

        // Xử lý khi thay đổi giá trị biến thể con
        $('#childVariant').change(async function(e) {
            e.preventDefault();

            let selectedVariantValues = $(this).val();

            // Xóa nội dung bảng trước khi thêm mới
            variantValuesTableBody.empty();

            if (selectedVariantValues.length > 0) {
                $('#selectedVariantValuesContainer').show();

                // Duyệt qua từng biến thể con đã chọn
                $(this).find('option:selected').each(function() {
                    let name = $(this).text();
                    let value = $(this).val();

                    // Kiểm tra xem đã có dữ liệu lưu trữ cho biến thể này chưa
                    let existingData = variantValues[value] || {};

                    // Xác định xem có hiển thị phần cài đặt hay không
                    let displayStyle = Object.keys(existingData).length > 0 ? '' : 'none';

                    variantValuesTableBody.append(`
                        <tr>
                            <td>
                                <h5 class="text-success">${name}</h5>    
                            </td>
                            <td>
                                <button class="btn btn-primary variant_value_setup" type="button" data-item="${value}">Thiết lập</button>
                            </td>
                        </tr>
                        <tr id="variantSettingsRow-${value}" style="display: ${displayStyle};">
                            <td colspan="2">
                                <div id="variantSettings-${value}" class="variant-settings-dropdown" data-index="${value}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="price-${value}" class="form-label">Giá gốc</label>
                                            <input type="number" id="price-${value}" name="variant_child_values[${value}][price_regular]" class="form-control" placeholder="Nhập giá gốc" value="${existingData['price_regular'] || ''}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="salePrice-${value}" class="form-label">Giá bán <span class="text-danger">*</span></label>
                                            <input type="number" id="salePrice-${value}" name="variant_child_values[${value}][price_sale]" class="form-control" placeholder="Nhập giá bán" value="${existingData['price_sale'] || ''}">

                                            <div id="err_price_sale-${value}" class="my-3 text-danger"></div> 
                                        </div>  

                                        <div class="my-2">
                                            <label for="quantity-${value}" class="form-label">Số lượng <span class="text-danger">*</span></label>
                                            <input type="number" id="quantity-${value}" name="variant_child_values[${value}][quantity]" class="form-control" placeholder="Nhập số lượng" value="${existingData['quantity'] || ''}">
                                        </div>

                                        <div id="err_quantity-${value}" class="my-3 text-danger"></div> 

                                        <div class="">
                                            <label for="image-${value}" class="form-label">Ảnh</label>
                                            <input type="file" id="image-${value}" name="variant_child_values[${value}][img]" class="form-control" onchange="previewImage(event, 'preview-${value}')">
                                            <img id="preview-${value}" src="${existingData['imgSrc'] || '#'}" alt="Preview ảnh" class="mt-2" style="max-width: 150px; display: ${existingData['imgSrc'] ? 'block' : 'none'};">
                                        </div>

                                        <div id="err_img_variant-${value}" class="my-3 text-danger"></div> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                });
            } else {
                $('#selectedVariantValuesContainer').hide();
            }
        });

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
