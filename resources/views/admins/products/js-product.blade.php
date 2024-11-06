<script>
    $(document).ready(function() {
        $('#category').select2({
            placeholder: "Chọn",
            allowClear: true
        });

        $('#childCategory').select2({
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

        $(document).ready(function() {
            // Khởi tạo giá trị cho danh mục
            var oldCategories = @json(old('categories', []));

            if (oldCategories.length > 0) {
                $('#category').val(oldCategories).trigger('change');
            }

            // Khởi tạo giá trị cho danh mục con
            var oldChildCategories = @json(old('child_categories', []));
            if (oldChildCategories.length > 0) {

                // Cập nhật các tùy chọn danh mục con dựa trên danh mục đã chọn
                updateChildSelect($('#category'), $('#childCategory'));

                $('#childCategory').val(oldChildCategories).trigger('change');
                $('#childCategoryContainer').show();

            }
        });

        // Lưu trữ danh mục con
        $('#childCategory').on('change', function() {
            const selectedChildCategoryId = $(this).val();
            localStorage.setItem('selectedChildCategory', selectedChildCategoryId);
        });

        // Khôi phục dữ liệu khi load trang
        $(window).on('load', function() {
            const storedCategoryId = localStorage.getItem('selectedCategory');
            const storedChildCategoryId = localStorage.getItem('selectedChildCategory');

            if (storedCategoryId) {
                $('#category').val(storedCategoryId).trigger('change');
            }

            if (storedChildCategoryId) {
                $('#childCategory').val(storedChildCategoryId).trigger('change');
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

<script>
    $(document).ready(function() {
        // Update the Select2 initialization for variant
        $('#variant').select2({
            placeholder: "Chọn biến thể",
            allowClear: true,
            language: {
                noResults: function() {
                    return "Không tìm thấy kết quả";
                }
            }
        });

        // Modify the product type change handler
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

        // ...rest of your existing code...
    });
</script>
