<div style="border: 1px solid rgba(226, 175, 24, 0.5) ; padding: 20px; background-color: #f2f2f2; width: 600px; magin: auto;">
    <h2>Cảm ơn vì đã sử dụng dịch vụ, {{ $order->user->name ?? 'Guest' }}!</h2>
    <p>Mã đơn hàng: {{ $order->id }}</p>
    <p>Các sản phẩm:</p>
    <ul>
        @foreach($order->orderDetails as $item)
        <li>{{ $item->product_name }} - Quantity: {{ $item->product_quantity }} - Price: {{ number_format($item->product_price) }} VNĐ</li>
        @endforeach
    </ul>
    <p>Tổng tiền: <span style="color: red;">{{ number_format($order->total) }} VNĐ</span></p>
    <p>Tiếp tục mua sắm </p>
</div>