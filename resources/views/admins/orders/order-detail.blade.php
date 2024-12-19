@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Chi tiết đơn hàng -' . ($user->name ?? $orders->name))
@section('link')
<li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Danh sách đơn hàng</a></li>
<li class="breadcrumb-item active">Đơn hàng chi tiết</li>
@endsection
@section('content')

@include('admins.layouts.components.toast-container')

<div class="mb-3 border p-3 border-success rounded bg-white">
    <h5 class="fs-4 text-uppercase text-success mb-4">Trạng thái đơn hàng hiện tại</h5>
    <div class="progress progress-step-arrow bg-white">
        <!-- Chờ xác nhận -->
        @if ($orders->status >= 0)
        <div class="progress-bar bg-danger" role="progressbar" style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="0" aria-valuemin="0" aria-valuemax="6">
            <i class="fa-regular fa-clock" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "chờ xác nhận" -->
            <div class="status-label">Chờ xác nhận</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i>
            <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif

        @if ($orders->status != 5)
        <!-- Đã xác nhận và đang xử lý -->
        @if ($orders->status >= 1)
        <div class="progress-bar bg-warning" role="progressbar" style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="1" aria-valuemin="0" aria-valuemax="6">
            <i class="fa-regular fa-circle-check" style="font-size: 1.5rem;"></i>
            <!-- Biểu tượng "đã xác nhận" -->
            <div class="status-label">Đã xác nhận và đang xử lý</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i>
            <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif

        <!-- Đang giao hàng -->
        @if ($orders->status >= 2)
        <div class="progress-bar bg-primary" role="progressbar" style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="2" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-truck" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "đang giao hàng" -->
            <div class="status-label">Đang giao hàng</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i>
            <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif

        @if ($orders->status != 4)
        <!-- Giao hàng thành công -->
        @if ($orders->status >= 3)
        <div class="progress-bar bg-success" role="progressbar" style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="3" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-box" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "giao thành công" -->
            <div class="status-label">Giao hàng thành công</div>
        </div>
        <div class="progress-bar bg-transparent">
            <i class="las la-angle-right text-primary" style="font-size: 1.5rem;"></i>
            <!-- Mũi tên đến trạng thái kế tiếp -->
        </div>
        @endif
        @endif

        @if ($orders->status != 7 && $orders->status != 6)
        <!-- Giao hàng không thành công -->
        @if($orders->status >= 4)
        <div class="progress-bar bg-secondary" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="4" aria-valuemin="0" aria-valuemax="6">
            <i class="fa-regular fa-circle-xmark" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "giao không thành công" -->
            <div class="status-label">Giao hàng không thành công</div>
        </div>
        @endif
        @endif

        <!-- Đánh giá -->
        @if ($orders->status >= 6)
        <div class="progress-bar bg-info" role="progressbar" style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="6" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-star" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "đánh giá" -->
            <div class="status-label">Đánh giá</div>
        </div>

        @endif


        @endif

        @if ($orders->status != 6)
        <!-- Hủy đơn -->
        @if($orders->status >= 5)
        <div class="progress-bar bg-danger" role="progressbar"
            style="width: 16.66%; margin-right: 10px;"
            aria-valuenow="5" aria-valuemin="0" aria-valuemax="6">
            <i class="fa fa-trash" style="font-size: 1.5rem;"></i> <!-- Biểu tượng "hủy đơn" -->
            <div class="status-label">Hủy đơn</div>
        </div>
        @endif
        @endif
    </div>
</div>
<div class="mb-3 border p-3 border-success rounded bg-white">
    <h5 class="fs-4 text-uppercase text-success mb-4">Chỉnh sửa trạng thái đơn hàng</h5>
    <div class="d-flex">
        @if ($orders->status < 1)
            <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#cancelOrderModal">
            Hủy đơn hàng
            </button>
            <form action="{{ route('admin.orders.cancelOrder', $orders->id) }}" method="post" id="updateStatusForm">
                @csrf
                @method('PUT')
                <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="cancelOrderModalLabel">Lý do hủy đơn</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="status" value="5">
                            <div class="modal-body">
                                <textarea class="form-control" id="cancel_reason" name="cancel_reason" rows="4" placeholder="Nhập lý do hủy..."></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" name="status" class="btn btn-danger">Hủy đơn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif

            @switch($orders->status)
            @case(0)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm0"
                class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="1">
                <button type="button" class="btn btn-primary" id="confirmOrder">Xác nhận đơn hàng</button>
            </form>
            <script>
                $('#confirmOrder').click(function(e) {
                    document.getElementById("updateStatusForm0").submit();
                })
            </script>
            @break
            @case(1)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm1"
                class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="2">
                <button type="submit" class="btn btn-primary">Giao cho đơn vị vận chuyển</button>
            </form>
            @break

            @case(2)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm2"
                class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="4">
                <button type="submit" class="btn btn-danger">Giao không thành công</button>
            </form>
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm2"
                class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="3">
                <button type="submit" class="btn btn-primary">Đã giao thành công</button>
            </form>
            @break

            @case(3)
            <form action="{{ route('admin.orders.updateOrder', $orders->id) }}" method="post" id="updateStatusForm3"
                class="me-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="6">
                <button type="submit" class="btn btn-primary">Hoàn thành đơn hàng và đánh giá</button>
            </form>
            @break

            @case(4)
            <span class="badge bg-danger p-2">Hoàn trả hàng</span>
            @break
            @case(5)
            <span class="badge bg-danger p-2">Hủy đơn</span>
            @break
            @case(6)
            <span class="badge bg-secondary p-2">
                Giao thành công
            </span>
            @break
            @default
            <span class="badge bg-secondary p-2">
                Không thể thay đổi trạng thái :
            </span>
            <span class=" p-2">
                {{ $orders->status === 5 ? $orders->cancel_reson : '' }}
            </span>
            @endswitch
    </div>
