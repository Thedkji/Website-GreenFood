@extends('clients.layouts.master')

@section('title', 'Fruitables - Thanh toán')

@section('title_page', 'Thanh toán')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Thanh toán')

@section('content')
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

<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Chi tiết đơn hàng</h1>
        <form action="{{route('client.getCheckOut')}}" method="POST">
            @csrf
            @method('POST')
            <div class="row g-5 mt-5">
                <div class="col-md-12 col-lg-6 col-xl-6 row">
                    <div class="col-md-12 col-lg-6">
                        <div class="form-item">
                            <label class="form-label my-3">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="fullName" value="{{$userInfo ? $userInfo->name : old('fullName')}}">
                            <x-feedback name="fullName" />
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" class="form-control" value="{{$userInfo ? $userInfo->phone : old('phone')}}">
                            <x-feedback name="phone" />
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{$userInfo ? $userInfo->email : old('email')}}">
                            <x-feedback name="email" />
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Ghi chú (Nếu có)</label>
                            <textarea name="note" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Ghi chú (Nếu có)">{{ old('note') }}</textarea>
                            <x-feedback name="note" />
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="form-item">
                            <label for="province" class="form-label my-3">Thành phố <span class="text-danger">*</span></label>
                            <select name="province" id="province" class="form-select" value="{{ old('province') }}">
                                <option value="">Chọn Thành phố</option>
                                @php
                                if(auth()->check()){
                                if($userInfo->province && $userInfo->province !== null){
                                $check = array_filter(array_column($provinces, 'ProvinceName'), function($provinceName) use ($userInfo) {
                                return stripos($provinceName, $userInfo->province) !== false;
                                });
                                $check = array_values($check); // Đảm bảo mảng có chỉ mục liên tiếp
                                }
                                }
                                @endphp
                                @foreach ($provinces as $province)
                                @if (auth()->check())
                                <option value="{{ $province['ProvinceID'] }}"
                                    @php
                                    // Kiểm tra nếu có tỉnh đã chọn và so sánh
                                    if($userInfo->province && $userInfo->province !== null){
                                    // Kiểm tra nếu có tỉnh phù hợp và đánh dấu là selected
                                    echo (!empty($check) && stripos($province['ProvinceName'], $check[0]) !== false) ? 'selected' : '';
                                    }
                                    @endphp
                                    >
                                    {{ $province['ProvinceName'] }}
                                </option>
                                @else
                                <option value="{{ $province['ProvinceID'] }}">
                                    {{ $province['ProvinceName'] }}
                                </option>
                                @endif
                                @endforeach

                            </select>
                            <x-feedback name="province" />
                        </div>
                        <div class="form-item">
                            <label for="district" class="form-label my-3">Quận/Huyện <span class="text-danger">*</span></label>
                            <select name="district" id="district-dropdown" class="form-select" value="{{old('district')}}">
                                <option value="">Chọn Quận/Huyện</option>
                            </select>
                            <x-feedback name="district" />
                        </div>
                        <div class="form-item">
                            <label for="ward" class="form-label my-3">Phường/Xã <span class="text-danger">*</span></label>
                            <select name="ward" id="ward-dropdown" class="form-select" value="{{old('ward')}}">
                                <option value="">Chọn Phường/Xã</option>
                            </select>
                            <x-feedback name="ward" />
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$userInfo ? $userInfo->address : old('address')}}">
                            <x-feedback name="address" />
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Phương thức thanh toán <span class="text-danger">*</span></label>

                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="radio" class="form-check-input bg-primary border-0" id="Paypal-1" name="payment_method" value="VNPay">
                                        <label class="form-check-label" for="Paypal-1">
                                            <i class="fa fa-credit-card"></i> Chuyển khoản VN Pay
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="radio" class="form-check-input bg-primary border-0" id="Delivery-1" name="payment_method" value="Delivery" checked>
                                        <label class="form-check-label" for="Delivery-1">
                                            <i class="fa fa-money-bill"></i> Tiền mặt
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4 mt-5">
                        <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Thanh toán</button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="table-responsive">
                        <table class="table text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 120px;">Hình ảnh</th>
                                    <th>Thông tin</th>
                                    <th style="width: 150px;">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalDiscount = 0;
                                @endphp
                                @foreach ($decodedItems as $item)
                                @php
                                if($userInfo){
                                $itemPrice = $item['product']['status'] === 0
                                ? $item['product']['price_sale']
                                : ($variantDetails[$item['sku']]->price_sale ?? $item['price']);
                                }else{
                                $itemPrice = $item['price'];
                                }
                                $itemQuantity = $item['quantity'];
                                @endphp
                                <tr>
                                    <td>
                                        @php
                                        $imageSrc = env('VIEW_IMG') . '/';
                                        if (isset($userId)) {
                                        if ($item['product']['status'] === 0) {
                                        $imageSrc .= $item['product']['img'];
                                        } else {
                                        $imageSrc .= $variantDetails[$item['sku']]->img ?? $item['product']['img'];
                                        }
                                        } else {
                                        if ($item['attributes']['status'] === 0) {
                                        $imageSrc .= $item['attributes']['img'];
                                        } else {
                                        $imageSrc .= $variantDetails[$item['attributes']['sku']]->img ?? $item['attributes']['img'];
                                        }
                                        }
                                        @endphp
                                        <img src="{{ $imageSrc }}" name="image" class="img-fluid rounded" style="width:80px; height:80px;" alt="Sản phẩm">
                                    </td>
                                    <td class="text-start">
                                        <strong>
                                            @if (isset($userId))
                                            {{ $item['product']['name'] }}
                                            @if (!empty($variantDetails[$item['sku']]))
                                            | {{ optional(\App\Models\Variant::find($variantDetails[$item['sku']]->variants[0]['parent_id']))->name }} - {{ $variantDetails[$item['sku']]->variants[0]['name'] }}
                                            @endif
                                            @else
                                            {{ $item['name'] }}
                                            @if (!empty($variantDetails[$item['attributes']['sku']]))
                                            | {{ optional(\App\Models\Variant::find($variantDetails[$item['attributes']['sku']]->variants[0]['parent_id']))->name }} - {{ $variantDetails[$item['attributes']['sku']]->variants[0]['name'] }}
                                            @endif
                                            @endif
                                        </strong><br>
                                        <span class="text-muted"><span class="text-danger" id="price_old">{{ number_format($itemPrice) }} VNĐ</span><span class="text-danger" id="price_new"></span></span>
                                        <span>X {{ $itemQuantity }} <strong>{{ $userInfo ? $item['sku'] :  $item['attributes']['sku'] }}</strong></span>
                                    </td>
                                    <td>
                                        <strong class="text-primary">{{ number_format($itemPrice * $itemQuantity) }} VNĐ</strong>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="table-light">
                                    <td colspan="2" class="text-end"><strong>Tổng tiền:</strong></td>
                                    <td><strong class="text-primary">{{ number_format($totalPrice) }} VNĐ</strong></td>
                                </tr>
                                <tr id="coupon-detail-table">
                                </tr>
                                <tr class="feeShip">
                                    <td colspan="2" class="text-end"><strong>Phí ship:</strong></td>
                                    <td><strong class="text-primary" id="feeShip">0 VNĐ</strong></td>
                                </tr>
                                <tr class="table-light">
                                    <td colspan="2" class="text-end"><strong>Tổng tiền sau cùng:</strong></td>
                                    <td><strong class="text-primary" id="totalPrice">{{ number_format($totalPrice) }} VNĐ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="coupon-detail123"></div>
                        @if(!session('coupon'))
                        <input type="hidden" name="total" value="{{$totalPrice}}">
                        @endif
                    </div>
                    <input type="hidden" name="coupon[]" value="">
                    <input type="hidden" name="deliveryFee" value="">
                    <input type="hidden" name="couponFee" value="">
                    <input type="hidden" name="total" value="{{session('coupon') ? $totalPriceCoupon : $totalPrice}}">
                    <input type="hidden" name="data[]" value="{{ json_encode($decodedItems)}}">

        </form>
        <form id="couponForm" action="{{ route('client.applyCoupon') }}" method="post">
            @csrf
            <div class="d-flex mt-5 justify-content-around">
                <input type="text" name="coupon_name" id="" class="form-control " placeholder="Nhập mã giảm giá">
                <button class="btn border-secondary w-50 text-primary">Áp dụng mã</button>
            </div>
            <div class="mt-5 row">
                <select class="form-select col" aria-label="Coupon selection" name="coupon_id" id="coupon_id">
                    <option value="" disabled {{ !session('coupon') ? 'selected' : '' }}>Chọn mã giảm giá</option>
                    @if ($availableCoupons->isEmpty())
                    <option value="" disabled>Không có mã giảm giá</option>
                    @else
                    @foreach ($availableCoupons as $coupon)
                    <option value="{{ $coupon->id }}"
                        data-discount="{{ $coupon->maximum_spend }}"
                        {{ session('coupon') && session('coupon.id') == $coupon->id ? 'selected' : '' }}>
                        {{ $coupon->name }}
                    </option>
                    @endforeach
                    @endif
                </select>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- Checkout Page End -->
@include('clients.checkouts.script-checkout')
@endsection