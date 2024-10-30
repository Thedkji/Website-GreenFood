<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Our Organic Products</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                href="#tab-1">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill"
                                href="{{$category->id}}">
                                <span class="text-dark" style="width: 130px;">{{$category->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div id="{{$category->id}}" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($products as $product)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <form action="{{ route('client.addToCart') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ env('VIEW_CLIENT') }}/img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>

                                            <div class="text-white bg-success px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                                @foreach($product->categories as $category)
                                                {{ $category->name }}
                                                @endforeach
                                            </div>

                                            <input type="hidden" name="id_product" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">

                                            <div class="p-4 border border-success border-top-0 rounded-bottom">
                                                <h4>{{ $product->name }}</h4>
                                                <p>{{ $product->description_short }}</p>

                                                @if (isset($product->variantGroups) && $product->variantGroups->isNotEmpty())
                                                <div class="variant-group mb-3">
                                                    <p>
                                                        Giá: <span id="current-price">{{ app('formatPrice')($product->variantGroups[0]->price_regular) }}</span>
                                                    </p>
                                                </div>

                                                @php
                                                // Nhóm các biến thể theo SKU
                                                $variantGroups = $product->variantGroups->groupBy('sku');
                                                @endphp

                                                @foreach ($variantGroups as $sku => $variantGroup)
                                                @php
                                                // Lấy giá của nhóm biến thể
                                                $price_regular = $variantGroup->first()->price_regular;
                                                @endphp

                                                <div class="variant-group-item mb-2">
                                                    <button type="button" class="btn btn-outline-primary variant-button"
                                                        onclick="selectVariant('{{ $sku }}', '{{ app('formatPrice')($price_regular) }}')">
                                                        @foreach ($variantGroup as $group)
                                                        @foreach ($group->variants as $variant)
                                                        {{ $variant->name }}
                                                        @endforeach
                                                        @endforeach
                                                    </button>
                                                    <p style="display:none">Giá: <span class="variant-price">{{ app('formatPrice')($price_regular) }}</span></p>
                                                </div>
                                                @endforeach

                                                <input type="hidden" name="price" value="{{ $product->variantGroups[0]->price_regular }}">
                                                <input type="hidden" name="selected_sku" id="selected_sku" value="">
                                                @else
                                                <p>
                                                    Giá: {{ app('formatPrice')($product->price_regular) }}
                                                </p>
                                                <input type="hidden" name="price" value="{{ $product->price_regular }}">
                                                @endif

                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="d-flex justify-content-center" style="display: flex; list-style: none; flex-direction: row;">
    {{ $products->links('pagination::bootstrap-4') }}
</div>
<script>
    function selectVariant(sku, price) {
        document.getElementById('current-price').innerText = price;
        document.getElementById('selected_sku').value = sku;
    }
</script>