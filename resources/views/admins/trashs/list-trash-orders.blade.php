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

    <h2 class="text-primary">Danh sách mua hàng</h2>
    <table class="mb-3 table table-striped table-nowrap align-middle mb-0 text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">ID Người dùng</th>
                <th scope="col">Ngày xóa</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $order->id }}</td>
                    <td scope="col">{{ $order->user_id }}</td>
                    <td scope="col">{{ $order->deleted_at }}</td>


                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.orders.editOrder', $order->id) }}" class="link-success fs-15"><i
                                    class="ri-edit-2-line"></i></a>
                            <a href="{{ route('admin.orders.destroyOrder', $order->id) }}" class="link-danger fs-15"
                                onclick="return confirm('Đơn hàng sẽ bị xóa và chuyển vào thùng rác , vẫn chấp nhận xóa ??? ')">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
