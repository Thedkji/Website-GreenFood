<h4 class="mb-5">Lịch sử đơn hàng</h4>

<div class="myaccount-table table-responsive text-center">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Mã đơn</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Chi tiết</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($oders as $order)
                <tr>
                    <td>{{$order->order_code}}</td>
                    <td>{{ $order->user->name }}</td>
                    <td class="truncate-text truncate" data-fulltext='{{ $order->address }}'>{{ $order->address }}</td>
                    <td style="color: #81C408; font-weight:bold;">{{ number_format($order->total, 0, ',', '.') }} VND
                    </td>
                    <td><a href="{{ route('client.orders.details', ['id' => $order->id]) }}">Xem</a></td>
                    <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>

                    <td>
                        @switch($order->status)
                            @case(3)
                                <span class="badge bg-success"
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Giao hàng
                                    thành công</span>
                            @break

                            @case(4)
                                <span class="badge bg-danger"
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Giao hàng
                                    không thành công</span>
                            @break

                            @case(5)
                                <span class="badge bg-danger"
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Hủy
                                    đơn</span>
                            @break

                            @case(6)
                                <span class="badge bg-success"
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Giao hàng
                                    thành công</span>
                            @break

                            {{-- @case(7)
                                <span class="badge bg-primary"
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Đã đánh
                                    giá</span>
                            @break --}}
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
