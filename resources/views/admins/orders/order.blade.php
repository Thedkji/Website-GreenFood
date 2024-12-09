@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Danh sách đơn hàng')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
@endsection
@section('content')

    @include('admins.layouts.components.toast-container')

    <form action="{{ route('admin.orders.showOder') }}" id="search-form" method="GET"
        class="row mb-3 d-flex flex-row-reverse">
        <div class="col-sm">
            <label for="">Tìm kiếm</label>
            <div class="search-box">
                <input name="search" type="text" class="form-control search" value="{{ request()->input('search') }}"
                    placeholder="Nhập tìm kiếm" oninput="debounceSearch()">
                <i class="ri-search-line search-icon"></i>
            </div>
        </div>
        <div class="col-sm">
            <label for="">Ngày kết thúc</label>
            <input type="date" name="endDate" class="form-control" id="endDate"
                value="{{ request()->input('endDate') }}">
        </div>
        <div class="col-sm">
            <label for="">Ngày bắt đầu</label>
            <input type="date" name="startDate" class="form-control" id="startDate"
                value="{{ request()->input('startDate') }}">
        </div>
        <div class="col-sm">
            <label for="">Trạng thái đơn hàng</label>
            <select id="statusFilter" name="statusFilter" class="form-select" onchange="this.form.submit()">
                <option value="">Tất cả trạng thái</option>
                <option value="0" {{ request('statusFilter') === '0' ? 'selected' : '' }}>Chờ xác nhận</option>
                <option value="1" {{ request('statusFilter') === '1' ? 'selected' : '' }}>Đã xác nhận và đang xử lý đơn
                    hàng</option>
                <option value="2" {{ request('statusFilter') === '2' ? 'selected' : '' }}>Đang giao hàng</option>
                <option value="3" {{ request('statusFilter') === '3' ? 'selected' : '' }}>Giao hàng thành công</option>
                <option value="4" {{ request('statusFilter') === '4' ? 'selected' : '' }}>Giao hàng không thành công
                </option>
                <option value="5" {{ request('statusFilter') === '5' ? 'selected' : '' }}>Hủy đơn</option>
                <option value="6" {{ request('statusFilter') === '6' ? 'selected' : '' }}>Hoàn thành</option>
            </select>
        </div>
    </form>

    <div class="mt-4 mt-xl-0">
        <div>
            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif
            @if (session('success'))
                <h4 class="alert alert-success">{{ session('success') }}</h4>
            @endif
            @if (session('error'))
                <h4 class="alert alert-danger">{{ session('error') }}</h4>
            @endif
        </div>

        <form action="" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <table class="table table-striped align-middle mb-0 text-center fs-6">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">@sortablelink('user_id', 'Tên người dùng')</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">@sortablelink('total', 'Tổng hóa đơn')</th>
                        <th scope="col">@sortablelink('status', 'Trạng thái')</th>
                        <th scope="col">@sortablelink('created_at', 'Ngày tạo')</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($orders) && $orders->isNotEmpty())
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td scope="col" class="truncate-text">
                                    <span class="truncate"
                                        data-fulltext="{{ $order->user->name ?? $order->name . '(Khách)' }}">{{ $order->user->name ?? $order->name . '(Khách)' }}</span>
                                </td>
                                <td scope="col" class="truncate-text">
                                    <span class="truncate"
                                        data-fulltext="{{ $order->address }}">{{ $order->address }}</span>
                                </td>
                                <td scope="col">{{ $order->email }}</td>
                                <td scope="col">{{ $order->phone }}</td>
                                <td scope="col">
                                    <span class="text-success">{{ app('formatPrice')($order->total) }} VNĐ</span>
                                </td>
                                <td scope="col">
                                    @switch($order->status)
                                        @case(0)
                                            <span class="badge bg-warning p-2">Chờ xác nhận</span>
                                        @break

                                        @case(1)
                                            <span class="badge bg-warning p-2">Đã xác nhận và đang xử lý đơn hàng</span>
                                        @break

                                        @case(2)
                                            <span class="badge bg-primary p-2">Đang giao hàng</span>
                                        @break

                                        @case(3)
                                            <span class="badge bg-success p-2">Giao hàng thành công</span>
                                        @break

                                        @case(4)
                                            <span class="badge bg-danger p-2">Giao hàng không thành công</span>
                                        @break

                                        @case(5)
                                            <span class="badge bg-danger p-2">Hủy đơn</span>
                                        @break

                                        @case(6)
                                            <span class="badge bg-info p-2">Đánh giá</span>
                                        @break

                                        @case(7)
                                            <span class="badge bg-primary p-2">Hoàn thành</span>
                                        @break

                                        @default
                                            <span class="badge bg-secondary p-2">Không xác định</span>
                                    @endswitch
                                </td>
                                <td scope="col">{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <div class=" gap-3 flex-wrap">
                                        <a href="{{ route('admin.orders.showOrderDetail', $order->id) }}" class="truncate"
                                            data-fulltext="Xem chi tiết"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center">Không có bản ghi nào</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </form>
        <div class="mt-3 d-flex justify-content-sm-end">
            {!! $orders->appends(\Request::except('page'))->render() !!}
        </div>
    </div>



@endsection

@include('admins.layouts.components.toast')

<script>
    let debounceTimeout;

    function debounceSearch() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            document.getElementById("search-form").submit();
        }, 600);
    }
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
        $('#startDate, #endDate').on('change', function() {
            // Lấy giá trị từ các input
            let startDate = $('#startDate').val();
            let endDate = $('#endDate').val();
            if (!startDate && !endDate) {
                document.getElementById("search-form").submit();
                return; // Thoát để tránh logic tiếp theo
            }
            if (startDate) {
                $('#endDate').attr('min', startDate);
            }
            if (startDate && endDate) {
                // Kiểm tra xem endDate có hợp lệ không
                if (new Date(endDate) >= new Date(startDate)) {
                    document.getElementById("search-form").submit();
                } else {
                    alert("Ngày kết thúc không được nhỏ hơn ngày bắt đầu!");
                }
            }
        });

    });
    toastOptions = {
        autohide: true,
        delay: 5000 // Thời gian hiển thị (ms)
    };
    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
</script>
