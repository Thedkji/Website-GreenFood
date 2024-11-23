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
            <input type="file" class="form-control" name="avatar" id="avatar" value="{{ $user->avatar }}" onchange="previewImage(event, 'avatar_user')">
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
            <input type="number" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" max="10" required>
            <x-feedback name="phone" />

        </div>
        <div class="mt-3">
            <label for="province">Thành phố/Tỉnh</label>
            <select name="province" id="province" class="form-control" value="{{ $user->province }}" required>
                @foreach ($provinces as $province)
                <option value="{{ $province->code }}" {{ $province->code == $user->province ? 'selected' : '' }}>
                    {{ $province->name }}
                </option>
                @endforeach
            </select>
            <x-feedback name="province" />

        </div>
        <div class="mt-3">
            <label for="district">Quận/Huyện</label>
            <select name="district" id="district" class="form-control" value="{{ $user->district }}" required>
                @foreach ($districts as $district)
                    <option value="{{ $district->code }}" {{ $district->code == $user->district ? 'selected' : '' }}>
                        {{ $district->name }}
                    </option>
                @endforeach
            </select>
            <x-feedback name="district" />

        </div>
        <div class="mt-3">
            <label for="ward">Phường/Xã</label>
            <select name="ward" id="ward" class="form-control" value="{{ $user->ward }}" required>
                @foreach ($wards as $ward)
                    <option value="{{ $ward->code }}" {{ $ward->code == $user->ward ? 'selected' : '' }}>
                        {{ $ward->name }}
                    </option>
                @endforeach
            </select>
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
