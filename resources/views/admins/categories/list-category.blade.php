@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục sản phẩm')
@section('start-page-title', 'Danh sách danh mục sản phẩm')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách danh mục sản phẩm</li>
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
            <a href="{{ route('admin.categories.create') }}" class="text-white">Thêm</a>
        </button>
    </div>



    <table class="table table-striped align-middle mb-0">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                </th>
                <th scope="col">Id</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Danh mục con</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        <input type="checkbox" class="category-checkbox" name="category_id[]" onclick="toggleDeleteButton()"
                            value="{{ $category->id }}">
                    </td>
                    <td>{{ $category->id }}</td>
                    <td>
                        @if ($category->parent_id == null)
                            {{ $category->name }}
                        @endif
                    </td>
                    <td>
                        @if ($category->children->isNotEmpty())
                            @foreach ($category->children as $child)
                                <a href="">{{ $child->name }}</a><br>
                            @endforeach
                        @else
                            <span colspan="2" class="text-danger">Không có danh mục con nào</span>
                        @endif
                    </td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                style="background-color: transparent;" class="link-success fs-15">
                                <i class="ri-edit-2-line"></i>
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: transparent; border: none; color: inherit;"
                                    onclick="return confirm('Việc này có thể xóa danh mục cùng với toàn bộ danh mục con của danh mục, vẫn chấp nhận xóa?');"
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
            <button type="button" class="btn btn-danger" id="delete-button" name="category-delete-checkbox"
                style="display: none;" onclick="deleteSelected()">Xóa</button>
        </div>

        <div class="col-sm">
            <div class="mt-3 d-flex justify-content-sm-end">
                {{ $categories->links() }}
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
            const checkboxes = document.querySelectorAll('.category-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
            toggleDeleteButton();
        }

        function toggleDeleteButton() {
            const checkboxes = document.querySelectorAll('.category-checkbox');
            const deleteButton = document.getElementById('delete-button');
            deleteButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline-block' :
                'none';
        }

        function confirmDelete(id) {
            if (confirm("Bạn có chắc chắn muốn xóa danh mục này?")) {
                deletecategory(id);
            }
        }


        function deleteSelected() {
            const selectedIds = Array.from(document.querySelectorAll('.category-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                alert("Vui lòng chọn ít nhất một danh mục để xóa.");
                return;
            }

            if (confirm("Bạn có chắc chắn muốn xóa các danh mục đã chọn?")) {
                fetch('{{ route('admin.categories.bulkDelete') }}', {
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
                            alert("Đã xóa thành công các danh mục.");
                            location.reload(); // Tải lại trang để cập nhật danh sách
                        } else {
                            alert("Có lỗi xảy ra khi xóa các danh mục.");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            }
        }
    </script>
@endsection
