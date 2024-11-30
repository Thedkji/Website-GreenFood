@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục mã giảm giá')
@section('start-page-title', 'Danh sách mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active">Danh mục mã giảm giá</li>
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
    <div class="row g-4 mb-3">
        <div class="col-sm">
            <form action="{{ route('admin.coupons.showCoupon') }}" method="get">
                @csrf
                <div class="d-flex justify-content-sm-end">
                    <div class="search-box ms-2 w-25">
                        <input type="text" class="form-control search" name="search" placeholder="Tìm kiếm">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên mã giảm giá</th>
                <th style="text-align: center">Loại mã giảm giá</th>
                <th>Giá trị muốn giảm giá</th>
                <th>Gía trị của giỏ hàng thấp nhất</th>
                <th>Gía trị của giỏ hàng cao nhất</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @forelse ($coupons as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @switch($item->discount_type)
                            @case(0)
                               <span class="btn btn-info" style="padding:5px 8px">Giảm theo phần trăm</span> 
                                @break
                            @case(1)
                                <span class="btn btn-success"style="padding:5px 17px">Giảm theo giá tiền</span>
                                @break
                            @default
                                Không xác định
                        @endswitch
                    </td>                    
                    <td>
                        @if ($item->discount_type == 0)
                            {{ $item->coupon_amount }} %
                        @elseif ($item->discount_type == 1)
                            {{ number_format($item->coupon_amount, 0, ',', '.') }} VNĐ
                        @else
                            Không xác định
                        @endif
                    </td>
                    <td>{{ number_format($item->minimum_spend, 0, ',', '.') }} VNĐ </td>
                    <td>{{ number_format($item->maximum_spend, 0, ',', '.') }} VNĐ </td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.coupons.show', $item->id) }}" ><i class="fa-regular fa-eye"></i></a>

                            <a href="{{ route('admin.coupons.editCoupon', $item->id) }}" class="link-success fs-15">
                                <i class="ri-edit-2-line"></i>
                            </a>

                            <!-- Nút xóa -->
<form action="{{ route('admin.coupons.destroy', $item->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $item->id }}">
    @csrf
    @method('DELETE')
    <button type="button" class="link-danger fs-15 border-0 bg-transparent" id="deleteButton-{{ $item->id }}">
        <i class="ri-delete-bin-line"></i>
    </button>
</form>


<script>
    document.getElementById('deleteButton-{{ $item->id }}').addEventListener('click', function(e) {
        e.preventDefault(); // Ngừng hành động mặc định của nút submit

        // Hiển thị SweetAlert2 xác nhận
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa mã giảm giá này?',
            text: 'Hành động này không thể hoàn tác.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng chọn "Xóa", gửi form để xóa mã giảm giá
                document.getElementById('delete-form-{{ $item->id }}').submit();
            }
        });
    });
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

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Không có mã giảm giá nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $coupons->links() }}
    <!-- Thêm SweetAlert2 CDN vào trong phần <head> của trang -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
