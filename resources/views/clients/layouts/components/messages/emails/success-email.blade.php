@extends('clients.layouts.components.messages.layouts.master')

@section('icon', 'bi bi-check-circle-fill')

@section('title', 'Form Thông Báo Xác Nhận Email')

@section('color-title', 'color: #28a745;')

@section('title-message', 'Chúng tôi đã gửi xác nhận về email !')

@section('content-message',
    'Chúng tôi đã gửi email tới hòm thư của bạn , bạn vui lòng kiểm tra email để xác
    nhận')

@section('link')
    <a href="https://mail.google.com/" class="btn btn-success mt-3">Truy cập email</a>
@endsection
