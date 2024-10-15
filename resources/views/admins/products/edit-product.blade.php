@extends('admins.layouts.master')

@section('title', 'Product | Thay đổi sản phẩm')

@section('start-page-title', 'Thay đổi sản phẩm')

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
<form class="needs-validation" novalidate action="{{ route('admin.products.products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$product->name}}" required>
                <x-feedback name="name" />
            </div>
            <div class="row mb-3">
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Giá thông thường - VNĐ</label>
                    <input type="number" class="form-control" name="price_regular" value="{{ $product->price_regular}}" required>
                    <x-feedback name="price_regular" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Giá được giảm - VNĐ</label>
                    <input type="number" class="form-control" name="price_sale" value="{{$product->price_sale}}" required>
                    <x-feedback name="price_sale" />
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom03" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{ $product->slug}}" required>
                <x-feedback name="slug" />
            </div>
            <div class="mb-3">
                <label for="ckeditor">Mô tả</label>
                <textarea name="description" id="ckeditor" class="form-control" required>{!! $product->description !!}</textarea>
                <x-feedback name="description" />
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thay đổi</button>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Ảnh đại diện -->
            <div class="mb-3">
                <label for="inputFileAvatar">Ảnh đại diện</label>
                <input type="file" class="form-control" name="img" id="inputFileAvatar" required onchange="previewImage(event, 'imagePreviewAvatar')">
                <x-feedback name="img" />
            </div>
            <div class="form-group mb-3">
                <img id="imagePreviewAvatar" src="#" alt="Preview ảnh đại diện" style="max-width: 150px; display: none;">
            </div>
            <div class="form-group mb-3">
                <img id="imageAvatar" src="{{ env('VIEW_IMG').'/'.$product->img}}" alt="Ảnh đại diện" style="max-width: 150px;">

            </div>

            <!-- Ảnh Slide -->
            <div class="mb-3">
                <label for="inputFileSlide">Ảnh Slide</label>
                <input type="file" class="form-control" name="slides[]" id="inputFileSlide" multiple required onchange="previewMultipleImages(event)">
                <x-feedback name="slides" />
            </div>
            <div class="form-group mb-3 grid gap-3" id="imagePreviewSlideContainer"></div>
            <div class="form-group mb-3 imageSlideContainer" id="imageSlideContainer">
                @foreach ($product->galleries as $data)
                <img src="{{ env('VIEW_IMG').'/'.$data->path}}" alt="Ảnh đại diện" style="max-width: 150px;">
                @endforeach
            </div>
            <!-- Biến thể -->
            <div class="mb-3">
                <label>Biến thể</label>
                <div class="form-check">
                    @foreach ($variants as $detail)
                    <div class="mb-3 mx-5">
                        <p>{{$detail[0]->variant->name}}</p>
                        @foreach ($detail as $name)
                        <div class="form-check form-switch form-check-inline" dir="ltr">
                            <input type="checkbox" name="variants[]" value="{{ $name->id }}" class="form-check-input" id="inlineswitch{{$name->id}}"
                                {{ isset($product->variantDetails) && $product->variantDetails->contains('pivot.variant_detail_id', $name->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineswitch{{$name->id}}">{{$name->value}}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <x-feedback name="variants" />
                </div>
            </div>
            <!-- Danh mục -->
            <div class="mb-3">
                <label for="select">Danh mục</label>
                <select class="form-select" name="category_id" required>
                    <option selected disabled>Vui lòng chọn danh mục</option>
                    @foreach ($categories as $category)
                    <option required value="{{  $category->id }}" {{ isset($product->categories) && $product->categories->contains('pivot.category_id', $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <x-feedback name="category_id" />
            </div>
        </div>
    </div>
</form>
@endsection