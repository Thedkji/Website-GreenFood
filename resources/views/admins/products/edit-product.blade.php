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
<form class="needs-validation" novalidate action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                    <input type="number" class="form-control" name="price_regular" value="{{ app('formatPrice')($product->price_regular) }} VNĐ" required>
                    <x-feedback name="price_regular" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Giá được giảm - VNĐ</label>
                    <input type="number" class="form-control" name="price_sale" value="{{ app('formatPrice')($product->price_sale) }} VNĐ" required>
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
                <input type="file" class="form-control" name="img" id="inputFileAvatar" onchange="previewImage(event, 'imagePreviewAvatar')">
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
                <input type="file" class="form-control" name="slides[]" id="inputFileSlide" multiple onchange="previewMultipleImages(event)">
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
                <div class="form-check mb-3 mx-5">
                    @foreach ($categories as $category)
                    <div class="form-check form-switch form-check-inline" dir="ltr">
                        <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" class="form-check-input" id="inlineswitch{{$category->id}}" {{ isset($product->categories) && $product->categories->contains('pivot.category_id', $category->id) ? 'checked' : '' }}>
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
        var imageAvatar = document.getElementById('imageAvatar');
        imageAvatar.style.display = 'none';
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
            var imageSlide = document.getElementById('imageSlideContainer');
            imageSlide.style.display = 'none';
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection