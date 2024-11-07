<div style="border: 1px solid rgba(226, 175, 24, 0.5); padding: 20px; background-color: #f2f2f2; width: 600px; margin: auto;">
    <h2 style="color: #333; font-size: 24px; margin-bottom: 15px;">Cảm ơn vì đã sử dụng dịch vụ, {{ $order->user->name ?? 'Guest' }}!</h2>
    <p style="font-size: 18px; color: #555;">Mã đơn hàng: {{ $order->id }}</p>
    <p style="font-size: 18px; color: #555;">Các sản phẩm:</p>
    <ul style="list-style: none; padding: 0;">
        @foreach($order->orderDetails as $item)
        <li style="font-size: 16px; color: #555;">{{ $item->product_name }} - Số lượng: {{ $item->product_quantity }} - Giá: {{ number_format($item->product_price) }} VNĐ</li>
        @endforeach
    </ul>
    <p style="font-size: 18px; color: #555;">Tổng tiền: <span style="color: red; font-weight: bold;">{{ number_format($order->total) }} VNĐ</span></p>
    <p style="font-size: 18px; color: #555;">Trạng thái:</p>
    @switch($order->status)
    @case(0)
    <span style="background-color: #ffc107; color: #fff; padding: 5px 10px; border-radius: 4px;">Chờ xác nhận</span>
    @break
    @case(1)
    <span style="background-color: #ffc107; color: #fff; padding: 5px 10px; border-radius: 4px;">Đã xác nhận và đang xử lý đơn hàng</span>
    @break
    @case(2)
    <span style="background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 4px;">Đang giao hàng</span>
    @break
    @case(3)
    <span style="background-color: #28a745; color: #fff; padding: 5px 10px; border-radius: 4px;">Giao hàng thành công</span>
    @break
    @case(4)
    <span style="background-color: #dc3545; color: #fff; padding: 5px 10px; border-radius: 4px;">Giao hàng không thành công</span>
    @break
    @case(5)
    <span style="background-color: #dc3545; color: #fff; padding: 5px 10px; border-radius: 4px;">Hủy đơn</span>
    @break
    @case(6)
    <span style="background-color: #17a2b8; color: #fff; padding: 5px 10px; border-radius: 4px;">Đánh giá</span>
    @break
    @default
    <span style="background-color: #6c757d; color: #fff; padding: 5px 10px; border-radius: 4px;">Không xác định</span>
    @endswitch
    <br><br>
    <a href="{{route('client.home')}}" style="padding: 10px 20px; background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Tiếp tục mua sắm</a>
</div>