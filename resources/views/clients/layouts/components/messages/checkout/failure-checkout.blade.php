@extends('clients.layouts.components.messages.layouts.master')

@section('icon', 'bi bi-x-circle-fill text-danger')

@section('title', 'Đơn hàng thanh toán không thành công')

@section('color-title', 'color: red;')

@section('title-message', 'Đã có lỗi xảy ra')

@section('content-message', 'Đã xảy ra lỗi , vui lòng thử lại hoặc thử lại lần khác')

@section('link')
<a href="{{route('client.home')}}" class="btn btn-success mt-3">Tiếp tục mua sắm</a>
@endsection