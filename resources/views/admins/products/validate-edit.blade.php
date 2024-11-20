@php
    $products = App\Models\Product::withTrashed()
        ->where('id', '<>', $product->id)
        ->pluck('name');
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Định dạng cho phép
    $maxFileSize = 2 * 1024 * 1024; // Kích thước tối đa 2MB
@endphp

<script>
    $('#btn-submit').click(function(e) {
        e.preventDefault();

        let err = false;
        let existingProductsName = @json($products);
        const allowedExtensions = @json($allowedExtensions);
        const maxFileSize = {{ $maxFileSize }};

        function errTrue(idErr, idFocus, message) {
            $(idFocus).focus();
            $(idErr).html(message).show();

            $('html, body').animate({
                scrollTop: $(idFocus).offset().top - 150 // Cuộn đến phần tử cụ thể
            }, 'fast');

            err = true;
        }

        function errFalse(id) {
            $(id).html('').hide();
        }

        // Validate tên sản phẩm
        if ($('#name').val().trim() == "") {
            errTrue('#err_name', '#name', 'Tên sản phẩm không được để trống');
        } else if (existingProductsName.includes($('#name').val().trim())) {
            errTrue('#err_name', '#name', 'Tên sản phẩm đã tồn tại hoặc chưa xóa vĩnh viễn');
        } else {
            errFalse('#err_name');
        }

        if ($('#product_type').val() == 'no_variant') {

            // Kiểm tra giá gốc và giá bán
            if (parseFloat($('#price_regular').val()) < parseFloat($('#price_sale').val())) {
                errTrue('#err_price_regular', '#price_regular', 'Giá gốc không được nhỏ hơn giá bán');
            } else if (parseFloat($('#price_regular').val()) < 0) {
                // Kiểm tra giá bán không được âm
                errTrue('#err_price_regular', '#price_regular', 'Giá bán không được là số âm');
            } else {
                errFalse('#err_price_regular');
            }

            // Kiểm tra giá bán
            if ($('#price_sale').val() == "") {
                errTrue('#err_price_sale', '#price_sale', 'Giá bán không được để trống');
            } else if (parseFloat($('#price_sale').val()) > parseFloat($('#price_regular').val())) {
                // So sánh số với số
                errTrue('#err_price_sale', '#price_sale', 'Giá bán phải nhỏ hơn hoặc bằng giá gốc');
            } else if (parseFloat($('#price_sale').val()) < 0) {
                // Kiểm tra giá bán không được âm
                errTrue('#err_price_sale', '#price_sale', 'Giá bán không được là số âm');
            } else {
                errFalse('#err_price_sale');
            }

            // Kiểm tra số lượng
            if ($('#quantity').val() == "" || parseFloat($('#quantity').val()) <= 0) {
                errTrue('#err_quantity', '#quantity', 'Số lượng không được để trống');
            } else if (parseFloat($('#quantity').val()) < 0) {
                // Kiểm tra số lượng không được âm
                errTrue('#err_quantity', '#quantity', 'Số lượng không được là số âm');
            } else {
                errFalse('#err_quantity');
            }

        } else {
            // Validate biến thể
            if ($('#variant').val() == '') {
                console.log($('#err_variant'));
                errTrue('#err_variant', '#variant', 'Chưa chọn biến thể');
            } else {
                errFalse('#err_variant');
            }

            if ($('#childVariant').val() == '') {
                errTrue('#err_childVariant', '#childVariant', 'Chưa chọn giá trị');
            } else {
                errFalse('#err_childVariant');
            }

            // Validate các giá trị biến thể con
            $('#childVariant').find('option:selected').each(function() {
                let value = $(this).val();
                let priceRegular = $(`#price-${value}`).val();
                let priceSale = $(`#salePrice-${value}`).val();
                let quantity = $(`#quantity-${value}`).val();
                let img = $(`#image-${value}`).get(0).files[0];
                $(`#variantSettingsRow-${value}`).hide();

                // Kiểm tra giá bán
                if (priceSale == "") {
                    errTrue(`#err_price_sale-${value}`, `#salePrice-${value}`,
                        'Giá bán không được để trống');

                    $(`#variantSettingsRow-${value}`).show(); // Hiển thị dòng thiết lập
                } else if (parseFloat(priceSale) > parseFloat(priceRegular)) {
                    errTrue(`#err_price_sale-${value}`, `#salePrice-${value}`,
                        'Giá bán phải nhỏ hơn hoặc bằng giá gốc');
                    $(`#variantSettingsRow-${value}`).show(); // Hiển thị dòng thiết lập
                } else {
                    errFalse(`#err_price_sale-${value}`);
                }

                // Kiểm tra số lượng
                if (quantity == "") {
                    errTrue(`#err_quantity-${value}`, `#quantity-${value}`,
                        'Số lượng không được để trống');
                    $(`#variantSettingsRow-${value}`).show(); // Hiển thị dòng thiết lập
                } else if (quantity < 0) {
                    errTrue(`#err_quantity-${value}`, `#quantity-${value}`,
                        'Số lượng không được là số âm');
                    $(`#variantSettingsRow-${value}`).show(); // Hiển thị dòng thiết lập
                } else {
                    errFalse(`#err_quantity-${value}`);
                }

                // Kiểm tra ảnh
                if (img && img.size > maxFileSize) {
                    errTrue(`#err_img_variant-${value}`, `#image-${value}`,
                        'Ảnh vượt quá kích thước cho phép');
                    $(`#variantSettingsRow-${value}`).show(); // Hiển thị dòng thiết lập
                } else if (img && !allowedExtensions.includes(img.name.split('.').pop()
                        .toLowerCase())) {
                    errTrue(`#err_img_variant-${value}`, `#image-${value}`, 'Ảnh không đúng định dạng');
                    $(`#variantSettingsRow-${value}`).show(); // Hiển thị dòng thiết lập
                } else {
                    errFalse(`#err_img_variant-${value}`);
                }
            });
        }

        // Validate ảnh sản phẩm
        let productImage = $('#inputFileAvatar').get(0).files[0];
        if (productImage) {
            let fileExtension = productImage.name.split('.').pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                errTrue('#err_img', '#inputFileAvatar',
                    'Ảnh sản phẩm chỉ chấp nhận các định dạng jpg, jpeg, png, hoặc gif');
            } else if (productImage.size > maxFileSize) {
                errTrue('#err_img', '#inputFileAvatar', 'Ảnh sản phẩm phải nhỏ hơn 2MB');
            } else {
                errFalse('#err_img');
            }
        } else {
            errFalse('#err_img');
        }

        // Validate thư viện ảnh
        let galleryImages = $('#inputFileGallery').get(0).files; // Thay đổi id cho đúng
        if (galleryImages.length > 0) {
            for (let i = 0; i < galleryImages.length; i++) {
                let file = galleryImages[i];
                let fileExtension = file.name.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(fileExtension)) {
                    errTrue('#err_galleries', '#inputFileGallery',
                        'Mỗi ảnh trong thư viện chỉ chấp nhận các định dạng jpg, jpeg, png, hoặc gif');
                    break;
                } else if (file.size > maxFileSize) {
                    errTrue('#err_galleries', 'Mỗi ảnh trong thư viện phải nhỏ hơn 2MB');
                    break;
                } else {
                    errFalse('#err_galleries');
                }
            }
        } else {
            errFalse('#err_galleries');
        }



        // Nếu không có lỗi thì submit form
        if (!err) {
            $('#form-add-product').submit();
        }

    });
</script>
