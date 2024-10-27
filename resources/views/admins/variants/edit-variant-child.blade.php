@extends('admins.layouts.master')

@section('title', 'Variant | Thay đổi chi tiết biến thể')

@section('start-page-title', 'Thay đổi chi tiết biến thể')')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.list_child_variant') }}">Chi tiết biến thể</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.list_child_variant') }}">Danh sách chi tiết biến thể</a></li>
    <li class="breadcrumb-item active">Thay đổi chi tiết biến thể</li>
@endsection


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
    <form class="needs-validation" method="post" novalidate
        action="{{ route('admin.variants.update_child_variant', ['id' => $variant_detail->id]) }}">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Tên biến thể</label>
                    <input type="text" class="form-control" name="value" id="validationCustom01"
                        value="{{ $variant_detail->value }}" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Giá trị biến thể</label>
                    <input type="text" class="form-control" name="price" id="validationCustom01"
                        value="{{ $variant_detail->price }}" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="select">Biến thể cha</label>
                    <select class="form-select" id="parent_variant" name="variant_id" required>
                        <option selected disabled>Vui lòng chọn biến thể</option>
                        @foreach ($variants as $variant)
                            <option value="{{ $variant->id }}"
                                {{ $variant->id == $variant_detail->variant_id ? 'selected' : '' }}>
                                {{ $variant->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
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
