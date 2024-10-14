@extends('admins.layouts.master')

@section('title', 'Variant | Thêm mới biến thể con')

@section('start-page-title' , 'Thêm mới biến thể con')

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
<form class="needs-validation" method="post" action="{{route('admin.variants.create_child_variant')}}" novalidate>
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên biến thể</label>
                <input type="text" class="form-control" name="value" id="validationCustom01" value="{{old('value')}}" required>
                @error('value')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Giá trị biến thể</label>
                <input type="text" class="form-control" name="price" id="validationCustom01" value="{{old( 'price')}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="mb-3">
                <label for="select">Biến thể cha</label>
                <select class="form-select" name="variant_id" required>
                    <option selected disabled>Vui lòng chọn biến thể</option>
                    @foreach ($variants as $variant)
                    <option value="{{ $variant->id }}">
                        {{ $variant->name }}
                    </option>
                    @endforeach
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