@extends('clients.layouts.master')

@section('title', 'Chi tiểt sản phẩm')

{{-- Link --}}
@section('title_page', 'Chi tiết sản phẩm')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Chi tiết sản phẩm')

@section('content')
    @include('clients.product-detail.css')

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

                        <div class="col-lg-6">
                            <form action="{{ route('client.addToCart') }}" method="post">
                                @csrf
                                <h4 class="fw-bold mb-3" style="width: 400px; overflow-wrap: break-word">
                                    {{ $product->name }}
                                </h4>
                                <p class="mb-3"><span class="fw-bold text-dark">DANH MỤC:</span>
                                    @foreach ($product->categories as $category)
                                        <a href="{{ route('client.shop', ['category_id' => $category->id]) }}"
                                            class="filter-shop-cate" name="filter-shop-cate">
                                            {{ $category->name }} |
                                        </a>
                                    @endforeach
                                </p>


                                @if ($product->status == 0)
                                    <!-- Trường hợp không có biến thể, hiển thị giá sản phẩm -->
                                    <div id="price_variantGroup">
                                        <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                                            {{ app('formatPrice')($product->price_regular) }} VNĐ
                                        </h6>
                                        <h4 class="fw-bold mb-3 text-primary">
                                            {{ app('formatPrice')($product->price_sale) }} VNĐ
                                        </h4>
                                    </div>

                                    <input type="hidden" name="price" value="{{ $product->price_sale ?? 1 }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="sku" value="{{ $product->sku }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="img" value="{{ $product->img }}">
                                    <input type="hidden" name="status" value="{{ $product->status }}">
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
                                            <h4 class="fw-bold mb-3 text-primary">
                                                {{ app('formatPrice')($variant->price_sale) }} VNĐ
                                            </h4>
                                        </div>
                                        <input type="hidden" name="img" value="{{ $product->img }}">
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
                                                        <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}"
                                                            alt="" class="variant-img">
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
                                                        <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}"
                                                            alt="" class="variant-img">
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

                                <p style="font-size: 13px ; color: rgb(162, 160, 160)">
                                    Lượt xem : {{ $product->view }}
                                </p>

                                <div class="input-group custom-quantity my-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm custom-btn-minus rounded-circle bg-light border"
                                            type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm text-center custom-quantity-input border-0"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm custom-btn-plus rounded-circle bg-light border"
                                            type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>

                                    <input type="hidden" id="hidden-quantity" name="quantity" value="">

                                </div>

                                <button id="add-to-cart"
                                    class="btn border border-secondary rounded-pill px-4 py-3 mb-4 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ hàng
                                </button>


                            </form>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Mô
                                        tả</button>
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
                    @include('clients.product-detail.product-hot')
                </div>
            </div>
            <h1 class="fw-bold mb-0">Sản phẩm cùng loại</h1>
            @include('clients.product-detail.product-related')
        </div>
    </div>

    @include('clients.product-detail.script')
@endsection
