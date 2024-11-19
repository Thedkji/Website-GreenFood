<div class="vesitable">
    <div class="owl-carousel vegetable-carousel justify-content-center">

        @foreach ($relatedProducts as $product)
            @if ($product->variantGroups->isEmpty())
                <!-- Sản phẩm chính -->
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <a href="{{ route('client.product-detail', $product->id) }}">
                            <img src="{{ $product->img ? env('VIEW_IMG') . '/' . $product->img : env('VIEW_IMG') . '/default-image.png' }}"
                                class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">
                        {{ $product->categories->first()->name ?? 'Product' }}
                    </div>
                    <div class="p-4 pb-0 rounded-bottom">
                        <h4>
                            <a href="{{ route('client.product-detail', $product->id) }}" class="text-dark">
                                {{ $product->name }}
                            </a>
                        </h4>
                        <p class="text-dark">
                            {{ Str::words(strip_tags($product->description_short), 200, '...') }}
                        </p>
                        <!-- Giá -->
                        <div class="price-container d-flex align-items-center">
                            @if ($product->price_sale)
                                <p class="text-danger fs-5 fw-bold me-3">
                                    {{ number_format($product->price_sale, 0) }} VNĐ
                                </p>
                                <p class="text-muted fs-6 text-decoration-line-through">
                                    {{ number_format($product->price_regular, 0) }} VNĐ
                                </p>
                            @else
                                <p class="text-dark fs-5 fw-bold">Liên hệ</p>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                @php
                    // Tìm giá thấp nhất trong các biến thể
                    $minPrice = $product->variantGroups->min(function ($variant) {
                        return $variant->price_sale ?? $variant->price_regular;
                    });
                @endphp
                <!-- Biến thể -->
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <a href="{{ route('client.product-detail', $product->id) }}">
                            <img src="{{ $product->variantGroups->first()->img ? env('VIEW_IMG') . '/' . $product->img : env('VIEW_IMG') . '/default-image.png' }}"
                                class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">
                        {{ $product->categories->first()->name ?? 'Variant' }}</div>
                    <div class="p-4 pb-0 rounded-bottom">
                        <h4>
                            <a href="{{ route('client.product-detail', $product->id) }}" class="text-dark">
                                {{ $product->name }}
                            </a>
                        </h4>
                        <p>{!! $product->description_short ?? 'No description available' !!}</p>
                        <!-- Giá -->
                        <div class="price-container d-flex align-items-center">
                            @if ($minPrice)
                                <p class="text-danger fs-5 fw-bold me-3">
                                    {{ number_format($minPrice, 0) }} VNĐ
                                </p>
                            @else
                                <p class="text-dark fs-5 fw-bold">Liên hệ</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</div>
