@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Sửa danh mục sản phẩm')
@section('start-page-title', 'Sửa danh mục sản phẩm')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục sản phẩm</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh sách danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active">Sửa danh mục sản phẩm</li>
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
    <div class="col-12 mb-3">
        <button class="btn btn-primary " type="button">
            <a class="text-white" href="{{route('admin.categories.index')}}">Quay lại</a>
        </button>
    </div>

    <form method="post" action="{{ route('admin.categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <!-- Phần đổi tên danh mục -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-success" id="name" name="name"
                        placeholder="Tên danh mục" value="{{ old('name', $category->name) }}">
                    <label for="name">Tên danh mục</label>
                    @error('name')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Phần Danh mục con -->
            <div class="col-12">
                <label for="value" class="form-label">Danh mục con</label>

                <div class="category-value-container">
                    @foreach ($childrenName as $child)
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="parent_id[{{ $child->id }}]"
                                value="{{ old('parent_id.' . $child->id, $child->name) }}" placeholder="Danh mục con">
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $child->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>

                        <div class = "my-3">
                            @error("parent_id.$child->id")
                                <div class="text-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <div class="text-end">
                    <button class="btn btn-success" type="button" onclick="createValueCategory()">
                        Thêm giá trị mới
                    </button>
                </div>

                <div class="my-3 text-end">
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Tạo form khi nhấn nút xóa bằng js
        function confirmDelete(childId) {
            if (confirm("Xóa giá trị này ?")) {
                // Tạo form mới
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route('admin.categories.destroy', ':id') }}'.replace(':id', childId) +
                    '?delete-children=true';

                // Thêm CSRF token
                var csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Thêm method DELETE
                var methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                // Thêm form vào body và submit
                document.body.appendChild(form);
                form.submit();
            }
        }

        function createValueCategory() {
            var valueContainer = document.querySelector('.category-value-container');

            // Tạo div chứa input và icon xóa
            var inputWrapper = document.createElement('div');
            inputWrapper.className = 'input-group mb-3';

            // Tạo input
            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control';
            // Sử dụng timestamp hoặc số tăng dần để tạo tên duy nhất cho input mới
            var index = Date.now(); // Sử dụng timestamp làm tên duy nhất
            input.name = 'parent_id[new_' + index + ']'; // Sử dụng giá trị 'new_' để đánh dấu là danh mục mới
            input.placeholder = 'Danh mục con';

            // Tạo icon xóa
            var deleteIcon = document.createElement('button');
            deleteIcon.className = 'btn btn-danger';
            deleteIcon.innerHTML = '<i class="fas fa-trash"></i>';
            deleteIcon.type = 'button';

            // Xử lý sự kiện xóa input khi nhấn icon
            deleteIcon.onclick = function() {
                valueContainer.removeChild(inputWrapper);
            };

            // Thêm input và icon vào wrapper, sau đó thêm wrapper vào container
            inputWrapper.appendChild(input);
            inputWrapper.appendChild(deleteIcon);
            valueContainer.appendChild(inputWrapper);
        }
    </script>
@endsection
