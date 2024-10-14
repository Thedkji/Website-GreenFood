@extends('admins.layouts.master')

@section('title', 'Variant | Danh sách biến thể con')

@section('start-page-title' , 'Danh sách biến thể con')

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
<table class="table table-striped table-dark align-middle  mb-0">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Tên biến thể con</th>
            <th scope="col">Giá tiền</th>
            <th scope="col">Tên biến thể cha</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($variant_details as $detail)
        <tr>
            <th scope="row">{{$detail->id}}</th>
            <td>{{$detail->value}}</td>
            <td>{{$detail->price}}</td>
            <td>
                @if (isset($detail->variant->name))
                {{$detail->variant->name}}
                @else
                <p class="text-danger">Biến thể không tồn tại</p>
                @endif
            </td>
            <td>
                <div class="hstack gap-3 flex-wrap">
                    <a href="{{ route('admin.variants.edit_child_variant', ['id' => $detail->id]) }}" style="background-color: transparent;" class="link-success fs-15">
                        <i class="ri-edit-2-line"></i>
                    </a>
                    <form action="{{ route('admin.variants.delete_child_variant', ['id' => $detail->id]) }}" method="post">
                        @csrf
                        @method('POST')
                        <button type="submit" style="background-color: transparent; border: none; color: inherit;" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end mt-3">
    {{$variant_details->links('pagination::bootstrap-4')}}
</div>
@endsection