@extends('admins.layouts.master')

@section('title', 'User | Thêm mới người dùng')

@section('start-page-title', 'Thêm mới người dùng')

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
    <form novalidate action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-3">
            <label for="name">Tên người dùng</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="my-3">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="avatar">Ảnh</label>
            <input type="file" class="form-control" name="avatar" id="avatar"
                onchange="previewImage(event, 'image_user')">
        </div>

        <div class="mt-3">
            <img id="image_user"
                 src="{{ old('avatar') ?? (isset($user) && $user->avatar ? asset($user->avatar) : '#') }}"
                 alt="Preview ảnh đại diện"
                 style="max-width: 150px; {{ old('avatar') || (isset($user) && $user->avatar) ? '' : 'display: none;' }}">
        </div>

        <div class="my-3">
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>



        <div class="mt-3">
            <label for="user_name">Tên đăng nhập</label>
            <input type="text" name="user_name" id="user_name" class="form-control" value="{{ old('user_name') }}">
        </div>

        <div class="my-3">
            @error('user_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="my-3">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="password_confirmation">Nhập lại mật khẩu</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                value="{{ old('password_confirmation') }}">
        </div>

        <div class="my-3">
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="my-3">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="phone">Số điện thoại</label>
            <input type="number" name="phone" id="phone" class="form-control" max="10" value="{{ old('phone') }}">
        </div>

        <div class="my-3">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="province">Thành phố/Tỉnh</label>
            {{-- <input type="text" name="province" id="province" class="form-control" value="{{ old("province") }}"> --}}
            <select name="province" id="province" class="form-control" value="{{ old('province') }}">
                <option value=""> Chọn Thành phố/Tỉnh </option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="my-3">
            @error('province')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="district">Quận/Huyện</label>
            <select name="district" id="district" class="form-control" value="{{ old('district') }}">
                <option value=""> Chọn Quận/Huyện </option>
            </select>
        </div>

        <div class="my-3">
            @error('district')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="ward">Phường/Xã</label>
            <select name="ward" id="ward" class="form-control" value="{{ old('ward') }}">
                <option value=""> Chọn Phường/Xã </option>
            </select>
        </div>
        </div>

        <div class="my-3">
            @error('ward')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
        </div>

        <div class="my-3">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="role">Vai trò</label>
            <select name="role" id="role" class="form-control" value="{{ old('role') }}">
                <option selected disabled>Vui lòng chọn vai trò</option>
                <option value="0">Admin</option>
                <option value="1">User</option>
            </select>
        </div>

        <div class="my-3">
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary me-1 mt-3" type="button">Quay
                    lại</button></a>
            <button class="btn btn-success mt-3 " type="submit">Thêm mới</button>
        </div>
    </form>


@endsection
@push('scripts')
<script>
    const provincesData = @json($provinces);
    const districtsData = @json($districts);
    const wardsData = @json($wards);

    const provinceSelect = document.getElementById('province');
    const districtSelect = document.getElementById('district');
    const wardSelect = document.getElementById('ward');
    const addressInput = document.getElementById('address');

    function updateAddress() {
        const ward = wardSelect.options[wardSelect.selectedIndex].text;
        const district = districtSelect.options[districtSelect.selectedIndex].text;
        const province = provinceSelect.options[provinceSelect.selectedIndex].text;

        addressInput.value = `${ward !== 'Chọn Phường/Xã' ? ward + ', ' : ''}${district !== 'Chọn Quận/Huyện' ? district + ', ' : ''}${province !== 'Chọn Thành phố/Tỉnh' ? province : ''}`;
    }

    provinceSelect.addEventListener('change', updateAddress);
    districtSelect.addEventListener('change', updateAddress);
    wardSelect.addEventListener('change', updateAddress);

    //Hiện ảnh
    function previewImage(event, imgId) {
        const input = event.target;
        const imagePreview = document.getElementById(imgId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = "block"; // Hiện ảnh sau khi load
            };
            reader.readAsDataURL(input.files[0]); // Đọc file ảnh
        } else {
            imagePreview.src = "#";
            imagePreview.style.display = "none"; // Ẩn ảnh nếu không có file
        }
    }
    
</script>
@endpush