</div>
<div class="mb-3 border p-4 border-success rounded bg-white shadow-sm">
    <h5 class="fs-4 text-uppercase text-success mb-4">Thông tin người nhận</h5>
    <div class="row">
        <div class="col-lg-6">
            <p class="mb-2 text-muted">Họ và tên:</p>
            <p class="text-dark">{{ $user->name ?? $orders->name }}</p>
            <p class="mb-2 text-muted">SĐT:</p>
            <p class="text-dark">{{ $orders->phone }}</p>
            <p class="mb-2 text-muted">Phương thức thanh toán:</p>
            <p class="text-dark">{{$orders->payment_method == 0 ? 'Tiền mặt' : 'Thanh toán VN Pay'}}</p>
            <p class="mb-2 text-muted">Ghi chú:</p>
            <p class="text-dark">
                {{ !empty($orders->note) ? $orders->note : 'Không có ghi chú' }}
            </p>
        </div>
        <div class="col-lg-6">
            <p class="mb-2 text-muted">Email:</p>
            <p class="text-dark">{{ $orders->email }}</p>
            <p class="mb-2 text-muted">Địa chỉ:</p>
            <p class="text-dark">{{ $orders->address }}</p>
            <p class="text-dark"><span id="ward">{{ $orders->ward }}</span> - <span
                    id="district">{{ $orders->district }}</span> - <span
                    id="province">{{ $orders->province }}</span></p>

        </div>
    </div>
</div>

<div class="table-responsive mt-4 mt-xl-0 border p-3 border-success rounded bg-white">
    <h5 class="fs-4 text-uppercase text-success mb-4">Chi tiết đơn hàng</h5>
    <table class="table table-striped table-nowrap align-middle mb-0 text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $totalDiscount = 0 @endphp
            @foreach ($orderDetails as $orderDetail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @php
                // Kiểm tra Product trước
                $pro = \App\Models\Product::where('sku', $orderDetail->product_sku)->first();
                if ($pro) {
                $id = $pro->id;
                } else {
                // Nếu không tìm thấy, kiểm tra VariantGroup
                $variant = \App\Models\VariantGroup::where('sku', $orderDetail->product_sku)->first();
                $id = optional($variant)->product_id; // Lấy product_id từ VariantGroup
                }
                @endphp
                <td class="truncate-text">
                    <a href="{{ route('client.product-detail', $id ?? '#') }}" class="truncate"
                        data-fulltext="{{ $orderDetail->product_name }}"> <!-- Đảm bảo $id không null -->
                        <strong>{{ $orderDetail->product_name }}</strong>
                    </a>
                </td>
                <td><strong>{{ $orderDetail->product_sku }}
                        @php
                        $check = \App\Models\VariantGroup::with('variants')
                        ->where('sku', $orderDetail->product_sku)
                        ->get();
                        if ($check) {
                        $variantGroups[$orderDetail->product_sku] = $check;
                        } else {
                        $variantGroups[$orderDetail->product_sku] = null;
                        }
                        @endphp
                        @if (!empty($variantGroups[$orderDetail->product_sku]))
                        @foreach ($variantGroups[$orderDetail->product_sku] as $variant)
                        |
                        {{ optional(\App\Models\Variant::find($variant->variants[0]['parent_id']))->name }}
                        - {{ $variant->variants[0]['name'] }}
                        @endforeach
                        @endif
                    </strong></td>
                <td>
                    <img src="{{ env('VIEW_IMG') }}/{{ $orderDetail->product_img }}" alt="Product Image"
                        style="max-width: 100px;">
                </td>
                <td class="text-success">{{ app('formatPrice')($orderDetail->product_price) }} VNĐ</td>
                <td> x {{ $orderDetail->product_quantity }}</td>
                @php
                $total = $orderDetail->product_quantity * $orderDetail->product_price;
                @endphp
                <td class="text-success">
                    {{ app('formatPrice')($total) }} VNĐ
                </td>
            </tr>
            @php $totalDiscount += $total @endphp
            @endforeach

            @if ($orderDetails->count() > 0)
            <tr>
                <td colspan="5"></td>
                <td colspan="1">
                    <p class="">Tổng tiền sản phẩm:</p>
                </td>
                <td colspan="3">
                    <h3 class="text-success">{{ app('formatPrice')($totalDiscount) }} VNĐ</h3>
                </td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td colspan="1">
                    <p>Phí ship:</p>
                </td>
                <td colspan="3">
                    <h3 class="text-danger" id="feeShip">{{ app('formatPrice')($orders->deliveryFee) }} VNĐ
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td colspan="1">
                    <p>Mã giảm giá ({{ $orderDetails->pluck('coupon_name')[0] ?? 'Không có' }}):</p>
                </td>
                @if ($orderDetails->pluck('coupon_name')[0] && $orderDetails->pluck('coupon_name')[0] != null)
                <td colspan="3">
                    <h3 class="text-success" id="coupon-fee">
                        {{ app('formatPrice')($orderDetails->pluck('coupon_price')[0]) }} VNĐ
                    </h3>
                </td>
                @endif
            </tr>
            <tr>
                <td colspan="5"></td>
                <td colspan="1">
                    <strong>Tổng tiền:</strong>
                </td>
                <td colspan="3">
                    <h3 class="text-success">{{ app('formatPrice')($orders->total) }} VNĐ</h3>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="10">
                    <h2 class="text-danger">Sản phẩm này không có chi tiết</h2>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@include('admins.orders.script')
@include('admins.layouts.components.toast')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection