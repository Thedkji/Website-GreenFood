<div style="border: 1px solid rgba(226, 175, 24, 0.5); padding: 20px; background-color: #f9f9f9; max-width: 800px; margin: auto; font-family: Arial, sans-serif;">
    <h2 style="color: #333; font-size: 24px; margin-bottom: 20px; text-align: center;">Cảm ơn vì đã sử dụng dịch vụ, {{ e($order->user->name ?? 'Guest') }}!</h2>

    <!-- Thông tin khách hàng -->
    <div style="margin-bottom: 20px;">
        <p style="font-size: 16px; color: #555;"><strong>Tên khách hàng:</strong> {{ e($order->user->name ?? 'Khách vãng lai') }}</p>
        <p style="font-size: 16px; color: #555;"><strong>Email:</strong> {{ e($order->email) }}</p>
        <p style="font-size: 16px; color: #555;"><strong>Địa chỉ giao hàng:</strong> {{ e($order->address) }}</p>
        <p style="font-size: 16px; color: #555;"><strong>Số điện thoại:</strong> {{ e($order->phone) }}</p>
        <p style="font-size: 16px; color: #555;"><strong>Mã đơn hàng:</strong> {{ e($order->id) }}</p>
    </div>

    <!-- Danh sách sản phẩm -->
    <div style="margin-bottom: 20px;">
        <h3 style="color: #333; font-size: 20px; margin-bottom: 15px;">Danh sách sản phẩm:</h3>
        @forelse($order->orderDetails as $item)
        <div style="display: flex; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 15px;">
            <!-- Ảnh sản phẩm -->
            <div style="flex: 0 0 80px; margin-right: 15px;">
                <img src="{{ env('VIEW_IMG') }}/{{ $item->product_img }}" alt="Product Image" style="max-width: 100px;">
            </div>
            <!-- Thông tin sản phẩm -->
            <div style="flex: 1;">
                <p style="font-size: 16px; color: #333; margin: 0;"><strong>{{ e($item->product_name) }}</strong></p>
                <p style="font-size: 14px; color: #555; margin: 5px 0;">Số lượng: {{ e($item->product_quantity) }}</p>
                <p style="font-size: 14px; color: #555; margin: 5px 0;">Đơn giá: {{ number_format($item->product_price) }} VNĐ</p>
                <p style="font-size: 14px; color: red; margin: 5px 0;"><strong>Tổng: {{ number_format($item->product_quantity * $item->product_price) }} VNĐ</strong></p>
            </div>
        </div>
        @empty
        <p style="font-size: 16px; color: #555;">Không có sản phẩm nào trong đơn hàng.</p>
        @endforelse
    </div>

    <!-- Tổng tiền và trạng thái đơn hàng -->
    <div style="margin-bottom: 20px;">
        <p style="font-size: 18px; color: #555; margin-bottom: 10px;">
            <strong>Tổng tiền đơn hàng:</strong>
            <span style="color: red; font-weight: bold;">{{ number_format($order->total) }} VNĐ</span>
        </p>
        <p style="font-size: 16px; color: #555;"><strong>Trạng thái:</strong>
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
        </p>

    </div>

    <!-- Nút tiếp tục -->
    <div style="text-align: center;">
        <a href="{{ route('client.home') }}" style="padding: 10px 20px; background-color: #28a745; color: #fff; text-decoration: none; border-radius: 4px;">Tiếp tục mua sắm</a>
    </div>
</div>