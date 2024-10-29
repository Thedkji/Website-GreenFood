@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách mã giảm giá')
@section('start-page-title', 'Thêm mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.coupons.addCoupon') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active">Thêm mã giảm giá</li>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.coupons.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên mã giảm giá</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                        name="name" value="{{ old('name') }}" placeholder="Nhập tên mã giảm giá">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="coupon_amount" class="form-label">Giá trị muốn giảm giá</label>
                    <input class="form-control @error('coupon_amount') is-invalid @enderror" id="coupon_amount"
                        type="text" name="coupon_amount" value="{{ old('coupon_amount') }}"
                        placeholder="Nhập giá trị giảm giá">
                    @error('coupon_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="minimum_spend" class="form-label">Giá trị giảm tối thiểu</label>
                    <input class="form-control @error('minimum_spend') is-invalid @enderror" id="minimum_spend"
                        type="text" name="minimum_spend" value="{{ old('minimum_spend') }}"
                        placeholder="Nhập giá trị giảm thấp nhất">
                    @error('minimum_spend')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="maximum_spend" class="form-label">Giá trị giảm tối đa</label>
                    <input class="form-control @error('maximum_spend') is-invalid @enderror" id="maximum_spend"
                        type="text" name="maximum_spend" value="{{ old('maximum_spend') }}"
                        placeholder="Nhập giá trị giảm cao nhất">
                    @error('maximum_spend')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input class="form-control @error('quantity') is-invalid @enderror" id="quantity" type="text"
                        name="quantity" value="{{ old('quantity') }}" placeholder="Nhập số lượng mã giảm giá">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Ngày bắt đầu</label>
                    <input class="form-control @error('start_date') is-invalid @enderror" id="start_date" type="date"
                        name="start_date" value="{{ old('start_date') }}" placeholder="Chọn ngày bắt đầu">
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="expiration_date" class="form-label">Ngày hết hạn</label>
                    <input class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date"
                        type="date" name="expiration_date" value="{{ old('expiration_date') }}"
                        placeholder="Chọn ngày hết hạn">
                    @error('expiration_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Kiểu mã giảm giá áp dụng</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                        <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Công khai</option>
                        <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Riêng tư</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="coupon_status" name="status">
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Phát hành</option>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Chưa phát hành</option>
                        <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Chờ phát hành</option>
                        <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>Hết hạn</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="ckeditor" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="coupon-category" class="form-label">Danh mục</label>
                    <select class="form-select mb-3 @error('coupon_category') is-invalid @enderror" id="coupon_category"
                        name="coupon_category[]" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, old('coupon_category', [])) ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('coupon_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="coupon-product" class="form-label">Sản phẩm</label>
                    <select class="form-select mb-3 @error('coupon_product') is-invalid @enderror" id="coupon_product"
                        name="coupon_product[]" multiple>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ in_array($product->id, old('coupon_product', [])) ? 'selected' : '' }}>
                                {{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('coupon_product')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="coupon-user" class="form-label">Người dùng</label>
                    <select class="form-select mb-3 @error('coupon_user') is-invalid @enderror" id="coupon_user"
                        name="coupon_user[]" multiple>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ in_array($user->id, old('coupon_user', [])) ? 'selected' : '' }}>{{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('coupon_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Thêm mã giảm giá</button>
    </form>
@endsection
