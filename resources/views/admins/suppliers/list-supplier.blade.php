@extends('admins.layouts.master')

@section('title', 'Supplier | Danh sách nhà cung cấp')

@section('start-page-title', 'Danh sách nhà cung cấp')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.suppliers.index') }}">Nhà cung cấp</a></li>
    <li class="breadcrumb-item active">Danh sách nhà cung cấp</li>
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
                <div class="search-box ms-2">
                    <input type="text" class="form-control search" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </div>
    <table class="table table-striped align-middle text-center mb-0">
        <thead>
           
                <th scope="col">Id</th>
                <th scope="col">Tên nhà cung cấp</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
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
                        <td class="truncate-text">{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td class="truncate-text">{{ $supplier->address }}</td>
                        <td>
                            <a href="{{ route('admin.suppliers.detail', $supplier->id) }}"
                                class="text-decoration-underline">Xem chi tiết</a>
                        </td>
                        <td>{{ $supplier->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $supplier->updated_at->format('d-m-Y H:i:s') }}</td>
                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.suppliers.edit', $supplier) }}"
                                    style="background-color: transparent;" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.suppliers.destroy', $supplier) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background-color: transparent; border: none; color: inherit;"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
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
                alert("Vui lòng chọn ít nhất một mục để xóa.");
                return;
            }

            if (confirm("Bạn có chắc chắn muốn xóa các mục đã chọn?")) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.suppliers.bulkDelete') }}",
                    data: {
                        ids: selectedIds,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "dataType",
                    success: function(response) {
                        window.location.reload();
                        console.log(selectedIds);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        }
    </script>
@endsection
