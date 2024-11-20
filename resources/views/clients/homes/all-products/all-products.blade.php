<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Sản Phẩm Nổi Bật</h1>
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


                                            <div class="text-white bg-success px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                                @foreach($product->categories as $category)
                                                {{ $category->name }}
                                                @endforeach
                                            </div>

                                            <input type="hidden" name="id_product" value="{{ $product->id }}">

                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="status" value="{{ $product->status }}">
                                            <div class="p-4 border border-success border-top-0 rounded-bottom">
                                                <h4>
                                                    <a href="{{ route('client.product-detail', $product->id) }}">{{ $product->name }}</a>
                                                </h4>
                                                <p>{{ $product->description_short }}</p>

                                                @if (isset($product->variantGroups) && $product->variantGroups->isNotEmpty())
                                                <div class="variant-group mb-3">
                                                    <p>
                                                        Giá: <span id="current-price">{{ app('formatPrice')($product->variantGroups[0]->price_sale) }} VND</span>
                                                    </p>
                                                </div>

                                                <!-- @php
                                                // Nhóm các biến thể theo SKU
                                                $variantGroups = $product->variantGroups->groupBy('sku');
                                                @endphp -->

                                                @foreach ($variantGroups as $sku => $variantGroup)
                                                @php
                                                // Lấy giá của nhóm biến thể
                                                $price_sale = $variantGroup->first()->price_sale;
                                                @endphp

                                                <div class="variant-group-item mb-2">
                                                    <p style="display:none">Giá: <span class="variant-price">{{ app('formatPrice')($price_sale) }}</span></p>
                                                </div>
                                                @endforeach
                                                <input type="hidden" name="sku" value="{{ $product->variantGroups[0]->sku }}">
                                                <input type="hidden" name="price" value="{{ $product->variantGroups[0]->price_sale }}">
                                                <input type="hidden" name="img" value="{{ $product->variantGroups[0]->img }}">
                                                @else
                                                <p>
                                                    Giá: {{ app('formatPrice')($product->price_sale) }} VND
                                                </p>
                                                <input type="hidden" name="sku" value="{{ $product->sku }}">
                                                <input type="hidden" name="price" value="{{ $product->price_sale }}">
                                                <input type="hidden" name="img" value="{{ $product->img }}">
                                                @endif
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
<div class="d-flex justify-content-center">
    <ul class="pagination m-0">
        {{ $products->links('pagination::bootstrap-4') }}
    </ul>
</div>


<style>
    .pagination {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }


    .pagination .page-item {
        margin-right: 5px;
    }


    .pagination .page-item.active .page-link {
        background-color: #28a745;
        border-color: #28a745;
    }


    .pagination .page-item:hover .page-link {
        background-color: #f8f9fa;
        border-color: #ccc;
    }

    .pagination .page-link {
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
        color: #007bff;
    }
</style>