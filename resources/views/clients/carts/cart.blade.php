@extends('clients.layouts.master')

@section('title', 'Fruitables - Đăng ký tài khoản')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@include('clients.layouts.components.singer-page')
<div class="container-fluid py-5">
    <div class="container py-5">
        <form action="{{ route('client.checkout') }}" method="get">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($cartItems->isNotEmpty())
                    @foreach ($cartItems as $item)
                    @if (isset($userId))
                    <tr>
                        <th>
                            <input type="checkbox" name="selectBox[]" value="{{ $item }}">
                        </th>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{ $item->product->name }}</p>
                            <p class="mb-0 mt-4"></p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">
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
                            <p class="mb-0 mt-4">
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
                        </td>
                        <td>
                            <button formaction="{{ route('client.removeCart', ['id' => $item->id]) }}" formmethod="post" class="btn btn-md rounded-circle bg-light border mt-4" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th>
                            <input type="checkbox" name="selectBox[]" value="{{ $item }}">
                        </th>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{ $item->name }}</p>
                            <p class="mb-0 mt-4">{{ $item->attributes->sku }}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{ number_format($item->price) }} VNĐ</p>
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
                            <p class="mb-0 mt-4">{{ number_format(($item->price) * ($item->quantity)) }} VNĐ</p>
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
            <button type="submit" formaction="{{ route('client.updateCart') }}" formmethod="post" class="btn btn-primary">Cập nhật số lượng</button>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">{{ number_format($cartTotal) }} VNĐ</p>
                        </div>
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{ route('client.deleteCart') }}" method="POST">
            @csrf
            <button onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" type="submit" class="btn btn-warning">Xóa tất cả sản phẩm</button>
        </form>
    </div>
</div>

@endsection