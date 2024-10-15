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
<table class="table table-striped align-middle  mb-0">
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
        @foreach ($products as $product)

        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>
                <img src="{{ env('VIEW_IMG').'/'.$product->img}}" alt="Ảnh sản phẩm" style="width:150px">
            </td>
            <td>{{$product->price_regular}} đ</td>
            <td>{{$product->price_sale}} đ</td>
            <td>
                <p style="width: 200px;display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
                overflow: hidden;
                text-overflow: ellipsis;
                max-height: 4.5em;
                line-height: 1.5;">
                    {!! $product->description !!}
                </p>
            </td>
            <td>{{$product->slug}}</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.products.products.show', ['product' => $product->id]) }}"
                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end mt-3">
    {{$products->links('pagination::bootstrap-4')}}
</div>
@endsection