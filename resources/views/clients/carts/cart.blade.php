@extends('clients.layouts.master')

@section('title', 'Fruitables - Giỏ hàng')

@section('title_page', 'Trang chủ')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Giỏ hàng')

@section('content')

<div class="container-fluid py-5">
    <div class="toast-container">
        @if (session('success'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Thông báo</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
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
                <strong class="me-auto">Lỗi</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
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
            <div class="d-flex justify-content-between gap-3 mb-4">
                <button formaction="{{ route('client.deleteCart') }}" formmethod="post" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm?')" class="btn btn-warning">
                    Xóa tất cả
                </button>
                <button formaction="{{ route('client.updateCart') }}" formmethod="post" class="btn btn-primary">
                    Cập nhật số lượng
                </button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
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
                <tbody>
                    @if ($cartItems->isNotEmpty())
                    @foreach ($cartItems as $item)
                    @if (auth()->check())
                    <tr>
                        <th>
                            <input
                                type="checkbox"
                                name="selectBox[]"
                                value="{{ $item }}"
                                class="cart-checkbox"
                                @if (!empty($lowStockVariants))
                                @foreach ($lowStockVariants as $stock)
                                @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->sku)
                            disabled
                            @endif
                            @endforeach
                            @endif
                            >
                        </th>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{ env('VIEW_IMG').$item->product->img }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{ $item->product->name }}</p>

                        </td>
                        <td>
                            <strong class="mb-0 mt-4">@if ($item->product->status === 0)
                                {{ $item->product->sku }}
                                @else
                                @foreach ($variantGroups[$item->sku] ?? [] as $variant)
                                {{ $variant->sku }}
                                @endforeach
                                @endif
                            </strong>
                        </td>
                        <td>
                            <p class="mb-0 mt-4 text-danger">
                                @if ($item->product->status === 0)
                                {{ number_format($item->product->price_sale) }} VNĐ
                                @else
                                @if(isset($variantGroups[$item->sku]) && $variantGroups[$item->sku]->isNotEmpty())
                                @foreach($variantGroups[$item->sku] as $variant)
                                {{ number_format($variant->price_sale) }} VNĐ
                                @endforeach
                                @endif
                                @endif
                            </p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quantities[{{ $item->id }}]" class="form-control form-control-sm text-center border-0" value="{{ $item->quantity }}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4 text-success">
                                @if ($item->product->status === 0)
                                {{ number_format($item->product->price_sale * $item->quantity) }} VNĐ
                                @else
                                @if(isset($variantGroups[$item->sku]) && $variantGroups[$item->sku]->isNotEmpty())
                                @foreach($variantGroups[$item->sku] as $variant)
                                {{ number_format($variant->price_sale * $item->quantity) }} VNĐ
                                @endforeach
                                @endif
                                @endif
                            </p>
                            @if (!empty($lowStockVariants))
                            @foreach ($lowStockVariants as $stock)
                            @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->sku)
                                <p>Còn lại : {{$stock['stock']}}</p>
                                @endif
                                @endforeach
                                @endif

                        </td>
                        <td>
                            <p formaction="{{ route('client.removeCart', ['id' => $item->id]) }}" formmethod="post" class="btn btn-md rounded-circle bg-light border mt-4" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                <i class="fa fa-times text-danger"></i>
                            </p>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th>
                            <input
                                type="checkbox"
                                name="selectBox[]"
                                value="{{ $item }}"
                                class="cart-checkbox"
                                @if (!empty($lowStockVariants))
                                @foreach ($lowStockVariants as $stock)
                                @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->attributes->sku)
                            disabled
                            @endif
                            @endforeach
                            @endif
                            >
                        </th>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{ env('VIEW_IMG') .$item->attributes->img}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <strong class="mb-0 mt-4">{{ $item->name }}</strong>
                        </td>
                        <td>
                            <strong class="mb-0 mt-4">{{ $item->attributes->sku }}</strong>
                        </td>
                        <td>
                            <p class="mb-0 mt-4 text-danger">{{ number_format($item->price) }} VNĐ</p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quantities[{{ $item->id }}]" class="form-control form-control-sm text-center border-0" value="{{ $item->quantity }}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4 text-success">{{ number_format(($item->price) * ($item->quantity)) }} VNĐ</p>

                            @if (!empty($lowStockVariants))
                            @foreach ($lowStockVariants as $stock)
                            @if ($stock['stock'] < $item->quantity && $stock['sku'] == $item->attributes->sku)
                                <p>Còn lại : {{$stock['stock']}}</p>
                                @endif
                                @endforeach
                                @endif
                        </td>
                        <td>
                            <button formaction="{{ route('client.removeCart', ['id' => $item->id]) }}" formmethod="post" class="btn btn-md rounded-circle bg-light border mt-4" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    @endif
                    @endforeach

                    @endif
                </tbody>
            </table>

            <div class="mt-3 d-flex justify-content-sm-end">
                {{auth()->check() ? $cartItems->links() : ""}}
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Tổng tiền </h5>
                            <p class="mb-0 pe-4 text-success">{{ number_format($cartTotal) }} VNĐ</p>
                        </div>
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit">Thanh toán</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
<script>
    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('.cart-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        toggleDeleteButton();
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Tìm tất cả các toast
        const toastElements = document.querySelectorAll(".toast");

        toastElements.forEach((toast) => {
            // Hiển thị toast bằng Bootstrap
            const bsToast = new bootstrap.Toast(toast, {
                delay: 3000
            }); // 3000ms = 3 giây
            bsToast.show();

            // Tự động ẩn toast sau 3 giây
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        });
    });
    toastOptions = {
        autohide: true,
        delay: 5000 // Thời gian hiển thị (ms)
    };
    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
</script>