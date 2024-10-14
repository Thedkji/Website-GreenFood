@extends('admins.layouts.master')

@section('title', 'Product | Thêm mới sản phẩm')

@section('start-page-title' , 'Thêm mới sản phẩm')

@section('content')
<form class="needs-validation" novalidate action="{{ route('admin.products.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" value="{{ old('name') }}" required>
                <div class="valid-feedback">Looks good!</div>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="mb-3 col-lg-6">
                    <label for="validationCustom01" class="form-label">Giá thông thường - VNĐ</label>
                    <input type="number" class="form-control" name="price_regular" value="{{ old('price_regular') }}" required>
                    @error('price_regular')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="validationCustom02" class="form-label">Giá được giảm - VNĐ</label>
                    <input type="number" class="form-control" name="price_sale" value="{{ old('price_sale') }}" required>
                    @error('price_sale')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom03" class="form-label">Slug</label>
                <input type="text" class="form-control" id="validationCustom03" name="slug" value="{{ old('slug') }}" required>
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ckeditor">Mô tả</label>
                <textarea name="description" id="ckeditor" class="form-control" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thêm mới</button>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Ảnh đại diện -->
            <div class="mb-3">
                <label for="inputFileAvatar">Ảnh đại diện</label>
                <input type="file" class="form-control" name="img" id="inputFileAvatar" required onchange="previewImage(event, 'imagePreviewAvatar')">
                @error('img')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <img id="imagePreviewAvatar" src="#" alt="Preview ảnh đại diện" style="max-width: 150px; display: none;">
            </div>

            <!-- Ảnh Slide -->
            <div class="mb-3">
                <label for="inputFileSlide">Ảnh Slide</label>
                <input type="file" class="form-control" name="slides[]" id="inputFileSlide" multiple required onchange="previewMultipleImages(event)">
                @error('slides')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3 grid gap-3" id="imagePreviewSlideContainer">
                <!-- Các ảnh preview sẽ được thêm vào đây -->
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
                            <input type="checkbox" name="variants[]" value="{{ $name->id }}" class="form-check-input" id="inlineswitch{{$name->id}}">
                            <label class="form-check-label" for="inlineswitch{{$name->id}}">{{$name->value}}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Danh mục -->
            <div class="mb-3">
                <label for="select">Danh mục</label>
                <select class="form-select" name="category_id" required>
                    <option selected disabled>Vui lòng chọn danh mục</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</form>


@endsection