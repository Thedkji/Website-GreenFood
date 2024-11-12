@extends('admins.layouts.master')

@section('title', 'Thêm mới biến thể')

@section('start-page-title', 'Thêm mới biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item active">Thêm mới biến thể</li>
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
    <form method="post" action="{{ route('admin.variants.store') }}">
        @csrf
        @method('POST')
        <div class="row w-50">
            <div class="col-lg-8">
                <div class="mb-3">
                    <label for="" class="form-label">Tên biến thể</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>

                @error('name')
                    <div class="text-danger my-3">{{ $message }}</div>
                @enderror

                <div>
                    <select name="selectVariant" class="form-select" onchange="variantChange()">
                        <option value="0">Biến thể không có giá trị</option>
                        <option value="1">Giá trị của biến thể</option>
                    </select>
                </div>

                <!-- Sửa tên và ẩn select này -->
                <div id="valueSelectContainer" class="d-none my-3">
                    <select name="parent_id" class="form-select">
                        @foreach ($variants as $variant)
                            <option value="{{ old('parent_id', $variant->id) }}">{{ $variant->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 my-3">
                    <button class="btn btn-success" type="submit">Thêm mới</button>
                </div>

                <div class="col-12 my-3">
                    <button class="btn btn-primary " type="button">
                        <a class="text-white" href="{{route('admin.variants.index')}}">Quay lại</a>
                    </button>
                </div>

            </div>
        </div>
    </form>
@endsection

<script>
    function variantChange() {
        let selectVariant = document.querySelector('select[name="selectVariant"]');
        let valueSelectContainer = document.getElementById('valueSelectContainer'); // Lấy thẻ div chứa select mới
        let value = selectVariant.value;

        // Hiển thị hoặc ẩn select mới dựa trên giá trị
        if (value == 1) {
            valueSelectContainer.classList.remove('d-none');
        } else {
            valueSelectContainer.classList.add('d-none');
        }
    }
</script>
