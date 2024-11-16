@extends('clients.layouts.master')

@section('title', 'Chi tiểt sản phẩm')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Chi tiết sản phẩm</h1>
        {{-- <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop Detail</li>
        </ol> --}}
    </div>
    <!-- Single Page Header End -->


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
                                            class="d-block w-100 img-fluid rounded" alt="Image">
                                    </div>
                                    @foreach ($product->galleries as $gallery)
                                        <div class="carousel-item">
                                            <img src="{{ env('VIEW_IMG') }}/{{ $gallery->path }}"
                                                class="d-block w-100 img-fluid rounded" alt="Image">
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
                                <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                                    {{ app('formatPrice')($product->price_regular) }} VNĐ
                                </h6>
                                <h4 class="fw-bold mb-3 text-success">
                                    {{ app('formatPrice')($product->price_sale) }} VNĐ
                                </h4>
                            @else
                                <!-- Trường hợp có biến thể, lấy giá thấp nhất từ variantGroup -->
                                @php
                                    $variant = $product->variantGroups->sortBy('price_sale')->first();
                                @endphp

                                @if ($variant)
                                    <h6 class="fw-bold mb-3 text-muted text-decoration-line-through">
                                        {{ app('formatPrice')($variant->price_regular) }} VNĐ
                                    </h6>
                                    <h4 class="fw-bold mb-3 text-success">
                                        {{ app('formatPrice')($variant->price_sale) }} VNĐ
                                    </h4>
                                @else
                                    <!-- Nếu không có biến thể nào khả dụng, hiển thị thông báo hoặc giá mặc định -->
                                    <h6 class="fw-bold mb-3 text-muted">Không có giá khả dụng</h6>
                                @endif
                            @endif

                            @if ($product->status == 1)



                                @foreach ($product->variantGroups as $variantGroup)
                                    @foreach ($variantGroup->variants as $variant)
                                        @if ($loop->first)
                                            <!-- Kiểm tra nếu là biến thể đầu tiên trong nhóm -->
                                            {{ $variant->parent->name }} <!-- Hiển thị tên parent một lần -->
                                        @endif
                                        {{ $variant->name }} (Con)
                                        <br>
                                    @endforeach
                                @endforeach


                            @endif


                            <p class="mb-4">{!! $product->description_short !!}</p>

                            {{-- <div class="input-group quantity mb-5" style="width: 100px;">
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
                            </div> --}}
                            <a href="#"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
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
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
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
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
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
                            <div class="mb-4">
                                <h4>Categories</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Apples</a>
                                            <span>(3)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                                            <span>(5)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                                            <span>(2)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                            <span>(8)</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                            <span>(5)</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4 class="mb-4">Featured products</h4>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded" style="width: 100px; height: 100px;">
                                    <img src="{{ env('VIEW_CLIENT') }}/img/featur-1.jpg" class="img-fluid rounded"
                                        alt="Image">
                                </div>
                                <div>
                                    <h6 class="mb-2">Big Banana</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">2.99 $</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded" style="width: 100px; height: 100px;">
                                    <img src="{{ env('VIEW_CLIENT') }}/img/featur-2.jpg" class="img-fluid rounded"
                                        alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Big Banana</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">2.99 $</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded" style="width: 100px; height: 100px;">
                                    <img src="{{ env('VIEW_CLIENT') }}/img/featur-3.jpg" class="img-fluid rounded"
                                        alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Big Banana</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">2.99 $</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-4.jpg"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Big Banana</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">2.99 $</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-5.jpg"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Big Banana</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">2.99 $</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-6.jpg"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2">Big Banana</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">2.99 $</h5>
                                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <a href="#"
                                    class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                    More</a>
                            </div>
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
            <h1 class="fw-bold mb-0">Related products</h1>
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-6.jpg"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-1.jpg"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-3.png"
                                class="img-fluid w-100 rounded-top bg-light" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Banana</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-4.jpg"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Bell Papper</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-5.jpg"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-6.jpg"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-5.jpg"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-6.jpg"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
