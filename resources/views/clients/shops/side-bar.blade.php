<h1 class="mb-4">Sản phẩm healthy</h1>
<div class="row g-4">
    <div class="col-lg-12">
        <div class="row g-4">
            <div class="col-xl-3">
                <form action="{{ route('client.shop') }}" method="get">
                    @csrf
                    <div class="input-group w-100 mx-auto d-flex">
                        <input type="search" class="form-control p-3" name="search-product" placeholder="Tìm kiếm"
                            aria-describedby="search-icon-1"
                            value="{{ old('search-product', request('search-product')) }}">
                        <span id="search-icon-1" class="input-group-text p-3" onclick="this.closest('form').submit()"
                            style="cursor: pointer;">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </form>

            </div>
            <div class="col-6"></div>
            <div class="col-xl-3">
                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                    <label for="fruits">Sắp xếp :</label>
                    <form action="{{ route('client.shop') }}" method="get" id="fruitform">
                        @csrf
                        <select id="shop-select-arrange" name="select_arrange"
                            class="border-0 form-select-sm bg-light me-3" form="fruitform">
                            <option value="default" {{ request('select_arrange') == 'default' ? 'selected' : '' }}>Mặc
                                định
                            </option>
                            <option value="price_min" {{ request('select_arrange') == 'price_min' ? 'selected' : '' }}>
                                Giá
                                thấp nhất</option>
                            <option value="price_max" {{ request('select_arrange') == 'price_max' ? 'selected' : '' }}>
                                Giá
                                cao nhất</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4 class="mb-2">Giá</h4>
                            <form action="{{ route('client.shop') }}" method="get" id="filter-form-price">
                                @csrf
                                <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                    min="0" max="10000000"
                                    value="{{ old('rangeInput', request('rangeInput', 0)) }}"
                                    oninput="updateAmount(value)">

                                <output id="amount" name="amount"
                                    for="rangeInput">{{ app('formatPrice')(request('rangeInput', 0)) }} VNĐ</output>

                                <script>
                                    function formatCurrency(value) {
                                        // Định dạng số thành tiền tệ và thay thế ₫ bằng VNĐ
                                        return new Intl.NumberFormat('vi-VN').format(value) + ' VNĐ';
                                    }

                                    function updateAmount(value) {
                                        document.getElementById("amount").innerText = formatCurrency(value);
                                    }

                                    $('#rangeInput').change(function() {
                                        $('#filter-form-price').submit();
                                    });
                                </script>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4>Danh mục</h4>
                            <form action="{{ route('client.shop') }}" method="get" id="form-filter-cate">
                                @csrf
                                @foreach ($categories as $category)
                                    <div class="mb-2">
                                        <label for="Categories-1">
                                            <a href="{{ route('client.shop', ['category_id' => $category->id]) }}"
                                                class="filter-shop-cate" name="filter-shop-cate">
                                                {{ $category->name }}
                                            </a>
                                        </label>
                                    </div>
                                @endforeach
                            </form>

                            <script>
                                $('#filter-shop-cate').click(function() {
                                    $('#form-filter-cate').submit();
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="mb-3">Sản phẩm nổi bật</h4>

                        @foreach ($productHot as $product)
                            <div class="d-flex align-items-center justify-content-start mb-4">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" class="img-fluid rounded"
                                        alt="{{ $product->name }}">
                                </div>
                                <div>
                                    @if ($product->variantGroups->isNotEmpty())
                                        <!-- Xử lý biến thể có giá thấp nhất -->
                                        @php
                                            $variant = $product->variantGroups
                                                ->whereNotNull('price_sale')
                                                ->sortBy('price_sale')
                                                ->first();
                                        @endphp
                                        @if ($variant)
                                            <h6 class="mb-2 truncate-text">
                                                {{ $product->name }} - {{ $variant->name }}
                                            </h6>
                                            <div class="mb-2">
                                                @if ($variant->price_regular)
                                                    <h5 class="text-danger text-decoration-line-through">
                                                        {{ number_format($variant->price_regular, 2) }} $
                                                    </h5>
                                                @endif
                                                <h5 class="fw-bold me-2">
                                                    {{ number_format($variant->price_sale, 2) }} $
                                                </h5>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Hiển thị giá sản phẩm chính nếu không có biến thể -->
                                        <h6 class="mb-2 truncate-text">{{ $product->name }}</h6>
                                        <div class="mb-2">
                                            @if ($product->price_regular && $product->price_sale)
                                                <h5 class="text-danger text-decoration-line-through">
                                                    {{ number_format($product->price_regular, 2) }} $
                                                </h5>
                                                <h5 class="fw-bold me-2">
                                                    {{ number_format($product->price_sale, 0) }} vnđ
                                                </h5>
                                            @elseif($product->price_sale)
                                                <h5 class="fw-bold me-2">
                                                    {{ number_format($product->price_sale, 0) }} vnđ
                                                </h5>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- Hiển thị sao đánh giá -->
                                    <div class="d-flex mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="fa fa-star {{ $i <= $product->max_star ? 'text-warning' : 'text-secondary' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>

                </div>
            </div>
