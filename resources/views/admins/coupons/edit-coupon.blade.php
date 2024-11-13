@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Chỉnh sửa mã giảm giá')
@section('start-page-title', 'Chỉnh sửa mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.coupons.showCoupon') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active">Chỉnh sửa mã giảm giá</li>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên mã giảm giá</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                        name="name" value="{{ old('name', $coupon->name) }}" placeholder="Nhập tên mã giảm giá">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="discount_type" class="form-label">Loại mã giảm giá</label>
                    <select class="form-select @error('discount_type') is-invalid @enderror" id="discount_type" name="discount_type">
                        <option value="0" {{ old('discount_type', $coupon->discount_type) == '0' ? 'selected' : '' }}>Giảm theo phần trăm</option>
                        <option value="1" {{ old('discount_type', $coupon->discount_type) == '1' ? 'selected' : '' }}>Giảm theo giá tiền</option>
                            
                    </select>
                    @error('discount_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="coupon_amount" class="form-label">Giá trị muốn giảm giá </label>
                    <input class="form-control @error('coupon_amount') is-invalid @enderror" id="coupon_amount"
                        type="text" name="coupon_amount" value="{{ old('coupon_amount', $coupon->coupon_amount) }}"
                        placeholder="Nhập giá trị giảm giá">
                    @error('coupon_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="minimum_spend" class="form-label">Gía trị của giỏ hàng thấp nhất</label>
                    <input class="form-control @error('minimum_spend') is-invalid @enderror" id="minimum_spend"
                        type="text" name="minimum_spend" value="{{ old('minimum_spend', $coupon->minimum_spend) }}"
                        placeholder="Nhập giá trị giảm thấp nhất">
                    @error('minimum_spend')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="maximum_spend" class="form-label">Gía trị của giỏ hàng cao nhất</label>
                    <input class="form-control @error('maximum_spend') is-invalid @enderror" id="maximum_spend"
                        type="text" name="maximum_spend" value="{{ old('maximum_spend', $coupon->maximum_spend) }}"
                        placeholder="Nhập giá trị giảm cao nhất">
                    @error('maximum_spend')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="ckeditor" class="form-control @error('description') is-invalid @enderror">{{ old('description', $coupon->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input class="form-control @error('quantity') is-invalid @enderror" id="quantity" type="text"
                        name="quantity" value="{{ old('quantity', $coupon->quantity) }}"
                        placeholder="Nhập số lượng mã giảm giá">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Ngày bắt đầu</label>
                    <input class="form-control @error('start_date') is-invalid @enderror" id="start_date" type="date"
                        name="start_date"
                        value="{{ old('start_date', (new \DateTime($coupon->start_date))->format('Y-m-d')) }}"
                        placeholder="Chọn ngày bắt đầu">
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="expiration_date" class="form-label">Ngày hết hạn</label>
                    <input class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date"
                        type="date" name="expiration_date"
                        value="{{ old('expiration_date', (new \DateTime($coupon->expiration_date))->format('Y-m-d')) }}"
                        placeholder="Chọn ngày hết hạn">
                    @error('expiration_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng Thái</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="coupon_status" name="status">
                        <option value="0" {{ old('status', $coupon->status) == '0' ? 'selected' : '' }}>Phát hành
                        </option>
                        <option value="1" {{ old('status', $coupon->status) == '1' ? 'selected' : '' }}>Chưa phát hành
                        </option>
                        <option value="2" {{ old('status', $coupon->status) == '2' ? 'selected' : '' }}>Chờ phát hành
                        </option>
                        <option value="3" {{ old('status', $coupon->status) == '3' ? 'selected' : '' }}>Hết hạn
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Kiểu mã giảm giá áp dụng</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                        <option value="0" {{ old('type', $coupon->type) == '0' ? 'selected' : '' }}>Áp dụng toàn bộ
                            giỏ hàng</option>
                        <option value="1" {{ old('type', $coupon->type) == '1' ? 'selected' : '' }}>Áp dụng theo chỉ
                            định</option>
                            
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Danh mục Cha <span class="text-danger">*</span></label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category[]"
                        multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ collect(old('category', $coupon->categories->pluck('id')->toArray()))->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div id="childCategoryContainer" class="mb-3">
                    <label for="childCategory">Danh mục</label>
                    <select name="child_category[]" id="childCategory" multiple="multiple">
                        @foreach ($categories as $parentCategory)
                            {{-- Kiểm tra nếu danh mục cha đã được chọn --}}
                            @if($coupon->categories->contains('id', $parentCategory->id))
                                
                                    @foreach ($parentCategory->children as $childCategory)
                                        <option value="{{ $childCategory->id }}"
                                            @if(in_array($childCategory->id, $coupon->categories->pluck('id')->toArray())) selected @endif>
                                            {{ $childCategory->name }}
                                        </option>
                                    @endforeach
                            @endif
                        @endforeach
                    </select>
                    @error('child_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                
                

                <div class="mb-3">
                    <label for="coupon_product" class="form-label">Sản phẩm áp dụng <span
                            class="text-danger">*</span></label>
                    <select class="form-select @error('coupon_product') is-invalid @enderror" id="coupon_product"
                        name="coupon_product[]" multiple>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ collect(old('coupon_product', $coupon->products->pluck('id')->toArray()))->contains($product->id) ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('coupon_product')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    <script>
        $(document).ready(function() {
            // Khởi tạo Select2 cho các dropdown
            $('#coupon_category, #coupon_product').select2({
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
    </script>
    @include('admins.products.script')
@endsection
