<div class="container-fluid vegetable py-5">
    <div class="container py-5">
        <h1 class="mb-5">Sản phẩm Sale</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach($products as $product)
                <div class="card fruite-item w-100">
                    <!-- Sale Badge -->
                    @php
                    $salePercent = 0;
                    if ($product->status == 0) {
                    // Không có biến thể
                    if ($product->price_sale) {
                    $salePercent = round((($product->price_regular - $product->price_sale) / $product->price_regular) * 100);
                    }
                    } elseif ($product->status == 1) {
                    // Có biến thể
                    $variantGroup = $product->variantGroups->sortBy('price_sale')->first();
                    if ($variantGroup && $variantGroup->price_sale) {
                    $salePercent = round((($variantGroup->price_regular - $variantGroup->price_sale) / $variantGroup->price_regular) * 100);
                    }
                    }
                    @endphp

                    @if ($salePercent > 0)
                    <div class="sale-badge">
                        <span>-{{ $salePercent }}%</span>
                    </div>
                    @endif
                    <!-- Image -->
                    <div class="fruite-img">
                        <a href="{{ route('client.product-detail', $product->id) }}">
                            <img src="{{ $product->img && $product->img !== 'https://via.placeholder.com/300x200' ? env('VIEW_IMG') . '/' . $product->img : 'https://via.placeholder.com/300x200' }}"
                                class="card-img-top" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info card-body d-flex flex-column">
                        <!-- Product Title -->
                        <h5 class="card-title truncate-text-300">
                            <a href="{{ route('client.product-detail', $product->id) }}"
                                class="text-decoration-none text-dark">
                                {{ $product->name }}
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
                                    @if ($averageRating>= $i)
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
    </div>
</div>
<!-- Vesitable Shop End-->
<style>
/* Product Image Styling */
.vesitable-img img, .fruite-img img {
    width: 100%; /* Ensure image fills the width */
    height: 150px; /* Adjust height to your desired value */
    object-fit: cover; /* Ensure the image covers the space without distortion */
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}

/* For smaller screens */
@media (max-width: 768px) {
    .vesitable-img img, .fruite-img img {
        height: 120px; /* Reduce image height on mobile devices */
    }
}

/* Product Information Section */
.product-info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 15px; /* Padding to add space around content */
    height: 100%; /* Ensure content fills the remaining height */
}

/* Product title style */
.card-title a {
    font-size: 1.1rem;
    font-weight: 500;
    color: #000;
    text-decoration: none;
    margin-bottom: 10px;
    text-align: center; /* Center-align product titles */
}

.card-title a:hover {
    text-decoration: underline;
}


/* Limit description to 3 lines with ellipsis */
.card-text {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 15px;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Limit to 3 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Pricing style */
.pricing {
    margin-top: auto; /* Push pricing to the bottom */
    display: flex;
    flex-direction: column;
    align-items: center; /* Center-align pricing content */
}

.fw-bold.text-primary {
    font-size: 1.2rem;
    color: #007bff;
}

.text-muted {
    font-size: 0.9rem;
}

/* Ensure responsiveness on small screens */
@media (max-width: 768px) {
    .vesitable-img img {
        height: 150px; /* Smaller height for images on mobile */
    }

    .vesitable-item {
        height: 400px; /* Smaller height for product items on mobile */
    }

    .product-info {
        padding: 10px; /* Less padding on mobile */
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

  /* Sale Badge */
.sale-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #ff4d4f;
    color: #fff;
    padding: 4px 8px; /* Giảm kích thước padding */
    font-size: 0.8rem; /* Giảm kích thước font */
    font-weight: 600;
    border-radius: 25px; /* Điều chỉnh để badge nhỏ hơn */
    z-index: 10;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.sale-badge:hover {
    background-color: #ff1a1f;
    transform: scale(1.1);
}

.sale-badge span {
    font-size: 1rem; /* Giảm kích thước chữ */
    font-weight: 700;
    padding: 2px 5px;
}
        
</style>
  