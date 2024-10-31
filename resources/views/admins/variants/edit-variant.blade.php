@extends('admins.layouts.master')

@section('title', 'Cập nhật biến thể')

@section('start-page-title', 'Cập nhật biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item active">Cập nhật biến thể</li>
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

    <form method="post" action="{{ route('admin.variants.update', $variant->id) }}">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <!-- Phần đổi tên biến thể -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-success" id="name" name="name" placeholder="Tên biến thể"
                        value="{{ old('name', $variant->name) }}">
                    <label for="name">Tên biến thể</label>
                    @error('name')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Phần giá trị biến thể -->
            <div class="col-12">
                <label for="value" class="form-label">Giá trị biến thể</label>

                <div class="variant-value-container">
                    @foreach ($childrenName as $key => $child)
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="parent_id[{{ $child->id }}]"
                                value="{{ old('parent_id.' . $child->id, $child->name) }}">
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $child->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                            @error("parent_id.$child->id")
                                <div class="text-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <div class="text-end">
                    <button class="btn btn-success" type="button" onclick="createValueVariant()">
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
        function confirmDelete(childId) {
            if (confirm("Xóa giá trị này ?")) {
                // Tạo form mới
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route('admin.variants.destroy', ':id') }}'.replace(':id', childId) +
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

        function createValueVariant() {
            var valueContainer = document.querySelector('.variant-value-container');

            // Tạo div chứa input và icon xóa
            var inputWrapper = document.createElement('div');
            inputWrapper.className = 'input-group mb-3';

            // Tạo input
            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control';
            input.name = 'parent_id[new]'; // Đặt tên cho input mới
            input.placeholder = 'Giá trị biến thể';

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
