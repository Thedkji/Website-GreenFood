@extends('admins.layouts.master')

@section('title', 'Thêm mới biến thể')

@section('start-page-title', 'Thêm mới biến thể')

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
<form class="needs-validation" novalidate method="post" action="{{ route('admin.variants.variants.store') }}">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên biến thể</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" value="{{old('name')}}" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="valid-feedback">
                    Hợp lệ!
                </div>
                <div class="invalid-feedback">
                    Vui lòng không để trống
                </div>
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thêm mới</button>
            </div>
        </div>
    </div>
</form>
@endsection