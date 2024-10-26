@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Chi tiết đơn hàng -' . ($user->name))
@section('link')
<li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Danh sách đơn hàng</a></li>
<li class="breadcrumb-item active">Đơn hàng chi tiết</li>
@endsection
@section('content')
<div class="mb-3">
    <div class="progress progress-step-arrow">
        <p class="progress-bar " role="progressbar" style="width: 16.66%; margin-right: 10px;{{ $orders->status >= 0 ? '' : 'display:none' }} " aria-valuenow="0" aria-valuemin="0" aria-valuemax="6">Chờ xác nhận</p>
        @if ($orders->status != 5)
        <p class="progress-bar " role="progressbar" style="width: 16.66%; margin-right: 10px;{{ $orders->status >= 1 ? '' : 'display:none' }}" aria-valuenow="1" aria-valuemin="0" aria-valuemax="6">Đã xác nhận và đang xử lý</p>
        <p class="progress-bar " role="progressbar" style="width: 16.66%; margin-right: 10px;{{ $orders->status >= 2 ? '' : 'display:none' }}" aria-valuenow="2" aria-valuemin="0" aria-valuemax="6">Đang giao hàng</p>
        @if ($orders->status != 4)
        <p class="progress-bar " role="progressbar" style="width: 16.66%; margin-right: 10px;{{ $orders->status >= 3 ? '' : 'display:none' }}" aria-valuenow="3" aria-valuemin="0" aria-valuemax="6">Giao hàng thành công</p>
        @endif
        @if ($orders->status != 6)
        <p class="progress-bar " role="progressbar" style="width: 16.66%; margin-right: 10px;{{ $orders->status >= 4 ? '' : 'display:none' }}" aria-valuenow="4" aria-valuemin="0" aria-valuemax="6">Giao hàng không thành công</p>
        @endif
        <p class="progress-bar " role="progressbar" style="width: 16.66%; margin-right: 10px;{{ $orders->status >= 6 ? '' : 'display:none' }}" aria-valuenow="6" aria-valuemin="0" aria-valuemax="6">Đánh giá</p>
        @endif
        @if ($orders->status != 6)
        <p class="progress-bar " role="progressbar" style="width: 16.66%; margin-right: 10px;{{ $orders->status >= 5 ?  '' : 'display:none' }}" aria-valuenow="5" aria-valuemin="0" aria-valuemax="6">Hủy đơn</p>
        @endif
    </div>
</div>
<div class="mb-3 border p-2 border-success rounded bg-white">
    <h5 class="fs-1 text-uppercase">Chỉnh sửa trạng thái</h5>
    <div class="d-flex">
        @if ($orders->status <= 1)
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelOrderModal">
            Hủy đơn hàng
            </button>
            <form style="margin-right:10px ;" action="{{route('admin.orders.updateOrder', $orders->id)}}" id="updateStatusForm" method="post">
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
            <form style="margin-right:10px ;" action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm0">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
            </form>
            @break

            @case(1)
            <form style="margin-right:10px ;" action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm1">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="2">
                <button type="submit" class="btn btn-primary">Giao cho đơn vị vận chuyển</button>
            </form>
            @break

            @case(2)
            <form style="margin-right:10px ;" action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="4">
                <button type="submit" class="btn btn-danger">Giao không thành công</button>
            </form>
            <form style="margin-right:10px ;" action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="3">
                <button type="submit" class="btn btn-primary">Đã giao thành công</button>
            </form>
            @break

            @case(3)
            <form style="margin-right:10px ;" action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm3">
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
            <span class="badge bg-secondary p-2">Không thể thay đổi trạng thái</span>
            @endswitch

    </div>

</div>

<div class="mb-3 border p-2 border-success rounded bg-white ">
    <h5 class="fs-1 text-uppercase">Thông tin người nhận</h5>
    <div class="mt-5 row">
        <div class="col-lg-4">
            <p class="fs-7">Họ và tên : {{$user->name}}</p>
            <p class="fs-7">SĐT : {{$orders->phone}}</p>
        </div>
        <div class="col-lg-4">
            <p class="fs-7">Email : {{$orders->email}}</p>
            <p class="fs-7">Địa chỉ : {{$orders->address}}</p>
            <p class="fs-7">{{$orders->ward}} - {{$orders->district}} - {{$orders->province}}</p>
        </div>

    </div>
</div>
<div class="table-responsive mt-4 mt-xl-0">
    <table class="table table-striped table-nowrap align-middle mb-0 text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
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
@endsection