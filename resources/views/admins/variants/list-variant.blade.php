@extends('admins.layouts.master')

@section('title', 'Variant | Danh sách biến thể')

@section('start-page-title', 'Danh sách biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item active">Danh sách biến thể</li>
@endsection

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
    <div class="row g-4 mb-3">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <form action="" method="get" id="search-form">
                    <div class="search-box">
                        <input name="search" type="text" class="form-control search"
                            value="{{ request()->input('search') }}" placeholder="Nhập tìm kiếm" oninput="debounceSearch()">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="my-3">
        <button class="btn btn-success">
            <a href="{{ route('admin.variants.create') }}" class="text-white">Thêm</a>
        </button>
    </div>

    

    <table class="table table-striped align-middle mb-0">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                </th>
                <th scope="col">Id</th>
                <th scope="col">Tên biến thể</th>
                <th scope="col">Giá trị</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($variants as $variant)
                <tr>
                    <td>
                        <input type="checkbox" class="variant-checkbox" name="variant_id[]" onclick="toggleDeleteButton()"
                            value="{{ $variant->id }}">
                    </td>
                    <td>{{ $variant->id }}</td>
                    <td>
                        @if ($variant->parent_id == null)
                            {{ $variant->name }}
                        @endif
                    </td>
                    <td>
                        @if ($variant->children->isNotEmpty())
                            @foreach ($variant->children as $child)
                                <a href="">{{ $child->name }}</a><br>
                            @endforeach
                        @else
                            <span colspan="2" class="text-danger">Không có giá trị nào</span>
                        @endif
                    </td>
                    <td>{{ $variant->created_at }}</td>
                    <td>{{ $variant->updated_at }}</td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.variants.edit', ['variant' => $variant->id]) }}"
                                style="background-color: transparent;" class="link-success fs-15">
                                <i class="ri-edit-2-line"></i>
                            </a>

                            <form action="{{ route('admin.variants.destroy', $variant->id) }}" method="post"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: transparent; border: none; color: inherit;"
                                    onclick="return confirm('Việc này có thể xóa biến thể cùng với toàn bộ giá trị của biến thể, vẫn chấp nhận xóa?');"
                                    class="link-danger fs-15">
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
            <button type="button" class="btn btn-danger" id="delete-button" name="variant-delete-checkbox"
                style="display: none;" onclick="deleteSelected()">Xóa</button>
        </div>

        <div class="col-sm">
            <div class="mt-3 d-flex justify-content-sm-end">
                {{ $variants->links() }}
            </div>
        </div>
    </div>
    <script>
        let debounceTimeout;

        function debounceSearch() {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                document.getElementById("search-form").submit();
            }, 600);
        }

        function toggleSelectAll(source) {
            const checkboxes = document.querySelectorAll('.variant-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
            toggleDeleteButton();
        }

        function toggleDeleteButton() {
            const checkboxes = document.querySelectorAll('.variant-checkbox');
            const deleteButton = document.getElementById('delete-button');
            deleteButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline-block' :
                'none';
        }

        function confirmDelete(id) {
            if (confirm("Bạn có chắc chắn muốn xóa biến thể này?")) {
                deleteVariant(id);
            }
        }


        function deleteSelected() {
            const selectedIds = Array.from(document.querySelectorAll('.variant-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                alert("Vui lòng chọn ít nhất một biến thể để xóa.");
                return;
            }

            if (confirm("Bạn có chắc chắn muốn xóa các biến thể đã chọn?")) {
                fetch('{{ route('admin.variants.bulkDelete') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': '{{ csrf_token() }}' // Đảm bảo điều này được sử dụng trong Blade template
                        },

                        body: JSON.stringify({
                            ids: selectedIds
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            alert("Đã xóa thành công các biến thể.");
                            location.reload(); // Tải lại trang để cập nhật danh sách
                        } else {
                            alert("Có lỗi xảy ra khi xóa các biến thể.");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            }
        }
    </script>
@endsection
