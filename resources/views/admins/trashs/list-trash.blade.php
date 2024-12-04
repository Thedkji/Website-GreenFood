@extends('admins.layouts.master')

@section('title', 'Trash | Danh sách thùng rác')

@section('start-page-title', 'Danh sách thùng rác')

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

    <form action="{{ route('admin.trashs.index') }}" id="search-form" method="GET" class="row mb-3 d-flex flex-row-reverse">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box">
                    <input name="search" type="text" class="form-control search" value="{{ request()->input('search') }}"
                        placeholder="Nhập tên loại muốn xóa" oninput="debounceSearch()">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <select id="statusTrash" name="statusTrash" class="form-select w-50" onchange="this.form.submit()">
                <option value="allPro" {{ $statusTrash == 'allPro' ? 'selected' : '' }}>Tất cả</option>
                <option value="User" {{ $statusTrash == 'User' ? 'selected' : '' }}>Người dùng</option>
                <option value="Product" {{ $statusTrash == 'Product' ? 'selected' : '' }}>Sản phẩm</option>
                <option value="Order" {{ $statusTrash == 'Order' ? 'selected' : '' }}>Đơn hàng</option>
                <option value="Comment" {{ $statusTrash == 'Comment' ? 'selected' : '' }}>Bình luận</option>
                <option value="Supplier" {{ $statusTrash == 'Supplier' ? 'selected' : '' }}>Nhà cung cấp</option>
            </select>
        </div>
    </form>

    <h2 class="text-primary">Danh sách Xóa</h2>
    <table class="mb-3 table table-striped align-middle mb-0">
        <thead>
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Loại</th>
                <th scope="col">Tên</th>
                <th scope="col">Ngày xóa</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @php
                $startIndex = ($trashedItems->currentPage() - 1) * $trashedItems->perPage(); // Tính chỉ số bắt đầu
            @endphp
            @forelse ($trashedItems as $items)
                <tr>
                    <td>{{ $startIndex + $loop->iteration }}</td>
                    <td>
                        @if ($items instanceof App\Models\User)
                            Người dùng
                        @elseif ($items instanceof App\Models\Product)
                            Sản phẩm
                        @elseif ($items instanceof App\Models\Order)
                            Đơn hàng
                        @elseif ($items instanceof App\Models\Comment)
                            Bình luận
                        @elseif ($items instanceof App\Models\Supplier)
                            Nhà cung cấp
                        @endif
                    </td>
                    <td>{{ $items->name ?? ($items->title ?? 'Không có tên') }}</td>
                    <td>{{ $items->deleted_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <form action="{{ route('admin.trashs.restore', ['type' => class_basename($items), $items->id]) }}" method="post">
                                @csrf
                                @method('POST') <!-- Sử dụng method POST để khôi phục -->
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Bạn có chắc chắn muốn khôi phục?');">Khôi phục</button>
                            </form>
                            <form
                                action="{{ route('admin.trashs.destroy', ['type' => class_basename($items), $items->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn?');">
                                    Xóa vĩnh viễn
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Không có mục nào đã bị xóa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    {{ $trashedItems->links() }}



    {{-- <h2 class="text-primary">Danh sách danh mục</h2>
    <table class="mb-3 table table-striped align-middle  mb-0">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Ngày xóa</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->deleted_at }}</td>

                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.trashs.restoreCategory', $category->id) }}" onclick="return confirmRestore();" class="link-success fs-15"><i
                                    class="ri-edit-2-line"></i></a>

                            <form action="{{ route('admin.trashs.destroyCategory', $category) }}" method="post">
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
    --}}
    {{-- <h2 class="text-primary">Danh sách sản phẩm</h2>
    <table class="mb-3 table table-striped align-middle  mb-0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Ngày xóa</th>

                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($products))
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>

                        <td scope="col">{{ $product->deleted_at }}</td>

                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.trashs.restoreProduct', $product->id) }}"
                                    style="background-color: transparent;" onclick="return confirmRestore();" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.trashs.destroyProduct', $product->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background-color: transparent; border: none; color: inherit;"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @elseif(!isset($products) && $products == null)
                <p>Chưa có sản phẩm nào</p>
            @endif
        </tbody>
    </table> --}}
    {{-- <h2 class="text-primary">Danh sách bình luận</h2>
    <div class="table-responsive">
        <table class="mb-3 table table-striped align-middle  mb-0">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Khách hàng </th>

                    <th scope="col">Ngày xóa</th>

                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>{{ $comment->product->name }}</td>
                        <td>{{ $comment->user->name ?? 'Anonymous' }}</td>
                        <td scope="col">{{ $comment->deleted_at }}</td>

                        <td>
                            <div class="hstack gap-2">
                                <a href="#" class="link-danger fs-15"
                                    onclick="event.preventDefault();  document.getElementById('delete-form-{{ $comment->id }}').submit();" onclick="return confirmRestore();">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                                <form id="delete-form-{{ $comment->id }}"
                                    action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    {{-- <h2 class="text-primary">Danh sách mua hàng</h2>
    <table class="mb-3 table table-striped align-middle  mb-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">ID Người dùng</th>
                <th scope="col">Ngày xóa</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $order->id }}</td>
                    <td scope="col">{{ $order->user_id }}</td>
                    <td scope="col">{{ $order->deleted_at }}</td>


                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.trashs.restoreOrder', $order->id) }}" onclick="return confirmRestore();" class="link-success fs-15"><i
                                    class="ri-edit-2-line"></i></a>
                            <a href="{{ route('admin.trashs.destroyOrder', $order->id) }}" class="link-danger fs-15"
                                onclick="return confirm('Đơn hàng sẽ bị xóa và chuyển vào thùng rác , vẫn chấp nhận xóa ??? ')">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}


    <!-- Pagination -->
    {{-- <div class="d-flex justify-content-end mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div> --}}
@endsection
@push('scripts')
    <script>
        function confirmRestore() {
            return confirm('Bạn có chắc chắn muốn khôi phục?');
        }
    </script>
@endpush
