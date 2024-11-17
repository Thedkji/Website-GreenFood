<script>
    $(document).ready(function() {
        // Đảm bảo biến thể đầu tiên được chọn và có class 'active_variantGroup'
        let firstVariantOption = $('.variant-option').first(); // Lấy phần tử variant đầu tiên
        firstVariantOption.addClass('active_variantGroup'); // Thêm class 'active_variantGroup' cho nó

        // Gửi yêu cầu AJAX cho phần tử đầu tiên để cập nhật giá
        let variantGroupID = firstVariantOption.data(
            'id'); // Lấy variantGroupID từ data-id của phần tử đầu tiên
        $.ajax({
            type: "GET",
            url: `{{ route('client.product-detail', ':id', ':variantGroupID') }}`
                .replace(':id', '{{ $product->id }}')
                .replace(':variantGroupID', variantGroupID),
            data: {
                variantGroupID: variantGroupID
            },
            success: function(response) {
                // Cập nhật giá trị khi bấm vào phần tử
                $('#price_variantGroup').html(`
                    <div id="price_variantGroup">
                        <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                            ${formatCurrency(response.data.price_regular)} VNĐ  
                        </h6>
                        <h4 class="fw-bold mb-3 text-success">
                            ${formatCurrency(response.data.price_sale)} VNĐ  
                        </h4>
                    </div>
                `);

                $('#quantity_variantGroup').html(`
                                <p id="quantity_variantGroup">
                                    Số lượng :  ${response.data.quantity}
                                </p>
                    `);
            }
        });

        // Xử lý sự kiện click cho các variant option
        $('.variant-option').on('click', function(e) {
            e.preventDefault();

            let variantGroupID = $(this).data('id'); // Lấy variantGroupID từ data-id
            console.log(variantGroupID);

            // Kiểm tra xem phần tử đã có lớp 'active_variantGroup' chưa
            if ($(this).hasClass('active_variantGroup')) {
                // Nếu đã có lớp, xóa lớp và hiển thị lại giá ban đầu
                $(this).removeClass('active_variantGroup');
                location.reload();
            } else {
                // Loại bỏ lớp 'active_variantGroup' của các phần tử khác
                $('.variant-option').removeClass('active_variantGroup');
                $(this).addClass(
                    'active_variantGroup'); // Thêm lớp 'active_variantGroup' vào phần tử đang chọn

                // Gửi yêu cầu AJAX để lấy thông tin giá
                $.ajax({
                    type: "GET",
                    url: `{{ route('client.product-detail', ':id', ':variantGroupID') }}`
                        .replace(':id', '{{ $product->id }}')
                        .replace(':variantGroupID', variantGroupID),
                    data: {
                        variantGroupID: variantGroupID
                    },
                    success: function(response) {
                        // Format giá tiền theo định dạng  VNĐ  
                        const formatCurrency = (amount) => {
                            return new Intl.NumberFormat('vi-VN').format(amount);
                        };

                        // Cập nhật giá trị khi bấm vào phần tử
                        $('#price_variantGroup').html(`
                    <div id="price_variantGroup">
                        <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                            ${formatCurrency(response.data.price_regular)} VNĐ  
                        </h6>
                        <h4 class="fw-bold mb-3 text-success">
                            ${formatCurrency(response.data.price_sale)} VNĐ
                        </h4>
                    </div>
                `);

                        $('#quantity_variantGroup').html(`
                                <p id="quantity_variantGroup">
                                    Số lượng :  ${response.data.quantity}
                                </p>
                    `);
                    }
                });
            }
        });
    });
</script>
