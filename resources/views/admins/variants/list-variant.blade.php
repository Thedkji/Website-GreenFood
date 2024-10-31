@extends('admins.layouts.master')

@section('title', 'Variant | Danh sách biến thể')

@section('start-page-title', 'Danh sách biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.index') }}">Biến thể</a></li>
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
    <table class="table table-striped align-middle  mb-0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên biến thể</th>
                <th scope="col">Giá trị</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
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
                        @if ($variant->children->isNotEmpty())
                            @foreach ($variant->children as $child)
                                <a href="">{{ $child->name }}</a> <br>
                            @endforeach
                        @else
                            <span colspan="2" class="text-danger">Không có giá trị nào</span>
                        @endif
                    </td>

                    <td>{{ $variant->created_at }}</td>
                    <td>{{ $variant->updated_at }}</td>

                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.variants.edit', ['variant' => $variant->id]) }}"
                                style="background-color: transparent;" class="link-success fs-15">
                                <i class="ri-edit-2-line"></i>
                            </a>

                            <form action="{{ route('admin.variants.destroy', $variant->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="" style="background-color: transparent; border: none; color: inherit;"
                                    onclick="return confirm('Việc này có thể xóa biến thể cùng với toàn bộ giá trị của biến thể , vẫn chấp nhận xóa ?');"
                                    class="link-danger fs-15">
                                    <i class="ri-delete-bin-line"></i>

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script>
        let debounceTimeout;

        function debounceSearch() {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                document.getElementById("search-form").submit();
            }, 600);
        }
    </script>
@endsection
