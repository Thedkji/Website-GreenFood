@extends('admins.layouts.master')

@section('title', 'Dashboard | Velzon - Admin - Danh sách sản phẩm')

@section('start-page-title', 'Danh sách sản phẩm có biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Danh sách sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách sản phẩm có biến thể</li>
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

    <table class="table table-striped align-middle mb-0 text-center fs-6">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                </th>
                <th scope="col">ID</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá thường</th>
                <th scope="col">Giá giảm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col" colspan="3">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->variantGroups as $productVariant)
                <tr>
                    <td>
                        <input type="checkbox" class="product-checkbox" onclick="toggleDeleteButton()"
                            value="{{ $product->id }}">
                    </td>
                    <td>{{ $productVariant->id }}</td>
                    <td>{{ $productVariant->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="{{ env('VIEW_IMG') }}/{{ $productVariant->img }}" alt=""
                            style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>{{ app('formatPrice')($productVariant->price_regular) }} VNĐ</td>
                    <td class="text-success">{{ app('formatPrice')($productVariant->price_sale) }} VNĐ</td>
                    <td>{{ $productVariant->quantity }}</td>


                    <td>{{ $productVariant->created_at }}</td>
                    <td>{{ $productVariant->updated_at }}</td>

                    <td class="">
                        <a href="{{ route('admin.products.show', [$product->id, 'sku' => $productVariant->sku]) }}">
                            <i class="fa-regular fa-eye"></i>
                        </a>



                        <a href="{{ route('admin.products.edit', $productVariant->id) }}" class="link-success fs-15"><i
                                class="ri-edit-2-line"></i></a>


                        <form action="{{ route('admin.products.destroy', $productVariant->id) }}" method="POST"
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
                {{-- {{ $variantGroups->links() }} --}}
            </div>
        </div>
    </div>
@endsection

<script>
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
</script>
