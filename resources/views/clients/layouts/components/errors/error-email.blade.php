@extends('clients.layouts.components.errors.layouts.master')

@section('title', '500 - Lỗi máy chủ nội bộ')

@section('status-err', '500')

@section('title-err', 'Lỗi Máy Chủ Nội Bộ')

@section('content-err', 'Lỗi, đã xảy ra sự cố trên máy chủ của chúng tôi. Vui lòng thử lại sau.')
@section('link')
    <a href="{{ route('client.register') }}" class="btn btn-success mt-3">Quay lại trang đăng ký</a>
@endsection
