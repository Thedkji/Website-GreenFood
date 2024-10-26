@extends('admins.layouts.master')

@section('title', 'Dashboard | Velzon - Admin - Danh sách sản phẩm')

@section('start-page-title', 'Danh sách sản phẩm')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
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
                        value="{{ request()->input('search') }}" placeholder="Nhập tìm kiếm" oninput="debounceSearch()">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <select id="statusProduct" name="statusProduct" class="form-select w-50" onchange="this.form.submit()">
                <option value="allPro" {{ request('statusProduct') == 'allPro' ? 'selected' : '' }}>Tất cả sản phẩm</option>
                <option value="0" {{ request('statusProduct') == 0 ? 'selected' : '' }}>Sản phẩm không có biến thể
                </option>
                <option value="1" {{ request('statusProduct') == 1 ? 'selected' : '' }}>Sản phẩm có biến thể</option>
            </select>
        </div>
    </form>

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
                <th scope="col">Giá thường</th>
                <th scope="col">Giá giảm</th>
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
                        <input type="checkbox" class="order-checkbox" onclick="toggleDeleteButton()"
                            value="{{ $product->id }}">
                    </td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>
                        <img src="{{ env('VIEW_IMG') }}/{{ $product->img }}" alt=""
                            style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>{{ app('formatPrice')($product->price_regular) }} VNĐ</td>
                    <td class="text-success">{{ app('formatPrice')($product->price_sale) }} VNĐ</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="{{ route('admin.products.index', "showProVariant=$product->id") }}" data-bs-toggle="modal"
                            data-bs-target="#productVariantModal-{{ $product->id }}">
                            <span class="badge p-2 {{ $product->status == 0 ? 'bg-primary' : 'bg-success' }}">
                                {{ $product->status == 0 ? 'Không biến thể' : 'Sản phẩm có biến thể' }}
                            </span>
                        </a>


                        <!-- Modal product variant -->
                        <div class="modal fade" id="productVariantModal-{{ $product->id }}" tabindex="-1"
                            aria-labelledby="productVariantModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productVariantModalLabel">Danh mục biến thể của
                                            {{ $product->name }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="display: flex; overflow-x: auto;">
                                        @if ($product->galleries->isEmpty())
                                            <p class="text-danger">Sản phẩm không có biến thể</p>
                                        @else
                                            @foreach ($product->galleries as $image)
                                                @if ($image->path != null)
                                                    <img src="{{ env('VIEW_IMG') }}/{{ $image->path }}"
                                                        alt="{{ $product->name }}"
                                                        style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                    </td>

                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>

                    <td class="">
                        <a href="{{ route('admin.products.show', $product->id) }}">
                            <i class="fa-regular fa-eye"></i>
                        </a>


                        <a href="{{ route('admin.products.edit', $product->id) }}" class="link-success fs-15"><i
                                class="ri-edit-2-line"></i></a>


                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="link-danger fs-15"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm">
            <button type="submit" class="btn btn-danger" id="delete-button" style="display: none;">Xóa</button>
        </div>
        <div class="col-sm">
            <div class="mt-3 d-flex justify-content-sm-end">
                {{ $products->links() }}
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
        const checkboxes = document.querySelectorAll('.order-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        toggleDeleteButton();
    }

    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('.order-checkbox');
        const deleteButton = document.getElementById('delete-button');
        deleteButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline-block' :
            'none';
    }
</script>
