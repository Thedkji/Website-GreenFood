@extends('admins.layouts.master')

@section('title', 'Supplier | Sửa nhà cung cấp')

@section('start-page-title', 'Sửa nhà cung cấp')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.suppliers.index') }}">Nhà cung cấp</a></li>
    <li class="breadcrumb-item active">Sửa nhà cung cấp</li>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
    <form class="" action="{{ route('admin.suppliers.update', $supplier) }}" method="post"
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
            <button class="btn btn-secondary" type="submit">Cập nhật</button>
        </div>
    </form>
@endsection
