@extends('admins.layouts.master')

@section('title', 'User | Chỉnh sửa thông tin người dùng')

@section('start-page-title', 'Chỉnh sửa thông tin người dùng')

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
    <form novalidate action="{{ route('admin.users.update',$user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label for="name">Tên người dùng</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required  >
            <x-feedback name="name" />
        </div>
        <div class="mt-3">
            <label for="avatar">Ảnh</label>
            <input type="file" class="form-control" name="avatar" id="avatar" required onchange="previewImage(event, 'avatar_user')">
            <x-feedback name="avatar" />
        </div>
        <div class="form-group mb-3" style="padding-top:20px">
            <img src="{{ Storage::url($user->avatar) }}"  alt="Ảnh khách hàng" style="width:250px ">
        </div>
        <div class="mt-3">
            <label for="user_name">Tên đăng nhập</label>
            <input type="text" name="user_name" id="user_name" class="form-control" value="{{ $user->user_name }}" required disabled >
            <x-feedback name="user_name" />

        </div>
        {{-- <div class="mt-3">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mt-3">
            <label for="password_confirmation">Nhập lại mật khẩu</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div> --}}
        <div class="mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            <x-feedback name="email" />

        </div>
        <div class="mt-3">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
            <x-feedback name="phone" />

        </div>
        <div class="mt-3">
            <label for="province">Thành phố/Tỉnh</label>
            <input type="text" name="province" id="province" class="form-control" value="{{ $user->province }}" required>
            <x-feedback name="province" />

        </div>
        <div class="mt-3">
            <label for="district">Quận/Huyện</label>
            <input type="text" name="district" id="district" class="form-control" value="{{ $user->district }}" required>
            <x-feedback name="district" />

        </div>
        <div class="mt-3">
            <label for="ward">Phường/Xã</label>
            <input type="text" name="ward" id="ward" class="form-control" value="{{ $user->ward }}" required>
            <x-feedback name="ward" />

        </div>
        <div class="mt-3">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" required>
            <x-feedback name="address" />

        </div>
        <div class="mt-3">
            <label for="role">Vai trò</label>
            <select name="role" id="role" class="form-control" required>
                <option selected disabled>Vui lòng chọn vai trò</option>
                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>User</option>
            </select>
            <x-feedback name="role" />


        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary me-1 mt-3" type="button">Quay lại</button></a>
            <button class="btn btn-success mt-3" type="submit">Chỉnh sửa</button>
        </div>
    </form>
@endsection
