@extends('admins.layouts.master')

@section('title', 'User | Danh sách người dùng')

@section('start-page-title', 'Danh sách người dùng')

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
        <div class="col-sm justify-content-between">
            <div class="d-flex justify-content-sm-end">

                <div class="search-box ms-2">
                    <input type="text" class="form-control search" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
            {{-- <div class=""><a href="{{ route('admin.users.create') }}" class="btn btn-success">Thêm Mới</a></div> --}}
        </div>
    </div>
    <h2 class="text-primary">Danh sách người dùng</h2>
    <table class="mb-3 table table-striped ">
        <thead>
            <tr>
                <td scope="col">Id</td>
                <td scope="col">Name</td>
                <td scope="col">Avatar</td>
                <td scope="col">User Name</td>
                <td scope="col">Email</td>
                <td scope="col">Phone</td>
                <th scope="col">Ngày xóa</th>

                <td scope="col">Thao Tác</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($users))
                @foreach ($users as $value)
                    <tr>
                        <th scope="row">{{ $value->id }}</th>
                        <th scope="row">{{ $value->name }}</th>
                        <th scope="row"><img src="{{ Storage::url($value->avatar) }}" alt="Ảnh khách hàng"
                                style="width:150px"></th>
                        <th scope="row">{{ $value->user_name }}</th>
                        {{-- <th scope="row">{{ $value->password }}</th> --}}
                        <th scope="row">{{ $value->email }}</th>
                        <th scope="row">{{ $value->phone }}</th>
                        <td scope="row">{{ $value->deleted_at }}</td>

                        <th scope="row">
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.trashs.restoreUser', $value->id) }}"
                                    style="background-color: transparent;" class="link-success fs-15"><i
                                        class="ri-edit-2-line"></i></a>
                                <form action="{{ route('admin.trashs.destroyUser', $value->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background-color: transparent; border: none; color: inherit;"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="link-danger fs-15">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </th>

                    </tr>
                @endforeach
            @elseif(!isset($users) && $users == null)
                <p>Chưa có tài khoản nào</p>
            @endif
        </tbody>
    </table>
    <h2 class="text-primary">Danh sách danh mục</h2>
    <table class="mb-3 table table-striped table-nowrap align-middle mb-0 text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">ID danh mục cha</th>
                {{-- <th scope="col">Ngày tạo</th> --}}
                <th scope="col">Ngày xóa</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->deleted_at }}</td>

                    <td>
                        <div class="hstack gap-3 flex-wrap">
                            <a href="{{ route('admin.trashs.restoreCategory', $category->id) }}" class="link-success fs-15"><i
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
    <h2 class="text-primary">Danh sách sản phẩm</h2>
    <table class="mb-3 table table-striped align-middle  mb-0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Ảnh</th>
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
                        <td>
                            <img src="{{ env('VIEW_IMG') . '/' . $product->img }}" alt="Ảnh sản phẩm" style="width:150px">
                        </td>
                        <td scope="col">{{ $product->deleted_at }}</td>

                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ route('admin.trashs.restoreProduct', $product->id) }}"
                                    style="background-color: transparent;" class="link-success fs-15"><i
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
    </table>
    <h2 class="text-primary">Danh sách bình luận</h2>
    <div class="table-responsive">
        <table class="mb-3 table table-striped table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Khách hàng </th>
                    <th scope="col">Bình luận</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Sao</th>
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
                        <td>{{ $comment->content }}</td>
                        <td>
                            @if ($comment->img)
                                <img src="{{ asset('storage/' . $comment->img) }}" alt="Image" width="150">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <div class="stars" id="stars-{{ $comment->id }}">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star"
                                        style="color: {{ $i <= ($comment->rates()->avg('star') ?? 0) ? 'gold' : 'gray' }}">★</span>
                                @endfor
                            </div>
                        </td>
                        <td>{{ $comment->created_at }}</td>
                        <td scope="col">{{ $comment->deleted_at }}</td>

                        <td>
                            <div class="hstack gap-2">
                                <a href="#" class="link-danger fs-15"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $comment->id }}').submit();">
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
    </div>
    <h2 class="text-primary">Danh sách mua hàng</h2>
    <table class="mb-3 table table-striped table-nowrap align-middle mb-0 text-center">
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
                            <a href="{{ route('admin.trashs.restoreOrder', $order->id) }}" class="link-success fs-15"><i
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
    </table>


    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
