<div id="billing-form" class="mb-10 w-100">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form id="edit-info-form" action="{{ route('client.information.update', $user->id) }}" method="POST"
        enctype="multipart/form-data" class="w-100">
        @csrf
        @method('PUT')

        <div class="row w-100">

            <!-- Cột bên trái -->
            <div class="col-md-6">
                <!-- Ảnh đại diện -->
                <div class="mb-4">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="img" class="form-control bg-white mt-2">
                    @if ($user->avatar)
                        <img src="{{ env('VIEW_IMG') }}/{{ $user->avatar }}" alt="Avatar" width="150"
                            height="150" class="rounded-circle mt-3" style="object-fit: cover;">
                    @endif
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label>Địa chỉ Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control"
                        placeholder="Email">
                </div>

                
                <!-- Số điện thoại -->
                <div class="mb-4">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control"
                        placeholder="Số điện thoại">
                </div>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-6">
                <!-- Họ và tên -->
                <div class="mb-4">
                    <label>Họ và tên</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control"
                        placeholder="Họ và tên">
                </div>


                <!-- Tỉnh/Thành phố -->
                <div class="mb-4">
                    <label>Tỉnh/Thành phố</label>
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
                    <label>Quận/Huyện</label>
                    <select name="district" id="district" class="form-select" value="{{ old('address') }}">
                        <option value=""> Chọn Quận/Huyện </option>

                    </select>
                </div>

                <!-- Phường/Xã -->
                <div class="mb-4">
                    <label>Phường/Xã</label>
                    <select name="ward" id="ward" class="form-select" value="{{ old('ward') }}">
                        <option value=""> Chọn Phường/Xã </option>
                    </select>
                </div>

                <!-- Địa chỉ -->
                <div class="mb-4">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}"
                        class="form-control" placeholder="Nhập địa chỉ">
                </div>
            </div>

            <!-- Nút cập nhật -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg btn-round" id="btn-userInfo-submit">Cập
                    nhật</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#province').change((e) => {
            e.preventDefault();

            let province_code = e.target.value;

            $.ajax({
                type: "GET",
                url: "{{ route('client.information.index') }}",
                data: {
                    'province_code': province_code
                },
                dataType: "json",
                success: function(response) {
                    $('#district').empty();
                    response.forEach(element => {
                        $('#district').append(
                            `<option value="${element.code}">${element.name}</option>`
                        );
                    });
                }
            });

            $('#district').change(e => {
                e.preventDefault();
                let district_code = e.target.value;


                $.ajax({
                    type: "GET",
                    url: "{{ route('client.information.index') }}",
                    data: {
                        'district_code': district_code
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#ward').empty();
                        response.forEach(element => {
                            $('#ward').append(
                                `<option value="${element.code}">${element.name}</option>`
                            );
                        });
                    }
                });
            })
        });

        // $('#btn-userInfo-submit').click(e => {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "PÓ",
        //         url: "{{ route('client.information.update', $user->id) }}",
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //         },
        //         dataType: "dataType",
        //         success: function(response) {
        //             console.log(response);
        //         }
        //     });
        // })
    });
</script>
