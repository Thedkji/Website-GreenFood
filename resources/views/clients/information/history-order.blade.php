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
    {{ $oders->links() }}

</div>
<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        position: relative;
        display: block;
        padding: 8px 13px;
        /* Tăng padding để làm nút lớn hơn */
        color: #81C408;
        /* Đổi màu chữ */
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        font-size: 16px;
        /* Tăng kích thước chữ hoặc icon */
    }

    .pagination li a:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .pagination .active span {
        color: #fff;
        background-color: #81C408;
        /* Đổi màu nền nút active */
        border-color: #81C408;
    }

    .pagination .disabled span {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
</style>
