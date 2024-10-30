@extends('admins.layouts.master')

@section('title', 'Comment | Danh sách xóa mềm bình luận')

@section('start-page-title', 'Danh sách xóa mềm bình luận')

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

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
