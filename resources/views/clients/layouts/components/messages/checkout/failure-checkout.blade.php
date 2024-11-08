@extends('clients.layouts.components.messages.layouts.master')

@section('icon', 'bi bi-x-circle-fill text-danger')

@section('title', 'Form Thông Báo Xác Nhận Email')

@section('color-title', 'color: red;')

@section('title-message', 'Gửi Email Không Thành Công')

@section('content-message', 'Đã xảy ra lỗi , vui lòng thử lại hoặc thử lại lần khác')

@section('link')
    <a href="{{ url()->previous() }}" class="btn btn-success mt-3">Quay lại</a>
@endsection
