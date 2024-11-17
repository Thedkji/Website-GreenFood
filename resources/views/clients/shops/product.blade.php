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

        @foreach ($products as $product)
            <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                <div class="card fruite-item w-100">
                    <!-- Image -->
                    <div class="fruite-img">
                        @if ($product->img && $product->img !== 'https://via.placeholder.com/300x200')
                            <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top"
                                alt="{{ $product->name }}">
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="card-body  d-flex flex-column">
                        <p class="card-text ">
                            {!! Str::limit(strip_tags($product->description_short), 150, '...') !!}
                        </p>

                        <h5 class="card-title ">
                            <a href="{{ route('client.product-detail', $product->id) }}"
                                class="text-decoration-none text-dark">
                                {{ Str::limit(strip_tags($product->name), 150, '...') }}
                            </a>
                        </h5>

                        <!-- Pricing -->
                        <div class="mt-auto">
                            @if ($product->status == 0)
                                <span class="text-muted text-decoration-line-through"
                                    style="font-size:14px;opacity: 75%;">
                                    {{ app('formatPrice')($product->price_regular) }} VNĐ
                                </span>
                                <p class="fw-bold text-danger" style="font-size: 20px;">
                                    {{ app('formatPrice')($product->price_sale) }} VNĐ
                                </p>
                            @elseif ($product->status == 1)
                                @php
                                    $variant = $product->variantGroups
                                        ->whereNotNull('price_sale')
                                        ->sortBy('price_sale')
                                        ->first();
                                @endphp

                                @if ($variant)
                                    <span class="text-muted text-decoration-line-through"
                                        style="font-size:14px;opacity: 75%;">
                                        {{ app('formatPrice')($variant->price_regular) }} VNĐ
                                    </span>
                                    <p class="fw-bold text-danger" style="font-size: 20px;">
                                        {{ app('formatPrice')($variant->price_sale) }} VNĐ
                                    </p>
                                @endif
                            @endif

                            <!-- Ratings -->
                            {{-- <div class="product-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i
                                        class="fa fa-star {{ $i <= $product->max_star ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                {{-- Nút quay về đầu --}}
                <a href="{{ $products->url(1) }}" class="rounded {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <i class="fas fa-angle-double-left"></i>
                </a>

                {{-- Nút phân trang trước --}}
                <a href="{{ $products->previousPageUrl() }}"
                    class="rounded {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <i class="fas fa-chevron-left"></i>
                </a>

                {{-- Hiển thị các trang --}}
                @php
                    $currentPage = $products->currentPage();
                    $lastPage = $products->lastPage();
                    $pageLimit = 5;
                    $startPage = max($currentPage - 2, 1); // Giới hạn số trang hiển thị phía trước
                    $endPage = min($currentPage + 2, $lastPage); // Giới hạn số trang hiển thị phía sau
                @endphp

                {{-- Các trang --}}
                @for ($i = $startPage; $i <= $endPage; $i++)
                    <a href="{{ $products->url($i) }}" class="rounded {{ $i == $currentPage ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                @endfor

                {{-- Nút phân trang tiếp theo --}}
                <a href="{{ $products->nextPageUrl() }}"
                    class="rounded {{ $products->hasMorePages() ? '' : 'disabled' }}">
                    <i class="fas fa-chevron-right"></i>
                </a>

                {{-- Nút quay về cuối --}}
                <a href="{{ $products->url($lastPage) }}"
                    class="rounded {{ $products->onLastPage() ? 'disabled' : '' }}">
                    <i class="fas fa-angle-double-right"></i>
                </a>
            </div>
        </div>

    </div>
</div>
