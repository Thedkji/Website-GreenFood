<div style="border: 1px solid rgba(226, 175, 24, 0.5) ; padding: 20px; background-color: #f2f2f2; width: 600px; magin: auto;">
    <h3>Xin chào {{$user->name}}</h3>
    <p>Bạn vui lòng bấm nút xác nhận tài khoản:</p>
    <a href="{{ route('client.verify', $user->email ) }}" style=" padding: 10px 20px; background-color: #e2af18; color: #fff; text-decoration: none;">Xác nhận tài khoản</a>
</div>
