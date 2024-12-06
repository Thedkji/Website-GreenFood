@extends('admins.layouts.master')

@section('title', 'Danh sách Bình Luận')

@section('start-page-title', 'Danh sách Bình Luận')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.comments.comment') }}">Danh sách bình luận</a></li>
    <li class="breadcrumb-item active">Danh sách bình luận</li>
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
                        <input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">
                    </th>
                    <th scope="col">Id</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Khách hàng </th>
                    <th scope="col">Bình luận</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Sao</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>
                            <input type="checkbox" class="comment-checkbox" name="comment-checkbox"
                                onclick="toggleDeleteButton()" value="{{ $comment->id }}">
                        </td>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>
                            <a
                                href="{{ route('client.product-detail', $comment->product->id) }}">{{ $comment->product->name ?? 'No Product' }}</a>
                        </td>
                        <td>{{ $comment->user->name ?? 'Anonymous' }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>
                            @if ($comment->img)
                                <img src="{{ env('VIEW_IMG') }}/{{ $comment->img }}" alt="Image" width="100px"
                                    height="100px" style="object-fit: cover">
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

                        <td>
                            <div class="hstack gap-2">
                                <a href="{{ route('admin.comments.detail', $comment->id) }}"><i
                                        class="fa-regular fa-eye"></i></a>
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

    <div class="mt-3">
        {{ $comments->links() }}
    </div>
    <div class="row my-3">
        <div class="col-sm">
            <button type="button" class="btn btn-danger" id="delete-button" style="display: none;"
                onclick="deleteSelected()">Xóa</button>
        </div>
    </div>

    <script>
        let debounceTimeout;

        function debounceSearch() {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                document.getElementById("search-form").submit(); // Submit the form after typing
            }, 600); // Delay of 600ms
        }

        function toggleSelectAll(source) {
            const checkboxes = document.querySelectorAll('.comment-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
            toggleDeleteButton();
        }

        function toggleDeleteButton() {
            const checkboxes = document.querySelectorAll('.comment-checkbox');
            const deleteButton = document.getElementById('delete-button');
            deleteButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline-block' :
                'none';
        }

        function deleteSelected() {
            const selectedIds = Array.from(document.querySelectorAll('.comment-checkbox:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                alert("Vui lòng chọn ít nhất một mục để xóa.");
                return;
            }

            if (confirm("Bạn có chắc chắn muốn xóa các mục đã chọn?")) {
                fetch("{{ route('admin.comments.bulkDelete') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            ids: selectedIds
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            window.location.reload();
                        } else {
                            alert(data.message || "Đã xảy ra lỗi trong khi xóa.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Đã xảy ra lỗi.");
                    });
            }
        }
    </script>
@endsection
