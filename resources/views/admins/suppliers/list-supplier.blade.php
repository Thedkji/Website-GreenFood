@extends('admins.layouts.master')

@section('title', 'Supplier | Danh sách nhà cung cấp')

@section('start-page-title', 'Danh sách nhà cung cấp')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.suppliers.index') }}">Nhà cung cấp</a></li>
    <li class="breadcrumb-item active">Danh sách nhà cung cấp</li>
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
    <div class="row g-4">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <form action="" method="get" id="search-form">
                    <div class="search-box">
                        <input name="search" type="text" class="form-control search"
                            value="{{ request()->input('search') }}" placeholder="Nhập tên nhà cung cấp"
                            oninput="debounceSearch()">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="my-3">
        <button class="btn btn-success">
            <a href="{{ route('admin.suppliers.create') }}" class="text-white">Thêm</a>
        </button>
    </div>
    <table class="table table-striped align-middle text-center mb-0">
        <thead>
           
                <th scope="col">Id</th>
                <th scope="col">Tên nhà cung cấp</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Tổng sản phẩm</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($suppliers))
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>
                            <input type="checkbox" class="supplier-checkbox" name="supplier-checkbox"
                                onclick="toggleDeleteButton()" value="{{ $supplier->id }}">
                        </td>
                        <th scope="row">{{ $supplier->id }}</th>
                        <td class="truncate truncate-text" data-fulltext="{{ $supplier->name }}">{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td class="truncate truncate-text" data-fulltext="{{ $supplier->address }}">
                            {{ $supplier->address }}</td>
                        <td>
                            <a href="{{ route('admin.suppliers.detail', $supplier->id) }}"
                                class="text-decoration-underline">Xem chi tiết</a>
                        </td>

                        <td class="fw-bold text-success">
                            @php
                                $totalProducts = $supplier->products->count();
                            @endphp
                            {{ $totalProducts }}
                        </td>
                        <td>{{ $supplier->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.suppliers.edit', $supplier) }}"
                                    style="background-color: transparent;" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.suppliers.destroy', $supplier) }}" method="post"
                                    id="delete-form-{{ $supplier->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="deleteButton-{{ $supplier->id }}"
                                        style="background-color: transparent; border: none; color: inherit;"
                                        class="link-danger fs-15">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @elseif(!isset($suppliers) && $suppliers == null)
                <p>Chưa có nhà cung cấp nào</p>
            @endif
        </tbody>
    </table>

    <div class="row my-3">
        <div class="col-sm">
            <button type="button" class="btn btn-danger" id="delete-button" style="display: none;"
                onclick="deleteSelected()">Xóa</button>
        </div>

        <div class="col-sm">
            <div class="mt-3 d-flex justify-content-sm-end">
                {{ $suppliers->appends(request()->query())->links() }}
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
            const checkboxes = document.querySelectorAll('.supplier-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
            toggleDeleteButton();
        }

        function toggleDeleteButton() {
            const checkboxes = document.querySelectorAll('.supplier-checkbox');
            const deleteButton = document.getElementById('delete-button');
            deleteButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline-block' :
                'none';
        }

        function deleteSelected() {
            const selectedIds = Array.from(document.querySelectorAll('.supplier-checkbox:checked'))
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
                        url: "{{ route('admin.suppliers.bulkDelete') }}",
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


    {{-- Hiển thị Thông báo --}}
    @include('admins.layouts.components.toast')

    @include('admins.layouts.components.alert2')

    <!-- Đẩy mã JavaScript vào phần scripts của layout chính -->
    @push('scripts')
        {{-- Thêm đoạn này vào form xóa id="delete-form-{{ $supplier->id }}" --}}
        {{-- Thêm đoạn này vào nút(button) xóa id="deleteButton-{{ $supplier->id }}" --}}
        <!-- Lặp qua tất cả các coupon và gọi hàm alert2 cho mỗi item -->
        <script>
            @foreach ($suppliers as $item)
                alert2({{ $item->id }});
            @endforeach
        </script>
    @endpush
@endsection
