@extends('admins.layouts.master')

@section('title', 'Variant | Danh sách biến thể')

@section('start-page-title', 'Danh sách biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item active">Danh sách biến thể</li>
@endsection

@section('content')
    @include('admins.layouts.components.toast-container')
    <div class="row g-4 mb-3">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <form action="" method="get" id="search-form">
                    <div class="search-box">
                        <input name="search" type="text" class="form-control search"
                            value="{{ request()->input('search') }}" placeholder="Nhập tìm kiếm" oninput="debounceSearch()">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="my-3">
        <button class="btn btn-success">
            <a href="{{ route('admin.variants.create') }}" class="text-white">Thêm</a>
        </button>
    </div>



    <table class="table table-striped align-middle mb-0">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="select-all" onclick="toggleSelectAll(this,'.variant-checkbox')">
                </th>
                <th scope="col">Id</th>
                <th scope="col">Tên biến thể</th>
                <th scope="col">Giá trị</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col" colspan="2">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($variants as $variant)
                <tr>
                    <td>
                        <input type="checkbox" class="variant-checkbox" name="variant_id[]"
                            onclick="toggleDeleteButton('.variant-checkbox')" value="{{ $variant->id }}">
                    </td>
                    <td>{{ $variant->id }}</td>
                    <td>
                        @if ($variant->parent_id == null)
                            {{ $variant->name }}
                        @endif
                    </td>
                    <td>
                        @if ($variant->children->isNotEmpty())
                            @foreach ($variant->children as $child)
                                - {{ $child->name }}<br>
                            @endforeach
                        @else
                            <span colspan="2" class="text-danger">Không có giá trị nào</span>
                        @endif
                    </td>
                    <td>{{ $variant->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>{{ $variant->updated_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('admin.variants.edit', $variant->id) }}" class="link-success fs-15 truncate"
                            data-fulltext="Chỉnh sửa">
                            <i class="ri-edit-2-line"></i>
                        </a>
                    </td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">

                            <!-- Nút xóa -->
                            <form action="{{ route('admin.variants.destroy', $variant->id) }}" method="POST"
                                style="display:inline;" id="delete-form-{{ $variant->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="link-danger fs-15 border-0 bg-transparent truncate"
                                    id="deleteButton-{{ $variant->id }}" data-fulltext="Xóa">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row my-3">
        <div class="col-sm">
            <button type="button" class="btn btn-danger" id="delete-button" name="variant-delete-checkbox"
                style="display: none;"
                onclick="deleteSelected('.variant-checkbox:checked', '{{ route('admin.variants.bulkDelete') }}')">Xóa</button>
        </div>

        <div class="col-sm">
            <div class="mt-3 d-flex justify-content-sm-end">
                {{ $variants->links() }}
            </div>
        </div>
    </div>

    @include('admins.layouts.components.toast')

    {{-- Thực thi tìm kiếm sau 1 khoảng thời gian --}}
    @include('admins.layouts.components.search-time')

    {{-- Thực thi xóa nhiều --}}
    @include('admins.layouts.components.toggleDelete')

    {{-- Thực thi xóa từng phần tử và thay alert --}}
    @include('admins.layouts.components.deleteSelected')

    {{-- Hiển thị toast khi hoàn thành --}}
    @include('admins.layouts.components.toast')

    <!-- Bao gồm file alert2.blade.php từ thư mục components -->
    @include('admins.layouts.components.alert2')

    <!-- Đẩy mã JavaScript vào phần scripts của layout chính -->
    @push('scripts')
        <!-- Lặp qua tất cả các coupon và gọi hàm alert2 cho mỗi item -->
        <script>
            @foreach ($variants as $item)
                alert2({{ $item->id }});
            @endforeach
        </script>
    @endpush
@endsection
