<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 100%; max-width: 100%; margin: 0;">
        <div class="modal-content rounded-0">
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" id="search-nav-header"
                        placeholder="Nhập tên sản phẩm bạn muốn tìm" aria-describedby="search-icon-1">
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center bg-light">
                <div class="input-group w-75 mx-auto d-flex fruite">
                    <div class="row g-4" id="product-list">
                        @if (isset($productHot2))
                            @foreach ($productHot2 as $product)
                                <div class="col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                                    <div class="rounded position-relative fruite-item d-flex flex-column"
                                        style="min-height: 430px; width: 100%;">
                                        <div class="fruite-img" style="height: 200px;">
                                            <a href="{{ route('client.product-detail', $product->id) }}">
                                                <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}"
                                                    class="img-fluid w-100 h-100 rounded-top" alt="">
                                            </a>
                                        </div>
                                        @if ($product->categories)
                                            @php
                                                $category = $product
                                                    ->categories()
                                                    ->whereNotNull('parent_id')
                                                    ->inRandomOrder() // Lấy ngẫu nhiên
                                                    ->first(); // Chỉ lấy một bản ghi
                                            @endphp
                                            @if ($category)
                                                <div class="text-white bg-success px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">
                                                    {{ $category->name }}
                                                </div>
                                            @endif
                                        @endif

                                        <div class="p-4 border border-success border-top-0 rounded-bottom d-flex flex-column justify-content-between flex-grow-1"
                                            style="min-height: 150px;">
                                            <h4 class="truncate-text"
                                                style="height: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $product->name }}
                                            </h4>
                                            <p class="text-muted"
                                                style="flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {!! Str::limit($product->description_short, 80, '...') !!}
                                            </p>
                                            <div class="d-flex flex-column justify-content-end"
                                                style="min-height: 70px;">
                                                @if ($product->status == 0)
                                                    <p class="text-dark fs-5 fw-bold mb-0">{{ $product->price_regular }}
                                                    </p>
                                                    <p class="text-dark fs-5 fw-bold mb-0">{{ $product->price_sale }}</p>
                                                @else
                                                    @php
                                                        $minPriceVariant = $product
                                                            ->variantGroups()
                                                            ->orderByDesc('price_sale')
                                                            ->first();
                                                    @endphp
                                                    <span class="text-muted text-decoration-line-through"
                                                        style="font-size: 14px; opacity: 75%;">
                                                        {{ app('formatPrice')($minPriceVariant->price_regular) }} VNĐ
                                                    </span>
                                                    <p class="text-primary fs-5 fw-bold mb-0">
                                                        {{ app('formatPrice')($minPriceVariant->price_sale) }} VNĐ
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        {{-- Thêm placeholder nếu không có sản phẩm --}}
                        @for ($i = 0; $i < 4 - $productHot2->count(); $i++)
                            <div class="col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                                <div class="rounded position-relative fruite-item placeholder d-flex flex-column"
                                    style="min-height: 430px; width: 100%;">
                                    <div class="fruite-img bg-light d-flex align-items-center justify-content-center"
                                        style="height: 200px;">
                                        <span class="text-muted">Đang cập nhật...</span>
                                    </div>
                                    <div
                                        class="p-4 border border-success border-top-0 rounded-bottom d-flex flex-column justify-content-between flex-grow-1"
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
</div>
<!-- Modal Search End -->

<script>
    $(document).ready(function () {
        $('#search-nav-header').on('input', function () {
            let keySearch = $(this).val(); // Lấy giá trị từ input tìm kiếm
            $.ajax({
                url: "{{ route('client.home') }}", // Thay thế bằng URL API hoặc route của bạn
                method: 'GET',
                data: {
                    'keySearch': keySearch
                },
                success: function (response) {
                    console.log(response); // Log để xem dữ liệu trả về từ server
                    if (response && response.length > 0) {
                        let productListHtml = '';
                        response.forEach(function (product) {
                            productListHtml += `
                                <div class="col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                                    <div class="rounded position-relative fruite-item d-flex flex-column" style="min-height: 430px; width: 100%;">
                                        <div class="fruite-img" style="height: 200px;">
                                            <a href="{{ route('client.product-detail', '') }}/${product.id}">
                                                <img src="{{ env('VIEW_IMG') }}/${product.img}" class="img-fluid w-100 h-100 rounded-top" alt="">
                                            </a>
                                        </div>
                                        ${product.categories.length ? `
                                            <div class="text-white bg-success px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                                ${product.categories[0].name}
                                            </div>
                                        ` : ''}
                                        <div class="p-4 border border-success border-top-0 rounded-bottom d-flex flex-column justify-content-between flex-grow-1" style="min-height: 150px;">
                                            <h4 class="truncate-text" style="height: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                ${product.name}
                                            </h4>
                                            <p class="text-muted" style="flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                ${product.description_short.substring(0, 80)}...
                                            </p>
                                            <div class="d-flex flex-column justify-content-end" style="min-height: 70px;">
                                                ${product.status == 0 ? `
                                                    <p class="text-dark fs-5 fw-bold mb-0">${product.price_regular}</p>
                                                    <p class="text-dark fs-5 fw-bold mb-0">${product.price_sale}</p>
                                                ` : `
                                                    <span class="text-muted text-decoration-line-through" style="font-size: 14px; opacity: 75%;">${product.price_regular}</span>
                                                    <p class="text-primary fs-5 fw-bold mb-0">${product.price_sale}</p>
                                                `}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#product-list').html(productListHtml);
                    } else {
                        $('#product-list').html(
                            '<p class="text-muted">Không có sản phẩm phù hợp với tìm kiếm của bạn.</p>'
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.log("Có lỗi xảy ra: " + error);
                }
            });
        });
    });
</script>
