@extends('admins.layouts.master')

@section('title', 'Dashboard | Velzon - Admin - sản phẩm')

@section('start-page-title', 'Danh sách sản phẩm')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.products.index') }}" id="search-form" method="GET"
        class="row mb-3 d-flex flex-row-reverse">
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
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                </th>
                <th scope="col">ID</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên</th>
                <th scope="col">Slug</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá gốc</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col" colspan="3">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <input type="checkbox" class="product-checkbox" name="product-checkbox"
                            onclick="toggleDeleteButton()" value="{{ $product->id }}">
                    </td>
                    <td>{{ $product->id }}</td>

                    @php
                        $minPriceVariantGroup = $product->variantGroups->sortBy('price_sale')->first();
                    @endphp

                    @if ($product->status == 0)
                        <td>
                            <span class="text-success fw-bold">{{ $product->sku }}</span>
                        </td>
                    @else
                        <td>
                            <span class="text-success fw-bold">{{ $minPriceVariantGroup->sku }}</span>
                        </td>
                    @endif

                    <td class="truncate-text">
                        <a href="{{ route('client.product-detail', $product->id) }}" class="text-decoration-underline">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td class="truncate-text">{{ $product->slug }}</td>

                    <td>
                        <a href="{{ route('client.product-detail', $product->id) }}">
                            <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt=""
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </a>
                    </td>

                    @if ($product->status == 0)
                        <td>{{ app('formatPrice')($product->price_regular) }} VNĐ</td>
                        <td class="text-success fw-bold">{{ app('formatPrice')($product->price_sale) }} VNĐ</td>
                        <td>{{ $product->quantity }}</td>
                    @else
                        <td>{{ app('formatPrice')($minPriceVariantGroup->price_regular) }} VNĐ</td>
                        <td class="text-success fw-bold">{{ app('formatPrice')($minPriceVariantGroup->price_sale) }} VNĐ
                        </td>
                        <td>{{ $minPriceVariantGroup->quantity }}</td>
                    @endif
                    <td>
                        <span class="badge p-2 {{ $product->status == 0 ? 'bg-primary' : 'bg-success' }}">
                            {{ $product->status == 0 ? 'Không biến thể' : 'Có biến thể' }}
                        </span>

                    </td>

                    <td>{{ $product->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>{{ $product->updated_at->format('d-m-Y H:i:s') }}</td>

                    <td class="">

                        <a href="{{ route('admin.products.edit', $product->id) }}" class="link-success fs-15"><i
                                class="ri-edit-2-line fs-4"></i></a>

                    </td>

                    <td>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="return confirm('Xóa sản phẩm này cũng sẽ xóa các biến thể của sản phẩm , vẫn muốn xóa ?')"
                                class="btn text-danger">
                                <i class="ri-delete-bin-line fs-4"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row my-3">
        <div class="col-sm">
            <button type="button" class="btn btn-danger" id="delete-button" name="product-delete-checkbox"
                style="display: none;" onclick="deleteSelected()">Xóa</button>
        </div>

        <div class="col-sm">
            <div class="mt-3 d-flex justify-content-sm-end">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection

<script>
    let debounceTimeout;

    function debounceSearch() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            document.getElementById("search-form").submit();
        }, 600);
    }

    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        toggleDeleteButton();
    }

    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        const deleteButton = document.getElementById('delete-button');
        deleteButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline-block' :
            'none';
    }


    function deleteSelected() {
        if ($('#delete-button').submit()) {
            if (confirm('Xóa sản phẩm này cũng sẽ xóa các biến thể của sản phẩm , vẫn muốn xóa ?')) {
                let ids = $('.product-checkbox:checked').map((_, checkbox) => checkbox.value).get();

                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.products.index') }}",
                    data: {
                        ids: ids
                    },

                    success: function(response) {
                        alert('Xóa sản phẩm thành công');
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        }
    }
</script>
