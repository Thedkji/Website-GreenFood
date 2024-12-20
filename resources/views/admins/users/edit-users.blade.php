@extends('admins.layouts.master')

@section('title', 'User | Chỉnh sửa thông tin người dùng')

@section('start-page-title', 'Chỉnh sửa thông tin người dùng')

@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Quản lý người dùng</a></li>
    <li class="breadcrumb-item active">Sửa người dùng</li>
@endsection

@section('content')
    @include('admins.layouts.components.toast-container')
    <form novalidate action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label for="name">Tên người dùng <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" >
            <x-feedback name="name" />
        </div>

        <div class="mt-3">
            <label for="avatar">Ảnh</label>
            <input type="file" class="form-control" name="avatar" id="avatar" value="{{ $user->avatar }}"
                onchange="previewImage(event, 'avatar_user')">
            <x-feedback name="avatar" />
        </div>
        <div class="form-group mb-3" style="padding-top:20px">
            <img id="image_user"
                src="{{ old('avatar') ?? (isset($user) && $user->avatar ? Storage::url($user->avatar) : '#') }}"
                alt="Ảnh khách hàng"
                style="width: 150px; height: 150px;object-fit:cover ; {{ old('avatar') || (isset($user) && $user->avatar) ? '' : 'display: none;' }}">
        </div>

        <div class="mt-3">
            <label for="user_name">Tên đăng nhập <span class="text-danger">*</span></label>
            <input type="text" name="user_name" id="user_name" class="form-control" value="{{ $user->user_name }}"
                 disabled>
            <x-feedback name="user_name" />

        </div>
        {{-- <div class="mt-3">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" >
        </div>
        <div class="mt-3">
            <label for="password_confirmation">Nhập lại mật khẩu</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
        </div> --}}
        <div class="mt-3">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>

            <x-feedback name="email" />

        </div>
        <div class="mt-3">
            <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
            <input type="number" name="phone" id="phone" class="form-control" value="{{ $user->phone }}"
                max="10" >
            <x-feedback name="phone" />

        </div>
        <div class="form-group d-flex justify-content-between mt-3">
            <div style="flex: 1; margin-right: 10px;">
                <label for="province">Thành phố/Tỉnh <span class="text-danger">*</span></label>
                <select name="province" id="province" class="form-control" >
                    <option value="">-- Chọn tỉnh/thành phố --</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->code }}"
                            {{ isset($selectedProvince) && $province->code == $selectedProvince->code ? 'selected' : '' }}>
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
                <x-feedback name="province" />
            </div>

            <div style="flex: 1; margin-right: 10px;">
                <label for="district">Quận/Huyện <span class="text-danger">*</span></label>
                <select name="district" id="district" class="form-control" >
                    <option value="">-- Chọn quận/huyện --</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->code }}"
                            {{ isset($selectedDistrict) && $district->code == $selectedDistrict->code ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option>
                    @endforeach
                </select>
                <x-feedback name="district" />
            </div>

            <div style="flex: 1;">
                <label for="ward">Phường/Xã <span class="text-danger">*</span></label>
                <select name="ward" id="ward" class="form-control" >
                    <option value="">-- Chọn phường/xã --</option>
                    @foreach ($wards as $ward)
                        <option value="{{ $ward->code }}"
                            {{ isset($selectedWard) && $ward->code == $selectedWard->code ? 'selected' : '' }}>
                            {{ $ward->name }}
                        </option>
                    @endforeach
                </select>

                <x-feedback name="ward" />
            </div>
        </div>

        <div class="mt-3">
            <label for="address">Địa chỉ <span class="text-danger">*</span></label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" >
            <x-feedback name="address" />

        </div>
        <div class="mt-3">
            <label for="role">Vai trò <span class="text-danger">*</span></label>
            <select name="role" id="role" class="form-control" >
                <option selected disabled>Vui lòng chọn vai trò</option>
                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>User</option>
            </select>
            <x-feedback name="role" />


        </div>

        <div class="my-3">
            <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary" type="button">Quay
                    lại</button></a>
            <button class="btn btn-success" type="submit">Sửa</button>
        </div>
    </form>
@endsection

@include('admins.layouts.components.toast')

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

            addressInput.value =
                `${ward !== 'Chọn Phường/Xã' ? ward + ', ' : ''}${district !== 'Chọn Quận/Huyện' ? district + ', ' : ''}${province !== 'Chọn Thành phố/Tỉnh' ? province : ''}`;
        }

        provinceSelect.addEventListener('change', updateAddress);
        districtSelect.addEventListener('change', updateAddress);
        wardSelect.addEventListener('change', updateAddress);


        //Hiện ảnh
        function previewImage(event) {
            const input = event.target; // Lấy input file
            const preview = document.getElementById('image_user'); // Ảnh preview

            if (input.files && input.files[0]) { // Kiểm tra xem file đã được chọn chưa
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result; // Cập nhật src của ảnh preview
                    preview.style.display = 'block'; // Hiển thị ảnh nếu bị ẩn
                };

                reader.readAsDataURL(input.files[0]); // Đọc file ảnh dưới dạng Data URL
            } else {
                preview.src = '#'; // Gán src rỗng nếu không có file
                preview.style.display = 'none'; // Ẩn ảnh
            }
        }
    </script>
@endpush
