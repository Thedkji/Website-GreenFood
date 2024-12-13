@extends('admins.layouts.master')

@section('title', 'Dashboard | Velzon - Admin - Bảng điều khiển')

@section('start-page-title', 'Bảng điều khiển')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sản phẩm đánh giá cao nhất và nhiều bình luận nhất</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá thấp nhất</th>
                                    <th>Trung bình đánh giá</th>
                                    <th>Số lượng đánh giá</th>
                                    <th>Số lượng bình luận</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    @php
                                        $minPriceVariantGroup = $product->variantGroups->sortBy('price_sale')->first();
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-light rounded p-1 me-2">
                                                    <img src="{{ Storage::url($product->img) }}" alt="{{ $product->name }}"
                                                        class="img-fluid d-block" />
                                                </div>
                                                <div>
                                                    <h5 class="truncate-text fs-14 my-1">
                                                        <a href="{{ route('client.product-detail', $product->id) }}"
                                                            class="truncate" data-fulltext="{{ $product->name }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 my-1 fw-normal">
                                                @if ($product->status == 0)
                                                    {{ app('formatPrice')($product->price_sale) }} VNĐ
                                                @else
                                                    {{ app('formatPrice')($minPriceVariantGroup->price_sale) }} VNĐ
                                                @endif
                                        </td>
                                        <td>{{ $product->average_rating }} / 5</td>
                                        <td>{{ $product->comments->flatMap->rates->count() }}</td>
                                        <td>{{ $product->comments_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<script></script>
