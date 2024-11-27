<h4 class="mb-5">Thay đổi mật khẩu</h4>
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<form id="change-password-form" method="POST" action="{{ route('client.information.updatePass') }}">
    @csrf

    <div class="col-md-12 col-12 mb-2">
        <label>Mật khẩu mới*</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu mới">
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 col-12 mb-2">
        <label>Nhập lại mật khẩu*</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu mới">
        <div id="password-match-error" class="text-danger" style="display: none;">Mật khẩu không khớp</div>
    </div>
    <div class="col-md-12 col-12 mb-2">
        <button type="submit" class="btn btn-lg btn-round">Cập nhật</button>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const errorDiv = document.getElementById('password-match-error');
        const submitBtn = document.getElementById('submit-btn');

        // Hàm kiểm tra sự khớp của mật khẩu
        function checkPasswordsMatch() {
            // Kiểm tra nếu cả 2 trường mật khẩu đã có giá trị và mật khẩu khớp nhau
            if (passwordInput.value !== confirmPasswordInput.value || passwordInput.value === '' || confirmPasswordInput.value === '') {
                errorDiv.style.display = 'block';
                submitBtn.disabled = true; // Vô hiệu hóa nút submit nếu mật khẩu không khớp hoặc thiếu một trong các trường
            } else {
                errorDiv.style.display = 'none';
                submitBtn.disabled = false; // Kích hoạt nút submit nếu mật khẩu khớp và cả 2 trường đã được điền
            }
        }

        // Lắng nghe sự kiện khi người dùng nhập mật khẩu hoặc mật khẩu xác nhận
        passwordInput.addEventListener('input', checkPasswordsMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordsMatch);
    });
</script>