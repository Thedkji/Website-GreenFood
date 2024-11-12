@extends('admins.layouts.master')

@section('title', 'Chi tiết Bình Luận')

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

<h4>Chi tiết Bình luận</h4>

<!-- Comment Details -->
<div class="mb-3">
    <label>Sản phẩm:</label>
    <p>{{ $comment->product->name }}</p>
</div>
<div class="mb-3">
    <label>Khách hàng:</label>
    <p>{{ $comment->user->name ?? 'Anonymous' }}</p>
</div>
<div class="mb-3">
    <label>Nội dung:</label>
    <p>{{ $comment->content }}</p>
</div>

@if($comment->img)
    <div class="mb-3">
        <label>Ảnh:</label>
        <img src="{{ asset('storage/' . $comment->img) }}" alt="Image" width="150">
    </div>
@endif

<h5>Phản hồi</h5>
@foreach ($replies as $reply)
    <div class="border rounded p-3 mb-3">
        <p><strong>Khách hàng:</strong> {{ $reply->user->name ?? 'Anonymous' }}</p>
        <p><strong>Nội dung:</strong> {{ $reply->content }}</p>
        @if($reply->img)
            <img src="{{ asset('storage/' . $reply->img) }}" alt="Image" width="100">
        @endif
        <p><small>Thời gian: {{ $reply->created_at }}</small></p>
    </div>
@endforeach

<!-- Reply Form -->
<h5>Trả lời Bình luận</h5>
<form action="{{ route('admin.comments.store', $comment->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="content" class="form-label">Nội dung phản hồi</label>
        <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Ảnh (Tùy chọn)</label>
        <input type="file" name="img" id="img" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Trả lời</button>
    <a href="{{ route('admin.comments.comment') }}" class="btn btn-secondary">Quay lại</a>
</form>

@endsection