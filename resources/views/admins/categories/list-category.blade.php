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
            <div class="d-flex justify-content-sm-end">
                <div class="search-box ms-2">
                    <input type="text" class="form-control search" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </div>

    <div class="">
        <div class="table-responsive mt-4 mt-xl-0">
            <table class="table table-striped table-nowrap align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-medium">01</td>
                        <td>Basic Plan</td>
                        <td>$860</td>
                        <td>Nov 22, 2021</td>
                        <td><i class="ri-checkbox-circle-line align-middle text-success"></i> Subscribed</td>
                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.categories.edit', 1) }}" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <a href="javascript:void(0);" class="link-danger fs-15"><i
                                        class="ri-delete-bin-line"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="mt-3">
        {{ $orders->links() }}
    </div> --}}
@endsection
