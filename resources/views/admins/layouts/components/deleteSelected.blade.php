<script>
    function deleteSelected(selector, url) {
        // Lấy danh sách các checkbox đã chọn
        const selectedIds = Array.from(document.querySelectorAll(selector))
            .map(checkbox => checkbox.value);

        if (selectedIds.length === 0) {
            // Thông báo khi không có mục nào được chọn
            Swal.fire({
                icon: 'warning',
                title: 'Chưa chọn mục',
                text: 'Vui lòng chọn ít nhất một mục để xóa.',
                confirmButtonText: 'OK',
            });
            return;
        }

        // Hỏi xác nhận trước khi xóa
        Swal.fire({
            title: 'Xác nhận xóa',
            text: 'Bạn có chắc chắn muốn xóa các mục đã chọn?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // Gửi AJAX để xóa các mục đã chọn
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        ids: selectedIds,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Xóa thành công!',
                                text: 'Các mục đã được xóa thành công.',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Đã xảy ra lỗi. Vui lòng thử lại.',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi: ", error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Đã xảy ra lỗi trong quá trình xóa. Vui lòng thử lại.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }
</script>
