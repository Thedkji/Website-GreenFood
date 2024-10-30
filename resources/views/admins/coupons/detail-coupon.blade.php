@extends('admins.layouts.master')
@section('title', 'Chi tiết mã giảm giá')
@section('content')
    <div class="container">
        <h2 class="mt-4">Mã giảm giá: {{ $coupon->name }}</h2>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin mã giảm giá</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Số tiền giảm giá</th>
                            <td>{{ number_format($coupon->coupon_amount, 0, ',', '.') }} đ</td>
                        </tr>
                        <tr>
                            <th>Giảm giá tối thiểu</th>
                            <td>{{ number_format($coupon->minimum_spend, 0, ',', '.') }} đ</td>
                        </tr>
                        <tr>
                            <th>Giảm giá tối đa</th>
                            <td>{{ number_format($coupon->maximum_spend, 0, ',', '.') }} đ</td>
                        </tr>
                        <tr>
                            <th>Số lượng</th>
                            <td>{{ $coupon->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Ngày bắt đầu</th>
                            <td>{{ \Carbon\Carbon::parse($coupon->start_date)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Ngày hết hạn</th>
                            <td>{{ \Carbon\Carbon::parse($coupon->expiration_date)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Loại</th>
                            <td>{{ $coupon->type == 0 ? 'Công khai' : 'Riêng tư' }}</td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td>
                                @if ($coupon->status == 0)
                                    Phát hành
                                @elseif ($coupon->status == 1)
                                    Chưa phát hành
                                @elseif ($coupon->status == 2)
                                    Chờ phát hành
                                @else
                                    Hết hạn
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Mô tả</th>
                            <td>{{ $coupon->description }}</td>
                        </tr>
                        <tr>
                            <th>Danh mục</th>
                            <td>
                                @foreach ($coupon->categories as $category)
                                    ID: {{ $category->id }} - Tên: {{ $category->name }}<br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Sản phẩm</th>
                            <td>
                                @foreach ($coupon->products as $product)
                                    ID: {{ $product->id }} - Tên: {{ $product->name }}<br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Người dùng</th>
                            <td>
                                @foreach ($coupon->users as $user)
                                    ID: {{ $user->id }} - Tên: {{ $user->name }}<br>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('admin.coupons.showCoupon') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
@endsection
