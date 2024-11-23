<script>
    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('.cart-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        toggleDeleteButton();
    }

    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('.cart-checkbox');
        const deleteButton = document.getElementById('delete-button');
        const itemIdsInput = document.getElementById('itemIds');
        const selectedItems = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);
        deleteButton.style.display = selectedItems.length > 0 ? 'inline-block' : 'none';
        itemIdsInput.value = selectedItems.join(',');
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Tìm tất cả các toast
        const toastElements = document.querySelectorAll(".toast");
        const userId = @json($userId);

        toastElements.forEach((toast) => {
            // Hiển thị toast bằng Bootstrap
            const bsToast = new bootstrap.Toast(toast, {
                delay: 3000
            }); // 3000ms = 3 giây
            bsToast.show();

            // Tự động ẩn toast sau 3 giây
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        });
        $('.btn-minus, .btn-plus').click(function() {
            let button = $(this);
            // Lấy input liên quan trong cùng container
            let input = button.closest('.input-group').find('input[name^="quantities"]');
            // Lấy ID từ `name` của input
            let itemId;
            // Kiểm tra điều kiện userId
            if (userId) {
                // Nếu có userId, lấy itemId từ name của input (chỉ giữ lại các ký tự số)
                itemId = input.attr('name').replace(/[^0-9]/g, '');
            } else {
                // Nếu không có userId, itemId là tên của input
                itemId = input.attr('name').match(/\[(.*?)\]/)[1];
            }
            console.log(itemId);

            // Lấy giá trị hiện tại của price
            let price = parseFloat($("#price-" + itemId).text().replace(/[^\d.-]/g, ''));
            // Lấy giá trị hiện tại của số lượng
            let quantity = parseInt(input.val());
            // Tính toán priceTotal
            let priceTotal = price * quantity;
            // Cập nhật giá trị priceTotal trên giao diện
            $("#priceTotal-" + itemId).text(new Intl.NumberFormat('vi-VN').format(priceTotal) + " VNĐ");
            $('input[name="priceTotal[' + itemId + ']"]').val(priceTotal);
            updateQuantity(itemId, quantity);
            updateGrandTotal();
        });

        function updateGrandTotal() {
            let grandTotal = 0;
            // Lặp qua tất cả các phần tử `priceTotal`
            $("[id^=priceTotal-]").each(function() {
                let price = $(this).text().replace(/[^\d.-]/g, '');
                let number = parseInt(price.replace(/\./g, ''), 10);
                grandTotal += number; // Cộng dồn giá trị
            });
            // Hiển thị giá trị tổng hợp
            $("#grandTotal").text(grandTotal.toLocaleString() + " VNĐ");
        }

        function updateQuantity(itemId, quantity) {
            $.ajax({
                url: "{{route('client.updateCart')}}",
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    item_id: itemId,
                    quantity: quantity
                },
                success: function(response) {

                },
                error: function(error) {
                    alert('Có lỗi xảy ra!');
                    console.error(error);
                }
            });
        }

        function showToast(type, message) {
            // Thêm thông báo vào container
            let toastContainer = $('.toast-container');

            // Tạo toast mới
            let toast = `
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header ${type === 'success' ? 'bg-success' : 'bg-danger'} text-white">
                        <p class="me-auto">${type === 'success' ? 'Thông báo' : 'Lỗi'}</p>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-white text-dark">
                        ${message}
                    </div>
                    <div class="toast-progress ${type === 'success' ? 'bg-success' : 'bg-danger'}"></div>
                </div>
            `;
            // Thêm toast vào container
            toastContainer.append(toast);
            // Hiển thị toast
            let toastElement = toastContainer.find('.toast:last-child')[0];
            let bsToast = new bootstrap.Toast(toastElement);
            bsToast.show();
            // Tùy chọn: Xóa toast sau một thời gian
            setTimeout(() => {
                $(toastElement).toast('hide');
                $(toastElement).remove();
            }, 3000);
        }

    });
    toastOptions = {
        autohide: true,
        delay: 5000 // Thời gian hiển thị (ms)
    };
    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
</script>