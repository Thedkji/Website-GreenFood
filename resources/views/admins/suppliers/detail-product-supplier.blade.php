@extends('admins.layouts.master')

@section('title', 'Supplier | Danh sách nhà cung cấp')

@section('start-page-title', 'Danh sách sản phẩm của ' . $supplier->name)

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.suppliers.index') }}">Nhà cung cấp</a></li>
    <li class="breadcrumb-item active">Danh sách sản phẩm nhà cung cấp</li>
@endsection

@section('content')

    <table class="table table-striped align-middle mb-0 text-center fs-6">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên</th>
                <th scope="col">Slug</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá gốc</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Ngày sản xuất</th>
                <th scope="col">Ngày hết hạn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    @if ($product->status == 0)
                        <td>
                            <span class="text-success fw-bold">{{ $product->sku }}</span>
                        </td>
                    @else
                        <td>
                            <span
                                class="text-success fw-bold">{{ $product->variantGroups->sortBy('price_sale')->first()->sku }}</span>
                        </td>
                    @endif
                    <td class="truncate-text">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-decoration-underline">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td class="truncate-text">{{ $product->slug }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}">
                            <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt="" width="100px"
                                height="100px">
                        </a>
                    </td>

                    @if ($product->status == 0)
                        <td>{{ app('formatPrice')($product->price_regular) }} VNĐ</td>
                        <td class="fw-bold text-success">{{ app('formatPrice')($product->price_sale) }} VNĐ</td>
                    @else
                        @php
                            $minPriceVariantGroup = $product->variantGroups->sortBy('price_sale')->first();
                        @endphp
                        <td>{{ app('formatPrice')($minPriceVariantGroup->price_regular) }} VNĐ</td>
                        <td class="fw-bold text-success">{{ app('formatPrice')($minPriceVariantGroup->price_sale) }} VNĐ
                        </td>
                    @endif

                    @if ($product->quantity !== null)
                        <td>{{ $product->quantity }}</td>
                    @else
                        <td class="text-danger">Chưa cập nhật</td>
                    @endif

                    @if ($product->manufacture_date !== null && $product->expiry_date !== null)
                        <td>{{ \Carbon\Carbon::parse($product->manufacture_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($product->expiry_date)->format('d-m-Y') }}</td>
                    @else
                        <td class="text-danger">Chưa cập nhật</td>
                        <td class="text-danger">Chưa cập nhật</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
