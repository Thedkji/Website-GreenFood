@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Chi tiết đơn hàng -' . ($user->name))
@section('link')
<li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Danh sách đơn hàng</a></li>
<li class="breadcrumb-item active">Đơn hàng chi tiết</li>
@endsection
@section('content')
<div class="toast-container">
    @if (session('success'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Thông báo</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white text-dark">
            {{ session('success') }}
        </div>
        <div class="toast-progress bg-success"></div>
    </div>
    @endif

    @if (session('error'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastError">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Lỗi</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white text-dark">
            {{ session('error') }}
        </div>
        <div class="toast-progress bg-danger"></div>
    </div>
    @endif
</div>
<div class="mb-3 border p-3 border-success rounded bg-white">
    <h5 class="fs-4 text-uppercase text-success mb-4">Trạng thái đơn hàng hiện tại</h5>
    <div class="progress progress-step-arrow bg-white">
        <!-- Chờ xác nhận -->
        @if($orders->status >= 0)
        <div class="progress-bar bg-danger" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="0" aria-valuemin="0" aria-valuemax="6">
            <i class="fa-regular fa-clock" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "chờ xác nhận" -->
            <div class="status-label">Chờ xác nhận</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i> <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif

        @if ($orders->status != 5)
        <!-- Đã xác nhận và đang xử lý -->
        @if($orders->status >= 1)
        <div class="progress-bar bg-warning" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="1" aria-valuemin="0" aria-valuemax="6">
            <i class="fa-regular fa-circle-check" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "đã xác nhận" -->
            <div class="status-label">Đã xác nhận và đang xử lý</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i> <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif

        <!-- Đang giao hàng -->
        @if($orders->status >= 2)
        <div class="progress-bar bg-primary" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="2" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-truck" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "đang giao hàng" -->
            <div class="status-label">Đang giao hàng</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i> <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif

        @if ($orders->status != 4)
        <!-- Giao hàng thành công -->
        @if($orders->status >= 3)
        <div class="progress-bar bg-success" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="3" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-box" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "giao thành công" -->
            <div class="status-label">Giao hàng thành công</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i> <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif
        @endif

        @if ($orders->status != 6)
        <!-- Giao hàng không thành công -->
        @if($orders->status >= 4)
        <div class="progress-bar bg-secondary" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="4" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-x-circle" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "giao không thành công" -->
            <div class="status-label">Giao hàng không thành công</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i> <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif
        @endif

        <!-- Đánh giá -->
        @if($orders->status >= 6)
        <div class="progress-bar bg-info" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="6" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-star" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "đánh giá" -->
            <div class="status-label">Đánh giá</div>
        </div>
        @endif

        @endif

        @if ($orders->status != 6)
        <!-- Hủy đơn -->
        @if($orders->status >= 5)
        <div class="progress-bar bg-danger" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="5" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-trash" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "hủy đơn" -->
            <div class="status-label">Hủy đơn</div>
        </div>
        @endif
        @endif
    </div>
</div>
<div class="mb-3 border p-3 border-success rounded bg-white">
    <h5 class="fs-4 text-uppercase text-success mb-4">Chỉnh sửa trạng thái đơn hàng</h5>
    <div class="d-flex">
        @if ($orders->status <= 1)
            <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#cancelOrderModal">
            Hủy đơn hàng
            </button>
            <form action="{{ route('admin.orders.cancelOrder', $orders->id) }}" method="post" id="updateStatusForm">
                @csrf
                @method('PUT')
                <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="cancelOrderModalLabel">Lý do hủy đơn</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="status" value="5">
                            <div class="modal-body">
                                <textarea class="form-control" id="cancel_reason" name="cancel_reason" rows="4" placeholder="Nhập lý do hủy..."></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" name="status" class="btn btn-danger">Hủy đơn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif

            @switch($orders->status)
            @case(0)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm0" class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
            </form>
            @break

            @case(1)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm1" class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="2">
                <button type="submit" class="btn btn-primary">Giao cho đơn vị vận chuyển</button>
            </form>
            @break

            @case(2)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm2" class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="4">
                <button type="submit" class="btn btn-danger">Giao không thành công</button>
            </form>
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm2" class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="3">
                <button type="submit" class="btn btn-primary">Đã giao thành công</button>
            </form>
            @break

            @case(3)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm3" class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="6">
                <button type="submit" class="btn btn-primary">Hoàn thành đơn hàng và đánh giá</button>
            </form>
            @break

            @case(4)
            <span class="badge bg-danger p-2">Hoàn trả hàng</span>
            @break

            @default
            <span class="badge bg-secondary p-2">
                Không thể thay đổi trạng thái : {{$orders->status === 5 ? $orders->cancel_reson : ''}}
            </span>
            @endswitch
    </div>
</div>
<div class="mb-3 border p-4 border-success rounded bg-white shadow-sm">
    <h5 class="fs-4 text-uppercase text-success mb-4">Thông tin người nhận</h5>
    <div class="row">
        <div class="col-lg-6">
            <p class="fs-6 mb-2 text-muted">Họ và tên:</p>
            <p class="fs-6 text-dark">{{ $user->name }}</p>
            <p class="fs-6 mb-2 text-muted">SĐT:</p>
            <p class="fs-6 text-dark">{{ $orders->phone }}</p>
            <p class="fs-6 mb-2 text-muted">Ghi chú:</p>
            <p class="fs-6 text-dark">
                {{ !empty($orders->note) ? $orders->note : 'Không có ghi chú' }}
            </p>
        </div>
        <div class="col-lg-6">
            <p class="fs-6 mb-2 text-muted">Email:</p>
            <p class="fs-6 text-dark">{{ $orders->email }}</p>
            <p class="fs-6 mb-2 text-muted">Địa chỉ:</p>
            <p class="fs-6 text-dark">{{ $orders->address }}</p>
            <p class="fs-6 text-muted">{{ $orders->ward }} - {{ $orders->district }} - {{ $orders->province }}</p>
        </div>
    </div>
</div>

<div class="table-responsive mt-4 mt-xl-0 border p-3 border-success rounded bg-white">
    <h5 class="fs-4 text-uppercase text-success mb-4">Chi tiết đơn hàng</h5>
    <table class="table table-striped table-nowrap align-middle mb-0 text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Số tiền đã giảm</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $totalDiscount = 0 @endphp
            @foreach ($orderDetails as $orderDetail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $orderDetail->product_name }}</strong></td>
                <td><strong>{{ $orderDetail->product_sku }}</strong></td>
                <td>
                    <img src="{{ env('VIEW_IMG') }}/{{ $orderDetail->product_img }}" alt="Product Image" style="max-width: 100px;">
                </td>
                <td class="text-danger">{{ app('formatPrice')($orderDetail->product_price) }} VNĐ</td>
                <td> x {{ $orderDetail->product_quantity }}</td>
                <td>
                    {{ app('formatPrice')($orderDetail->coupon_price) }} VNĐ
                </td>
                @php
                $total = ($orderDetail->product_quantity * $orderDetail->product_price) - $orderDetail->coupon_price;
                @endphp
                <td class="text-success">
                    {{ app('formatPrice')($total) }} VNĐ
                </td>
            </tr>
            @php $totalDiscount += $total @endphp
            @endforeach

            @if ($orderDetails->count() > 0)
            <tr>
                <td colspan="6"></td>
                <td colspan="1">
                    <p class="">Tổng tiền:</p>
                </td>
                <td colspan="3">
                    <h3 class="text-success">{{ app('formatPrice')($totalDiscount) }} VNĐ</h3>
                </td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="1">
                    <p>Số tiền được giảm:</p>
                </td>
                <td colspan="3">
                    <h3 class="text-success">{{ app('formatPrice')($totalDiscount - $orders->total) }} VNĐ</h3>
                </td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="1">
                    <strong>Tiền sau giảm:</strong>
                </td>
                <td colspan="3">
                    <h3 class="text-success">{{ app('formatPrice')($orders->total) }} VNĐ</h3>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="11">
                    <h2 class="text-danger">Sản phẩm này không có chi tiết</h2>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tìm tất cả các toast
        const toastElements = document.querySelectorAll(".toast");

        toastElements.forEach((toast) => {
            // Hiển thị toast bằng Bootstrap
            const bsToast = new bootstrap.Toast(toast, {
                delay: 3000
            }); // 3000ms = 3 giây
            bsToast.show();

            // Tự động ẩn toast sau 3 giây
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        });
    });
    toastOptions = {
        autohide: true,
        delay: 5000 // Thời gian hiển thị (ms)
    };
    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
</script>