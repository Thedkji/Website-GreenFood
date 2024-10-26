@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Danh sách đơn hàng')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
@endsection
@section('content')

<form action="{{ route('admin.orders.showOder') }}" id="search-form" method="GET" class="row mb-3 d-flex flex-row-reverse">
    <div class="col-sm">
        <div class="search-box">
            <input name="search" type="text" class="form-control search" value="{{ request()->input('search') }}" placeholder="Nhập tìm kiếm" oninput="debounceSearch()">
            <i class="ri-search-line search-icon"></i>
        </div>
    </div>
    <div class="col-sm">
        <select id="statusFilter" name="statusFilter" class="form-select" onchange="this.form.submit()">
            <option value="">Tất cả trạng thái</option>
            <option value="0" {{ request('statusFilter') === '0' ? 'selected' : '' }}>Chờ xác nhận</option>
            <option value="1" {{ request('statusFilter') === '1' ? 'selected' : '' }}>Đã xác nhận và đang xử lý đơn hàng</option>
            <option value="2" {{ request('statusFilter') === '2' ? 'selected' : '' }}>Đang giao hàng</option>
            <option value="3" {{ request('statusFilter') === '3' ? 'selected' : '' }}>Giao hàng thành công</option>
            <option value="4" {{ request('statusFilter') === '4' ? 'selected' : '' }}>Giao hàng không thành công</option>
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
        <table class="table table-striped align-middle mb-0 text-center">
            <thead>
                <tr>

                    <th scope="col">@sortablelink('user_id','Tên người dùng')</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">@sortablelink('total','Tổng hóa đơn')</th>
                    <th scope="col">@sortablelink('status','Trạng thái')</th>
                    <th scope="col">@sortablelink('created_at','Ngày tạo')</th>
                    <th scope="col">@sortablelink('updated_at','Ngày cập nhật')</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($orders) && $orders->isNotEmpty())
                @foreach ($orders as $order)
                <tr>
                    <td scope="col">{{ $order->user->name }}</td>
                    <td scope="col">{{ $order->address }}</td>
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
                        @default
                        <span class="badge bg-secondary p-2">Không xác định</span>
                        @endswitch
                    </td>
                    <td scope="col">{{ $order->created_at }}</td>
                    <td scope="col">{{ $order->updated_at }}</td>
                    <td>
                        <div class=" gap-3 flex-wrap">
                            <a href="{{ route('admin.orders.showOrderDetail', $order->id) }}"><i class="fa-regular fa-eye"></i></a>
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

<script>
    let debounceTimeout;

    function debounceSearch() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            document.getElementById("search-form").submit();
        }, 600);
    }
