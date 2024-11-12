@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục sản phẩm')
@section('start-page-title', 'Thêm danh mục sản phẩm')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active">Thêm danh mục sản phẩm</li>
@endsection
@section('content')

    <div>
        @session('success')
            <p class="alert alert-success">
                {{ session('success') }}
            </p>
        @endsession
    </div>

    <div class="w-50">
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div>
                <label for="" class="form-label">Tên danh mục</label>
                <input class="form-control" id="choices-text-remove-button" data-choices="" data-choices-limit="3"
                    data-choices-removeitem="" type="text" value="{{ old('name') }}" placeholder="Nhập tên danh mục"
                    name="name">
            </div>

            <div class="my-3">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-3">
                <label for="" class="form-label">Chọn danh mục cha</label>
                <div class="">
                    <select class="form-select mb-3" aria-label="Default select example" name="parent_id">
                        <option selected="" value="">Chọn danh mục cha</option>
                        @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn btn-primary">Thêm mới</button>
        </form>
    </div>


    {{-- <div class="mt-3">
        {{ $orders->links() }}
    </div> --}}
@endsection
