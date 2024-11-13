@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục mã giảm giá')
@section('start-page-title', 'Danh sách mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active">Danh mục mã giảm giá</li>
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
                <th>Tên mã giảm giá</th>
                <th style="text-align: center">Loại mã giảm giá</th>
                <th>Giá trị muốn giảm giá </th>
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
                               <span class="btn btn-info">Giảm theo phần trăm</span> 
                                @break
                            @case(1)
                                <span class="btn btn-success">Giảm theo giá tiền</span>
                                @break
                            @default
                                Không xác định
                        @endswitch
                    </td>                    
                    <td>{{ number_format($item->coupon_amount, 0, ',', '.') }} </td>
                    <td>{{ number_format($item->minimum_spend, 0, ',', '.') }} </td>
                    <td>{{ number_format($item->maximum_spend, 0, ',', '.') }} </td>
                    <td>{{ $item->quantity }}</td>
                    {{-- <td>
                        <a href="{{ route('admin.coupons.show', $item->id) }}" ><i class="fa-regular fa-eye"></i></a>
                    </td> --}}
                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.coupons.show', $item->id) }}" ><i class="fa-regular fa-eye"></i></a>

                            <a href="{{ route('admin.coupons.editCoupon', $item->id) }}" class="link-success fs-15">
                                <i class="ri-edit-2-line"></i>
                            </a>

                            <form action="{{ route('admin.coupons.destroy', $item->id) }}" method="POST" style="display:inline;">
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
            @empty
                <tr>
                    <td colspan="8" class="text-center">Không có mã giảm giá nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $coupons->links() }}
@endsection
