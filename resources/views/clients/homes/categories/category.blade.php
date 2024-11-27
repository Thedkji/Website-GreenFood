<div class="container-fluid service py-5">
    <div class="container py-5">
        <h1 class="mb-5">Fresh Organic Vegetables</h1>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-success rounded border border-success">
                        <img src="{{ env('VIEW_CLIENT') }}/img/featur-1.jpg" class=" img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-primary text-center p-4 rounded">
                                <h5 class="text-white">Fresh Apples</h5>
                                <h3 class="mb-0">20% OFF</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-dark rounded border border-dark">
                        <img src="{{ env('VIEW_CLIENT') }}/img/featur-2.jpg" class=" img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">Tasty Fruits</h5>
                                <h3 class="mb-0">Free delivery</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-primary rounded border border-primary">
                        <img src="{{ env('VIEW_CLIENT') }}/img/featur-3.jpg" class=" img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-success text-center p-4 rounded">
                                <h5 class="text-white">Exotic Vegitable</h5>
                                <h3 class="mb-0 text-primary">Discount 30$</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Vesitable Shop Start-->
<div class="container-fluid vegetable py-5">
    <div class="container py-5">
        <h1 class="mb-5">Sản phẩm bán chạy</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            @foreach($bestSellingProducts as $product)
            <div class="border border-primary rounded position-relative vesitable-item">
                <!-- Image Section -->
                <div class="vesitable-img">
                    <a href="{{ route('client.product-detail', $product->id) }}">
                        <img src="{{ $product->img && $product->img !== 'https://via.placeholder.com/300x200' ? env('VIEW_IMG') . '/' . $product->img : 'https://via.placeholder.com/300x200' }}"
                            class="card-img-top" alt="{{ $product->name }}">
                    </a>
                </div>
                
                <!-- Category Label -->
                <div class="category-label text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
                    {{ $product->categories->first()->name ?? 'Sản phẩm' }}
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
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Vesitable Shop End-->

<style>
   /* Sắp xếp các thành phần trong thẻ sản phẩm hợp lý hơn */
.vesitable-item {
    display: flex;
    flex-direction: column;
    height: 450px; /* Cố định chiều cao */
    margin-bottom: 20px; /* Giảm khoảng cách dưới mỗi sản phẩm */
    overflow: hidden; /* Ẩn các phần tử tràn ra ngoài */
    border-radius: 8px;
}

/* Phần hình ảnh sản phẩm */
.vesitable-img {
    position: relative;
    overflow: hidden;
}

.vesitable-img img {
    width: 100%;
    height: 250px; /* Giữ chiều cao cố định cho ảnh */
    object-fit: cover; /* Đảm bảo ảnh không bị méo */
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
    padding: 15px; /* Padding để tạo khoảng cách giữa các thành phần */
    height: 100%; /* Làm cho phần thông tin chiếm hết chiều cao còn lại */
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
    margin-top: auto; /* Đẩy phần giá xuống dưới */
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
        height: 200px; /* Giảm chiều cao ảnh cho màn hình nhỏ */
    }

    .vesitable-item {
        height: 500px; /* Giảm chiều cao tổng thể sản phẩm cho thiết bị di động */
    }

    .product-info {
        padding: 10px; /* Giảm padding trên các thiết bị nhỏ */
    }
}

</style>
