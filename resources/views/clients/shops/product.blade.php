<div class="col-lg-9">
    <div class="row g-4 justify-content-center" id="shop-product">

        @foreach ($products as $product)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="rounded position-relative fruite-item">
                    <div class="fruite-img">
                        <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">

                        @if ($product->img == 'https://via.placeholder.com/300x200' || is_null($product->img))
                            <div style="width:100%; height:150px; overflow:hidden;">
                                <a href="{{ route('client.product-detail', $product->id) }}">
                                    <img src="https://via.placeholder.com/300x200" alt=""
                                        style="width:100%; height:auto; object-fit: cover;">
                                </a>
                            </div>
                        @else
                            <div style="width:100%; height:150px; overflow:hidden;">
                                <a href="{{ route('client.product-detail', $product->id) }}">
                                    <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt=""
                                        style="width:100%; height:auto; object-fit: cover;">
                                </a>
                            </div>
                        @endif

                        <p class="truncate-text">{{ $product->description_short }}</p>

                        <h4 class="truncate-text">
                            <a href="{{ route('client.product-detail', $product->id) }}">{{ $product->name }}</a>
                        </h4>


                        @if ($product->status == 0)
                            <span class="text-muted text-decoration-line-through" style="font-size:14px;opacity: 75%;">
                                {{ app('formatPrice')($product->price_regular) }}VNĐ
                            </span>
                            <p class="fw-bold" style="font-size: 20px">
                                {{ app('formatPrice')($product->price_sale) }} VNĐ
                            </p>
                        @elseif ($product->status == 1)
                            @foreach ($product->variantGroups as $variantgroup)
                                <span class="text-muted text-decoration-line-through"
                                    style="font-size:14px;opacity: 75%;">
                                    {{ app('formatPrice')($variantgroup->price_regular) }}
                                    VNĐ
                                </span>

                                <p class="fw-bold" style="font-size: 20px">

                                    {{ app('formatPrice')($variantgroup->price_sale) }} VNĐ

                                </p>
                            @endforeach
                        @endif



                    </div>
                </div>
            </div>
        @endforeach




        <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                {{-- Nút quay về đầu --}}
                <a href="{{ $products->url(1) }}" class="rounded {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <i class="fas fa-angle-double-left"></i>
                </a>

                {{-- Nút phân trang trước --}}
                <a href="{{ $products->previousPageUrl() }}"
                    class="rounded {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <i class="fas fa-chevron-left"></i>
                </a>

                {{-- Hiển thị các trang --}}
                @php
                    $currentPage = $products->currentPage();
                    $lastPage = $products->lastPage();
                    $pageLimit = 5;
                    $startPage = max($currentPage - 2, 1); // Giới hạn số trang hiển thị phía trước
                    $endPage = min($currentPage + 2, $lastPage); // Giới hạn số trang hiển thị phía sau
                @endphp

                {{-- Các trang --}}
                @for ($i = $startPage; $i <= $endPage; $i++)
                    <a href="{{ $products->url($i) }}" class="rounded {{ $i == $currentPage ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                @endfor

                {{-- Nút phân trang tiếp theo --}}
                <a href="{{ $products->nextPageUrl() }}"
                    class="rounded {{ $products->hasMorePages() ? '' : 'disabled' }}">
                    <i class="fas fa-chevron-right"></i>
                </a>

                {{-- Nút quay về cuối --}}
                <a href="{{ $products->url($lastPage) }}"
                    class="rounded {{ $products->onLastPage() ? 'disabled' : '' }}">
                    <i class="fas fa-angle-double-right"></i>
                </a>
            </div>
        </div>




    </div>
</div>
