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
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
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
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
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
                            <a href="{{ route('admin.coupons.show', $item->id) }}"><i class="fa-regular fa-eye"></i></a>

                            <a href="{{ route('admin.coupons.editCoupon', $item->id) }}" class="link-success fs-15">
                                <i class="ri-edit-2-line"></i>
                            </a>

                            <!-- Nút xóa -->
                            <form action="{{ route('admin.coupons.destroy', $item->id) }}" method="POST"
                                style="display:inline;" id="delete-form-{{ $item->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="link-danger fs-15 border-0 bg-transparent"
                                    id="deleteButton-{{ $item->id }}">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
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
        @include('admins.layouts.components.toast')
        <!-- Bao gồm file alert2.blade.php từ thư mục components -->
        @include('admins.layouts.components.alert2')

        <!-- Đẩy mã JavaScript vào phần scripts của layout chính -->
        @push('scripts')
            <!-- Lặp qua tất cả các coupon và gọi hàm alert2 cho mỗi item -->
            <script>
                @foreach ($coupons as $item)
                    alert2({{ $item->id }});
                @endforeach
            </script>
        @endpush


    @endsection
