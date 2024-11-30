<h4 class="mb-5">Thay đổi mật khẩu</h4>
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<form id="change-password-form" method="POST" action="{{ route('client.information.updatePass',$user->id)}}">
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

        function checkPasswordsMatch() {
            if (passwordInput.value !== confirmPasswordInput.value || passwordInput.value === '' || confirmPasswordInput.value === '') {
                errorDiv.style.display = 'block';
                submitBtn.disabled = true; 
            } else {
                errorDiv.style.display = 'none';
                submitBtn.disabled = false; 
            }
        }

        passwordInput.addEventListener('input', checkPasswordsMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordsMatch);
    });
</script>