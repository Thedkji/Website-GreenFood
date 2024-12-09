@extends('admins.layouts.master')

@section('title', 'Cập nhật biến thể')

@section('start-page-title', 'Cập nhật biến thể')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.variants.index') }}">Biến thể</a></li>
    <li class="breadcrumb-item active">Cập nhật biến thể</li>
@endsection

@section('content')
    @include('admins.layouts.components.toast-container')
    <div class="col-12 mb-3">
        <button class="btn btn-primary " type="button">
            <a class="text-white" href="{{ route('admin.variants.index') }}">Quay lại</a>
        </button>
    </div>

    <form method="post" action="{{ route('admin.variants.update', $variant->id) }}">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <!-- Phần đổi tên biến thể -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-success" id="name" name="name"
                        placeholder="Tên biến thể" value="{{ old('name', $variant->name) }}">
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
                    @foreach ($childrenName as $child)
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="parent_id[{{ $child->id }}]"
                                value="{{ old('parent_id.' . $child->id, $child->name) }}" placeholder="Giá trị biến thể">
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
                    <button class="btn btn-primary" type="button" onclick="createValueVariant()">
                        Thêm giá trị mới
                    </button>
                </div>

                <div class="my-3 text-end">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>

    @include('admins.layouts.components.toast')

    <script>
        // Tạo form khi nhấn nút xóa bằng js
        function confirmDelete(childId) {
            // Sử dụng SweetAlert2 thay cho confirm
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa giá trị này?',
                text: 'Hành động này không thể hoàn tác.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tạo form mới khi xác nhận xóa
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

                    // Hiển thị thông báo xóa thành công ngay sau khi gửi form
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa thành công!',
                        text: 'Mục đã được xóa thành công.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        // Sau khi người dùng nhấn "OK", submit form để xóa
                        form.submit();
                    });
                }
            }).catch((error) => {
                console.log(error);
                // Thông báo lỗi nếu có sự cố
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Đã xảy ra lỗi. Vui lòng thử lại.',
                    confirmButtonText: 'OK'
                });
            });
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
