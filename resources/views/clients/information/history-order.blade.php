<h4 class="mb-5">Lịch sử đơn hàng</h4>

<div class="myaccount-table table-responsive text-center">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Chi tiết</th>
                <th>Trạng thái</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($oders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td style="color: #81C408; font-weight:bold;">{{ number_format($order->total, 0, ',', '.') }} VND
                    </td>
                    <td><a href="{{ route('client.orders.details', ['id' => $order->id]) }}">Xem</a></td>
                    <td>
                        @switch($order->status)
                            @case(3)
                                <span class="badge bg-success" style="padding: 10px;">Giao hàng thành công</span>
                            @break

                            @case(4)
                                <span class="badge bg-info" style="padding: 10px;">Giao hàng không thành công</span>
                            @break

                            @case(5)
                                <span class="badge bg-danger" style="padding: 10px;">Hủy đơn</span>
                            @break

                            @case(6)
                                <span class="badge bg-primary" style="padding: 10px;">Đánh giá</span>
                            @break

                            @case(7)
                                <span class="badge bg-primary" style="padding: 10px;">Đã đánh giá</span>
                            @break
                        @endswitch
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
