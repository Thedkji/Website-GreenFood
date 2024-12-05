@extends('admins.layouts.master')

@section('title', 'Supplier | Sửa nhà cung cấp')

@section('start-page-title', 'Sửa nhà cung cấp')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.suppliers.index') }}">Nhà cung cấp</a></li>
    <li class="breadcrumb-item active">Sửa nhà cung cấp</li>
@endsection

@section('content')
    <div class="toast-container">
        @if (session('success'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Thông báo</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white text-dark">
                    {{ session('success') }}
                </div>
                <div class="toast-progress bg-success"></div>
            </div>
        @endif

        @if (session('error'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastError">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Lỗi</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white text-dark">
                    {{ session('error') }}
                </div>
                <div class="toast-progress bg-danger"></div>
            </div>
        @endif
    </div>
    <form class="w-50" action="{{ route('admin.suppliers.update', $supplier) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Tên nhà cung cấp</label>
            <input type="text" class="form-control" id="" name="name"
                value="{{ old('name', $supplier->name) }}" placeholder="Nhập tên nhà cung cấp">
        </div>

        <div class="text-danger my-3">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email', $supplier->email) }}"
                placeholder="Nhập email">
        </div>

        <div class="text-danger my-3">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $supplier->phone) }}"
                placeholder="Nhập số điện thoại">
        </div>

        <div class="text-danger my-3">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="validationCustom03" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="{{ old('address', $supplier->address) }}"
                placeholder="Nhập địa chỉ">
        </div>

        <div class="text-danger my-3">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>

        <div class="col-12 mb-3">
            <button class="btn btn-primary">
                <a href="{{ route('admin.suppliers.index') }}" class="text-white">Quay lại</a>
            </button>
        </div>
    </form>

    @include('admins.layouts.components.toast')

@endsection
