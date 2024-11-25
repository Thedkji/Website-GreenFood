<div class="row g-4 fruite">
    <div class="col-lg-12">
        <h4 class="mb-4">Sản phẩm nổi bật</h4>
        @foreach ($productHot as $product)
            <a href="{{ route('client.product-detail', $product->id) }}" class="text-decoration-none text-dark">
                <div class="product-card mb-4" style="width:275px">
                    <!-- Image -->
                    <div class="product-img-container">
                        @if ($product->img)
                            <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt="{{ $product->name }}"
                                class="product-img">
                        @else
                            <img src="{{ env('VIEW_IMG') }}/default-image.png" alt="{{ $product->name }}"
                                class="product-img">
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="product-info">
                        <h6 class="product-name truncate-text-120">
                            {{ $product->name }}
                            @if ($product->variantGroups->isNotEmpty() && $product->status == 1)
                                @php
                                    // Lấy biến thể có giá sale thấp nhất
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

                        <!-- Pricing -->
                        <div class="product-pricing">
                            @if ($product->status == 0)
                                <!-- Nếu không có biến thể, lấy giá từ bảng product -->
                                @if ($product->price_regular)
                                    <span class="price-regular" style="font-size: 13px">{{ number_format($product->price_regular, 0) }}
                                        VNĐ</span>
                                @endif

                                @if ($product->price_sale)
                                    <span
                                        class="price-sale text-primary" style="font-size: 18px">{{ number_format($product->price_sale, 0) }}
                                        VNĐ</span>
                                @endif
                            @elseif ($product->status == 1 && isset($variant))
                                <!-- Nếu có biến thể, lấy giá sale và regular từ variant -->
                                @if ($variant->price_regular)
                                    <span class="price-regular" style="font-size: 13px">{{ number_format($variant->price_regular, 0) }}
                                        VNĐ</span>
                                @endif

                                @if ($variant->price_sale)
                                    <span class="price-sale text-primary" style="font-size: 18px">{{ number_format($variant->price_sale, 0) }}
                                        VNĐ</span>
                                @endif
                            @endif
                        </div>

                        <div style="font-size:13px">
                            Lượt xem: {{ $product->view }}
                        </div>
                        {{-- <!-- Ratings -->
                    <div class="product-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <i
                                class="fa fa-star {{ $i <= $product->max_star ? 'text-warning' : 'text-secondary' }}"></i>
                        @endfor
                    </div> --}}
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    {{-- <div class="col-lg-12">
        <div class="position-relative">
            <img src="{{ env('VIEW_CLIENT') }}/img/banner-fruits.jpg" class="img-fluid w-100 rounded"
                alt="">
            <div class="position-absolute"
                style="top: 50%; right: 10px; transform: translateY(-50%);">
                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
            </div>
        </div>
    </div> --}}
</div>
