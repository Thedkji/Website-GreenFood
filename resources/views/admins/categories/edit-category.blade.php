@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục sản phẩm')
@section('start-page-title', 'Sửa danh mục sản phẩm')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active">Sửa danh mục sản phẩm</li>
@endsection
@section('content')

    <div class="w-50">
        <div>
            <label for="" class="form-label">Tên danh mục</label>
            <input class="form-control" id="choices-text-remove-button" data-choices="" data-choices-limit="3"
                data-choices-removeitem="" type="text" value="" placeholder="Nhập tên danh mục">
        </div>

        <div class="my-3">
            <label for="" class="form-label">Chọn danh mục cha</label>
            <div class="">
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected="">Select your Status </option>
                    <option value="1">Declined Payment</option>
                    <option value="2">Delivery Error</option>
                    <option value="3">Wrong Amount</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary">Sửa</button>
    </div>


    {{-- <div class="mt-3">
        {{ $orders->links() }}
    </div> --}}
@endsection
