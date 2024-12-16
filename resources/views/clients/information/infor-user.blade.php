<div id="billing-form" class="mb-10 w-100">
    <div class="toast-container">
        @if (session('success'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Thông báo</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
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
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white text-dark">
                    {{ session('error') }}
                </div>
                <div class="toast-progress bg-danger"></div>
            </div>
        @endif
    </div>
    <form id="edit-info-form" action="{{ route('client.information.update', $user->id) }}" method="POST"
        enctype="multipart/form-data" class="w-100">
        @csrf
        @method('PUT')

        <div class="row w-100">
            <!-- Cột bên trái -->
            <div class="col-md-6">
                <!-- Ảnh đại diện -->
                <div class="mb-3">
                    <label for="inputFileAvatar">Ảnh đại diện</label>
                    <input type="file" class="form-control img bg-white" name="img" id="inputFileAvatar"
                        onchange="previewImage(event, 'imagePreviewAvatar')">
                    <div class="form-group mt-2">
                        <img id="imagePreviewAvatar" src="#" alt="Preview ảnh đại diện"
                            style="object-fit: cover; display: none;" width="130" height="130"
                            class="rounded-circle">
                        @if ($user->avatar)
                            <img id="imagePreviewAvatar2" src="{{ env('VIEW_IMG') }}/{{ $user->avatar }}"
                                alt="Preview ảnh đại diện" style="object-fit: cover;" width="130" height="130"
                                class="rounded-circle d-block">
                        @else
                            <img id="imagePreviewAvatar2" src="{{ env('APP_URL') }}/clients/img/avatar-default.jpg"
                                alt="Preview ảnh đại diện" style="object-fit: cover; display: block;" width="130"
                                height="130" class="rounded-circle">
                        @endif
                    </div>
                </div>

                <div class="my-3 text-danger err-img"></div>

                <!-- Email -->
                <div class="my-2">
                    <label class="fw-bold mb-2">Địa chỉ Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control"
                        placeholder="Email" disabled>
                </div>

                <div class="my-3 text-danger err-email"></div>

                <!-- Số điện thoại -->
                <div class="my-2">
                    <label class="fw-bold mb-2">Số điện thoại</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control"
                        placeholder="Số điện thoại">
                </div>

                <div class="my-3 text-danger err-phone"></div>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-6">
                <!-- Họ và tên -->
                <div class="mb-4">
                    <label class="fw-bold mb-2">Họ và tên</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control"
                        placeholder="Họ và tên">
                </div>

                <div class="my-3 text-danger err-name"></div>

                <!-- Tỉnh/Thành phố -->
                <div class="mb-4">
                    <label class="fw-bold mb-2">Tỉnh/Thành phố</label>
                    <select name="province" id="province" class="form-select" value="{{ old('province') }}">
                        <option value=""> Chọn Thành phố/Tỉnh </option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->code }}"
                                {{ $province->name == $user->province ? 'selected' : '' }}>{{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quận/Huyện -->
                <div class="mb-4">
                    <label class="fw-bold mb-2">Quận/Huyện</label>
                    <select name="district" id="district" class="form-select" value="{{ old('address') }}">
                        <option value=""> Chọn Quận/Huyện </option>

                    </select>
                </div>

                <!-- Phường/Xã -->
                <div class="mb-4">
                    <label class="fw-bold mb-2">Phường/Xã</label>
                    <select name="ward" id="ward" class="form-select" value="{{ old('ward') }}">
                        <option value=""> Chọn Phường/Xã </option>
                    </select>
                </div>

                <!-- Địa chỉ -->
                <div class="mb-4">
                    <label class="fw-bold mb-2">Địa chỉ</label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}"
                        class="form-control" placeholder="Nhập địa chỉ">
                </div>
            </div>

            <!-- Nút cập nhật -->
            <div class="col-12">
                <button type="button" class="btn btn-primary btn-lg btn-round" id="btn-userInfo-submit">Cập
                    nhật</button>
            </div>
        </div>
    </form>
</div>

@include('admins.layouts.components.toast')

<script>
    function previewImage(event, previewId) {
        // Ẩn ảnh cũ lấy từ cơ sở dữ liệu nếu có
        const oldImage = document.getElementById('img');
        if (oldImage) {
            oldImage.style.display = 'none';
        }

        // Hiển thị ảnh mới
        const preview = document.getElementById(previewId);
        if (event.target.files && event.target.files[0]) {
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.style.display = 'block';
            $('#imagePreviewAvatar2').removeClass('d-block').addClass('d-none');

            // Giải phóng bộ nhớ sau khi ảnh đã được tải
            preview.onload = function() {
                URL.revokeObjectURL(preview.src);
            }
        } else {
            // Ẩn phần preview nếu không có ảnh được chọn
            preview.style.display = 'none';
            preview.src = ''; // Đảm bảo đường dẫn ảnh không còn được giữ
        }
    }
    $(document).ready(function() {
        // Hàm để xem trước ảnh được chọn
        // Hàm load districts khi trang được tải
        function loadDistricts(provinceCode, selectedDistrict = null) {
            $.ajax({
                type: "GET",
                url: "{{ route('client.information.index') }}",
                data: {
                    'province_code': provinceCode
                },
                dataType: "json",
                success: function(response) {
                    $('#district').empty();
                    $('#district').append(
                        `<option value="">Chọn Quận/Huyện</option>`); // Thêm option mặc định
                    response.forEach(element => {
                        $('#district').append(
                            `<option value="${element.code}" ${element.name == selectedDistrict ? 'selected' : ''}>${element.name}</option>`
                        );
                    });

                    // Tự động tải wards nếu có district đã chọn
                    if (selectedDistrict) {
                        loadWards($('#district').val(), "{{ $user->ward }}");
                    }
                }
            });
        }

        // Hàm load wards
        function loadWards(districtCode, selectedWard = null) {
            $.ajax({
                type: "GET",
                url: "{{ route('client.information.index') }}",
                data: {
                    'district_code': districtCode
                },
                dataType: "json",
                success: function(response) {
                    $('#ward').empty();
                    $('#ward').append(
                        `<option value="">Chọn Phường/Xã</option>`); // Thêm option mặc định
                    response.forEach(element => {
                        $('#ward').append(
                            `<option value="${element.code}" ${element.name == selectedWard ? 'selected' : ''}>${element.name}</option>`
                        );
                    });
                }
            });
        }

        // Khi trang được tải, tự động load districts và wards nếu province đã chọn
        let initialProvinceCode = $('#province').val();
        if (initialProvinceCode) {
            loadDistricts(initialProvinceCode, "{{ $user->district }}");
        }

        // Khi province thay đổi
        $('#province').change((e) => {
            e.preventDefault();
            let provinceCode = e.target.value;
            loadDistricts(provinceCode);
        });

        // Khi district thay đổi
        $('#district').change((e) => {
            e.preventDefault();
            let districtCode = e.target.value;
            loadWards(districtCode);
        });
    });

    $(document).ready(function() {
        $('#btn-userInfo-submit').on('click', function(e) {
            e.preventDefault(); // Chặn hành động mặc định
            let img = $('input[name="img"]').val();
            let name = $('input[name="name"]').val();
            let email = $('input[name="email"]').val();
            let phone = $('input[name="phone"]').val();

            let valid = true;

            // Xóa các lỗi cũ
            $('.err-img').text('');
            $('.err-name').text('');
            $('.err-email').text('');
            $('.err-phone').text('');

            function errTrue(idErr, nameFocus, message) {
                $(nameFocus).focus();
                $(idErr).html(message).show();

                $('html, body').animate({
                    scrollTop: $(nameFocus).offset().top - 150 // Cuộn đến phần tử cụ thể
                }, 'fast');

                valid = false;
            }

            function errFalse(id) {
                $(id).html('').hide();
            }

            // Validate ảnh
            if (img) {
                let fileSize = $('input[name="img"]')[0].files[0].size; // Lấy kích thước file
                let fileExtension = img.split('.').pop().toLowerCase(); // Lấy đuôi file
                let validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

                if (!validExtensions.includes(fileExtension)) {
                    errTrue('.err-img', $('input[name="img"]'), 'Định dạng ảnh không hợp lệ.');
                } else if (fileSize > 2 * 1024 * 1024) { // 2MB
                    errTrue('.err-img', $('input[name="img"]'),
                        'Kích thước ảnh không được vượt quá 2MB.');
                }
            }

            // Validate tên
            if (!name) {
                errTrue('.err-name', $('input[name="name"]'), 'Tên không được để trống.');
            } else if (/\d/.test(name)) {
                errTrue('.err-name', $('input[name="name"]'), 'Tên không được chứa số.');
            }

            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                errTrue('.err-email', $('input[name="email"]'), 'Email không được để trống.');
            } else if (!emailRegex.test(email)) {
                errTrue('.err-email', $('input[name="email"]'), 'Email không hợp lệ.');
            }

            // Validate số điện thoại
            const phoneRegex = /^\d{10}$/;
            if (!phone) {
                errTrue('.err-phone', $('input[name="phone"]'), 'Số điện thoại không được để trống.');
            } else if (!phoneRegex.test(phone)) {
                errTrue('.err-phone', $('input[name="phone"]'),
                    'Số điện thoại không hợp lệ và phải đủ 10 số.');
            }

            // Nếu tất cả đều hợp lệ thì submit form
            if (valid) {
                $('#edit-info-form')[0].submit(); // Submit form chuẩn
            }
        });
    });
</script>
