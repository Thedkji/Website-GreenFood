<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('client.shop') }}" method="get">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: 100%; margin: 0;">
            <div class="modal-content rounded-0">
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        @csrf
                        <input type="text" class="form-control p-3" id="search-nav-header"
                            placeholder="Nhập tên sản phẩm bạn muốn tìm" name="search-product">
                        <!-- Nút Tìm kiếm -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    </form>

    <div class="modal-body d-flex align-items-center bg-light">
        <div class="input-group w-75 mx-auto d-flex fruite">
            @if (isset($productHot2))
                <div class="owl-carousel vegetable-carousel justify-content-center" id="product-list">
                    @foreach ($productHot2 as $product)
                        <div class="card fruite-item w-100">
                            <!-- Image -->
                            <div class="fruite-img">
                                <a href="{{ route('client.product-detail', $product->id) }}">
                                    <img src="{{ $product->img && Storage::exists($product->img) ? env('VIEW_IMG') . '/' . $product->img : env('APP_URL') . '/clients/img/avatar-default.jpg' }}"
                                        class="card-img-top" alt="{{ $product->name }}"
                                        style="height: 200px;object-fit: cover">
                                </a>
                            </div>

                            <!-- Category Label -->
                            <div class="category-label text-white bg-primary px-3 py-1 rounded position-absolute"
                                style="top: 10px; right: 10px;">
                                {{ $product->categories->first()->name ?? 'Sản phẩm' }}
                            </div>

                            <!-- Product Info -->
                            <div class="product-info card-body d-flex flex-column" style="height: 400px">
                                <!-- Product Title -->
                                <h5 class="card-title truncate-text-300">
                                    <a href="{{ route('client.product-detail', $product->id) }}"
                                        class="text-decoration-none text-dark">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <!-- Short Description -->
                                <p class="card-text" style="height: 80px;">
                                    {!! Str::limit(strip_tags($product->description_short), 100, '...') !!}
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
                                                <span class="text-muted text-decoration-line-through"
                                                    style="font-size:14px; opacity:75%;">
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
                                <div>
                                    @php
                                        // Tính trung bình số sao
                                        $ratings = $product->comments->flatMap(function ($comment) {
                                            return $comment->rates;
                                        });

                                        $averageRating = $ratings->isEmpty() ? 0 : $ratings->avg('star');
                                    @endphp
                                    <div class="product-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($averageRating >= $i)
                                                <i class="fas fa-star filled-star"></i>
                                            @elseif ($averageRating > $i - 1)
                                                <i class="fas fa-star-half-alt filled-star"></i>
                                            @else
                                                <i class="fas fa-star empty-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <style>
                    /* Sắp xếp các thành phần trong thẻ sản phẩm hợp lý hơn */
                    .vesitable-item {
                        display: flex;
                        flex-direction: column;
                        height: 400px;
                        /* Cố định chiều cao */
                        margin-bottom: 20px;
                        /* Giảm khoảng cách dưới mỗi sản phẩm */
                        overflow: hidden;
                        /* Ẩn các phần tử tràn ra ngoài */
                        border-radius: 8px;
                    }

                    /* Phần hình ảnh sản phẩm */
                    .vesitable-img {
                        position: relative;
                        overflow: hidden;
                    }

                    .vesitable-img img {
                        width: 100%;
                        height: 250px;
                        /* Giữ chiều cao cố định cho ảnh */
                        object-fit: cover;
                        /* Đảm bảo ảnh không bị méo */
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
                        padding: 15px;
                        /* Padding để tạo khoảng cách giữa các thành phần */
                        height: 100%;
                        /* Làm cho phần thông tin chiếm hết chiều cao còn lại */
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
                        margin-top: auto;
                        /* Đẩy phần giá xuống dưới */
                        display: flex;
                        flex-direction: column;
                        align-items: flex-start;
                    }

                    .fw-bold.text-primary {
                        font-size: 1.2rem;
                        color: #007bff;
                    }

                    .text-muted {
                        font-size: 0.9rem;
                    }

                    /* Điều chỉnh responsive */
                    @media (max-width: 768px) {
                        .vesitable-img img {
                            height: 200px;
                            /* Giảm chiều cao ảnh cho màn hình nhỏ */
                        }

                        .vesitable-item {
                            height: 500px;
                            /* Giảm chiều cao tổng thể sản phẩm cho thiết bị di động */
                        }

                        .product-info {
                            padding: 10px;
                            /* Giảm padding trên các thiết bị nhỏ */
                        }
                    }

                    .service-img-wrapper {
                        height: 300px;
                        overflow: hidden;
                        border-radius: 8px 8px 0 0;
                    }

                    .service-img-wrapper img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }

                    .service-item {
                        position: relative;
                    }

                    .service-item .service-content {
                        background-color: #f8f9fa;
                    }

                    .owl-nav {
                        position: absolute;
                        top: 50%;
                        /* Căn giữa chiều cao */
                        width: 100%;
                        /* Trải đều hết chiều rộng */
                        transform: translateY(-50%);
                        /* Dịch để căn giữa */
                        display: flex;
                        justify-content: space-between;
                        /* Đẩy các nút về hai đầu */
                        pointer-events: none;
                        /* Cho phép bấm thông qua vùng không phải nút */
                    }

                    .owl-nav .owl-prev,
                    .owl-nav .owl-next {
                        pointer-events: auto;
                        /* Kích hoạt click cho các nút */
                        background-color: #cae29e;
                        /* Nền nút mờ */
                        color: #fff;
                        /* Màu chữ */
                        width: 40px;
                        height: 40px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-radius: 50%;
                        /* Bo tròn nút */
                        cursor: pointer;
                        z-index: 10;
                        transition: background-color 0.3s ease;
                        /* Hiệu ứng hover */
                    }

                    .owl-nav .owl-prev:hover,
                    .owl-nav .owl-next:hover {
                        background-color: #81c408
                            /* Đậm hơn khi hover */
                    }

                    .owl-nav .owl-prev {
                        left: 10px;
                        /* Canh lề trái */
                    }

                    .owl-nav .owl-next {
                        right: 10px;
                        /* Canh lề phải */
                    }

                    /* Biểu tượng bên trong nút */
                    .owl-nav .owl-prev i,
                    .owl-nav .owl-next i {
                        font-size: 1.2rem;
                    }

                    /* Đảm bảo hiển thị tốt trên màn hình nhỏ */
                    @media (max-width: 768px) {

                        .owl-nav .owl-prev,
                        .owl-nav .owl-next {
                            width: 35px;
                            height: 35px;
                        }

                        .owl-nav .owl-prev i,
                        .owl-nav .owl-next i {
                            font-size: 1rem;
                        }
                    }
                </style>

            @endif

            {{-- Thêm placeholder nếu không có sản phẩm --}}
            @for ($i = 0; $i < 4 - $productHot2->count(); $i++)
                <div class="col-md-3 d-flex align-items-stretch">
                    <div class="rounded position-relative fruite-item placeholder d-flex flex-column"
                        style="min-height: 430px; width: 100%;">
                        <div class="fruite-img bg-light d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <span class="text-muted">Đang cập nhật...</span>
                        </div>
                        <div class="p-4 border border-success border-top-0 rounded-bottom d-flex flex-column justify-content-between flex-grow-1"
                            style="min-height: 150px;">
                            <h4 class="truncate-text text-muted"
                                style="height: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                Sản phẩm trống
                            </h4>
                            <p class="text-muted"
                                style="flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                Mô tả đang cập nhật...
                            </p>
                            <div class="d-flex flex-column justify-content-end" style="min-height: 70px;">
                                <p class="text-dark fs-5 fw-bold mb-0">0 VNĐ</p>
                                <p class="text-dark fs-5 fw-bold mb-0">0 VNĐ</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal Search End -->
