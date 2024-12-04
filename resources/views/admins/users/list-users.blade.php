@extends('admins.layouts.master')

@section('title', 'User | Danh sách người dùng')

@section('start-page-title', 'Danh sách người dùng')
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
        <div class="col-sm justify-content-between">
            <div class="d-flex justify-content-sm-end">

                <div class="search-box ms-2">
                    <form action="{{ route('admin.users.index') }}" method="GET">
                        <input type="text" name="search" class="form-control search"
                            value = "{{ request()->input('search') }}" placeholder="Tìm kiếm...">
                        <i class="ri-search-line search-icon"></i>
                        {{-- <button class="btn btn-primary" type="submit">Tìm kiếm</button> --}}
                    </form>
                </div>

            </div>

            <div class=""><a href="{{ route('admin.users.create') }}" class="btn btn-success">Thêm Mới</a></div>
        </div>
    </div>


    <table class="table table-striped text-center align-middle">
        <thead>
            <tr>

                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                </th>
                <th scope="col">Id</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên đăng nhập</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($users))
                @foreach ($users as $value)
                    <tr>
                        <td>
                            <input type="checkbox" class="user-checkbox" name="user-checkbox" onclick="toggleDeleteButton()"
                                value="{{ $value->id }}">
                        </td>
                        <td scope="row">{{ $value->id }}</td>
                        <td scope="row">{{ $value->name }}</td>
                        <td scope="row"><img src="{{ Storage::url($value->avatar) }}" alt="Ảnh khách hàng"
                                style="width:100px;height:100%;object-fit: cover"></td>
                        <td scope="row">{{ $value->user_name }}</td>
                        {{-- <td scope="row">{{ $value->password }}</td> --}}
                        <td scope="row">{{ $value->email }}</td>
                        <td scope="row">{{ $value->phone }}</td>
                        {{-- <td scope="row">{{ $value->province }}</td>
                        <td scope="row">{{ $value->district }}</td>
                        <td scope="row">{{ $value->ward }}</td> --}}
                        <td scope="row">{{ $value->address }}</td>
                        <td scope="row">{{ $value->role === 0 ? 'Admin' : 'User' }}</td>
                        <td scope="row">
                            <div class="hstack gap-3 flex-wrap">
                                {{-- <a href="{{ route('admin.users.detail', $value->id) }}">
                                    <i class="fa-regular fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('admin.users.show', $value->id) }}"
                                    style="background-color: transparent;" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.users.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background-color: transparent; border: none; color: inherit;"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?');"
                                            class="link-danger fs-15">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            @elseif(!isset($users) && $users == null)
                <p>Chưa có tài khoản nào</p>
            @endif
        </tbody>
    </table>
    <div class="mb-3">
        <button id="delete-selected" class="btn btn-danger d-none" onclick="deleteSelected()">Xóa đã chọn</button>
    </div>


    <div class="d-flex justify-content-end mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection

<script>
    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('.user-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        toggleDeleteButton();
    }

    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('.user-checkbox:checked');
        const deleteButton = document.getElementById('delete-selected');

        // Hiển thị nút nếu có checkbox được chọn, ẩn nếu không
        if (checkboxes.length > 0) {
            deleteButton.classList.remove('d-none'); // Hiển thị nút
        } else {
            deleteButton.classList.add('d-none'); // Ẩn nút
        }
    }

    function deleteSelected() {
        if (!confirm('Bạn có chắc chắn muốn xóa những tài khoản đã chọn?')) return;

        const selectedIds = Array.from(document.querySelectorAll('.user-checkbox:checked'))
            .map(checkbox => checkbox.value);

        if (selectedIds.length > 0) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('admin.users.bulkDelete') }}"; // Đường dẫn xử lý xóa nhiều

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = "{{ csrf_token() }}";

            const idsInput = document.createElement('input');
            idsInput.type = 'hidden';
            idsInput.name = 'ids';
            idsInput.value = JSON.stringify(selectedIds);

            form.appendChild(csrfToken);
            form.appendChild(idsInput);
            document.body.appendChild(form);

            form.submit();
        }
    }
</script>
