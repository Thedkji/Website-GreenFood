<script>
    document.addEventListener('DOMContentLoaded', function() {
        const oldPasswordInput = document.getElementById('old_password');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const submitBtn = document.getElementById('submit-btn');
        const userId = {{ $user->id }}; // Truyền ID user vào JavaScript từ server

        $('#submit-btn').click(function(e) {
            e.preventDefault();
            let valid = true; // Biến kiểm tra trạng thái hợp lệ

            // Kiểm tra mật khẩu mới
            if (!passwordInput.value) {
                errTrue('#password_err', '#password', 'Mật khẩu mới không được để trống');
                valid = false;
            } else if (passwordInput.value.length < 8) {
                errTrue('#password_err', '#password', 'Mật khẩu mới phải chứa ít nhất 8 ký tự');
                valid = false;
            } else {
                errFalse('#password_err');
            }

            // Kiểm tra mật khẩu xác nhận
            if (passwordInput.value !== confirmPasswordInput.value) {
                errTrue('#password_confirmation_err', '#password_confirmation',
                    'Mật khẩu xác nhận không khớp');
                valid = false;
            } else {
                errFalse('#password_confirmation_err');
            }

            // Kiểm tra mật khẩu cũ qua AJAX
            if (!oldPasswordInput.value) {
                errTrue('#old_password_err', '#old_password', 'Bạn không được để trống trường này');
                valid = false;
            } else {
                $.ajax({
                    url: '{{ route('client.information.checkPass') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        old_password: oldPasswordInput.value,
                        id: "{{ $user->id }}"
                    },
                    success: function(response) {
                        if (!response.valid) {
                            errTrue('#old_password_err', '#old_password', response.message);
                            valid = false;
                        } else {
                            errFalse('#old_password_err');
                        }
                    },
                    error: function() {
                        alert("Có lỗi xảy ra khi kiểm tra mật khẩu cũ.");
                    }
                });
            }

            if (valid) {
                $('#change-password-form').submit();
            }
        });

        function errTrue(idErr, nameFocus, message) {
            $(nameFocus).focus();
            $(idErr).html(message).show();
            // $('html, body').animate({
            //     scrollTop: $(nameFocus).offset().bottom - 80
            // }, 'slow');
        }

        function errFalse(id) {
            $(id).html('').hide();
        }
    });
</script>