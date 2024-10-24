@extends('admins.layouts.master')

@section('title', 'Product | Thêm mới sản phẩm')

@section('start-page-title', 'Thêm mới sản phẩm')

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
<form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" value="{{ old('name') }}">
                <x-feedback name="name" />
            </div>
            <div class="row mb-3">
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Giá thông thường - VNĐ</label>
                    <input type="number" class="form-control" name="price_regular" value="{{ old('price_regular') }}">
                    <x-feedback name="price_regular" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Giá được giảm - VNĐ</label>
                    <input type="number" class="form-control" name="price_sale" value="{{ old('price_sale') }}">
                    <x-feedback name="price_sale" />
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom03" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                <x-feedback name="slug" />
            </div>
            <div class="mb-3">
                <label for="ckeditor">Mô tả</label>
                <textarea name="description" id="ckeditor" class="form-control">{{ old('description') }}</textarea>
                <x-feedback name="description" />
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thêm mới</button>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Ảnh đại diện -->
            <div class="mb-3">
                <label for="inputFileAvatar">Ảnh đại diện</label>
                <input type="file" class="form-control" name="img" id="inputFileAvatar" onchange="previewImage(event, 'imagePreviewAvatar')">
                <x-feedback name="img" />
            </div>
            <div class="form-group mb-3">
                <img id="imagePreviewAvatar" src="#" alt="Preview ảnh đại diện" style="max-width: 150px; display: none;">
            </div>

            <!-- Ảnh Slide -->
            <div class="mb-3">
                <label for="inputFileSlide">Ảnh Slide</label>
                <input type="file" class="form-control" name="slides[]" id="inputFileSlide" multiple onchange="previewMultipleImages(event)">
                <x-feedback name="slides" />
            </div>
            <div class="form-group mb-3 grid gap-3" id="imagePreviewSlideContainer"></div>

            <!-- Biến thể -->
            <div class="mb-3">
                <label>Biến thể</label>
                <div class="form-check">
                    @foreach ($variants as $detail)
                    <div class="mb-3 mx-5">
                        <p>{{$detail[0]->variant->name}}</p>
                        @foreach ($detail as $name)
                        <div class="form-check form-switch form-check-inline" dir="ltr">
                            <input type="checkbox" name="variants[]" value="{{ $name->id }}" class="form-check-input" id="inlineswitch{{$name->id}}" {{ in_array($name->id, old('variants', [])) ? 'checked' : '' }}>
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
                <div class="form-check mb-3 mx-5">
                    @foreach ($categories as $category)
                    <div class="form-check form-switch form-check-inline" dir="ltr">
                        <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" class="form-check-input" id="inlineswitch{{$category->id}}" {{ in_array($category->id, old('category_id', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineswitch{{$category->id}}">{{$category->name}}</label>
                    </div>
                    @endforeach
                </div>
                <x-feedback name="category_ids" />
            </div>
        </div>
    </div>
</form>
<script>
    // Hàm xem trước 1 ảnh (Ảnh đại diện)
    function previewImage(event, previewId) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imagePreview = document.getElementById(previewId);
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
    // Hàm xem trước nhiều ảnh (Ảnh Slide)
    function previewMultipleImages(event) {
        var input = event.target;
        var files = input.files;
        var container = document.getElementById('imagePreviewSlideContainer');
        container.innerHTML = ''; // Xóa các ảnh preview trước đó
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function(e) {
                var imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.style.maxWidth = '150px';
                imgElement.style.marginRight = '10px';
                imgElement.style.marginBottom = '10px';
                container.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection