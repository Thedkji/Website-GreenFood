@extends('admins.layouts.master')

@section('title', 'Cập nhật biến thể')

@section('start-page-title', 'Cập nhật biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item active">Cập nhật biến thể</li>
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

    <form method="post" action="{{ route('admin.variants.update', $variant->id) }}">
        @csrf
        @method('PUT') <!-- Sử dụng PUT cho cập nhật -->

        <div class="d-flex justify-content-between w-75 gap-5">
            <!-- Phần đổi tên biến thể -->
            <div class="mb-3 me-3" style="flex: 1;">
                <label for="name" class="form-label">Tên biến thể</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $variant->name) }}">

                @error('name')
                    <div class="text-danger my-3">{{ $message }}</div>
                @enderror

                <div class="col-12 my-3">
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                </div>
            </div>

            <!-- Phần đổi giá trị biến thể -->
            <div class="mb-3" style="flex:1;">
                <label for="value" class="form-label">Giá trị biến thể</label>

                @foreach ($childrenName as $key => $child)
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2" name="parent_id[{{ $child->id }}]"
                                value="{{ old('parent_id.' . $child->id, $child->name) }}">
                            <button type="button" class="btn btn-danger btn-sm ms-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>

                        @error("parent_id.$child->id")
                            <div class="text-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach


            </div>
        </div>

    </form>
@endsection
