@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục sản phẩm')
@section('start-page-title', 'Danh sách danh mục sản phẩm')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách danh mục sản phẩm</li>
@endsection

@section('content')
    <div class="toast-container">
        @if (session('success'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Thông báo</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white text-dark">
                    {{ session('success') }}
                </div>
                <div class="toast-progress bg-success"></div>
            </div>
        @endif

        @if (session('error'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastError">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Lỗi</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white text-dark">
                    {{ session('error') }}
                </div>
                <div class="toast-progress bg-danger"></div>
            </div>
        @endif
    </div>
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
                // Thay thế alert bằng SweetAlert2
                Swal.fire({
                    icon: 'warning',
                    title: 'Chưa chọn mục',
                    text: 'Vui lòng chọn ít nhất một mục để xóa.',
                    confirmButtonText: 'OK',
                });
                return;
            }

            // Sử dụng SweetAlert2 thay vì confirm
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc chắn muốn xóa các mục đã chọn?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu người dùng chọn "Xóa", thực hiện AJAX để xóa
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.categories.bulkDelete') }}",
                        data: {
                            'ids': selectedIds,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                // Thông báo thành công bằng SweetAlert2
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Xóa thành công!',
                                    text: 'Các mục đã được xóa thành công.',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    window.location
                                        .reload(); // Reload trang sau khi xóa thành công
                                });
                            } else {
                                // Thông báo lỗi bằng SweetAlert2
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi',
                                    text: 'Đã xảy ra lỗi. Vui lòng thử lại.',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Lỗi: ", error);
                            // Thông báo lỗi bằng SweetAlert2
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Đã xảy ra lỗi trong quá trình xóa. Vui lòng thử lại.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        }
    </script>

    @include('admins.layouts.components.toast')
@endsection
