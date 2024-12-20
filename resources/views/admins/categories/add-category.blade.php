@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh mục sản phẩm')
@section('start-page-title', 'Thêm danh mục sản phẩm')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active">Thêm danh mục sản phẩm</li>
@endsection

@section('content')
    @include('admins.layouts.components.toast-container')
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf
        @method('POST')
        <div class="row w-50">
            <div class="col-lg-8">
                <div class="mb-3">
                    <label for="" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>

                @error('name')
                    <div class="text-danger my-3">{{ $message }}</div>
                @enderror

                <div>
                    <select name="selectCategory" class="form-select" onchange="categoryChange()">
                        <option value="0">Danh mục cha</option>
                        <option value="1">Chọn danh mục cha</option>
                    </select>
                </div>

                <!-- Sửa tên và ẩn select này -->
                <div id="valueSelectContainer" class="d-none my-3">
                    <select name="parent_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ old('parent_id', $category->id) }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 my-3">
                    <button class="btn btn-success" type="submit">Thêm mới</button>
                </div>

                <div class="col-12 my-3">
                    <button class="btn btn-primary " type="button">
                        <a class="text-white" href="{{ route('admin.categories.index') }}">Quay lại</a>
                    </button>
                </div>


            </div>
        </div>
    </form>
@endsection

@include('admins.layouts.components.toast')

<script>
    function categoryChange() {
        let selectCategory = document.querySelector('select[name="selectCategory"]');
        let valueSelectContainer = document.getElementById('valueSelectContainer'); // Lấy thẻ div chứa select mới
        let value = selectCategory.value;

        // Hiển thị hoặc ẩn select mới dựa trên giá trị
        if (value == 1) {
            valueSelectContainer.classList.remove('d-none');
        } else {
            valueSelectContainer.classList.add('d-none');
        }
    }
</script>
