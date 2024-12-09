@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục mã giảm giá')
@section('start-page-title', 'Danh sách mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active">Danh mục mã giảm giá</li>
@endsection

@section('content')
    @include('admins.layouts.components.toast-container')

    <div class="row g-4 mb-3">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <form action="" method="get" id="search-form">
                    <div class="search-box">
                        <input name="search" type="text" class="form-control search"
                            value="{{ request()->input('search') }}" placeholder="Nhập tìm kiếm" oninput="debounceSearch()">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="my-3">
        <button class="btn btn-success">
            <a href="{{ route('admin.coupons.addCoupon') }}" class="text-white">Thêm</a>
        </button>
    </div>
    <table class="table text-center aligin-middle">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this,'.coupon-checkbox')">
                </th>
                <th>ID</th>
                <th>Tên mã giảm giá</th>
                <th style="text-align: center">Loại mã giảm giá</th>
                <th>
                    Giá trị tối thiểu
                    <span class="truncate"
                        data-fulltext="Là giá trị tối thiểu của tổng đơn hàng để có thể áp dụng được mã giảm giá">
                        <i class="fa-solid fa-circle-question"></i>
                    </span>
                </th>
                <th>Giá trị tối đa
                    <span class="truncate"
                        data-fulltext="Là giá trị tối đa của tổng đơn hàng để có thể áp dụng được mã giảm giá">
                        <i class="fa-solid fa-circle-question"></i>
                    </span>
                </th>
                <th>Số tiền được giảm
                    <span class="truncate" data-fulltext="Là số tiền được giảm sau khi thêm mã giảm giá">
                        <i class="fa-solid fa-circle-question"></i>
                    </span>
                </th>
                <th>Số lượng</th>
                <th colspan="3">Thao tác</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @forelse ($coupons as $coupon)
                <tr>
                    <td>
                        <input type="checkbox" class="coupon-checkbox" name="coupon_id[]"
                            onclick="toggleDeleteButton('.coupon-checkbox')" value="{{ $coupon->id }}">
                    </td>
                    <td>{{ $coupon->id }}</td>
                    <td class="truncate-text">
                        <span class="truncate" data-fulltext="{{ $coupon->name }}">
                            {{ $coupon->name }}
                        </span>
                    </td>
                    <td>
                        @switch($coupon->discount_type)
                            @case(0)
                                <span class="badge bg-info p-2">Giảm theo phần trăm</span>
                            @break

                            @case(1)
                                <span class="badge bg-success p-2">Giảm theo giá tiền</span>
                            @break

                            @default
                                Không xác định
                        @endswitch
                    </td>
                    <td>{{ number_format($coupon->minimum_spend, 0, ',', '.') }} VNĐ </td>
                    <td>{{ number_format($coupon->maximum_spend, 0, ',', '.') }} VNĐ </td>
                    <td class="text-success">
                        @if ($coupon->discount_type == 0)
                            {{ $coupon->coupon_amount }} %
                        @elseif ($coupon->discount_type == 1)
                            {{ number_format($coupon->coupon_amount, 0, ',', '.') }} VNĐ
                        @else
                            Không xác định
                        @endif
                    </td>
                    <td>{{ $coupon->quantity }}</td>
                    <td>
                        <a href="{{ route('admin.coupons.show', $coupon->id) }}" class="truncate"
                            data-fulltext="Xem chi tiết"><i class="fa-regular fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('admin.coupons.editCoupon', $coupon->id) }}" class="link-success fs-15 truncate"
                            data-fulltext="Chỉnh sửa">
                            <i class="ri-edit-2-line"></i>
                        </a>
                    </td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">

                            <!-- Nút xóa -->
                            <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST"
                                style="display:inline;" id="delete-form-{{ $coupon->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="link-danger fs-15 border-0 bg-transparent truncate"
                                    id="deleteButton-{{ $coupon->id }}" data-fulltext="Xóa">
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

        <div class="row my-3">
            <div class="col-sm">
                <button type="button" class="btn btn-danger" id="delete-button" name="coupon-delete-checkbox"
                    style="display: none;"
                    onclick="deleteSelected('.coupon-checkbox:checked', '{{ route('admin.coupons.bulkDelete') }}')">Xóa</button>
            </div>
        </div>
        {{ $coupons->links() }}

        {{-- Thực thi tìm kiếm sau 1 khoảng thời gian --}}
        @include('admins.layouts.components.search-time')

        {{-- Thực thi xóa nhiều --}}
        @include('admins.layouts.components.toggleDelete')

        {{-- Thực thi xóa từng phần tử và thay alert --}}
        @include('admins.layouts.components.deleteSelected')

        {{-- Hiển thị toast khi hoàn thành --}}
        @include('admins.layouts.components.toast')

        <!-- Bao gồm file alert2.blade.php từ thư mục components -->
        @include('admins.layouts.components.alert2')

        <!-- Đẩy mã JavaScript vào phần scripts của layout chính -->
        @push('scripts')
            <!-- Lặp qua tất cả các coupons và gọi hàm alert2 cho mỗi item -->
            <script>
                @foreach ($coupons as $item)
                    alert2({{ $item->id }});
                @endforeach
            </script>
        @endpush

    @endsection
