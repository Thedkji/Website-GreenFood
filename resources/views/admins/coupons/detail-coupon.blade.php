@extends('admins.layouts.master')
@section('title', 'Chi tiết mã giảm giá')
@section('content')
    <div class="container">
        <h2 class="mt-4">Chi tiết mã giảm giá: {{ $coupon->name }}</h2>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin mã giảm giá</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Giá trị muốn giảm giá </th>
                            <td>{{ number_format($coupon->coupon_amount, 0, ',', '.') }} </td>
                        </tr>
                        <tr>
                            <th>Loại giảm giá</th>
                            <td>{{ $coupon->discount_type == 0 ? 'Giảm theo phần trăm' : 'Giảm theo giá tiền' }}</td>
                        </tr>
                        <tr>
                            <th>Giá trị của giỏ hàng thấp nhất</th>
                            <td>{{ number_format($coupon->minimum_spend, 0, ',', '.') }} đ</td>
                        </tr>
                        <tr>
                            <th>Giá trị của giỏ hàng cao nhất</th>
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
                            <th>Kiểu mã giảm giá áp dụng</th>
                            <td>{{ $coupon->type == 0 ? 'Áp dụng toàn bộ giỏ hàng' : 'Áp dụng theo chỉ định' }}</td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td>
                                @switch($coupon->status)
                                    @case(0)
                                        Phát hành
                                    @break

                                    @case(1)
                                        Chưa phát hành
                                    @break

                                    @case(2)
                                        Chờ phát hành
                                    @break

                                    @default
                                        Hết hạn
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <th>Mô tả</th>
                            <td>{{ $coupon->description ?? 'Không có mô tả' }}</td>
                        </tr>
                        <tr>
                            <th>Danh mục</th>
                            <td>
                                @foreach ($coupon->categories()->whereNull('parent_id')->get() as $category)
                                    <p>ID: {{ $category->id }} - Tên: {{ $category->name }}</p>
                                @endforeach
                                @if ($coupon->categories->isEmpty())
                                    <p>Không có danh mục liên kết.</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Sản phẩm</th>
                            <td>
                                @foreach ($coupon->products as $product)
                                    <p>ID: {{ $product->id }} - Tên: {{ $product->name }}</p>
                                @endforeach
                                @if ($coupon->products->isEmpty())
                                    <p>Không có sản phẩm liên kết.</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Danh mục con được chọn</th>
                            <td>
                                @php
                                    $childCategories = $coupon->categories->filter(function ($category) {
                                        return $category->parent_id !== null; 
                                    });
                                @endphp

                                @if ($childCategories->isNotEmpty())
                                    @foreach ($childCategories as $category)
                                        <p>ID: {{ $category->id }} - Tên: {{ $category->name }}</p>
                                    @endforeach
                                @else
                                    <p>Không có danh mục con liên kết.</p>
                                @endif
                            </td>

                        </tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('admin.coupons.showCoupon') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
@endsection
