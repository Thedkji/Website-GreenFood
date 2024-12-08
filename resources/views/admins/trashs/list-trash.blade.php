@extends('admins.layouts.master')

@section('title', 'Trash | Danh sách thùng rác')

@section('start-page-title', 'Danh sách thùng rác')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-sm">
        <div class="d-flex justify-content-sm-end">
            <form action="" method="get" id="search-form">
                <div class="search-box">
                    <input name="search" type="text" class="form-control search" value="{{ request()->input('search') }}"
                        placeholder="Nhập tìm kiếm" oninput="debounceSearch()">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </form>
        </div>
    </div>
    <form action="{{ route('admin.trashs.index') }}" id="search-form" method="GET"
        class="row mb-3 d-flex flex-row-reverse">
        <div class="col-sm">
            <select id="statusTrash" name="statusTrash" class="form-select w-25" onchange="this.form.submit()">
                <option value="allPro" {{ $statusTrash == 'allPro' ? 'selected' : '' }}>Tất cả</option>
                <option value="User" {{ $statusTrash == 'User' ? 'selected' : '' }}>Người dùng</option>
                <option value="Product" {{ $statusTrash == 'Product' ? 'selected' : '' }}>Sản phẩm</option>
                <option value="Order" {{ $statusTrash == 'Order' ? 'selected' : '' }}>Đơn hàng</option>
                <option value="Comment" {{ $statusTrash == 'Comment' ? 'selected' : '' }}>Bình luận</option>
                <option value="Supplier" {{ $statusTrash == 'Supplier' ? 'selected' : '' }}>Nhà cung cấp</option>
                <option value="Coupon" {{ $statusTrash == 'Coupon' ? 'selected' : '' }}>Mã giảm giá</option>
                <option value="Category" {{ $statusTrash == 'Category' ? 'selected' : '' }}>Danh mục</option>
                <option value="Variant" {{ $statusTrash == 'Variant' ? 'selected' : '' }}>Biến thể </option>
            </select>
        </div>
    </form>

    <h2 class="text-primary">Danh sách Xóa</h2>
    <table class="mb-3 table table-striped align-middle mb-0">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                </th>
                <th scope="col">Stt</th>
                <th scope="col">Loại</th>
                <th scope="col">Tên</th>
                <th scope="col">Ngày xóa</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @php
                $startIndex = ($trashedItems->currentPage() - 1) * $trashedItems->perPage(); // Tính chỉ số bắt đầu
            @endphp
            @foreach ($trashedItems as $item)
                <tr>
                    <td scope="row">
                        <input type="checkbox" class="trash-checkbox" name="trash-checkbox" onclick="toggleDeleteButton()"
                            value="{{ $item->id }}">
                    </td>
                    <td>{{ $startIndex + $loop->iteration }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->name ?? 'Không có tên' }}</td>
                    <td>{{ $item->deleted_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <form
                                action="{{ route('admin.trashs.restore', ['type' => class_basename($item), $item->id]) }}"
                                method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                            </form>
                            <form
                                action="{{ route('admin.trashs.destroy', ['type' => class_basename($item), $item->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa các mục đã chọn?')">Xóa vĩnh
                                    viễn</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-3">
        <form id="bulk-delete-form"
            action="{{ route('admin.trashs.destroyBulk', ['type' => class_basename($trashedItems->first())]) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="ids" id="bulk-delete-ids">
            <div class="mb-3">
                <button id="delete-selected" class="btn btn-danger d-none" type="submit"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa các mục đã chọn?')">Xóa đã chọn</button>
            </div>
        </form>


    </div>


    <!-- Hiển thị phân trang -->
    {{ $trashedItems->links() }}




@endsection
@push('scripts')
    <script>
        let debounceTimeout;

        function debounceSearch() {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                document.getElementById("search-form").submit();
            }, 600);
        }

        function toggleSelectAll(source) {
            const checkboxes = document.querySelectorAll('.trash-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
            toggleDeleteButton();
        }

        function toggleDeleteButton() {
            const checkboxes = document.querySelectorAll('.trash-checkbox:checked');
            const deleteButton = document.getElementById('delete-selected');
            deleteButton.classList.toggle('d-none', checkboxes.length === 0); // Hiển thị/ẩn nút Xóa
        }

        function deleteSelected() {
            const selectedIds = Array.from(document.querySelectorAll('.trash-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length > 0) {
                document.getElementById('bulk-delete-ids').value = selectedIds.join(',');
                document.getElementById('bulk-delete-form').submit();
            } else {
                alert('Chưa có mục nào được chọn để xóa.');
            }
        }
    </script>
@endpush
