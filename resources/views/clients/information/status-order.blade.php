<h3>Trạng thái đơn hàng</h3>

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
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ number_format($order->total, 0, ',', '.') }} VND</td>
                    <td><a href="" >Xem</a></td>
                    <td>
                        @switch($order->status)
                            @case(0)
                                <span class="badge bg-warning">Chờ xác nhận</span>
                                @break
                            @case(1)
                                <span class="badge bg-info">Đã xác nhận và đang xử lý</span>
                                @break
                            @case(2)
                                <span class="badge bg-primary">Đang giao hàng</span>
                                @break
                            @case(5)
                                <span class="badge bg-danger">Hủy đơn</span>
                                @break
                        @endswitch
                    </td>
                    
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>
