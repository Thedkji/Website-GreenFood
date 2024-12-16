<style>
    /* Đảm bảo rằng các thẻ sản phẩm chiếm toàn bộ chiều cao của cột */
    .fruite-item {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    /* Đặt chiều cao cố định cho hình ảnh sản phẩm và đảm bảo ảnh lấp đầy vùng chứa */
    .fruite-img img {
        width: 100%;
        height: 200px;
        /* Bạn có thể điều chỉnh chiều cao theo nhu cầu */
        object-fit: cover;
        border-top-left-radius: 0.25rem;
        /* Đảm bảo góc bo tròn khớp với thẻ */
        border-top-right-radius: 0.25rem;
    }

    /* Định dạng nội dung thẻ sản phẩm */
    .card-body {
        display: flex;
        flex-direction: column;
    }


    /* Định dạng phần tiêu đề sản phẩm */
    .card-title a {
        color: #000;
        text-decoration: none;
    }

    .card-title a:hover {
        text-decoration: underline;
    }

    /* Định dạng giá cả */
    .text-muted.text-decoration-line-through {
        margin-right: 10px;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    /* Định dạng đánh giá sao */
    .product-rating i {
        color: #ffc107;
        /* Màu vàng cho sao */
    }

    /* Định dạng phân trang */
    .pagination a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        margin: 0 5px;
        border: 1px solid #dee2e6;
        border-radius: 50%;
        color: #000;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
    }

    /* .pagination a:hover {
        background-color: #0d6efd;
        color: #fff;
    } */

    .pagination a.active {
        background-color: #81C408;
        color: #fff;
        pointer-events: none;
    }

    .pagination a.disabled {
        pointer-events: none;
        opacity: 0.6;
    }

    /* Responsive điều chỉnh */
    @media (max-width: 576px) {
        .fruite-img img {
            height: 150px;
        }
    }
</style>

<div class="col-lg-9">
    <div class="row g-4 justify-content-center" id="shop-product">

        @if ($products->count() > 0)

            @foreach ($products as $product)
                <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                    <div class="card fruite-item w-100">
                        <!-- Image -->
                        <div class="fruite-img">
                            <a href="{{ route('client.product-detail', $product->id) }}">
                                <img src="{{ $product->img && Storage::exists($product->img) ? env('VIEW_IMG') . '/' . $product->img : env('APP_URL') . '/clients/img/avatar-default.jpg' }}"
                                    class="card-img-top" alt="{{ $product->name }}">
                            </a>

                        </div>

                        <!-- Product Info -->
                        <div class="card-body d-flex flex-column">
                            <p class="card-text">
                                {!! Str::limit(strip_tags($product->description_short), 120, '...') !!}
                            </p>

                            <h5 class="card-title truncate-text-300">
                                <a href="{{ route('client.product-detail', $product->id) }}"
                                    class="text-decoration-none text-dark">
                                    {{ $product->name }}
                                </a>
                            </h5>

                            <!-- Pricing -->
                            <div class="mt-auto">
                                @if ($product->status == 0)
                                    <!-- Sản phẩm không có biến thể -->
                                    @if ($product->price_sale)
                                        <span class="text-muted text-decoration-line-through"
                                            style="font-size:14px; opacity:75%;">
                                            {{ app('formatPrice')($product->price_regular) }} VNĐ
                                        </span>
                                        <p class="fw-bold text-primary" style="font-size: 20px;">
                                            {{ app('formatPrice')($product->price_sale) }} VNĐ
                                        </p>
                                    @else
                                        <p class="fw-bold text-primary" style="font-size: 20px;">
                                            {{ app('formatPrice')($product->price_regular) }} VNĐ
                                        </p>
                                    @endif
                                @elseif ($product->status == 1)
                                    <!-- Sản phẩm có biến thể -->
                                    @php
                                        $variantGroup = $product->variantGroups->sortBy('price_sale')->first();
                                    @endphp

                                    @if ($variantGroup)
                                        @if ($variantGroup->price_sale)
                                            <span class="text-muted text-decoration-line-through"
                                                style="font-size:14px; opacity:75%;">
                                                {{ app('formatPrice')($variantGroup->price_regular) }} VNĐ
                                            </span>
                                            <p class="fw-bold text-primary" style="font-size: 20px;">
                                                {{ app('formatPrice')($variantGroup->price_sale) }} VNĐ
                                            </p>
                                        @else
                                            <p class="fw-bold text-primary" style="font-size: 20px;">
                                                {{ app('formatPrice')($variantGroup->price_regular) }} VNĐ
                                            </p>
                                        @endif
                                    @else
                                        <p class="fw-bold text-primary" style="font-size: 20px;">
                                            Giá liên hệ
                                        </p>
                                    @endif
                                @else
                                    <p class="fw-bold text-primary" style="font-size: 20px;">
                                        Giá liên hệ
                                    </p>
                                @endif
                            </div>

                            {{-- rate --}}
                            <div>
                                @php
                                    // Tính trung bình số sao
                                    $ratings = $product->comments->flatMap(function ($comment) {
                                        return $comment->rates;
                                    });

                                    $averageRating = $ratings->isEmpty() ? 0 : $ratings->avg('star');
                                @endphp
                                <div class="product-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($averageRating >= $i)
                                            <i class="fas fa-star filled-star"></i>
                                        @elseif ($averageRating > $i - 1)
                                            <i class="fas fa-star-half-alt filled-star"></i>
                                        @else
                                            <i class="fas fa-star empty-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="mt-5">
                <h3 class="text-primary text-center">Không tìm thấy sản phẩm nào</h3>
            </div>

        @endif

        <!-- Pagination -->
        @include('clients.shops.paginate')

    </div>
</div>
