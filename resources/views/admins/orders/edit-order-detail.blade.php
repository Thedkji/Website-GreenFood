@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách đơn hàng')
@section('start-page-title', 'Chỉnh sửa đơn hàng ' . $order->id)
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Đơn hàng</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.showOder') }}">Danh sách đơn hàng</a></li>
    <li class="breadcrumb-item active">Chỉnh sửa đơn hàng</li>
@endsection
@section('content')
    <form action="{{ route('admin.orders.updateOrder', $order->id) }}" method="POST" class="w-50">
        @csrf
        @method('PUT')
        <div>
            <label for="status" class="form-label">Trạng thái</label>
            @php
                $statusText = [
                    0 => 'Chờ xác nhận',
                    1 => 'Đã xác nhận và đang xử lý đơn hàng',
                    2 => 'Đang giao hàng',
                    3 => 'Giao hàng thành công',
                    4 => 'Giao hàng không thành công',
                    5 => 'Hủy đơn',
                ];
            @endphp
            <div>
                <select class="form-select mb-3" name="status">
                    @foreach ($statusText as $status => $text)
                        <option value="{{ $status }}"
                            {{ old('status', $order->status) == $status ? 'selected' : '' }}>
                            {{ $text }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="my-4">
            <label for="note" class="form-label">Ghi chú</label>
            <div>
                <textarea class="form-control" id="note" name="note" rows="4">{{ old('note', $order->note) }}</textarea>
            </div>
        </div>
        <div>
            <label for="cancel_reson" class="form-label">Ghi chú hủy đơn</label>
            <div>
                <textarea class="form-control" id="cancel_reson" name="cancel_reson" rows="4">{{ old('cancel_reson', $order->cancel_reson) }}</textarea>
            </div>
        </div>
        <div>
            <button class="btn btn-primary mt-3" type="submit">Sửa</button>
        </div>
    </form>
@endsection
