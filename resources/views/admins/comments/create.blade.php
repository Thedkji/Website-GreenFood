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
        <label for="product_id" class="form-label">Sản phẩm</label>
        <select name="product_id" id="product_id" class="form-select" required>
            <option value="">Chọn sản phẩm</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Nội dung bình luận</label>
        <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Ảnh (Tùy chọn)</label>
        <input type="file" name="img" id="img" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="rating" class="form-label">Đánh giá sao</label>
        <div class="stars" id="star-rating">
            <span class="star" data-value="1">★</span>
            <span class="star" data-value="2">★</span>
            <span class="star" data-value="3">★</span>
            <span class="star" data-value="4">★</span>
            <span class="star" data-value="5">★</span>
        </div>
        <input type="hidden" name="rating" id="rating" required>
    </div>

    <button type="submit" class="btn btn-primary">Thêm bình luận</button>
    <a href="{{ route('admin.comments.comment') }}" class="btn btn-secondary">Hủy</a>
</form>

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating; // Set the hidden input value to the selected rating

                // Update star appearance based on selection
                stars.forEach(s => {
                    s.style.color = s.getAttribute('data-value') <= rating ? 'gold' : 'gray';
                });
            });
        });
    });
</script>
@endsection
@endsection