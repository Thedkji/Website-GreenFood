@extends('admins.layouts.master')

@section('title', 'Variant | Thay đổi biến thể con')

@section('start-page-title' , 'Thay đổi biến thể con')

@section('content')
<form class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Tên biến thể</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$variant_detail->value}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Giá trị biến thể</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$variant_detail->price}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label for="select">Biến thể cha</label>
                <select class="form-select" id="parent_variant" name="variant_id" required>
                    <option selected disabled value="">Vui lòng chọn biến thể</option>
                    @foreach ($variants as $variant)
                    <option value="{{ $variant->id }}" {{ $variant->id == $variant_detail->variant_id ? 'selected' : '' }}>
                        {{ $variant->name }}
                    </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-secondary" type="submit">Thay đổi</button>
            </div>
        </div>
    </div>
</form>


@endsection