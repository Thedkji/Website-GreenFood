<h4 class="mb-5">Thay đổi mật khẩu</h4>

<form id="change-password-form" method="POST" action="{{ route('client.information.updatePass', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="col-md-12 col-12 mt-2">
        <label>Mật khẩu cũ <span class="text-danger">*</span></label>
        <input type="password" id="old_password" name="old_password" placeholder="Nhập mật khẩu cũ">
    </div>

    <div id="old_password_err" class="text-danger my-2"></div>

    <div class="col-md-12 col-12 mt-2">
        <label>Mật khẩu mới <span class="text-danger">*</span></label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu mới">
    </div>

    <div id="password_err" class="text-danger my-2"></div>

    <div class="col-md-12 col-12 mt-2">
        <label>Nhập lại mật khẩu <span class="text-danger">*</span></label>
        <input type="password" id="password_confirmation" name="password_confirmation"
            placeholder="Nhập lại mật khẩu mới">
    </div>
    <div id="password_confirmation_err" class="text-danger my-2"></div>

    <div class="col-md-12 col-12 mt-2">
        <button type="submit" id="submit-btn" class="btn btn-lg btn-round">Cập nhật</button>
    </div>
</form>


@include('clients.information.change-pass-validate')
