@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Danh sách chi tiết đơn hàng ' . ($orders ? $orders->id : ''))
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Danh sách đơn hàng</a></li>
    <li class="breadcrumb-item active">Danh sách đơn hàng chi tiết</li>
@endsection
@section('content')
    <div class="row g-4 mb-3">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box ms-2">
                    <input type="text" class="form-control search" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-4 mt-xl-0">
        <table class="table table-striped table-nowrap align-middle mb-0 text-center">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">ID đơn hàng</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Mã giảm giá đã áp dụng</th>
                    <th scope="col">Số lượng mã giảm giá</th>
                    <th scope="col">Số tiền đã giảm</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $orderDetail->id }}</td>
                        <td scope="col">{{ $orderDetail->order_id }}</td>
                        <td scope="col">{{ $orderDetail->product_name }}</td>
                        <td scope="col">
                            <img src="{{ env('VIEW_IMG') }}/{{ $orderDetail->product_img }}" alt="">
                        </td>
                        <td scope="col">
                            {{ app('formatPrice')($orderDetail->product_price) }} VNĐ
                        </td>
                        <td scope="col">{{ $orderDetail->product_quantity }}</td>
                        <td scope="col">{{ $orderDetail->coupon_name }}</td>
                        <td scope="col">{{ $orderDetail->coupon_quantity }}</td>

                        <td scope="col">
                            {{ app('formatPrice')($orderDetail->coupon_price) }} VNĐ
                        </td>

                        @php
                            $total = $orderDetail->product_price - $orderDetail->coupon_price;
                        @endphp

                        <td scope="col">
                            <span class="text-success">{{ app('formatPrice')($total) }} VNĐ</span>
                        </td>

                        <td scope="col">{{ $orderDetail->created_at }}</td>
                        <td scope="col">{{ $orderDetail->updated_at }}</td>
                    </tr>
                @endforeach

                @if ($orderDetails->count() > 0)
                    <tr>
                        <td colspan="8">
                            <h2>Tổng tiền:</h2>
                        </td>
                        <td colspan="5">
                            <h3 class="text-success">{{ app('formatPrice')($orders->total) }} VNĐ</h3>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="13">
                            <h2 class="text-danger">Sản phẩm này không có chi tiết</h2>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $orderDetails->links() }}
    </div>
@endsection
