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
                    <!-- <div class="form-check my-3">
                        <input type="checkbox" class="form-check-input" id="Account-1" name="Accounts" value="Accounts">
                        <label class="form-check-label" for="Account-1">Create an account?</label>
                    </div>
                    <hr>
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address">
                        <label class="form-check-label" for="Address-1">Ship to a different address?</label>
                    </div> -->
                    <div class="form-item">
                        <label class="form-label my-3">Ghi chú</label>
                        <textarea name="note" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Order Notes (Optional)">{{ old('note') }}</textarea>
                        <x-feedback name="note" />
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($decodedItems as $items)
                                @if (isset($userId))
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-2.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">{{$items['product']['name']}}</td>
                                    <td class="py-5">
                                        <p>{{ number_format($items['product']['status'] === 0 ? $items['product']['price_sale'] : ($variantDetails[$items['id']]->price_sale ?? $items['price'])) }} VNĐ</p>
                                    </td>
                                    <td class="py-5">{{$items['quantity']}}</td>
                                    <td class="py-5">{{$items['sku']}}</td>
                                    <td class="py-5">{{number_format( $items['product']['status'] === 0 ? $items['product']['price_sale'] : ($variantDetails[$items['id']]->price_sale ?? $items['price']) * $items['quantity'])}} VNĐ</td>
                                </tr>
                                @else
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ env('VIEW_CLIENT') }}/img/vegetable-item-2.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">{{$items['name']}}</td>
                                    <td class="py-5">{{number_format($items['price'])}} VNĐ</td>
                                    <td class="py-5">{{$items['quantity']}}</td>
                                    <td class="py-5">{{$items['attributes']['sku']}}</td>
                                    <td class="py-5">{{number_format($items['price'] * $items['quantity'])}} VNĐ</td>
                                </tr>
                                @endif
                                @endforeach

                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">{{ number_format($totalPrice) }} VNĐ</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="total" value="{{$totalPrice}}">
                        <input type="hidden" name="data[]" value="{{ json_encode($decodedItems)}}">
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1" name="Delivery" value="Delivery">
                                <label class="form-check-label" for="Delivery-1">Tiền mặt</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1" name="Paypal" value="Paypal">
                                <label class="form-check-label" for="Paypal-1">Chuyển khoản VN Pay</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Thanh toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
@endsection