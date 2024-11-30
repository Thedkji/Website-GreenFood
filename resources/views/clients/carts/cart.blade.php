@extends('clients.layouts.master')

@section('title', 'Fruitables - Giỏ hàng')

@section('title_page', 'Trang chủ')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Giỏ hàng')

@section('content')
<style>
    .table-wrapper {
        max-height: 420px;
        overflow-y: auto;
        overflow-x: hidden;
        position: relative;
    }

    .table-header th {
        position: sticky;
        top: 0;
        z-index: 999;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .table-body td {
        vertical-align: middle;
    }
</style>
<div class="container-fluid py-5">
    <div class="toast-container">
        @if (session('success'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
            <div class="toast-header bg-success text-white">
                <p class="me-auto">Thông báo</p>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white text-dark">
                {{ session('success') }}
            </div>
            <div class="toast-progress bg-success"></div>
        </div>
        @endif

        @if (session('error'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastError">
            <div class="toast-header bg-danger text-white">
                <p class="me-auto">Lỗi</p>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white text-dark">
                {{ session('error') }}
            </div>
            <div class="toast-progress bg-danger"></div>
        </div>
        @endif
    </div>

    <div class="container py-5">
        <form action="{{ route('client.checkout') }}" method="get">
            @csrf
            @if (session('check'))
            <button type="submit" class="btn btn-primary" formaction="{{ route('client.removeCheck') }}" formmethod="post">Cập nhật lại</button>
            @endif
            <div class="table-wrapper mb-3">
                <table class="table">
                    <thead class="table-header">
                        <tr>
                            <th scope="col">
                                <input type="checkbox" class="form-check-input bg-primary border-0" style="width: 20px;height: 20px;" id="select-all" onclick="toggleSelectAll(this)">
                            </th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @if ($cartItems->isNotEmpty())
                        @foreach ($cartItems as $item)
                        <input type="hidden" name="item_ids" id="itemIds">
                        @if (auth()->check())
                        <tr>
                            <th>
                                <input type="checkbox" name="selectBox[{{ $item->sku }}]" onclick="toggleDeleteButton()" class="form-check-input bg-primary border-0 cart-checkbox" style="width: 20px;height: 20px;" value="{{ $item }}"
                                    @if (!empty($lowStockVariants)) @foreach ($lowStockVariants as $stock)
                                    @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->sku)
                                disabled @endif
                                @endforeach
                                @endif
                                >
                            </th>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    @php
                                    $imageSrc = env('VIEW_IMG') . '/';
                                    if ($item->product->status === 0) {
                                    $imageSrc .= $item->product->img;
                                    } else {
                                    $variantImg = null;
                                    foreach ($variantGroups[$item->sku] ?? [] as $variant) {
                                    $variantImg = $variant->img ?? $item->product->img;
                                    break;
                                    }
                                    $imageSrc .= $variantImg ?? $item->product->img;
                                    }
                                    $quantity = $item->quantity;
                                    @endphp
                                    <img src="{{ $imageSrc }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">
                                    {{ $item->product->name }}
                                    @if (!empty($variantGroups[$item->sku]))
                                    @foreach ($variantGroups[$item->sku] as $variant)
                                    | {{ optional(\App\Models\Variant::find($variant->variants[0]['parent_id']))->name }} - {{ $variant->variants[0]['name'] }}
                                    @endforeach
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">
                                    @if ($item->product->status === 0)
                                    {{ $item->product->sku }}
                                    @else
                                    @foreach ($variantGroups[$item->sku] ?? [] as $variant)
                                    {{ $variant->sku }}
                                    @endforeach
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4 text-primary" id="price-{{ $item->id }}">
                                    @if ($item->product->status === 0)
                                    {{ number_format($item->product->price_sale) }} VNĐ
                                    @else
                                    @if (isset($variantGroups[$item->sku]) && $variantGroups[$item->sku]->isNotEmpty())
                                    @foreach ($variantGroups[$item->sku] as $variant)
                                    {{ number_format($variant->price_sale) }} VNĐ
                                    @endforeach
                                    @endif
                                    @endif
                                </p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button type="button"
                                            class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" id="quantity_{{$item->sku}}" name="quantities[{{ $item->id }}]"
                                        class="form-control form-control-sm text-center border-0"
                                        value="{{ $quantity }}">
                                    <input type="hidden" name="priceTotal[{{ $item->id }}]">
                                    <div class="input-group-btn">
                                        <button type="button"
                                            class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <p class="mb-0 mt-4 text-primary" id="priceTotal-{{ $item->id }}">
                                    @if ($item->product->status === 0)
                                    {{ number_format($item->product->price_sale * $quantity) }} VNĐ
                                    @else
                                    @if (isset($variantGroups[$item->sku]) && $variantGroups[$item->sku]->isNotEmpty())
                                    @foreach ($variantGroups[$item->sku] as $variant)
                                    {{ number_format($variant->price_sale * $quantity) }} VNĐ
                                    @endforeach
                                    @endif
                                    @endif
                                </p>
                                @if (!empty($lowStockVariants))
                                @foreach ($lowStockVariants as $stock)
                                @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->sku)
                                    <p>Còn lại : {{ $stock['stock'] }}</p>
                                    @endif
                                    @endforeach
                                    @endif
                            </td>
                            <td>
                                <button formaction="{{ route('client.removeCart', ['id' => $item->id]) }}"
                                    formmethod="post" class="btn btn-md rounded-circle bg-light border mt-4"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <th>
                                <input type="checkbox" class="form-check-input bg-primary border-0 cart-checkbox" style="width: 20px;height: 20px;" name="selectBox[{{ $item->attributes->sku }}]" value="{{ $item }}"
                                    @if (!empty($lowStockVariants)) @foreach ($lowStockVariants as $stock)
                                    @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->attributes->sku)
                                disabled @endif
                                @endforeach
                                @endif
                                >
                            </th>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    @php
                                    $imageSrc = env('VIEW_IMG') . '/';
                                    if ($item->attributes->status === 0) {
                                    $imageSrc .= $item->attributes->img;
                                    } else {
                                    $variantImg = null;
                                    foreach ($variantGroups[$item->attributes->sku] ?? [] as $variant) {
                                    $variantImg = $variant->img ?? $item->attributes->img;
                                    break;
                                    }
                                    $imageSrc .= $variantImg ?? $item->attributes->img;
                                    }
                                    @endphp
                                    <img src="{{ $imageSrc }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">
                                    {{ $item->name }}
                                    @if (!empty($variantGroups[$item->attributes->sku]))
                                    @foreach ($variantGroups[$item->attributes->sku] as $variant)
                                    | {{ optional(\App\Models\Variant::find($variant->variants[0]['parent_id']))->name }} - {{ $variant->variants[0]['name'] }}
                                    @endforeach
                                    @endif
                                </p>
                            </td>

                            <td>
                                <p class="mb-0 mt-4">{{ $item->attributes->sku }}</p>
                            </td>

                            <td>
                                <p class="mb-0 mt-4 text-primary" id="price-{{ $item->id }}">{{ number_format($item->price) }} VNĐ</p>
                            </td>

                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border" data-action="decrease">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" id="quantity_{{$item->attributes->sku}}" name="quantities[{{ $item->id }}]"
                                        class="form-control form-control-sm text-center border-0"
                                        value="{{ $item->quantity }}">
                                    <input type="hidden" name="priceTotal[{{ $item->id }}]">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border" data-action="increase">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <p class="mb-0 mt-4 text-primary" id="priceTotal-{{ $item->id }}">{{ number_format($item->price * $item->quantity) }}
                                    VNĐ</p>
                                @if (!empty($lowStockVariants))
                                @foreach ($lowStockVariants as $stock)
                                @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->attributes->sku)
                                    <p>Còn lại : {{ $stock['stock'] }}</p>
                                    @endif
                                    @endforeach
                                    @endif

                            </td>
                            <td>
                                <button formaction="{{ route('client.removeCart', ['id' => $item->id]) }}"
                                    formmethod="post" class="btn btn-md rounded-circle bg-light border mt-4"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8" class="text-center">Giỏ hàng của bạn trống</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <button id="delete-button" formaction="{{ route('client.deleteCart') }}" formmethod="post"
                onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm?')" class="btn btn-warning" style="display: none;">
                Xóa tất cả
            </button>
            @if ($cartItems->isNotEmpty())
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Tổng tiền </h5>
                            <p class="mb-0 pe-4 text-primary" id="grandTotal">{{ number_format($cartTotal) }} VNĐ</p>
                        </div>
                        <button
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="submit">Thanh toán</button>
                    </div>
                </div>
            </div>
            @endif
        </form>
    </div>
</div>
@include('clients.carts.script-cart')
@endsection