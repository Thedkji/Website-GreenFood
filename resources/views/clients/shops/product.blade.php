<div class="col-lg-9">
    <div class="row g-4 justify-content-center">

        @foreach ($products as $product)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="rounded position-relative fruite-item">
                    <div class="fruite-img">
                        <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                        style="top: 10px; left: 10px;">
                        Fruits</div>
                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                        <h4>
                            <a href="{{ route('client.product-detail', $product->id) }}">{{ $product->name }}</a>
                        </h4>

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
                        <div class="d-flex justify-content-between flex-lg-wrap">

                            <div class="d-flex gap-3 mb-3">
                                @if ($product->status == 0)
                                    <p class="fs-5 fw-bold mb-0 text-dark">
                                        {{ app('formatPrice')($product->price_sale) }} VNĐ
                                    </p>
                                @elseif ($product->variantGroups->isNotEmpty() && $product->variantGroups->first() !== null)
                                    <p class="fs-5 fw-bold mb-0 text-dark">
                                        {{ app('formatPrice')($product->variantGroups->first()->price_sale) }} VNĐ
                                    </p>
                                @else
                                    <p class="fs-5 fw-bold mb-0 text-dark">Liên hệ để biết giá</p>
                                @endif

                            </div>

                            <div class="mb-3 rounded">
                                <a href="{{ route('client.checkout') }}"
                                    class="btn border border-secondary rounded-pill px-3 text-black"><i
                                        class="fa fa-shopping-bag me-2 "></i>Mua hàng</a>
                            </div>

                            <a href="{{ route('client.cart') }}"
                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-cart me-2 text-primary"></i>Thêm giỏ hàng</a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                <a href="#" class="rounded">&laquo;</a>
                <a href="#" class="active rounded">1</a>
                <a href="#" class="rounded">2</a>
                <a href="#" class="rounded">3</a>
                <a href="#" class="rounded">4</a>
                <a href="#" class="rounded">5</a>
                <a href="#" class="rounded">6</a>
                <a href="#" class="rounded">&raquo;</a>
            </div>
        </div>

        {{-- @dd($products) --}}
    </div>
</div>
