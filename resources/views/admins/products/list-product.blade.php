@extends('admins.layouts.master')

@section('title', 'Product | Danh sách sản phẩm')

@section('start-page-title' , 'Danh sách sản phẩm')

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
            <th scope="col">Danh mục</th>
            <th scope="col">Biến thể</th>
            <th scope="col">Slug</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($products))
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>
                <img src="{{ env('VIEW_IMG').'/'.$product->img}}" alt="Ảnh sản phẩm" style="width:150px">
            </td>
            <td>{{ app('formatPrice')($product->price_regular)}} VNĐ</td>
            <td>{{ app('formatPrice')($product->price_sale) }} VNĐ</td>
            <td>
                <p style="width: 200px;display: -webkit-box;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 3;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            max-height: 4.5em;
                            line-height: 1.5;">
                    {{ $product->description }}
                </p>
            </td>
            <td>
                @foreach ( $product->categories as $category)
                <p>{{$category->name}}</p>
                @endforeach
            </td>
            <td>
                @foreach ( $product->variantDetails as $variants)
                <p>{{$variants->value}}</p>
                @endforeach
            </td>
            <td>{{$product->slug}}</td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.products.show', ['product' => $product->id]) }}" style="background-color: transparent;"
                        class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                    <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: transparent; border: none; color: inherit;" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach

        @elseif(!isset($products) && $products == null)
        <p>Chưa có sản phẩm nào</p>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end mt-3">
    {{$products->links('pagination::bootstrap-4')}}
</div>
@endsection