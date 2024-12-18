@extends('admins.layouts.master')

@section('title', 'User | Danh sách người dùng')

@section('start-page-title', 'Danh sách người dùng')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Quản lý người dùng</a></li>
    <li class="breadcrumb-item active">Danh sách</li>
@endsection

@section('content')
    @include('admins.layouts.components.toast-container')
    <div class="row g-4">
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
    <div class="d-flex justify-content-sm-start mb-3"><a href="{{ route('admin.users.create') }}"
            class="btn btn-success">Thêm
            Mới</a></div>
    <table class="table table-striped text-center align-middle fs-6">
        <thead>
            <tr>

                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this,'.user-checkbox')">
                </th>
                <th scope="col">Stt</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên đăng nhập</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Vai trò</th>
                <th scope="col" colspan="2">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($users))
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" class="user-checkbox" name="user_id[]"
                                onclick="toggleDeleteButton('.user-checkbox')" value="{{ $user->id }}">
                        </td>
                        <td scope="row">{{  $loop->iteration }}</td>
                        <td scope="row">{{ $user->name }}</td>
                        <td scope="row"><img src="{{ Storage::url($user->avatar) }}" alt="Ảnh khách hàng"
                                style="width:100px;height:100px;object-fit: cover"></td>
                        <td scope="row">{{ $user->user_name }}</td>
                        {{-- <td scope="row">{{ $user->password }}</td> --}}
                        <td scope="row" class="truncate-text truncate " data-fulltext="{{ $user->email }}">
                            {{ $user->email }}</td>
                        <td scope="row">{{ $user->phone }}</td>
                        {{-- <td scope="row">{{ $user->province }}</td>
                        <td scope="row">{{ $user->district }}</td>
                        <td scope="row">{{ $user->ward }}</td> --}}
                        <td scope="row" class="truncate-text truncate " data-fulltext="{{ $user->address }}">
                            {{ $user->address }}</td>
                        <td scope="row">{{ $user->role === 0 ? 'Admin' : 'User' }}</td>

                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="link-success fs-15 truncate"
                                data-fulltext="Chỉnh sửa">
                                <i class="ri-edit-2-line"></i>
                            </a>
                        </td>
                        <td>
                            <div>

                                <!-- Nút xóa -->
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    style="display:inline;" id="delete-form-{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="link-danger fs-15 border-0 bg-transparent truncate"
                                        id="deleteButton-{{ $user->id }}" data-fulltext="Xóa">
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
    <div class="row my-3">
        <div class="col-sm">
            <button type="button" class="btn btn-danger" id="delete-button" name="user-delete-checkbox"
                style="display: none;"
                onclick="deleteSelected('.user-checkbox:checked', '{{ route('admin.users.bulkDelete') }}')">Xóa</button>
        </div>
    </div>


    <div class="d-flex justify-content-end mt-3">
        {{ $users->links() }}
    </div>
@endsection

{{-- Thực thi tìm kiếm sau 1 khoảng thời gian --}}
@include('admins.layouts.components.search-time')

{{-- Thực thi xóa nhiều --}}
@include('admins.layouts.components.toggleDelete')

{{-- Thực thi xóa từng phần tử và thay alert --}}
@include('admins.layouts.components.deleteSelected')

{{-- Hiển thị toast khi hoàn thành --}}
@include('admins.layouts.components.toast')

<!-- Bao gồm file alert2.blade.php từ thư mục components -->
@include('admins.layouts.components.alert2')

<!-- Đẩy mã JavaScript vào phần scripts của layout chính -->
@push('scripts')
    <!-- Lặp qua tất cả các coupons và gọi hàm alert2 cho mỗi item -->
    <script>
        @foreach ($users as $item)
            alert2({{ $item->id }});
        @endforeach
    </script>
@endpush
