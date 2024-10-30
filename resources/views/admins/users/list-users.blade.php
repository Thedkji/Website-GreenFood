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
                        <input type="text" name="search" class="form-control search" placeholder="Tìm kiếm...">
                        <i class="ri-search-line search-icon"></i>
                        {{-- <button class="btn btn-primary" type="submit">Tìm kiếm</button> --}}
                    </form>
                </div>

            </div>

            <div class=""><a href="{{ route('admin.users.create') }}" class="btn btn-success">Thêm Mới</a></div>
        </div>
    </div>

    <table class="table table-striped ">
        <thead>
            <tr>
                <td scope="col">Id</td>
                <td scope="col">Name</td>
                <td scope="col">Avatar</td>
                <td scope="col">User Name</td>
                <td scope="col">Email</td>
                <td scope="col">Phone</td>
                <td scope="col">province</td>
                <td scope="col">district</td>
                <td scope="col">ward</td>
                <td scope="col">Address</td>
                <td scope="col">Role</td>
                <td scope="col">Thao Tác</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($users))
                @foreach ($users as $value)
                    <tr>
                        <th scope="row">{{ $value->id }}</th>
                        <th scope="row">{{ $value->name }}</th>
                        <th scope="row"><img src="{{ Storage::url($value->avatar) }}"  alt="Ảnh khách hàng" style="width:150px"></th>
                        <th scope="row">{{ $value->user_name }}</th>
                        {{-- <th scope="row">{{ $value->password }}</th> --}}
                        <th scope="row">{{ $value->email }}</th>
                        <th scope="row">{{ $value->phone }}</th>
                        <th scope="row">{{ $value->province }}</th>
                        <th scope="row">{{ $value->district }}</th>
                        <th scope="row">{{ $value->ward }}</th>
                        <th scope="row">{{ $value->address }}</th>
                        <th scope="row">{{ $value->role }}</th>
                        <th scope="row">
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.users.show', $value->id) }}"
                                    style="background-color: transparent;" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.users.destroy', $value->id) }}" method="post">
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
    <div class="d-flex justify-content-end mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
