@extends('admins.layouts.master')

@section('title', 'Danh sách Bình Luận')

@section('start-page-title', 'Danh sách Bình Luận')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.comments.comment') }}">Danh sách bình luận</a></li>
    <li class="breadcrumb-item active">Danh sách bình luận</li>
@endsection

@section('content')
    @include('admins.layouts.components.toast-container')

    <form action="{{ route('admin.comments.comment') }}" id="search-form" method="GET"
        class="row mb-3 d-flex flex-row-reverse">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box">
                    <input name="search" type="text" class="form-control search"
                        value="{{ request()->input('search') }}" placeholder="Tìm Kiếm ..." oninput="debounceSearch()">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" id="select-all" onclick="toggleSelectAll(this,'.comment-checkbox')">
                    </th>
                    <th scope="col">Id</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Khách hàng </th>
                    <th scope="col">Bình luận</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Sao</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col" colspan="2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>
                            <input type="checkbox" class="comment-checkbox" name="comment_id[]"
                                onclick="toggleDeleteButton('.comment-checkbox')" value="{{ $comment->id }}">
                        </td>
                        <th scope="row">{{ $comment->id }}</th>
                        <td class="truncate-text">
                            <a href="{{ route('client.product-detail', $comment->product->id) }}" class="truncate"
                                data-fulltext="{{ $comment->product->name ?? 'Không xác định' }}">{{ $comment->product->name ?? 'Không xác định' }}</a>
                        </td>
                        <td>{{ $comment->user->name ?? 'Không xác định' }}</td>
                        <td class="truncate-text">
                            <span class="truncate" data-fulltext="{{ $comment->content ?? 'Không có nội dung' }}">
                                {{ $comment->content ?? 'Không có nội dung' }}
                            </span>
                        </td>
                        <td>
                            @if ($comment->img)
                                <a href="{{ route('client.product-detail', $comment->product->id) }}">
                                    <img src="{{ env('VIEW_IMG') }}/{{ $comment->img }}" alt="Image" width="100px"
                                        height="100px" style="object-fit: cover">
                                </a>
                            @else
                                <span class="text-danger">
                                    Không có ảnh
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="stars fs-5" id="stars-{{ $comment->id }}">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star"
                                        style="color: {{ $i <= ($comment->rates()->avg('star') ?? 0) ? 'gold' : 'gray' }}">★</span>
                                @endfor
                            </div>
                        </td>
                        <td>{{ $comment->created_at->format('d-m-Y H:i:s') }}</td>

                        <td>
                            <div class="hstack gap-2">
                                <a href="{{ route('admin.comments.detail', $comment->id) }}" class="truncate"
                                    data-fulltext="Xem chi tiết"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                style="display:inline;" id="delete-form-{{ $comment->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="link-danger fs-15 border-0 bg-transparent truncate"
                                    id="deleteButton-{{ $comment->id }}" data-fulltext="Xóa">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $comments->links() }}
    </div>
    <div class="row my-3">
        <div class="col-sm">
            <button type="button" class="btn btn-danger" id="delete-button" name="comment-delete-checkbox"
                style="display: none;"
                onclick="deleteSelected('.comment-checkbox:checked', '{{ route('admin.comments.bulkDelete') }}')">Xóa</button>
        </div>
    </div>
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
        <!-- Lặp qua tất cả các comments và gọi hàm alert2 cho mỗi item -->
        <script>
            @foreach ($comments as $item)
                alert2({{ $item->id }});
            @endforeach
        </script>
    @endpush
@endsection
