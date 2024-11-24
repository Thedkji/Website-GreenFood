<div class="container-fluid py-5">
    <div class="container py-5 fruite">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Sản Phẩm Nổi Bât</h1>
            <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which  
                looks reasonable.</p>
        </div>
        <div class="row product-grid">
            @foreach ($productHot as $product)
            <div class="product-card">
                <a href="{{ route('client.product-detail', $product->id) }}" class="text-decoration-none text-dark">
                    <div class="product-card-content">
                        <!-- Product Image -->
                        <div class="product-img-container">
                            @if ($product->img)
                            <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt="{{ $product->name }}" class="product-img">
                            @else
                            <img src="{{ env('VIEW_IMG') }}/default-image.png" alt="{{ $product->name }}" class="product-img">
                            @endif
                        </div>
                        <!-- Product Info -->
                        <div class="product-info">
                            <h6 class="product-name">
                                {{ $product->name }}
                                @if ($product->variantGroups->isNotEmpty() && $product->status == 1)
                                @php
                                    $variant = $product->variantGroups
                                        ->whereNotNull('price_sale')
                                        ->sortBy('price_sale')
                                        ->first();
                                @endphp
                                @if ($variant)
                                - {{ $variant->name }}
                                @endif
                                @endif
                            </h6>
                            <div class="product-pricing">
                                @if ($product->status == 0)
                                    @if ($product->price_regular)
                                    <div class="price-regular">{{ number_format($product->price_regular, 0) }} VNĐ</div>
                                    @endif
                                    @if ($product->price_sale)
                                    <div class="price-sale">{{ number_format($product->price_sale, 0) }} VNĐ</div>
                                    @endif
                                @elseif ($product->status == 1 && isset($variant))
                                    @if ($variant->price_regular)
                                    <div class="price-regular">{{ number_format($variant->price_regular, 0) }} VNĐ</div>
                                    @endif
                                    @if ($variant->price_sale)
                                    <div class="price-sale">{{ number_format($variant->price_sale, 0) }} VNĐ</div>
                                    @endif
                                @endif
                            </div>
                            <div class="product-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star {{ $i <= $product->max_star ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
/* Product Card */
.product-card {
    flex: 0 0 calc(33.333% - 20px); /* 3 sản phẩm mỗi hàng */
    max-width: calc(33.333% - 20px);
    box-sizing: border-box;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 12px;
    overflow: hidden;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    margin-bottom: 15px; /* Khoảng cách giữa các thẻ */
    max-height: 150px; /* Giới hạn chiều cao của thẻ */
    padding: 10px; /* Giảm khoảng cách bên trong thẻ */
}

.product-card:hover {
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

/* Flex Layout for Image and Content */
.product-card-content {
    display: flex;
    align-items: center;
    gap: 10px; /* Khoảng cách giữa ảnh và nội dung */
}

/* Product Image */
.product-img-container {
    flex: 0 0 80px; /* Kích thước ảnh nhỏ hơn */
    height: 80px;
    overflow: hidden;
    border-radius: 50%;
    border: 2px solid #e0e0e0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

/* Product Info */
.product-info {
    flex: 1;
    display: flex;
    flex-direction: column; /* Căn dọc nội dung */
    justify-content: space-between; /* Cân đối nội dung trong thẻ */
}

.product-name {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 5px; /* Giảm khoảng cách giữa các dòng */
    color: #333;
    white-space: nowrap; /* Tránh tràn văn bản */
    overflow: hidden;
    text-overflow: ellipsis; /* Hiển thị dấu "..." nếu tên quá dài */
}

/* Product Pricing */
.product-pricing {
    display: flex;
    flex-direction: column; /* Giá gốc và giá sale theo chiều dọc */
    gap: 3px; /* Khoảng cách giữa giá gốc và giá sale */
}

.price-regular {
    text-decoration: line-through;
    color: #999;
    font-size: 12px;
}

.price-sale {
    color: #e74c3c;
    font-weight: bold;
    font-size: 14px;
}

/* Product Rating */
.product-rating i {
    color: #f1c40f;
    margin-right: 2px;
}

.product-rating i.text-secondary {
    color: #ddd;
}

/* Spacing Between Cards */
.row.product-grid {
    gap: 15px; /* Tạo khoảng cách ngang giữa các thẻ */
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .product-card {
        flex: 0 0 calc(50% - 15px); /* 2 sản phẩm mỗi hàng */
        max-width: calc(50% - 15px);
    }
}

@media (max-width: 576px) {
    .product-card {
        flex: 0 0 100%; /* 1 sản phẩm mỗi hàng */
        max-width: 100%;
    }

    .product-card-content {
        flex-direction: row; /* Ảnh bên trái, nội dung bên phải */
    }

    .product-img-container {
        margin-bottom: 0;
    }
}
</style>