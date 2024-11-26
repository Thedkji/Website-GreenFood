<style>
    /* Container styling */
    .container {
        padding: 20px;
    }

    .truncate-text-120 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        width: 120px;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Product Card */
    .product-card {
        display: flex;
        align-items: center;
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        transition: box-shadow 0.3s, transform 0.3s;
        background-color: #fff;
        margin-bottom: 20px;
    }

    .product-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    /* Product Image */
    .product-img-container {
        flex: 0 0 100px;
        overflow: hidden;
        border-radius: 12px;
        margin-right: 20px;
    }

    .product-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
    }

    /* Product Info */
    .product-info {
        flex: 1;
    }

    .product-name {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .product-pricing {
        margin-bottom: 8px;
    }

    .price-regular {
        text-decoration: line-through;
        color: #999;
        margin-right: 10px;
    }

    .price-sale {
        color: #e74c3c;
        font-weight: bold;
        font-size: 18px;
    }

    .product-rating i {
        margin-right: 2px;
        color: #f1c40f;
    }

    .product-rating i.text-secondary {
        color: #ddd;
    }

    /* Adjustments for responsiveness */
    @media (max-width: 576px) {
        .product-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .product-img-container {
            margin-right: 0;
            margin-bottom: 15px;
        }
    }
</style>

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
                            <div class="row">
                                <div class="col-6">
                                    <label for="Categories-1" class="mb-1">
                                        <a href="{{ route('client.shop') }}" class="filter-shop-cate"
                                            name="filter-shop-cate">
                                            TẤT CẢ
                                        </a>
                                    </label>
                                </div>
                                @foreach ($categories2 as $index => $category)
                                    <div class="col-6">
                                        <label for="Categories-{{ $category->id }}" class="mb-1">
                                            <a href="{{ route('client.shop', ['category_id' => $category->id]) }}"
                                                class="filter-shop-cate" name="filter-shop-cate">
                                                {{ $category->name }}
                                            </a>
                                        </label>
                                    </div>
                                @endforeach
                            </div>


                            <script>
                                $('#filter-shop-cate').click(function() {
                                    $('#form-filter-cate').submit();
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-12">

                        @include('clients.product-detail.product-hot')



                    </div>

                </div>
            </div>
