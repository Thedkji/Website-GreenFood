@extends('clients.layouts.components.messages.layouts.master')

@section('icon', 'bi bi-check-circle-fill')

@section('title', 'Form Thông Báo Xác Nhận Email')

@section('color-title', 'color: #28a745;')

@section('title-message', 'Đơn hàng đã được đặt thành công ')

@section('content-message',
'Kiểm tra thông tin đơn hàng ở email đã đăng ký')
@section('link')
<a href="{{auth()->check() ? route('client.orders.details', ['id'=>session('order')->id]) : route('client.home') }}" class="btn btn-success mt-3">{{auth()->check() ? 'Chi tiết đơn hàng' : 'Tiếp tục mua hàng'}}</a>
@endsection