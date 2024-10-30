@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục mã giảm giá')
@section('start-page-title', ' Danh sách mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active"> Danh mục mã giảm giá</li>
@endsection
@section('content')
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
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên mã</th>
                <th>Số tiền giảm</th>
                <th>Giảm tối thiểu</th>
                <th>Giảm tiêu tối đa</th>
                <th>Số lượng</th>
                <th>Chi tiết</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($coupons as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->coupon_amount, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($item->minimum_spend, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($item->maximum_spend, 0, ',', '.') }} đ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <a href="{{ route('admin.coupons.show', $item->id) }}" class="link-primary">Chi tiết</a>
                    </td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.coupons.editCoupon', $item->id) }}" class="link-success fs-15"><i
                                    class="ri-edit-2-line"></i></a>

                            <form action="{{ route('admin.coupons.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="link-danger fs-15 border-0 bg-transparent"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá này?')">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $coupons->links() }}
@endsection
