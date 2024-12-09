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
    <div class="mb-3 border p-2 border-success rounded bg-white">
        <h3 class="text-success mb-3">Chi tiết Bình luận</h3>
        <!-- Comment Details -->
        <div class="mb-3">
            <label><span class="fw-bold">Sản phẩm:</span>
                <a
                    href="{{ route('client.product-detail', $comment->product_id) }}">{{ $comment->product->name ?? 'No Product' }}</a>
            </label>
        </div>
        <div class="mb-3">
            <label><span class="fw-bold">Khách hàng:</span> {{ $comment->user->name ?? 'Anonymous' }}</label>
        </div>
        <div class="mb-3">
            <label><span class="fw-bold">Nội dung:</span> {{ $comment->content }}</label>
        </div>

        @if ($comment->img)
            <div class="mb-3">
                <label><span class="fw-bold">Ảnh:</span></label>
                <img src="{{ env('VIEW_IMG') }}/{{ $comment->img }}" alt="Image" width="100px" height="100px"
                    style="object-fit: cover">

            </div>
        @endif
    </div>
    @foreach ($replies as $reply)
        <h4 class="text-success">Phản hồi</h4>
        <div class="border rounded p-3 mb-3">
            <p><strong>Admin:</strong> {{ $reply->user->name ?? 'Anonymous' }}</p>
            <p><strong>Nội dung:</strong> {{ $reply->content }}</p>
            @if ($reply->img)
                <img src="{{ env('VIEW_IMG') }}/{{ $reply->img }}" alt="Image" width="100px" height="100px"
                    style="object-fit: cover">
            @endif
            <p class="mt-3"><small>Thời gian: {{ $reply->created_at->format('d-m-Y H:i:s') }}</small></p>
        </div>
    @endforeach

    <!-- Reply Form -->
    <h4 class="text-success">Trả lời Bình luận</h4>
    <form action="{{ route('admin.comments.store', $comment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung phản hồi</label>
            <textarea name="content" id="content" class="form-control" rows="4"></textarea>
        </div>

        <div class="my-2">
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Ảnh (Tùy chọn)</label>
            <input type="file" name="img" id="img" class="form-control" accept="image/*">
        </div>

        <div class="my-2">
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('admin.comments.comment') }}" class="btn btn-primary">Quay lại</a>
        <button type="submit" class="btn btn-success">Trả lời</button>
    </form>

@endsection
