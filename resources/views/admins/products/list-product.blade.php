@extends('admins.layouts.master')

@section('title', 'Dashboard | Velzon - Admin - sản phẩm')

@section('start-page-title', 'Danh sách sản phẩm')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
@endsection

@section('content')

    @include('admins.layouts.components.toast-container')

    <form action="{{ route('admin.products.index') }}" id="search-form" method="GET" class="row mb-3 d-flex flex-row-reverse">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box">
                    <input name="search" type="text" class="form-control search"
                        value="{{ request()->input('search') }}" placeholder="Nhập tên sản phẩm" oninput="debounceSearch()">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <select id="statusProduct" name="statusProduct" class="form-select w-50" onchange="this.form.submit()">
                <option value="allPro" {{ request('statusProduct') == 'allPro' ? 'selected' : '' }}>Tất cả sản phẩm
                </option>
                <option value="0" {{ request('statusProduct') == 0 ? 'selected' : '' }}>Sản phẩm không có biến thể
                </option>
                <option value="1" {{ request('statusProduct') == 1 ? 'selected' : '' }}>Sản phẩm có biến thể</option>
            </select>
        </div>
    </form>

    <div class="my-3">
        <button class="btn btn-success">
            <a href="{{ route('admin.products.create') }}" class="text-white">Thêm</a>
        </button>
    </div>

    <table class="table table-striped align-middle mb-0 text-center fs-6">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this,'.product-checkbox')">
                </th>
                <th scope="col">STT</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên</th>
                <th scope="col">Slug</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá gốc</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Lượt xem</th>
                <th scope="col" colspan="3">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <input type="checkbox" class="product-checkbox" name="product-checkbox"
                            onclick="toggleDeleteButton('.product-checkbox')" value="{{ $product->id }}">
                    </td>
                    <td>{{ $loop->iteration }}</td>

                    @php
                        $minPriceVariantGroup = $product->variantGroups->sortBy('price_sale')->first();
                    @endphp

                    @if ($product->status == 0)
                        <td>
                            <span class="text-success fw-bold">{{ $product->sku }}</span>
                        </td>
                    @else
                        <td>
                            <span class="text-success fw-bold">
                                @foreach ($product->variantGroups as $variantGroup)
                                    <div class="d-flex justify-content-between">
                                        <span>- {{ $variantGroup->sku }}</span>
                                    </div>
                                @endforeach
                            </span>
                        </td>
                    @endif

                    <td class="truncate-text">
                        <a href="{{ route('client.product-detail', $product->id) }}" class="truncate"
                            data-fulltext="{{ $product->name }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td class="truncate-text">
                        <span class="truncate" data-fulltext="{{ $product->slug }}">{{ $product->slug }}</span>
                    </td>

                    <td>
                        <a href="{{ route('client.product-detail', $product->id) }}">
                            @if ($product->img && Storage::exists($product->img))
                                <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt=""
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <img src="{{ env('APP_URL') }}/clients/img/avatar-default.jpg" alt="{{ $product->name }}"
                                    class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                            @endif
                        </a>
                    </td>

                    @if ($product->status == 0)
                        <td>{{ app('formatPrice')($product->price_regular) }} VNĐ</td>
                        <td class="text-success fw-bold">{{ app('formatPrice')($product->price_sale) }} VNĐ</td>
                        <td>{{ $product->quantity }}</td>
                    @else
                        <td>
                            @foreach ($product->variantGroups as $variantGroup)
                                <div class="d-flex justify-content-between">
                                    <span>- {{ app('formatPrice')($variantGroup->price_regular) }}</span>
                                    <div> VNĐ <br></div>
                                </div>
                            @endforeach
                        </td>
                        <td class="text-success fw-bold">
                            @foreach ($product->variantGroups as $variantGroup)
                                <div class="d-flex justify-content-between">
                                    <span>- {{ app('formatPrice')($variantGroup->price_sale) }}</span>
                                    <div> VNĐ <br></div>
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($product->variantGroups as $variantGroup)
                                <div class="">
                                    <span>- {{ $variantGroup->quantity }}</span>
                                </div>
                            @endforeach
                        </td>
                    @endif
                    <td>
                        <span class="badge p-2 truncate {{ $product->status == 0 ? 'bg-primary' : 'bg-success' }}"
                            data-fulltext="Ngày tạo: {{ $product->created_at->format('d-m-Y H:i:s') }}">
                            {{ $product->status == 0 ? 'Không biến thể' : 'Có biến thể' }}
                        </span>

                    </td>

                    <td>{{ app('formatPrice')($product->view) }}</td>

                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="link-success fs-15 truncate"
                            data-fulltext="Chỉnh sửa">
                            <i class="ri-edit-2-line"></i>
                        </a>
                    </td>
                    <td>
                        <div>

                            <!-- Nút xóa -->
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                style="display:inline;" id="delete-form-{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="link-danger fs-15 border-0 bg-transparent truncate"
                                    id="deleteButton-{{ $product->id }}" data-fulltext="Xóa">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row my-3">
        <div class="col-sm">
            <button type="button" class="btn btn-danger" id="delete-button" name="product-delete-checkbox"
                style="display: none;"
                onclick="deleteSelected('.product-checkbox:checked', '{{ route('admin.products.bulkDelete') }}')">Xóa</button>
        </div>

        <div class="col-sm">
            <div class="mt-3 d-flex justify-content-sm-end">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection

@include('admins.layouts.components.toast')

{{-- Thực thi tìm kiếm sau 1 khoảng thời gian --}}
@include('admins.layouts.components.search-time')

{{-- Thực thi xóa nhiều --}}
@include('admins.layouts.components.toggleDelete')

{{-- Thực thi xóa từng phần tử và thay alert --}}
@include('admins.layouts.components.deleteSelected')

{{-- Hiển thị toast khi hoàn thành --}}
@include('admins.layouts.components.toast')

<!-- Bao gồm file alert2.blade.php từ thư mục components -->
@include('admins.layouts.components.alert2')

<!-- Đẩy mã JavaScript vào phần scripts của layout chính -->
@push('scripts')
    <!-- Lặp qua tất cả các coupon và gọi hàm alert2 cho mỗi item -->
    <script>
        @foreach ($products as $item)
            alert2({{ $item->id }});
        @endforeach
    </script>
@endpush
