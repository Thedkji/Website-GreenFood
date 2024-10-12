@extends('admins.layouts.master')

@section('title', 'Variant | Danh sách biến thể')

@section('start-page-title' , 'Danh sách biến thể')

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
            <th scope="col">Tên biến thể cha</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Basic Plan</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.variants.variants.show', ['variant' => 123]) }}"
                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Basic Plan</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.variants.variants.show', ['variant' => 123]) }}"
                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Basic Plan</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.variants.variants.show', ['variant' => 123]) }}"
                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Basic Plan</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.variants.variants.show', ['variant' => 123]) }}"
                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endsection