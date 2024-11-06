@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục sản phẩm')
@section('start-page-title', 'Danh sách danh mục sản phẩm')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách danh mục sản phẩm</li>
@endsection
@section('content')
    <div class="row g-4 mb-3">
        <div class="col-sm">
            <form action="{{ route('admin.categories.index') }}" method="get">
                @csrf
                <div class="d-flex justify-content-sm-end">
                    <div class="search-box ms-2 w-25">
                        <input type="text" class="form-control search" name="search" placeholder="Tìm kiếm">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>

    <div>
        @session('success')
            <p class="alert alert-success">
                {{ session('success') }}
            </p>
        @endsession
    </div>

    <div class="">
        <div class="table-responsive mt-4 mt-xl-0">
            <table class="table table-striped table-nowrap align-middle mb-0 text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên danh mục cha</th>
                        <th scope="col">Tên danh mục con</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->id }}
                            </td>

                            <td>
                                @if ($category->parent_id == null)
                                    {{ $category->name }}
                                @endif
                            </td>
                            <td>
                                @if ($category->children->isNotEmpty())
                                    @foreach ($category->children as $child)
                                        <a href="">{{ $child->name }}</a> <br>
                                    @endforeach
                                @else
                                    <span colspan="2" class="text-danger">Không có giá trị </span>
                                @endif
                            </td>

                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
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
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $categories->links() }}
    </div>
@endsection
