@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Danh sách đơn hàng')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
        <table class="table table-striped table-nowrap align-middle mb-0 text-center">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">ID Người dùng</th>
                    <th scope="col">Tỉnh/Thành Phố</th>
                    <th scope="col">Quận/Huyện</th>
                    <th scope="col">Phường/Xã</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Tổng hóa đơn</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Ghi chú hủy đơn</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col">Chi tiết đơn hàng</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $order->id }}</td>
                        <td scope="col">{{ $order->user_id }}</td>
                        <td scope="col">{{ $order->province }}</td>
                        <td scope="col">{{ $order->district }}</td>
                        <td scope="col">{{ $order->ward }}</td>
                        <td scope="col">{{ $order->address }}</td>
                        <td scope="col">{{ $order->email }}</td>
                        <td scope="col">{{ $order->phone }}</td>
                        <td scope="col">
                            {{ app('formatPrice')($order->total) }} VNĐ
                        </td>
                        <td scope="col">{{ $order->note }}</td>
                        <td scope="col">{{ $order->cancel_reson }}</td>
                        <td scope="col">
                            @if ($order->status === 0)
                                <span class="badge bg-warning p-2">Chờ xác nhận</span>
                            @elseif ($order->status === 1)
                                <span class="badge bg-warning p-2">Đã xác nhận và đang xử lý đơn hàng</span>
                            @elseif ($order->status === 2)
                                <span class="badge bg-primary p-2">Đang giao hàng</span>
                            @elseif ($order->status === 3)
                                <span class="badge bg-success p-2">Giao hàng thành công</span>
                            @elseif ($order->status === 4)
                                <span class="badge bg-danger p-2">Giao hàng không thành công</span>
                            @elseif ($order->status === 5)
                                <span class="badge bg-danger p-2">Hủy đơn</span>
                            @endif
                        </td>
                        <td scope="col">{{ $order->created_at }}</td>
                        <td scope="col">{{ $order->updated_at }}</td>
                        <td scope="col">
                            <a href="{{ route('admin.orders.showOrderDetail', $order->id) }}">
                                <button class="btn btn-primary">
                                    Chi tiết
                                </button>
                            </a>
                        </td>
                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.orders.editOrder', $order->id) }}" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <a href="{{ route('admin.orders.destroyOrder', $order->id) }}" class="link-danger fs-15"
                                    onclick="return confirm('Đơn hàng sẽ bị xóa và chuyển vào thùng rác , vẫn chấp nhận xóa ??? ')">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $orders->links() }}
    </div>
@endsection
