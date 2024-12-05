<script>
    function alert2(itemId) {
        // Lắng nghe sự kiện click trên nút xóa
        document.getElementById('deleteButton-' + itemId).addEventListener('click', function(e) {
            e.preventDefault(); // Ngừng hành động mặc định của nút submit

            // Hiển thị SweetAlert2 xác nhận
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa ?',
                text: 'Hành động này không thể hoàn tác.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu người dùng chọn "Xóa", gửi form để xóa mã giảm giá
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa thành công!',
                        text: 'Các mục đã được xóa thành công.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                    }).then(() => {
                        document.getElementById('delete-form-' + itemId).submit();
                    });
                }
            }).catch((error) => {
                console.log(error);

                // Thông báo lỗi bằng SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Đã xảy ra lỗi. Vui lòng thử lại.',
                    confirmButtonText: 'OK'
                });

            });
        });
    }
</script>
