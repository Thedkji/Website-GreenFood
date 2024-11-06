<div style="border: 1px solid rgba(226, 175, 24, 0.5) ; padding: 20px; background-color: #f2f2f2; width: 600px; magin: auto;">
    <h3>Xin chào {{$user->name}}</h3>
    <p>Bạn muốn thay đổi mật khẩu, vui lòng bấm nút bên dưới để đổi mật khẩu:</p>
    <a href="{{ route('client.resetPassword', $token )}}" style=" padding: 10px 20px; background-color: #e2af18; color: #fff; text-decoration: none;">Thay đổi mật khẩu</a>
</div>
