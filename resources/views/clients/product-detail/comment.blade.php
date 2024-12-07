@foreach ($product->comments()->where('parent_user_id', null)->paginate(3) as $comment)
    <div class="card mb-4 shadow-sm p-3 border-0">
        <div class="d-flex">
            {{-- Avatar người bình luận --}}
            @if ($comment->user)
                <img src="{{ env('VIEW_IMG') }}/{{ $comment->user->avatar }}" class="rounded-circle me-3 border"
                    style="width: 60px; height: 60px; object-fit: cover;" alt="Avatar">
            @endif


            <div class="flex-grow-1">
                {{-- Tên người bình luận và thời gian --}}
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-1 text-primary">{{ $comment->user->name ?? 'Unknown' }}</h5>
                    <small class="text-muted">
                        {{ $comment->updated_at->format('d-m-Y') }} lúc {{ $comment->updated_at->format('H:i') }}
                        @if ($comment->created_at != $comment->updated_at)
                            <span class="text-info">(Chỉnh sửa)</span>
                        @endif
                    </small>
                </div>

                {{-- Nội dung bình luận --}}
                <div class="mt-2">
                    <strong class="text-secondary">Nội dung:</strong>
                    <p class="mb-1">{{ $comment->content }}</p>
                </div>
                
                {{-- Hiển thị sao đánh giá --}}
                @if ($comment->rates->count() > 0)
                    <div class="mt-2">
                        <strong class="text-dark">Đánh giá:

                            @foreach ($comment->rates as $rate)
                                {{-- Hiển thị sao cho mỗi đánh giá --}}
                                @for ($i = 1; $i <= $rate->star; $i++)
                                    {{-- Sử dụng trường 'star' --}}
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                            @endforeach

                        </strong>
                    </div>
                @endif

                {{-- Hình ảnh đính kèm (nếu có) --}}
                @if ($comment->img)
                    <div class="mt-2">
                        <img src="{{ env('VIEW_IMG') }}/{{ $comment->img }}" alt="Image" class="rounded border"
                            style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                @endif

                {{-- Hiển thị các trả lời --}}
                @php
                    $replies = $product
                        ->comments()
                        ->where('parent_user_id', $comment->id)
                        ->get();
                @endphp

                @if ($replies->count() > 0)
                    <div class="mt-3 ps-3 border-start">
                        <h6 class="fw-bold text-secondary">Phản hồi:</h6>
                        @foreach ($replies as $rep)
                            <div class="d-flex mt-3 bg-light p-2 rounded-3 shadow-sm">
                                {{-- Avatar người trả lời --}}
                                @if ($rep->user)
                                    <img src="{{ env('VIEW_IMG') }}/{{ $rep->user->avatar }}"
                                        class="rounded-circle me-2 border"
                                        style="width: 50px; height: 50px; object-fit: cover;" alt="Avatar">
                                @endif

                                <div class="flex-grow-1">
                                    {{-- Tên người trả lời --}}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-1 text-dark">
                                            {{ $rep->user->name ?? 'Unknown' }}
                                            @if ($rep->user->is_admin)
                                                <span class="badge bg-success">Admin</span>
                                            @endif
                                        </h6>
                                        <small class="text-muted">
                                            {{ $rep->updated_at->format('d-m-Y') }} lúc
                                            {{ $rep->updated_at->format('H:i') }}
                                            @if ($rep->created_at != $rep->updated_at)
                                                <span class="text-info">(Chỉnh sửa)</span>
                                            @endif
                                        </small>
                                    </div>

                                    {{-- Nội dung trả lời --}}
                                    <div class="mt-1">
                                        <strong class="text-secondary">Nội dung:</strong>
                                        <p class="mb-1">{{ $rep->content }}</p>
                                    </div>

                                    {{-- Hình ảnh trong trả lời (nếu có) --}}
                                    @if ($rep->img)
                                        <div class="mt-2">
                                            <img src="{{ env('VIEW_IMG') }}/{{ $rep->img }}" alt="Image"
                                                class="rounded border"
                                                style="width: 80px; height: 80px; object-fit: cover;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach

<div>
    {{ $product->comments()->where('parent_user_id', null)->paginate(2)->appends(request()->query())->links() }}
</div>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        position: relative;
        display: block;
        padding: 8px 13px;
        /* Tăng padding để làm nút lớn hơn */
        color: #81C408;
        /* Đổi màu chữ */
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        font-size: 16px;
        /* Tăng kích thước chữ hoặc icon */
    }

    .pagination li a:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .pagination .active span {
        color: #fff;
        background-color: #81C408;
        /* Đổi màu nền nút active */
        border-color: #81C408;
    }

    .pagination .disabled span {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
</style>