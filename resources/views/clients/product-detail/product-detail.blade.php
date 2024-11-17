@extends('clients.layouts.master')

@section('title', 'Chi tiểt sản phẩm')

{{-- Link --}}
@section('title_page', 'Chi tiết sản phẩm')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Chi tiết sản phẩm')

@section('content')
    <style>
        .active_variantGroup {
            border: 1px solid greenyellow !important;
            background: #f5f5f5;
        }

        .variant-parent {
            display: block;
            font-size: 1.2rem;
            margin-top: 15px;
            color: #333;
        }

        .variant-option {
            display: inline-flex;
            align-items: center;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-decoration: none;
            color: #555;
            /* transition: background-color 0.3s; */
        }

        .variant-option:hover {
            background-color: #f5f5f5;
            border-color: #ccc;
        }

        .variant-img {
            width: 30px;
            height: 30px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 8px;
        }


        /* Container styling */
        .container {
            padding: 20px;
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

        .vesitable-item {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* Đảm bảo chiều cao toàn phần */
            max-width: 300px;
            /* Cố định chiều rộng */
        }

        .vesitable-img img {
            height: 200px;
            object-fit: cover;
            /* Đảm bảo ảnh vừa khung */
            width: 100%;
            border-bottom: 1px solid #ddd;
        }

        .vesitable-item h4 {
            font-size: 1.25rem;
            font-weight: bold;
            height: 50px;
            /* Cố định chiều cao */
            overflow: hidden;
            /* Cắt bớt nội dung quá dài */
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .vesitable-item p {
            height: 60px;
            /* Giới hạn chiều cao phần mô tả */
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5;
            /* Khoảng cách dòng cho dễ đọc */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Giới hạn 3 dòng */
            -webkit-box-orient: vertical;
        }




        .price-container {
            display: flex;
            align-items: center;
            gap: 8px;
            /* Khoảng cách giữa giá cũ và giá giảm */
        }

        .price-container .text-danger {
            font-size: 1.2rem;
            font-weight: bold;
            color: #81C408 !important;
            /* Màu đỏ nhã nhặn */

        }

        .price-container .text-muted {
            font-size: 1rem;
            color: #6c757d;
            /* Màu xám trung tính */
            text-decoration: line-through;
            /* Gạch ngang giá cũ */
        }
    </style>


    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div id="productCarousel" class="carousel slide border rounded" data-bs-interval="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}"
                                            class="d-block w-100 img-fluid rounded" alt="Image" style="height: 550px">
                                    </div>
                                    @foreach ($product->galleries as $gallery)
                                        <div class="carousel-item">
                                            <img src="{{ env('VIEW_IMG') }}/{{ $gallery->path }}"
                                                class="d-block w-100 img-fluid rounded" alt="Image"
                                                style="height: 550px">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#productCarousel" role="button"
                                    data-bs-slide="prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
                                        viewBox="0 0 16 16">
                                        <path d="M11 1L4 8l7 7" stroke="black" stroke-width="2" fill="none" />
                                    </svg>
                                </a>
                                <a class="carousel-control-next" href="#productCarousel" role="button"
                                    data-bs-slide="next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
                                        viewBox="0 0 16 16">
                                        <path d="M5 1l7 7-7 7" stroke="black" stroke-width="2" fill="none" />
                                    </svg>
                                </a>

                            </div>
                        </div>
                        <style>
                            .carousel-item img {
                                width: 100%;
                                height: 400px;
                                /* Đặt chiều cao cố định cho ảnh */
                                object-fit: cover;
                                /* Đảm bảo ảnh lấp đầy vùng chứa mà không bị biến dạng */
                            }
                        </style>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3" style="width: 430px; overflow-wrap: break-word">{{ $product->name }}
                            </h4>
                            <p class="mb-3"><span class="fw-bold">Danh mục:</span>
                                @foreach ($product->categories as $category)
                                    <span>{{ $category->name }},</span>
                                @endforeach
                            </p>
                            @if ($product->status == 0)
                                <!-- Trường hợp không có biến thể, hiển thị giá sản phẩm -->
                                <div id="price_variantGroup">
                                    <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                                        {{ app('formatPrice')($product->price_regular) }} VNĐ
                                    </h6>
                                    <h4 class="fw-bold mb-3 text-success">
                                        {{ app('formatPrice')($product->price_sale) }} VNĐ
                                    </h4>
                                </div>
                            @else
                                <!-- Trường hợp có biến thể, lấy giá thấp nhất từ variantGroup -->
                                @php
                                    $variant = $product->variantGroups->sortBy('price_sale')->first();
                                @endphp

                                @if ($variant)
                                    <div id="price_variantGroup">
                                        <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                                            {{ app('formatPrice')($variant->price_regular) }} VNĐ
                                        </h6>
                                        <h4 class="fw-bold mb-3 text-success">
                                            {{ app('formatPrice')($variant->price_sale) }} VNĐ
                                        </h4>
                                    </div>
                                @else
                                    <!-- Nếu không có biến thể nào khả dụng, hiển thị thông báo hoặc giá mặc định -->
                                    <h6 class="fw-bold mb-3 text-muted">Không có giá khả dụng</h6>
                                @endif
                            @endif

                            @if ($product->status == 1)
                                @php
                                    $displayedParents = []; // Mảng tạm để lưu các parent đã hiển thị
                                    $lowestPrice = null; // Biến lưu giá thấp nhất
                                    $lowestPriceVariantGroup = null; // Biến lưu group có giá thấp nhất

                                    // Tìm giá thấp nhất trong tất cả variantGroups
                                    foreach ($product->variantGroups as $variantGroup) {
                                        if ($lowestPrice === null || $variantGroup->price_sale < $lowestPrice) {
                                            $lowestPrice = $variantGroup->price_sale;
                                            $lowestPriceVariantGroup = $variantGroup; // Lưu lại group có giá thấp nhất
                                        }
                                    }

                                    // Sắp xếp các variantGroups theo giá, nhóm có giá thấp nhất sẽ nằm đầu
                                    $sortedVariantGroups = $product->variantGroups->sortBy('price_sale');
                                @endphp

                                @foreach ($sortedVariantGroups as $variantGroup)
                                    @if ($variantGroup == $lowestPriceVariantGroup)
                                        <!-- Kiểm tra xem variantGroup có giá thấp nhất hay không -->
                                        @foreach ($variantGroup->variants as $variant)
                                            @if ($variant->parent && !in_array($variant->parent->id, $displayedParents))
                                                <strong
                                                    class="variant-parent mb-3 fs-6">{{ $variant->parent->name }}</strong>
                                                @php
                                                    $displayedParents[] = $variant->parent->id; // Thêm id parent vào mảng đã hiển thị
                                                @endphp
                                            @endif

                                            <!-- Hiển thị biến thể có giá thấp nhất đầu tiên và thêm class 'active' -->
                                            <a href="###" class="variant-option active"
                                                data-id="{{ $variantGroup->id }}">
                                                @if ($variantGroup->img)
                                                    <img src="{{ env('VIEW_IMG') }}/{{ $variantGroup->img }}"
                                                        alt="" class="variant-img">
                                                @else
                                                    <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt=""
                                                        class="variant-img">
                                                @endif
                                                <span>{{ $variant->name }}</span>
                                            </a>
                                        @endforeach
                                    @else
                                        <!-- Hiển thị các variantGroup còn lại -->
                                        @foreach ($variantGroup->variants as $variant)
                                            @if ($variant->parent && !in_array($variant->parent->id, $displayedParents))
                                                <strong
                                                    class="variant-parent mb-3 fs-6">{{ $variant->parent->name }}</strong>
                                                @php
                                                    $displayedParents[] = $variant->parent->id; // Thêm id parent vào mảng đã hiển thị
                                                @endphp
                                            @endif

                                            <!-- Hiển thị các biến thể khác, không có class 'active' -->
                                            <a href="###" class="variant-option" data-id="{{ $variantGroup->id }}">
                                                @if ($variantGroup->img)
                                                    <img src="{{ env('VIEW_IMG') }}/{{ $variantGroup->img }}"
                                                        alt="" class="variant-img">
                                                @else
                                                    <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt=""
                                                        class="variant-img">
                                                @endif
                                                <span>{{ $variant->name }}</span>
                                            </a>
                                        @endforeach
                                    @endif
                                @endforeach


                            @endif


                            <p class="mb-4">{!! $product->description_short !!}</p>

                            @if ($product->status == 0)
                                <p id="quantity_variantGroup">
                                    Số lượng : {{ $product->quantity }}
                                </p>
                            @else
                                <p id="quantity_variantGroup">
                                    Số lượng : {{ $variantGroup->quantity }}
                                </p>
                            @endif

                            <div class="input-group quantity my-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="#"
                                class="btn border border-secondary rounded-pill px-4 py-3 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ hàng</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Mô tả</button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Đánh giá</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    @php
                                        use Illuminate\Support\Str;
                                    @endphp

                                    <div id="description" class="position-relative">
                                        <div class="content" id="description-content">
                                            {!! $product->description !!}
                                        </div>
                                        <div class="overlay" id="description-overlay"></div>
                                        <a href="javascript:void(0);" id="read-more"
                                            class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary position-absolute">Đọc
                                            thêm</a>
                                    </div>

                                    <style>
                                        #description {
                                            position: relative;
                                            max-width: 100%;
                                            padding-bottom: 60px;
                                            /* Tạo khoảng trống cho nút */
                                        }

                                        #description-content {
                                            max-height: 500px;
                                            overflow: hidden;
                                            position: relative;
                                            transition: max-height 0.5s ease;
                                        }

                                        #description.collapsed #description-content {
                                            max-height: none;
                                        }

                                        #description-overlay {
                                            position: absolute;
                                            bottom: 60px;
                                            /* Điều chỉnh để không che nút */
                                            left: 0;
                                            width: 100%;
                                            height: 50px;
                                            background: linear-gradient(transparent, #fff);
                                            display: block;
                                        }

                                        #description.collapsed #description-overlay {
                                            display: none;
                                        }

                                        #read-more {
                                            bottom: 10px;
                                            left: 50%;
                                            transform: translateX(-50%);
                                            z-index: 1;
                                        }
                                    </style>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var description = document.getElementById('description');
                                            var readMore = document.getElementById('read-more');
                                            var content = document.getElementById('description-content');

                                            // Kiểm tra chiều cao thực tế của nội dung
                                            if (content.scrollHeight <= 200) {
                                                // Nếu nội dung không vượt quá chiều cao giới hạn, ẩn nút và overlay
                                                readMore.style.display = 'none';
                                                document.getElementById('description-overlay').style.display = 'none';
                                            }

                                            readMore.addEventListener('click', function() {
                                                description.classList.toggle('collapsed');
                                                if (description.classList.contains('collapsed')) {
                                                    readMore.textContent = 'Thu gọn';
                                                } else {
                                                    readMore.textContent = 'Đọc thêm';
                                                    description.scrollIntoView({
                                                        behavior: 'smooth'
                                                    });
                                                }
                                            });
                                        });
                                    </script>

                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel"
                                    aria-labelledby="nav-mission-tab">
                                    @foreach ($product->comments as $comment)
                                        <div class="d-flex mb-4">
                                            {{-- Avatar người bình luận --}}
                                            @if ($comment->user)
                                                <img src="{{ env('VIEW_IMG') }}/{{ $comment->user->avatar }}"
                                                    class="img-fluid rounded-circle p-3"
                                                    style="width: 100px; height: 100px;" alt="Avatar">
                                            @endif

                                            <div>
                                                {{-- Tên người bình luận và ngày tạo --}}
                                                <h5>{{ $comment->user->name ?? 'Unknown' }}</h5>
                                                <p class="mb-2" style="font-size: 14px;">
                                                    Đã bình luận vào: {{ $comment->created_at->format('d-m-Y') }}
                                                </p>

                                                {{-- Nội dung bình luận --}}
                                                <p>{{ $comment->content }}</p>

                                                {{-- Hiển thị thời gian sửa --}}
                                                @if ($comment->created_at != $comment->updated_at)
                                                    <p class="text-muted" style="font-size: 12px;">
                                                        Đã sửa:
                                                        @if ($comment->updated_at->diffInHours(now()) < 24)
                                                            {{ $comment->updated_at->diffForHumans() }}
                                                        @elseif ($comment->updated_at->diffInDays(now()) < 7)
                                                            {{ $comment->updated_at->format('d-m-Y') }}
                                                        @else
                                                            {{ $comment->updated_at->diffInWeeks(now()) }} tuần trước
                                                        @endif
                                                    </p>
                                                @endif


                                                {{-- Thông tin người trả lời nếu có --}}
                                                @if ($comment->parentUser)
                                                    <div class="d-flex mt-3">
                                                        <img src="{{ env('VIEW_IMG') }}/{{ $comment->parentUser->avatar }}"
                                                            class="img-fluid rounded-circle p-3"
                                                            style="width: 80px; height: 80px;" alt="Avatar">
                                                        <div class="ms-3">
                                                            <h6>{{ $comment->parentUser->name ?? 'Unknown' }}</h6>
                                                            <p>{{ $comment->content }}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <h4 class="mb-4">Sản phẩm nổi bật</h4>
                            @foreach ($productHot as $product)
                                <a href="{{ route('client.product-detail', $product->id) }}"
                                    class="text-decoration-none text-dark">
                                    <div class="product-card mb-4">
                                        <!-- Image -->
                                        <div class="product-img-container">
                                            @if ($product->img)
                                                <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}"
                                                    alt="{{ $product->name }}" class="product-img">
                                            @else
                                                <img src="{{ env('VIEW_IMG') }}/default-image.png"
                                                    alt="{{ $product->name }}" class="product-img">
                                            @endif
                                        </div>

                                        <!-- Product Info -->
                                        <div class="product-info">
                                            <h6 class="product-name truncate-text">
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
                                                        <span
                                                            class="price-regular">{{ number_format($product->price_regular, 0) }}
                                                            VNĐ</span>
                                                    @endif

                                                    @if ($product->price_sale)
                                                        <span
                                                            class="price-sale">{{ number_format($product->price_sale, 0) }}
                                                            VNĐ</span>
                                                    @endif
                                                @elseif ($product->status == 1 && isset($variant))
                                                    <!-- Nếu có biến thể, lấy giá sale và regular từ variant -->
                                                    @if ($variant->price_regular)
                                                        <span
                                                            class="price-regular">{{ number_format($variant->price_regular, 0) }}
                                                            VNĐ</span>
                                                    @endif

                                                    @if ($variant->price_sale)
                                                        <span
                                                            class="price-sale">{{ number_format($variant->price_sale, 0) }}
                                                            VNĐ</span>
                                                    @endif
                                                @endif
                                            </div>

                                            <!-- Ratings -->
                                            <div class="product-rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="fa fa-star {{ $i <= $product->max_star ? 'text-warning' : 'text-secondary' }}"></i>
                                                @endfor
                                            </div>
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
                </div>
            </div>
            <h1 class="fw-bold mb-0">Sản phẩm cùng loại</h1>
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
        </div>
    </div>

    @include('clients.product-detail.script')
@endsection
