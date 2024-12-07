<div class="container-fluid vegetable py-5">
    <div class="container py-5">
        <h1 class="mb-5">Sản phẩm </h1>
        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
        <div class="owl-carousel vegetable-carousel justify-content-center">
            @foreach($products as $product)
            <div class="border border-primary rounded position-relative vesitable-item">
                <!-- Image Section -->
                <div class="vesitable-img">
                    <a href="{{ route('client.product-detail', $product->id) }}">
                        <img src="{{ $product->img && $product->img !== 'https://via.placeholder.com/300x200' ? env('VIEW_IMG') . '/' . $product->img : 'https://via.placeholder.com/300x200' }}"
                            class="card-img-top" alt="{{ $product->name }}">
                    </a>
                </div>


                <!-- Product Info -->
                <div class="product-info card-body d-flex flex-column">
                    <!-- Product Title -->
                    <h5 class="card-title">
                        <a href="{{ route('client.product-detail', $product->id) }}" class="text-decoration-none text-dark">
                            {{ Str::limit(strip_tags($product->name), 150, '...') }}
                        </a>
                    </h5>

                    <!-- Short Description -->
                    <p class="card-text">
                        {!! Str::limit(strip_tags($product->description_short), 150, '...') !!}
                    </p>

                    <!-- Pricing -->
                    <div class="pricing mt-auto">
                        @if ($product->status == 0)
                        <!-- Sản phẩm không có biến thể -->
                        @if ($product->price_sale)
                        <span class="text-muted text-decoration-line-through">
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
                        <span class="text-muted text-decoration-line-through" style="font-size:14px; opacity:75%;">
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
            @endforeach
            </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        </div>
    </div>
</div>
<!-- Vesitable Shop End-->

<style>
    /* Sắp xếp các thành phần trong thẻ sản phẩm hợp lý hơn */
    .vesitable-item {
        display: flex;
        flex-direction: column;
        height: 450px;
        /* Cố định chiều cao */
        margin-bottom: 20px;
        /* Giảm khoảng cách dưới mỗi sản phẩm */
        overflow: hidden;
        /* Ẩn các phần tử tràn ra ngoài */
        border-radius: 8px;
    }

    /* Phần hình ảnh sản phẩm */
    .vesitable-img {
        position: relative;
        overflow: hidden;
    }

    .vesitable-img img {
        width: 100%;
        height: 250px;
        /* Giữ chiều cao cố định cho ảnh */
        object-fit: cover;
        /* Đảm bảo ảnh không bị méo */
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }

    /* Phần nhãn danh mục */
    .category-label {
        top: 10px;
        right: 10px;
        font-size: 0.9rem;
        background-color: #007bff;
        border-radius: 5px;
    }

    /* Phần thông tin sản phẩm */
    .product-info {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
        /* Padding để tạo khoảng cách giữa các thành phần */
        height: 100%;
        /* Làm cho phần thông tin chiếm hết chiều cao còn lại */
    }

    /* Tiêu đề sản phẩm */
    .card-title a {
        font-size: 1.1rem;
        font-weight: 500;
        color: #000;
        text-decoration: none;
        margin-bottom: 10px;
    }

    .card-title a:hover {
        text-decoration: underline;
    }

    /* Mô tả ngắn gọn sản phẩm */
    .card-text {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 15px;
    }

    /* Phần giá sản phẩm */
    .pricing {
        margin-top: auto;
        /* Đẩy phần giá xuống dưới */
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .fw-bold.text-primary {
        font-size: 1.2rem;
        color: #007bff;
    }

    .owl-carousel .owl-nav {
        display: none;
    }

    .text-muted {
        font-size: 0.9rem;
    }

    /* Điều chỉnh responsive */
    @media (max-width: 768px) {
        .vesitable-img img {
            height: 200px;
            /* Giảm chiều cao ảnh cho màn hình nhỏ */
        }

        .vesitable-item {
            height: 500px;
            /* Giảm chiều cao tổng thể sản phẩm cho thiết bị di động */
        }

        .product-info {
            padding: 10px;
            /* Giảm padding trên các thiết bị nhỏ */
        }
    }
    .service-img-wrapper {
    height: 300px;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
}

.service-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.service-item {
    position: relative;
}

.service-item .service-content {
    background-color: #f8f9fa;
}
</style>