@include('clients.information.order-css')
@extends('clients.layouts.master')
@section('title', 'Chi tiết đơn hàng')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Chi tiết đơn hàng')
@section('content')
    <div class="toast-container">
        @if (session('success'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Thông báo</strong>
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
                    <strong class="me-auto">Lỗi</strong>
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
    <div class="container my-5" id="billing-show">
        <h2 class="text-center my-4" style="font-family: 'Arial', sans-serif; color: #4CAF50;">Chi Tiết Đơn Hàng</h2>
        <div class="row">
            <div class="col-md-8">
                <h4 class="bg-primary text-white text-center py-2" style="border-radius: 8px;">Thông tin sản phẩm</h4>
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Trạng Thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalProductPrice = 0;
                        @endphp
                        @foreach ($orderDetails as $detail)
                            @php
                                $productTotal = $detail->product_price * $detail->product_quantity;
                                $totalProductPrice += $productTotal;
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ env('VIEW_IMG') }}/{{ $detail->product_img }}" alt=""
                                        width="80" height="80" class="rounded-circle">
                                </td>
                                <td>{{ $detail->product_sku }}</td>
                                <td>
                                    @php
                                        $sku = $detail->product_sku;
                                        $product_name = null;
                                        $variant_info = null;
                                        $error_message = null;

                                        if (Str::startsWith($sku, 'SPBT')) {
                                            $variantGroup = App\Models\VariantGroup::with('product', 'variants')
                                                ->where('sku', $sku)
                                                ->first();

                                            if ($variantGroup) {
                                                $product_name = $variantGroup->product->name;
                                                $variant_info = $variantGroup->variants->pluck('name')->implode(', ');
                                            } else {
                                                $error_message = 'Không tìm thấy sản phẩm hoặc biến thể!';
                                            }
                                        } elseif (Str::startsWith($sku, 'SP')) {
                                            $product_name = $detail->product_name;
                                        } else {
                                        }
                                    @endphp

                                    @if (!empty($product_name))
                                        <p>{{ $product_name }}
                                            @if (!empty($variant_info))
                                                ({{ $variant_info }})
                                            @endif
                                        </p>
                                    @else
                                        <span class="text-danger">{{ $error_message ?? '' }}</span>
                                    @endif
                                </td>


                                <td>{{ number_format($detail->product_price) }} VNĐ</td>
                                <td>{{ $detail->product_quantity }}</td>
                                <td style="color: #4CAF50; font-weight:bolder">{{ number_format($productTotal) }} VNĐ</td>
                                <td> @switch($order->status)
                                        @case(0)
                                            <span class="badge bg-warning" style="padding: 10px;">Chờ xác nhận</span>
                                        @break

                                        @case(1)
                                            <span class="badge bg-info" style="padding: 10px;">Đã xác nhận và đang xử lý</span>
                                        @break

                                        @case(2)
                                            <span class="badge bg-primary" style="padding: 10px;">Đang giao hàng</span>
                                        @break

                                        @case(3)
                                            <span class="badge bg-success" style="padding: 10px;">Giao hàng thành công</span>
                                        @break

                                        @case(4)
                                            <span class="badge bg-info" style="padding: 10px;">Giao hàng không thành công</span>
                                        @break

                                        @case(5)
                                            <span class="badge bg-danger" style="padding: 10px;">Hủy đơn</span>
                                        @break

                                        @case(6)
                                            {{-- @php
                                                $orderDetail_id = $order->orderDetails
                                                    ->map(function ($orderDetail) {
                                                        return $orderDetail->id;
                                                    })
                                                    ->toArray();

                                                $user_id = $order->user_id;


                                                $sku = $detail->product_sku; // Mã SKU bạn muốn kiểm tra

                                                if (Str::startsWith($sku, 'SPBT')) {
                                                    $variantGroup = App\Models\VariantGroup::with('product')
                                                        ->where('sku', $sku)
                                                        ->pluck('id');

                                                    $product_id = $variantGroup->product_id;
                                                } elseif (Str::startsWith($sku, 'SP')) {
                                                    $product_id = App\Models\Product::with('variantGroups')
                                                        ->where('sku', $sku)
                                                        ->pluck('id')
                                                        ;
                                                } else {
                                                    echo 'Mã SKU không hợp lệ';
                                                }


                                            @endphp
                                            @dd($product_id) --}}

                                            {{-- @if ($orderDetail_id && $user_id && !) --}}
                                            <button class="btn btn-primary btn-sm p-2 text-white" id="review-button"
                                            data-bs-toggle="modal" data-bs-target="#rateModal-{{ $order->id }}"
                                            style="font-size: 12px;">
                                            Đánh giá
                                        </button>
                                            {{-- @endif --}}





                                            <div class="modal fade" id="rateModal-{{ $order->id }}" tabindex="-1"
                                                aria-labelledby="rateModalLabel-{{ $order->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="rateModalLabel-{{ $order->id }}">Đánh
                                                                giá sản phẩm</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('client.rate.order') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="rating-stars-{{ $order->id }}">Đánh giá:</label>
                                                                    <div class="rating-container"
                                                                        id="rating-stars-{{ $order->id }}">
                                                                        <span data-value="1" class="star">&#9733;</span>
                                                                        <span data-value="2" class="star">&#9733;</span>
                                                                        <span data-value="3" class="star">&#9733;</span>
                                                                        <span data-value="4" class="star">&#9733;</span>
                                                                        <span data-value="5" class="star">&#9733;</span>
                                                                    </div>
                                                                    <input type="hidden" name="star"
                                                                        id="star-value-{{ $order->id }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="comment">Bình luận:</label>
                                                                    <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="image">Hình ảnh (tuỳ chọn):</label>
                                                                    <input type="file" name="image" id="image"
                                                                        class="form-control">
                                                                </div>

                                                                <input type="hidden" name="order_id"
                                                                    value="{{ $order->id }}">
                                                                @php
                                                                    $sku = $detail->product_sku; // Mã SKU bạn muốn kiểm tra

                                                                    if (Str::startsWith($sku, 'SPBT')) {
                                                                        $variantGroup = App\Models\VariantGroup::with(
                                                                            'product',
                                                                        )
                                                                            ->where('sku', $sku)
                                                                            ->first();

                                                                        $product_id = $variantGroup->product_id;
                                                                    } elseif (Str::startsWith($sku, 'SP')) {
                                                                        $product_id = App\Models\Product::with(
                                                                            'variantGroups',
                                                                        )
                                                                            ->where('sku', $sku)
                                                                            ->value('id');
                                                                    } else {
                                                                        echo 'Mã SKU không hợp lệ';
                                                                    }
                                                                @endphp
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product_id }}">

                                                                <div class="modal-footer mt-3">
                                                                    <button type="button" class="btn btn-secondary text-white"
                                                                        data-bs-dismiss="modal">Hủy</button>
                                                                    <button type="submit" class="btn btn-success">Gửi đánh
                                                                        giá</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @break

                                        @case(7)
                                            <span class="badge bg-danger" style="padding: 10px;">Hủy đơn</span>
                                        @break
                                    @endswitch
                                </td>

                                @include('clients.information.orderjs')
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Thêm Tổng tiền trong khung -->
                <div class="card mt-3 shadow-sm" style="border: 1px solid #ddd; border-radius: 8px;">
                    <div class="card-body text-right" style="font-size: 16px; ">
                        <p>
                            <strong>Tổng tiền sản phẩm:</strong>
                            <span style="color: #4CAF50;">{{ number_format($totalProductPrice) }} VNĐ</span>
                        </p>
                        <p>
                            <strong>Phí giao hàng:</strong>
                            <span style="color: #FF9800;">{{ number_format($order->deliveryFee) }} VNĐ</span>
                        </p>
                        <p>
                            <strong>Voucher ưu đãi:</strong>
                            <span style="color: #00eaff;">{{ number_format($detail->coupon_price) }} VNĐ</span>
                        </p>
                        <hr style="border: 1px dashed #ddd; margin: 10px 0;">
                        <p>
                            <strong style="font-size: 18px; color: #575757;">Tổng tiền:</strong>
                            <span
                                style="color: #4CAF50; font-size: 18px; font-weight:bold">{{ number_format($order->total) }}
                                VNĐ</span>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <h4 class="bg-primary text-white text-center py-2" style="border-radius: 8px;">Thông tin đơn hàng</h4>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Mã Đơn Hàng:</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Ngày Đặt:</th>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Tên Người Nhận:</th>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email Người Nhận:</th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Số Điện Thoại Người Nhận:</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Địa Chỉ Người Nhận:</th>
                            <td>{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <th>Ghi Chú:</th>
                            <td>{{ $order->notes ?? 'Không có' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-start mt-4">
            <a href="{{ route('client.information.index') }}" class="btn bg-primary text-white"
                style="padding: 12px 30px; font-size: 16px; border-radius: 8px;">Quay lại</a>
        </div>
    </div>
    @include('admins.layouts.components.toast')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
