@extends('admins.layouts.master')

@section('title', 'Variant | Danh sách biến thể')

@section('start-page-title', 'Danh sách biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item active">Danh sách biến thể</li>
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
    <div class="row g-4 mb-3">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box ms-2">
                    <input type="text" class="form-control search" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </div>
    <table class="table table-striped align-middle  mb-0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên biến thể</th>
                <th scope="col">Giá trị</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($variants as $variant)
                <tr>
                    <td>
                        {{ $variant->id }}
                    </td>

                    <td>
                        @if ($variant->parent_id == null)
                            {{ $variant->name }}
                        @endif
                    </td>

                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#variantModal-{{ $variant->id }}">Xem biến
                            thể</a>

                        <!-- Modal biến thể sản phẩm -->
                        <div class="modal fade" id="variantModal-{{ $variant->id }}" tabindex="-1"
                            aria-labelledby="variantModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="variantModalLabel">Giá trị của biến thể
                                            {{ $variant->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="display: flex; overflow-x: auto;">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Giá trị</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($variant->children->isNotEmpty())
                                                    @foreach ($variant->children as $child)
                                                        <tr>
                                                            <td>
                                                                <a href="">{{ $child->name }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="2">Không có giá trị nào</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>

                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.variants.variants.edit', ['variant' => $variant->id]) }}"
                                style="background-color: transparent;" class="link-success fs-15">
                                <i class="ri-edit-2-line"></i>
                            </a>
                            <form action="{{ route('admin.variants.variants.destroy', ['variant' => $variant->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: transparent; border: none; color: inherit;"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="mt-3">

    </div>
@endsection
