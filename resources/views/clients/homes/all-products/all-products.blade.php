<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Sản Phẩm Nổi Bật</h1>
                </div>
                <div class="tab-content">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            @foreach ($products as $product)
                            <div class="col-12 col-md-6 col-lg-3 d-flex">
                                <div class="card fruite-item w-100">
                                    <!-- Image -->
                                    <div class="fruite-img">
                                        <a href="{{ route('client.product-detail', $product->id) }}">
                                            <img src="{{ $product->img && $product->img !== 'https://via.placeholder.com/300x200' ? env('VIEW_IMG') . '/' . $product->img : 'https://via.placeholder.com/300x200' }}"
                                                class="card-img-top" alt="{{ $product->name }}">
                                        </a>
                                    </div>

                                    <!-- Product Info -->
                                    <div class="card-body d-flex flex-column">
                                        <p class="card-text">
                                            {!! Str::limit(strip_tags($product->description_short), 150, '...') !!}
                                        </p>

                                        <h5 class="card-title">
                                            <a href="{{ route('client.product-detail', $product->id) }}"
                                                class="text-decoration-none text-dark">
                                                {{ Str::limit(strip_tags($product->name), 150, '...') }}
                                            </a>
                                        </h5>

                                        <!-- Pricing -->
                                        <div class="mt-auto">
                                            @if ($product->status == 0)
                                            <!-- Sản phẩm không có biến thể -->
                                            @if ($product->price_sale)
                                            <span class="text-muted text-decoration-line-through"
                                              >
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

<style>
    /* Đảm bảo thẻ sản phẩm nhỏ gọn hơn */
    .fruite-item {
        display: flex;
        flex-direction: column;
        height: auto;
        /* Chiều cao tự động để nhỏ gọn hơn */
    }

    /* Giảm chiều cao hình ảnh sản phẩm */
    .fruite-img img {
        width: 100%;
        height: 170px;
        /* Giảm chiều cao từ 200px xuống 150px */
        object-fit: cover;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }

    /* Giảm khoảng cách giữa các phần tử trong thẻ */
    .card-body {
        display: flex;
        flex-direction: column;
        padding: 0.75rem;
        /* Giảm khoảng cách padding */
    }

    /* Tiêu đề sản phẩm */
    .card-title a {
        font-size: 1rem;
        /* Giảm kích thước chữ */
        color: #000;
        text-decoration: none;
    }

    .card-title a:hover {
        text-decoration: underline;
    }


    .fw-bold.text-primary {
        font-size: 1.2rem;
        /* Giảm kích thước chữ giá */
    }

    /* Responsive điều chỉnh */
    @media (max-width: 768px) {
        .fruite-img img {
            height: 120px;
            /* Giảm chiều cao hình ảnh hơn nữa trên màn hình nhỏ */
        }
    }
</style>