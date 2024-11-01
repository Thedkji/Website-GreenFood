@extends('admins.layouts.master')

@section('title', 'Dashboard | Velzon - Admin - Danh sách chi tiết sản phẩm')

@section('start-page-title', "Danh sách chi tiết $product->name")

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" Chi tiết>Sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách chi tiết sản phẩm</li>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div>
        <button class="btn btn-primary p-2">
            <a href="{{ route('admin.products.index') }}" class="text-white">Quay lại</a>
        </button>
    </div>

    <table class="table table-striped align-middle mb-0 text-center fs-6">
        <thead>
            <tr>
                <th scope="col" class="w-25">Mô tả ngắn</th>
                <th scope="col" class="w-25">Mô tả</th>
                <th scope="col">Thư viện ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tên biến thể</th>
                <th scope="col">Giá trị biến thể</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->description_short }}</td>
                <td>{{ $product->description }}</td>

                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal-{{ $product->id }}">Xem
                        ảnh</a>

                    <!-- Modal Thư viện ảnh -->
                    <div class="modal fade" id="galleryModal-{{ $product->id }}" tabindex="-1"
                        aria-labelledby="galleryModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="galleryModalLabel">Thư viện ảnh của {{ $product->name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="display: flex; overflow-x: auto;">
                                    @if ($product->galleries->isEmpty())
                                        <p class="text-danger">Sản phẩm không có thư viện ảnh nào</p>
                                    @else
                                        <div class="gallery-container" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                            @foreach ($product->galleries as $image)
                                                @if ($image->path != null)
                                                    <div class="gallery-item" style="flex: 0 0 calc(33.33% - 10px);">
                                                        <!-- Để mỗi hàng có 3 ảnh -->
                                                        <img src="{{ env('VIEW_IMG') }}/{{ $image->path }}"
                                                            alt="{{ $product->name }}"
                                                            style="width: 100%; height: 200px; object-fit: cover;">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#categoryModal-{{ $product->id }}">Xem
                        danh
                        mục</a>

                    <!-- Modal Danh mục sản phẩm -->
                    <div class="modal fade" id="categoryModal-{{ $product->id }}" tabindex="-1"
                        aria-labelledby="categoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoryModalLabel">Danh mục của {{ $product->name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="display: flex; overflow-x: auto;">
                                    <table class="table table-striped text-center">
                                        <tr>
                                            <td>ID</td>
                                            <td>Tên danh mục</td>
                                        </tr>

                                        @foreach ($product->categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    @isset($parentName)
                        @if ($parentName)
                            {{ $parentName }}
                        @else
                            <p class="text-danger">Sản phẩm chưa có giá trị nào</p>
                        @endif
                    @endisset
                </td>

                <td>
                    @if (!isset($variant->name))
                        <p class="text-danger">Sản phẩm chưa có giá trị nào</p>
                    @else
                        {{ $variant->name }}
                    @endif
                </td>

            </tr>
        </tbody>
    </table>



@endsection
