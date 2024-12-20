<h4 class="mb-5">Trạng thái đơn hàng</h4>

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
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->order_code}}</td>
                    <td>{{ $order->user->name }}</td>
                    <td class="truncate-text truncate" data-fulltext='{{ $order->address }}'>{{ $order->address }}</td>
                    <td style="color: #81C408; font-weight:bold;">{{ number_format($order->total, 0, ',', '.') }} VND
                    </td>
                    <td><a href="{{ route('client.orders.details', ['id' => $order->id]) }}">Xem</a></td>
                    <td>
                        {{ $order->created_at->format('d-m-Y H:i:s') }}
                    </td>
                    <td>
                        @switch($order->status)
                            @case(0)
                                <span class="badge bg-warning"
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Chờ xác
                                    nhận</span>
                            @break

                            @case(1)
                                <span class="badge bg-info "
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Đã xác nhận
                                    và đang xử lý</span>
                            @break

                            @case(2)
                                <span class="badge bg-primary"
                                    style="padding: 10px; width: 100px;word-wrap: break-word;white-space: normal;">Đang giao
                                    hàng</span>
                            @break
                        @endswitch
                    </td>

                    <td>
                        <form id="cancelOrderForm{{ $order->id }}"
                            action="{{ route('client.orders.cancel', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            @if ($order->status == 0)
                                <button type="button" class="badge bg-danger" style="padding: 8px 15px;"
                                    data-bs-toggle="modal" data-bs-target="#cancelOrderModal{{ $order->id }}"
                                    onclick="checkCancelStatus({{ $order->id }})">
                                    Hủy
                                </button>
                            @else
                                <button type="button" class="btn" style="padding: 8px 15px; background-color:gray "
                                    disabled>Hủy</button>
                            @endif
                        </form>
                        <script>
                            function checkCancelStatus(orderId) {
                                $.ajax({
                                    url: '{{ route('client.client.orders.checkStatus', '') }}/' + orderId,
                                    method: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                    },
                                    success: function(response) {
                                        if (response.status == 'allowed') {
                                            $('#cancelOrderModal' + orderId).modal('show');
                                        } else if (response.status == 'not_allowed') {
                                            Swal.fire({
                                                title: 'Không thể hủy!',
                                                text: 'Đơn hàng này đã được xác nhận không thể hủy.',
                                                icon: 'warning',
                                                confirmButtonText: 'OK'
                                            }).then(() => {
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                title: 'Lỗi!',
                                                text: 'Có lỗi xảy ra, vui lòng thử lại!',
                                                icon: 'error',
                                                confirmButtonText: 'OK'
                                            }).then(() => {
                                                location.reload();
                                            });
                                        }
                                    },
                                    error: function() {
                                        Swal.fire({
                                            title: 'Lỗi!',
                                            text: 'Có lỗi xảy ra, vui lòng thử lại!',
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            location.reload();
                                        });
                                    }
                                });
                            }
                        </script>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</div>
@foreach ($orders as $order)
    <div class="modal fade" id="cancelOrderModal{{ $order->id }}" tabindex="-1"
        aria-labelledby="cancelOrderModalLabel{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelOrderModalLabel{{ $order->id }}">
                        Lý do hủy đơn
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="reloadPage()"></button>
                </div>

                @if ($order->status == 0)
                    <form action="{{ route('client.orders.cancel', $order->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="5">
                        <div class="modal-body">
                            <textarea class="form-control" name="cancel_reason" rows="4" placeholder="Nhập lý do hủy..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="reloadPage()">Đóng</button>
                            <button type="submit" class="btn btn-danger">Gửi</button>
                        </div>
                    </form>
                @else
                    <div class="modal-body">
                        <p>Đơn hàng này đã được xác nhận không thể hủy.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="reloadPage()">Đóng</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
