@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách mã giảm giá')
@section('start-page-title', 'Thêm mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.coupons.addCoupon') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active">Thêm mã giảm giá</li>
@endsection

@section('content')
<div class="toast-container">
    @if (session('success'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Thông báo</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white text-dark">
            {{ session('success') }}
        </div>
        <div class="toast-progress bg-success"></div>
    </div>
    @endif

    @if (session('error'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastError">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Lỗi</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white text-dark">
            {{ session('error') }}
        </div>
        <div class="toast-progress bg-danger"></div>
    </div>
    @endif
</div>

    <form action="{{ route('admin.coupons.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên mã giảm giá <span class="text-danger">*</span></label>
                    <input class="form-control " id="name" type="text"
                        name="name" value="{{ old('name') }}" placeholder="Nhập tên mã giảm giá">
                    @error('name')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="discount_type" class="form-label">Loại mã giảm giá <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="discount_type" name="discount_type"
                        onclick="hideSelectOptions()">
                        <option value="#" hidden>--Chọn--</option>
                        <option value="0" {{ old('discount_type') == '0' ? 'selected' : '' }}>Giảm theo phần trăm
                        </option>
                        <option value="1" {{ old('discount_type') == '1' ? 'selected' : '' }}>Giảm theo giá tiền</option>
                    </select>
                    @error('discount_type')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="coupon_amount" class="form-label">Giá trị muốn giảm giá  <span
                            class="text-danger">*</span></label>
                    <input class="form-control " id="coupon_amount"
                        type="text" name="coupon_amount" value="{{ old('coupon_amount') }}"
                        placeholder="Nhập giá trị giảm giá">
                    @error('coupon_amount')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="minimum_spend" class="form-label">Gía trị của giỏ hàng thấp nhất <span
                            class="text-danger">*</span></label>
                    <input class="form-control " id="minimum_spend"
                        type="text" name="minimum_spend" value="{{ old('minimum_spend') }}"
                        placeholder="Nhập giá trị giảm thấp nhất">
                    @error('minimum_spend')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="maximum_spend" class="form-label">Gía trị của giỏ hàng cao nhất <span
                            class="text-danger">*</span></label>
                    <input class="form-control " id="maximum_spend"
                        type="text" name="maximum_spend" value="{{ old('maximum_spend') }}"
                        placeholder="Nhập giá trị giảm cao nhất">
                    @error('maximum_spend')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả </label>
                    <textarea name="description" id="ckeditor" class="form-control ">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng <span class="text-danger">*</span></label>
                    <input class="form-control " id="quantity" type="text"
                        name="quantity" value="{{ old('quantity') }}" placeholder="Nhập số lượng mã giảm giá">
                    @error('quantity')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Ngày bắt đầu <span class="text-danger">*</span></label>
                    <input class="form-control" id="start_date" type="date"
                        name="start_date" value="{{ old('start_date') }}" placeholder="Chọn ngày bắt đầu">
                    @error('start_date')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="expiration_date" class="form-label">Ngày hết hạn <span class="text-danger">*</span></label>
                    <input class="form-control " id="expiration_date"
                        type="date" name="expiration_date" value="{{ old('expiration_date') }}"
                        placeholder="Chọn ngày hết hạn">
                    @error('expiration_date')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                    <select class="form-select " id="coupon_status" name="status">
                        <option value="#" hidden>--Chọn--</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Phát hành</option>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Chưa phát hành</option>
                        <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Cho một số người dùng</option>
                        <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>Hết hạn</option>
                    </select>
                    @error('status')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Kiểu mã giảm giá áp dụng <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="type" name="type"
                        onclick="hideSelectOptions()">
                        <option value="#" hidden>--Chọn--</option>
                        <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Áp dụng toàn bộ giỏ hàng
                        </option>
                        <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Áp dụng theo chỉ định</option>
                    </select>
                    @error('type')
                        <div class="text-danger my-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Danh mục áp dụng -->
                <div class="mb-3">
                    <label for="category" class="form-label">Danh mục Cha </label>
                    <select class="form-select " id="category" name="category[]"
                        multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, old('category', [])) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                   
                </div>
                <div id="childCategoryContainer" class="mb-3">
                    <label for="childCategory">Danh mục con</label>
                    <select name="child_category[]" id="childCategory" multiple="multiple">
                    </select>
                    
                </div>

                <!-- Sản phẩm áp dụng -->
                <div class="mb-3">
                    <label for="coupon_product" class="form-label">Sản phẩm áp dụng</label>
                    <select class="form-select " id="coupon_product"
                        name="coupon_product[]" multiple>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ in_array($product->id, old('coupon_product', [])) ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Thêm mã giảm giá</button>
    </form>

    <script>
        $(document).ready(function() {
            // Khởi tạo Select2 cho các dropdown
            $('#category, #coupon_product').select2({
                placeholder: "Chọn",
                allowClear: true
            });

            // Kiểm tra giá trị của kiểu mã giảm giá khi trang tải lên
            toggleCategoryFields();

            // Thêm sự kiện thay đổi kiểu mã giảm giá
            $('#type').change(function() {
                toggleCategoryFields();
            });

            function toggleCategoryFields() {
                var typeValue = $('#type').val();

                if (typeValue == '1') {
                    // Hiển thị danh mục cha, danh mục con và sản phẩm
                    $('#childCategoryContainer').show(); // Hiển thị phần danh mục con
                    $('#category').closest('.mb-3').show(); // Hiển thị phần danh mục cha
                    $('#coupon_product').closest('.mb-3').show(); // Hiển thị phần sản phẩm
                    $('#category').prop('disabled', false); // Bỏ vô hiệu hóa chọn danh mục cha
                    $('#childCategory').prop('disabled', false); // Bỏ vô hiệu hóa chọn danh mục con
                    $('#coupon_product').prop('disabled', false); // Bỏ vô hiệu hóa chọn sản phẩm
                } else {
                    // Ẩn danh mục cha, danh mục con và sản phẩm
                    $('#childCategoryContainer').hide(); // Ẩn phần danh mục con
                    $('#category').closest('.mb-3').hide(); // Ẩn phần danh mục cha
                    $('#coupon_product').closest('.mb-3').hide(); // Ẩn phần sản phẩm
                    $('#category').prop('disabled', true); // Vô hiệu hóa chọn danh mục cha
                    $('#childCategory').prop('disabled', true); // Vô hiệu hóa chọn danh mục con
                    $('#coupon_product').prop('disabled', true); // Vô hiệu hóa chọn sản phẩm
                }
            }

            function hideSelectOptions() {
                // Ẩn các lựa chọn trong dropdown khi click vào
                var select = document.getElementById('type');
                select.options.length = 0; // Xóa hết tất cả các tùy chọn

                // Thêm lại tùy chọn "--Chọn--"
                var defaultOption = document.createElement("option");
                defaultOption.text = "--Chọn--";
                select.appendChild(defaultOption);
            }

        });
        document.addEventListener("DOMContentLoaded", function() {
        // Tìm tất cả các toast
        const toastElements = document.querySelectorAll(".toast");

        toastElements.forEach((toast) => {
            // Hiển thị toast bằng Bootstrap
            const bsToast = new bootstrap.Toast(toast, {
                delay: 3000
            }); // 3000ms = 3 giây
            bsToast.show();

            // Tự động ẩn toast sau 3 giây
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        });
    });
    toastOptions = {
        autohide: true,
        delay: 5000 // Thời gian hiển thị (ms)
    };
    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
    </script>
    @include('admins.products.script')
@endsection
