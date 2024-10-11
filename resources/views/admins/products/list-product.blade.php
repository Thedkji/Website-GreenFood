@extends('admins.layouts.master')

@section('title', 'Product | Danh sách sản phẩm')

@section('start-page-title' , 'Danh sách sản phẩm')

@section('content')
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
<table class="table table-striped table-dark align-middle  mb-0">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Giá thường</th>
            <th scope="col">Giá được giảm</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Slug</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Basic Plan</td>
            <td>
                <img src="{{ env('VIEW_ADMIN') }}/images/users/avatar-1.jpg" alt="" class="avatar-md">
            </td>
            <td>860 đ</td>
            <td>Nov 22, 2021</td>
            <td>
                <p style="width: 200px;display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
                overflow: hidden;
                text-overflow: ellipsis;
                max-height: 4.5em;
                line-height: 1.5;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </td>
            <td>Nov 22, 2021</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.products.products.show', ['product' => 123]) }}"
                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Premium Plan</td>
            <td>
                <img src="{{ env('VIEW_ADMIN') }}/images/users/avatar-1.jpg" alt="" class="avatar-md">
            </td>
            <td>860 đ</td>
            <td>Nov 10, 2021</td>
            <td>
                <p style="width: 200px;display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
                overflow: hidden;
                text-overflow: ellipsis;
                max-height: 4.5em;
                line-height: 1.5;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </td>
            <td>Nov 22, 2021</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.products.products.show', ['product' => 123]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Basic Plan</td>
            <td>
                <img src="{{ env('VIEW_ADMIN') }}/images/users/avatar-1.jpg" alt="" class="avatar-md">
            </td>
            <td>860 đ</td>
            <td>Nov 19, 2021</td>
            <td>
                <p style="width: 200px;display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
                overflow: hidden;
                text-overflow: ellipsis;
                max-height: 4.5em;
                line-height: 1.5;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </td>
            <td>Nov 22, 2021</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.products.products.show', ['product' => 123]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Corporate Plan</td>
            <td>
                <img src="{{ env('VIEW_ADMIN') }}/images/users/avatar-1.jpg" alt="" class="avatar-md">
            </td>
            <td>860 đ</td>
            <td>Nov 22, 2021</td>
            <td>
                <p style="width: 200px;display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
                overflow: hidden;
                text-overflow: ellipsis;
                max-height: 4.5em;
                line-height: 1.5;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </td>
            <td>Nov 22, 2021</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.products.products.show', ['product' => 123]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endsection