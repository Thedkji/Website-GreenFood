@extends('admins.layouts.master')

@section('title', 'Category | Danh sách xóa mềm danh mục')

@section('start-page-title', 'Danh sách xóa mềm danh mục')

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

    <h2 class="text-primary">Danh sách danh mục</h2>
    <table class="mb-3 table table-striped table-nowrap align-middle mb-0 text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">ID danh mục cha</th>
                {{-- <th scope="col">Ngày tạo</th> --}}
                <th scope="col">Ngày xóa</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->deleted_at }}</td>

                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.trashs.restoreCategory', $category->id) }}" class="link-success fs-15"><i
                                    class="ri-edit-2-line"></i></a>

                            <form action="{{ route('admin.trashs.destroyCategory', $category) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: transparent; border: none; color: inherit;"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
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
