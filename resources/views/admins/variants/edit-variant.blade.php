@extends('admins.layouts.master')

@section('title', 'Variant | Thay đổi biến thể')

@section('start-page-title' , 'Thay đổi biến thể')

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

            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thêm mới</button>
            </div>
        </div>
    </div>
</form>


@endsection