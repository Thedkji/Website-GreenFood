@extends('admins.layouts.master')

@section('title', 'Variant | Thay đổi biến thể con')

@section('start-page-title' , 'Thay đổi biến thể con')

@section('content')
<form class="needs-validation" novalidate>
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên biến thể</label>
                <input type="text" class="form-control" id="validationCustom01" value="Tên 1" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Giá trị biến thể</label>
                <input type="text" class="form-control" id="validationCustom01" value="Giá 1" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label for="select">Biến thể cha</label>
                <select class="form-select" id="select" required>
                    <option selected disabled value="">Vui lòng chọn biến thể</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thêm mới</button>
            </div>
        </div>
    </div>
</form>


@endsection