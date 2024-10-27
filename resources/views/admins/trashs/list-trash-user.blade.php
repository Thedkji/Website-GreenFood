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
                    <input type="text" class="form-control search" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
            {{-- <div class=""><a href="{{ route('admin.users.create') }}" class="btn btn-success">Thêm Mới</a></div> --}}
        </div>
    </div>
    <h2 class="text-primary">Danh sách người dùng</h2>
    <table class="mb-3 table table-striped ">
        <thead>
            <tr>
                <td scope="col">Id</td>
                <td scope="col">Name</td>
                <td scope="col">Avatar</td>
                <td scope="col">User Name</td>
                <td scope="col">Email</td>
                <td scope="col">Phone</td>
                <th scope="col">Ngày xóa</th>

                <td scope="col">Thao Tác</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($users))
                @foreach ($users as $value)
                    <tr>
                        <th scope="row">{{ $value->id + 1 }}</th>
                        <th scope="row">{{ $value->name }}</th>
                        <th scope="row"><img src="{{ Storage::url($value->avatar) }}" alt="Ảnh khách hàng"
                                style="width:150px"></th>
                        <th scope="row">{{ $value->user_name }}</th>
                        {{-- <th scope="row">{{ $value->password }}</th> --}}
                        <th scope="row">{{ $value->email }}</th>
                        <th scope="row">{{ $value->phone }}</th>
                        <td scope="row">{{ $value->deleted_at }}</td>

                        <th scope="row">
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.users.show', ['user' => $value->id]) }}"
                                    style="background-color: transparent;" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.trashs.destroy', $value->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background-color: transparent; border: none; color: inherit;"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </th>

                    </tr>
                @endforeach
            @elseif(!isset($users) && $users == null)
                <p>Chưa có tài khoản nào</p>
            @endif
        </tbody>
    </table>


    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
