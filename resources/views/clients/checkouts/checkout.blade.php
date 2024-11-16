@extends('clients.layouts.master')

@section('title', 'Fruitables - Thanh toán')

@section('content')
@include('clients.layouts.components.singer-page')

<div class="container-fluid py-5">
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
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form action="{{route('client.getCheckOut')}}" method="POST">
            @csrf
            @method('POST')
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="form-item">
                        <label class="form-label my-3">Họ và tên</label>
                        <input type="text" class="form-control" name="fullName" value="{{$userInfo ? $userInfo->name : old('fullName')}}">
                        <x-feedback name="fullName" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Số điện thoại</label>
                        <input type="tel" name="phone" class="form-control" value="{{$userInfo ? $userInfo->phone : old('phone')}}">
                        <x-feedback name="phone" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$userInfo ? $userInfo->email : old('email')}}">
                        <x-feedback name="email" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Province</label>
                        <input type="text" class="form-control" name="province" value="{{$userInfo ? $userInfo->province : old('province')}}">
                        <x-feedback name="province" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">District</label>
                        <input type="text" name="district" class="form-control" value="{{$userInfo ? $userInfo->district : old('district')}}">
                        <x-feedback name="district" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Ward</label>
                        <input type="text" class="form-control" name="ward" value="{{$userInfo ? $userInfo->ward : old('ward')}}">
                        <x-feedback name="ward" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" value="{{$userInfo ? $userInfo->address : old('address')}}">
                        <x-feedback name="address" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Ghi chú</label>
                        <textarea name="note" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Order Notes (Optional)">{{ old('note') }}</textarea>
                        <x-feedback name="note" />
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Phương thức thanh toán</label>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom ">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Paypal-1" name="payment_method" value="VNPay">
                                    <label class="form-check-label" for="Paypal-1">Chuyển khoản VN Pay</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom ">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Delivery-1" name="payment_method" value="Delivery">
                                    <label class="form-check-label" for="Delivery-1">Tiền mặt</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 text-center align-items-center justify-content-center pt-4 mt-5">
                        <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Thanh toán</button>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>SKU</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalDiscount = 0;
                                @endphp

                                @foreach ($decodedItems as $item)
                                @php
                                $itemPrice = $item['product']['status'] === 0
                                ? $item['product']['price_sale']
                                : ($variantDetails[$item['id']]->price_sale ?? $item['price']);
                                $itemQuantity = $item['quantity'];
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ env('VIEW_IMG') . $item['product']['img'] }}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="{{ $item['product']['name'] }}">
                                    </td>
                                    <td>{{ $item['product']['name'] }}</td>
                                    <td>{{ number_format($itemPrice) }} VNĐ</td>
                                    <td>{{ $itemQuantity }}</td>
                                    <td>{{ $item['sku'] }}</td>
                                    <td>{{ number_format($itemPrice * $itemQuantity) }} VNĐ</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="table-light">
                                    <td colspan="2"></td>
                                    <td colspan="2"><strong>Tổng tiền:</strong></td>
                                    <td colspan="2"><strong>{{ number_format($totalPrice ) }} VNĐ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        @if(!session('coupon'))
                        <input type="hidden" name="total" value="{{$totalPrice}}">
                        @endif
                    </div>
                    @if (session('coupon'))
                    @php
                    $coupon = session('coupon');
                    @endphp
                    <div class="border rounded p-3 bg-light">
                        {{-- Loại mã giảm giá --}}
                        <h5 class="text-primary">Chi tiết mã giảm giá</h5>
                        @if ($coupon['type'] == 0) {{-- Mã giảm giá toàn bộ sản phẩm --}}
                        <div class="mb-3">
                            <strong>Loại giảm giá:</strong> Toàn bộ sản phẩm
                        </div>
                        @if ($coupon['discount_type'] == 1) {{-- Giảm giá theo số tiền cố định --}}
                        @php $totalPriceCoupon = $totalPrice - $coupon['amount'] @endphp
                        <div class="mb-2">
                            <strong>Số tiền được giảm:</strong>
                            <span class="text-danger">{{ number_format($coupon['amount']) }} VNĐ</span>
                        </div>
                        <div>
                            <strong>Tổng tiền sau giảm:</strong>
                            <span class="text-success">{{ number_format($totalPriceCoupon) }} VNĐ</span>
                        </div>
                        @elseif ($coupon['discount_type'] == 0) {{-- Giảm giá theo phần trăm --}}
                        @php $totalPriceCoupon = $totalPrice - ($totalPrice * $coupon['amount'] / 100) @endphp
                        <div class="mb-2">
                            <strong>Số tiền được giảm:</strong>
                            <span class="text-danger">{{ number_format($totalPrice * $coupon['amount'] / 100) }} VNĐ</span>
                        </div>
                        <div>
                            <strong>Tổng tiền sau giảm:</strong>
                            <span class="text-success">{{ number_format($totalPriceCoupon) }} VNĐ</span>
                        </div>
                        @endif
                        @elseif ($coupon['type'] == 1) {{-- Mã giảm giá áp dụng cho một số sản phẩm --}}
                        <div class="mb-3">
                            <strong>Loại giảm giá:</strong> Áp dụng cho một số sản phẩm
                        </div>
                        <h6 class="text-primary">Chi tiết giảm giá từng sản phẩm:</h6>
                        <ul class="list-unstyled">
                            @php
                            $totalDiscount = 0;
                            $totalPriceCoupon = 0;
                            @endphp
                            @foreach ($decodedItems as $item)
                            @php
                            $category = \App\Models\Category::with('products')
                            ->whereHas('products', function ($query) use ($item) {
                            $query->where('id', $item['product']['id']);
                            })->get();

                            $itemPrice = $item['product']['status'] === 0
                            ? $item['product']['price_sale']
                            : ($variantDetails[$item['id']]->price_sale ?? $item['price']);
                            $itemQuantity = $item['quantity'];

                            $couponProduct = in_array($item['product']['id'], $coupon['product_id']);
                            $couponCategory = !empty(array_intersect($category->pluck('id')->toArray(), $coupon['category_id']));
                            $discount = 0;
                            $couponName = null;
                            if ($couponProduct || $couponCategory) {
                            $couponName = $coupon['name'] ?? null;
                            if ($coupon['discount_type'] == 1) {
                            $discount = $coupon['amount'] * $itemQuantity;
                            } else {
                            $discount = ($itemPrice * $coupon['amount'] / 100) * $itemQuantity;
                            }
                            $totalPriceForItem = ($itemPrice * $itemQuantity) - $discount;
                            } else {
                            $totalPriceForItem = $itemPrice * $itemQuantity;
                            }

                            $totalDiscount += $discount;
                            $totalPriceCoupon += $totalPriceForItem;
                            @endphp
                            <li class="mb-2">
                                <strong>{{ $item['product']['name'] }}</strong>
                                <ul class="mb-0">
                                    <li>Giá gốc: {{ number_format($itemPrice) }} VNĐ</li>
                                    <li>Số lượng: {{ $itemQuantity }}</li>
                                    <li>Giảm giá: <span class="text-danger">{{ number_format($discount) }} VNĐ</span></li>
                                    <li>Thành tiền sau giảm: <span class="text-success">{{ number_format($totalPriceForItem) }} VNĐ</span></li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        <div class="mt-3">
                            <strong>Tổng số tiền giảm giá:</strong>
                            <span class="text-danger">{{ number_format($totalDiscount) }} VNĐ</span>
                        </div>
                        <div>
                            <strong>Tổng tiền sau giảm:</strong>
                            <span class="text-success">{{ number_format($totalPriceCoupon) }} VNĐ</span>
                        </div>

                        @endif
                    </div>
                    @endif
                    <input type="hidden" name="total" value="{{session('coupon') ? $totalPriceCoupon : $totalPrice}}">
                    <input type="hidden" name="data[]" value="{{ json_encode($decodedItems)}}">
        </form>
        <form action="{{ route('client.applyCoupon') }}" method="post">
            @csrf
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
                        {{ $coupon->name }} - Tối đa: {{ number_format($coupon->maximum_spend) }} VND;
                        Kết thúc: {{ date('d-m-Y', strtotime($coupon->expiration_date)) }};
                        {{ $coupon->description }}
                    </option>
                    @endforeach
                    @endif
                </select>
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary col ml-2" type="submit">Áp dụng mã</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- Checkout Page End -->
@endsection