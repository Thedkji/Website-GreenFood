@extends('admins.layouts.master')

@section('title', 'Thêm Bình Luận')

@section('start-page-title', 'Thêm Bình Luận')
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

<form action="{{ route('admin.comments.store', $id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="product_name" class="form-label">Sản phẩm</label>
        <input type="text" id="product_name" class="form-control" value="{{ $product->name }}" disabled>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Nội dung bình luận</label>
        <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Ảnh (Tùy chọn)</label>
        <input type="file" name="img" id="img" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Thêm bình luận</button>
    <a href="{{ route('admin.comments.comment') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection