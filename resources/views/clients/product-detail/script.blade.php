<script>
    $(document).ready(function() {
        let firstVariantOption = $('.variant-option').first(); // Lấy phần tử variant đầu tiên
        let hasVariants = firstVariantOption.length > 0; // Kiểm tra có biến thể hay không
        console.log($('#hidden-quantity')); // Kiểm tra xem phần tử có tồn tại hay không

        if (hasVariants) {
            firstVariantOption.addClass(
                'active_variantGroup'); // Thêm class 'active_variantGroup' cho biến thể đầu tiên

            // Lấy variantGroupID của biến thể đầu tiên và gửi yêu cầu AJAX
            let variantGroupID = firstVariantOption.data('id');
            updateVariantDetails(variantGroupID);
        } else {
            // Nếu không có biến thể, cập nhật thông tin mặc định của sản phẩm
            updateDefaultProductDetails();
        }

        // Xử lý sự kiện click cho các variant option
        $('.variant-option').on('click', function(e) {
            e.preventDefault();

            let variantGroupID = $(this).data('id'); // Lấy variantGroupID từ data-id

            if ($(this).hasClass('active_variantGroup')) {
                $(this).removeClass('active_variantGroup');
                location.reload(); // Reset lại trang khi bỏ chọn
            } else {
                $('.variant-option').removeClass('active_variantGroup'); // Xóa lớp cũ
                $(this).addClass('active_variantGroup'); // Thêm lớp vào phần tử đang chọn

                // Gửi yêu cầu AJAX để lấy thông tin giá
                updateVariantDetails(variantGroupID);
            }
        });

        // Hàm gửi yêu cầu AJAX và cập nhật giá
        function updateVariantDetails(variantGroupID) {
            $.ajax({
                type: "GET",
                url: `{{ route('client.product-detail', ':id', ':variantGroupID') }}`
                    .replace(':id', '{{ $product->id }}')
                    .replace(':variantGroupID', variantGroupID),
                data: {
                    variantGroupID: variantGroupID
                },
                success: function(response) {
                    updatePriceAndQuantity(response.data);
                    quantityChange(response.data.quantity);
                },
            });
        }

        // Hàm cập nhật thông tin sản phẩm mặc định
        function updateDefaultProductDetails() {
            const defaultPrice = '{{ $product->price }}'; // Giá mặc định của sản phẩm
            const defaultQuantity = '{{ $product->quantity }}'; // Số lượng mặc định

            updatePriceAndQuantity({
                price_regular: defaultPrice,
                price_sale: defaultPrice,
                quantity: defaultQuantity,
            });

            quantityChange(defaultQuantity);
        }

        // Hàm cập nhật giá và số lượng
        function updatePriceAndQuantity(data) {
            const formatCurrency = (amount) => {
                return new Intl.NumberFormat('vi-VN').format(amount);
            };
            let status = {{ $product->status }};

            if (status == 1) {
                $('#price_variantGroup').html(`
                    <div id="price_variantGroup">
                        <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                            ${formatCurrency(data.price_regular)} VNĐ  
                        </h6>
                        <h4 class="fw-bold mb-3 text-primary">
                            ${formatCurrency(data.price_sale)} VNĐ
                        </h4>
                        <input type="hidden" name="price" value="${data.price_sale}">
                        <input type="hidden" name="sku" value="${data.sku}">
                        <input type="hidden" name="product_id" value="${data.product_id}">
                        <input type="hidden" name="status" value="${status}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                    </div>
                `);
            }

            $('#quantity_variantGroup').html(`
            <p id="quantity_variantGroup">
                Số lượng: ${data.quantity}
            </p>

        `);

            $('.custom-quantity-input').val(1); // Reset số lượng về 1
        }

        // Hàm xử lý thay đổi số lượng
        function quantityChange(MaxQuantity) {
            const customMaxQuantity = MaxQuantity;

            // Xóa các sự kiện trước đó để tránh gắn lại nhiều lần
            $(document).off('click', '.custom-btn-minus');
            $(document).off('click', '.custom-btn-plus');
            $(document).off('input', '.custom-quantity-input');
            $(document).off('blur', '.custom-quantity-input');

            // Nút giảm số lượng
            $(document).on('click', '.custom-btn-minus', function() {
                let $input = $(this).closest('.custom-quantity').find('.custom-quantity-input');
                let value = parseInt($input.val()) || 1;

                if (value > 1) { // Không cho phép giảm xuống dưới 1
                    $input.val(value - 1);
                }

                // Cập nhật giá trị vào trường hidden quantity
                $('#hidden-quantity').val($input.val());
            });

            // Nút tăng số lượng
            $(document).on('click', '.custom-btn-plus', function() {
                let $input = $(this).closest('.custom-quantity').find('.custom-quantity-input');
                let value = parseInt($input.val()) || 1;

                if (value < customMaxQuantity) { // Không cho phép vượt quá số lượng tối đa
                    $input.val(value + 1);
                }

                // Cập nhật giá trị vào trường hidden quantity
                $('#hidden-quantity').val($input.val());
            });

            // Kiểm tra nhập số lượng thủ công
            $(document).on('input', '.custom-quantity-input', function() {
                let value = $(this).val().replace(/[^0-9]/g, ''); // Chỉ cho phép nhập số
                value = parseInt(value) || 1;

                if (value < 1) { // Không cho phép dưới 1
                    value = 1;
                } else if (value > customMaxQuantity) { // Không cho phép vượt quá tối đa
                    value = customMaxQuantity;
                }

                $(this).val(value); // Cập nhật giá trị

                // Cập nhật giá trị vào trường hidden quantity
                $('#hidden-quantity').val(value);
            });

            // Xử lý khi mất focus khỏi ô nhập
            $(document).on('blur', '.custom-quantity-input', function() {
                let value = parseInt($(this).val()) || 1;

                if (value < 1) { // Đặt lại giá trị nếu nhỏ hơn 1
                    value = 1;
                } else if (value > customMaxQuantity) { // Đặt lại giá trị nếu vượt quá tối đa
                    value = customMaxQuantity;
                }

                $(this).val(value);

                // Cập nhật giá trị vào trường hidden quantity
                $('#hidden-quantity').val(value);
            });

            // Đảm bảo trường hidden quantity luôn có giá trị mặc định ban đầu
            if ($('#hidden-quantity').val() === '') {
                $('#hidden-quantity').val(1); // Gán giá trị mặc định là 1 nếu không có giá trị
            }
        }


        // Xử lý sự kiện thêm vào giỏ hàng

    });
</script>
