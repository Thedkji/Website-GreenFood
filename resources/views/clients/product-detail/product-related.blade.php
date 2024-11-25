<div class="vesitable">
    @if ($relatedProducts->count() < 4)
        <!-- Nếu có đúng 4 sản phẩm, hiển thị trực tiếp mà không cần carousel -->
        <div class="row mt-5">
            @foreach ($relatedProducts as $product)
                <div class="col-12 col-md-3 mb-4 d-flex">
                    @if ($product->variantGroups->isEmpty())
                        <!-- Sản phẩm chính -->
                        <div
                            class="product-item border border-primary rounded position-relative w-100 d-flex flex-column">
                            <div class="product-image overflow-hidden position-relative">
                                <a href="{{ route('client.product-detail', $product->id) }}" class="">
                                    <img src="{{ $product->img ? env('VIEW_IMG') . '/' . $product->img : env('VIEW_IMG') . '/default-image.png' }}"
                                        class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                                </a>
                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; right: 10px;">
                                    @php
                                        $category = $product->categories()->whereNotNull('parent_id')->get()->random();
                                    @endphp
                                    {{ $category->name ?? 'No category' }}
                                </div>
                            </div>
                            <div class="p-4 pb-0 rounded-bottom d-flex flex-column flex-grow-1">
                                <h4 class="product-title mb-2">
                                    <a href="{{ route('client.product-detail', $product->id) }}"
                                        class="truncate-text-50 text-dark">
                                        {{ Str::limit($product->name, 100, '...') }}
                                    </a>
                                </h4>
                                <p class="text-dark flex-grow-1">
                                    {!! Str::limit(strip_tags($product->description_short ?? 'No description available'), 100, '...') !!}
                                </p>
                                <!-- Giá -->
                                <div class="price-container d-flex align-items-center mb-3">
                                    @if ($product->price_sale)
                                        <p class="text-danger fs-5 fw-bold me-3 mb-0">
                                            {{ number_format($product->price_sale, 0) }} VNĐ
                                        </p>
                                        <p class="text-muted fs-6 text-decoration-line-through mb-0">
                                            {{ number_format($product->price_regular, 0) }} VNĐ
                                        </p>
                                    @else
                                        <p class="text-dark fs-5 fw-bold mb-0">Liên hệ</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Biến thể -->
                        @php
                            // Tìm giá thấp nhất trong các biến thể
                            $minPrice = $product->variantGroups->min(function ($variant) {
                                return $variant->price_sale ?? $variant->price_regular;
                            });
                        @endphp
                        <div
                            class="product-item border border-primary rounded position-relative w-100 d-flex flex-column">
                            <div class="product-image overflow-hidden position-relative">
                                <a href="{{ route('client.product-detail', $product->id) }}">
                                    <img src="{{ $product->img ? env('VIEW_IMG') . '/' . $product->img : env('VIEW_IMG') . '/default-image.png' }}"
                                        class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                                </a>
                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; right: 10px;">
                                    @php
                                        $category = $product->categories()->whereNotNull('parent_id')->get()->random();
                                    @endphp
                                    {{ $category->name ?? 'No category' }}
                                </div>
                            </div>
                            <div class="p-4 pb-0 rounded-bottom d-flex flex-column flex-grow-1">
                                <h4 class="product-title">
                                    <a href="{{ route('client.product-detail', $product->id) }}"
                                        class="text-dark truncate-text-50">
                                        {{ $product->name }}
                                    </a>
                                </h4>
                                <p class="text-dark flex-grow-1">
                                    {!! Str::limit(strip_tags($product->description_short ?? 'No description available'), 100, '...') !!}
                                </p>
                                <!-- Giá -->
                                <div class="price-container d-flex align-items-center mb-3">
                                    @if ($minPrice)
                                        <p class="text-danger fs-5 fw-bold me-3 mb-0">
                                            {{ number_format($minPrice, 0) }} VNĐ
                                        </p>
                                    @else
                                        <p class="text-dark fs-5 fw-bold mb-0">Liên hệ</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @elseif ($relatedProducts->count() > 4)
        <!-- Nếu có hơn 4 sản phẩm, hiển thị carousel -->
        <div class="owl-carousel vegetable-carousel justify-content-center">
            @foreach ($relatedProducts as $product)
                <div class="vesitable-item">
                    @if ($product->variantGroups->isEmpty())
                        <!-- Sản phẩm chính -->
                        <div class="border border-primary rounded position-relative">
                            <div class="vesitable-img">
                                <a href="{{ route('client.product-detail', $product->id) }}">
                                    <img src="{{ $product->img ? env('VIEW_IMG') . '/' . $product->img : env('VIEW_IMG') . '/default-image.png' }}"
                                        class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                                </a>
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                style="top: 10px; right: 10px;">
                                @php
                                    $category = $product->categories()->whereNotNull('parent_id')->get()->random();
                                @endphp
                                {{ $category->name ?? 'No category' }}

                            </div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>
                                    <a href="{{ route('client.product-detail', $product->id) }}" class="text-dark">
                                        {{ $product->name }}
                                    </a>
                                </h4>
                                <p class="text-dark">
                                    {!! Str::limit(strip_tags($product->description_short ?? 'No description available'), 150, '...') !!}
                                </p>
                                <!-- Giá -->
                                <div class="price-container d-flex align-items-center">
                                    @if ($product->price_sale)
                                        <p class="text-danger fs-5 fw-bold me-3">
                                            {{ number_format($product->price_sale, 0) }} VNĐ
                                        </p>
                                        <p class="text-muted fs-6 text-decoration-line-through"
                                            style="position: relative;top:5px">
                                            {{ number_format($product->price_regular, 0) }} VNĐ
                                        </p>
                                    @else
                                        <p class="text-dark fs-5 fw-bold">Liên hệ</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Biến thể -->
                        @php
                            // Tìm giá thấp nhất trong các biến thể
                            $minPrice = $product->variantGroups->min(function ($variant) {
                                return $variant->price_sale ?? $variant->price_regular;
                            });
                        @endphp
                        <div class="border border-primary rounded position-relative">
                            <div class="vesitable-img">
                                <a href="{{ route('client.product-detail', $product->id) }}">
                                    <img src="{{ $product->img ? env('VIEW_IMG') . '/' . $product->img : env('VIEW_IMG') . '/default-image.png' }}"
                                        class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                                </a>
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                style="top: 10px; right: 10px;">
                                @php
                                    $category = $product->categories()->whereNotNull('parent_id')->get()->random();
                                @endphp
                                {{ $category->name ?? 'No category' }}
                            </div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>
                                    <a href="{{ route('client.product-detail', $product->id) }}" class="text-dark">
                                        {{ $product->name }}
                                    </a>
                                </h4>
                                <p>
                                    {!! Str::limit(strip_tags($product->description_short ?? 'No description available'), 150, '...') !!}
                                </p>
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
                </div>
            @endforeach
        </div>
    @endif
</div>
