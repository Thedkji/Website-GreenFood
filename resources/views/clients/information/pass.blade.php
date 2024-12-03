<h4 class="mb-5">Thay đổi mật khẩu</h4>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form id="change-password-form" method="POST" action="{{ route('client.information.updatePass', $user->id) }}">
    @csrf

    <div class="col-md-12 col-12 mb-2">
        <label>Mật khẩu cũ*</label>
        <input type="password" id="old_password" name="old_password" placeholder="Nhập mật khẩu cũ">
        @error('old_password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

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
        <button type="submit" id="submit-btn" class="btn btn-lg btn-round">Cập nhật</button>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const oldPasswordInput = document.getElementById('old_password');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const errorDiv = document.getElementById('password-match-error');
        const submitBtn = document.getElementById('submit-btn');

        function checkPasswordsMatch() {
            // Check if new password matches confirmation
            if (passwordInput.value !== confirmPasswordInput.value || passwordInput.value === '' || confirmPasswordInput.value === '') {
                errorDiv.style.display = 'block';
                submitBtn.disabled = true;
            } else {
                errorDiv.style.display = 'none';
                submitBtn.disabled = false;
            }
        }

        function validateOldPassword() {
            // Optionally, you can add AJAX to check if the old password is correct.
            // For now, we just check that it's not empty
            if (oldPasswordInput.value === '') {
                alert('Mật khẩu cũ không được để trống');
                submitBtn.disabled = true;
            } else {
                submitBtn.disabled = false;
            }
        }

        oldPasswordInput.addEventListener('input', validateOldPassword);
        passwordInput.addEventListener('input', checkPasswordsMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordsMatch);
    });
</script>
