<h4 class="mb-5">Trạng thái đơn hàng</h4>

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
                <th>Hành động</th> <!-- Cột Hành động cho nút hủy -->
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td style="color: #81C408; font-weight:bold;">{{ number_format($order->total, 0, ',', '.') }} VND
                    </td>
                    <td><a href="{{ route('client.orders.details', ['id' => $order->id]) }}">Xem</a></td>
                    <td>
                        @switch($order->status)
                            @case(0)
                                <span class="badge bg-warning" style="padding: 10px;">Chờ xác nhận</span>
                            @break

                            @case(1)
                                <span class="badge bg-info" style="padding: 10px;">Đã xác nhận và đang xử lý</span>
                            @break

                            @case(2)
                                <span class="badge bg-primary" style="padding: 10px;">Đang giao hàng</span>
                            @break
                        @endswitch
                    </td>
                    <td>
                        <form action="{{ route('admin.orders.cancelOrder', $order->id) }}" method="post"
                            style="display: inline;">
                            @csrf
                            @method('PUT')

                            @if ($order->status == 0)
                                <button type="button" class="badge bg-danger"
                                    style=" padding: 8px 15px;"data-bs-toggle="modal"
                                    data-bs-target="#cancelOrderModal{{ $order->id }}">
                                    Hủy
                                </button>
                            @else
                                <button type="button" class="btn btn-dark" style=" padding: 8px 15px;"
                                    disabled>Hủy</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- hủy đơn hàng -->
@foreach ($orders as $order)
    <div class="modal fade" id="cancelOrderModal{{ $order->id }}" tabindex="-1"
        aria-labelledby="cancelOrderModalLabel{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelOrderModalLabel{{ $order->id }}">Lý do hủy đơn</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.orders.cancelOrder', $order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="5">
                    <div class="modal-body">
                        <textarea class="form-control" name="cancel_reason" rows="4" placeholder="Nhập lý do hủy..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
