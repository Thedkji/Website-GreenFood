@extends('clients.layouts.master')
@section('title', 'Chi tiết đơn hàng')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Chi tiết đơn hàng')
@section('content')
<div class="container my-5" id="billing-show">
    <h2 class="text-center my-4" style="font-family: 'Arial', sans-serif; color: #4CAF50;">Chi Tiết Đơn Hàng</h2>
    <div class="row">
        <div class="col-md-8">
            <h4 class="bg-primary text-white text-center py-2" style="border-radius: 8px;">Thông tin sản phẩm</h4>
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Voucher giảm giá</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetails as $detail)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $detail->product_img) }}" alt="" width="80" class="rounded-circle">
                        </td>
                        <td>{{ $detail->product_sku }}</td>
                        <td>{{ $detail->product_name }}</td>
                        <td>{{ number_format($detail->product_price) }} VNĐ</td>
                        <td>{{ $detail->product_quantity }}</td>
                        <td>{{ $detail->coupon_name }}</td>
                        <td>{{ number_format($detail->order->total) }} VNĐ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="col-md-4">
            <h4 class="bg-primary text-white text-center py-2" style="border-radius: 8px;">Thông tin đơn hàng</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Mã Đơn Hàng:</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Ngày Đặt:</th>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Tên Người Nhận:</th>
                        <td>{{ $order->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email Người Nhận:</th>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <th>Số Điện Thoại Người Nhận:</th>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <th>Địa Chỉ Người Nhận:</th>
                        <td>{{ $order->address }}</td>
                    </tr>
                    <tr>
                        <th>Ghi Chú:</th>
                        <td>{{ $order->notes ?? 'Không có' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn bg-primary text-white" style="padding: 12px 30px; font-size: 16px; border-radius: 8px;">Quay lại</a>
    </div>
</div>
@endsection
