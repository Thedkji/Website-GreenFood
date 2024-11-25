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
        const userId = @json($userId);
        let updateTimer;
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
            // Lấy giá trị hiện tại của price
            let price = parseFloat($("#price-" + itemId).text().replace(/[^\d.-]/g, ''));
            // Lấy giá trị hiện tại của số lượng
            let quantity = parseInt(input.val());
            // Tính toán priceTotal
            let priceTotal = price * quantity;
            // Cập nhật giá trị priceTotal trên giao diện
            $("#priceTotal-" + itemId).text(new Intl.NumberFormat('vi-VN').format(priceTotal) + " VNĐ");
            $('input[name="priceTotal[' + itemId + ']"]').val(priceTotal);
            clearTimeout(updateTimer);
            // Đặt timer mới, chỉ gọi `updateQuantity` sau khi dừng nhấn nút 500ms
            updateTimer = setTimeout(function() {
                updateQuantity(itemId, quantity);
            }, 500);
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
                success: function(response) {},
                error: function(error) {
                    alert('Có lỗi xảy ra!');
                    console.error(error);
                }
            });

        };


        const toastElements = document.querySelectorAll(".toast");
        toastElements.forEach((toastElement) => {
            const bsToast = new bootstrap.Toast(toastElement, {
                delay: 5000
            }); // 5 giây
            bsToast.show();

            // Ẩn toast sau 5 giây
            setTimeout(() => {
                toastElement.classList.remove("show");
            }, 5000);
        });

        // Toast success (nếu có)
        const toastSuccess = document.getElementById("toastSuccess");
        if (toastSuccess) {
            const toastOptions = {
                autohide: true,
                delay: 5000
            }; // Hiển thị 5 giây
            const bsToastSuccess = new bootstrap.Toast(toastSuccess, toastOptions);
            bsToastSuccess.show();
        }
    });

    toastOptions = {
        autohide: true,
        delay: 5000 // Thời gian hiển thị (ms)
    };

    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
</script>