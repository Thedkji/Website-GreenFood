@extends('admins.layouts.master')

@section('title', 'Product | Thêm mới sản phẩm')

@section('start-page-title' , 'Thêm mới sản phẩm')

@section('content')
<form class="needs-validation" novalidate>
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="validationCustom01" value="Tên 1" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="row mb-3">
                <div class="mb-3 col-lg-6 ">
                    <label for="validationCustom01" class="form-label">Giá thông thường - VNĐ</label>
                    <input type="text" class="form-control" id="validationCustom01" value="Giá 1" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="mb-3 col-lg-6 ">
                    <label for="validationCustom01" class="form-label">Giá được giảm - VNĐ</label>
                    <input type="text" class="form-control" id="validationCustom02" value="Giá 2" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom03" class="form-label">Slug</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label for="ckeditor">Mô tả</label>
                <textarea name="content" id="ckeditor" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thêm mới</button>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Ảnh đại diện -->
            <div class="mb-3">
                <label for="inputFileAvatar">Ảnh đại diện</label>
                <input type="file" class="form-control" aria-label="file example" id="inputFileAvatar" required onchange="previewImage(event, 'imagePreviewAvatar')">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="form-group mb-3">
                <img id="imagePreviewAvatar" src="#" alt="Preview ảnh đại diện" style="max-width: 300px; display: none;">
            </div>

            <!-- Ảnh Slide -->
            <div class="mb-3">
                <label for="inputFileSlide">Ảnh Slide</label>
                <input type="file" class="form-control" aria-label="file example" id="inputFileSlide" multiple required onchange="previewMultipleImages(event)">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="form-group mb-3 grid gap-3" id="imagePreviewSlideContainer">
                <!-- Các ảnh preview sẽ được thêm vào đây -->
            </div>
            <!-- Biến thể -->
            <div class="mb-3">
                <label>Biến thể</label>
                <div class="mb-3 mx-5">
                    <p>Khối lượng</p>
                    <div class="form-check form-switch form-check-inline" dir="ltr">
                        <input type="checkbox" class="form-check-input" id="inlineswitch">
                        <label class="form-check-label" for="inlineswitch">1</label>
                    </div>
                    <div class="form-check form-switch form-check-inline" dir="ltr">
                        <input type="checkbox" class="form-check-input" id="inlineswitch1">
                        <label class="form-check-label" for="inlineswitch1">2</label>
                    </div>
                </div>
                <div class="mb-3 mx-5">
                    <p>Màu sắc</p>
                    <div class="form-check form-switch form-check-inline" dir="ltr">
                        <input type="checkbox" class="form-check-input" id="inlineswitch">
                        <label class="form-check-label" for="inlineswitch">1</label>
                    </div>
                    <div class="form-check form-switch form-check-inline" dir="ltr">
                        <input type="checkbox" class="form-check-input" id="inlineswitch1">
                        <label class="form-check-label" for="inlineswitch1">2</label>
                    </div>
                </div>
            </div>
            <!-- Danh mục -->
            <div class="mb-3">
                <label for="select">Danh mục</label>
                <select class="form-select" id="select" required>
                    <option selected disabled value="">Vui lòng chọn danh mục</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
        </div>
    </div>
</form>


@endsection