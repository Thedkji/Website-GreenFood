@extends('authens.main')
@section('contentInHere')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Tạo Tài Khoản Mới</h5>
                        <p class="text-muted">Sẵn Sàng tạo tài khoản miễn phí ngay bây giờ ?</p>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-warning" role="alert">
                            <strong> {{ session('message') }} </strong>
                        </div>
                    @endif
                    <div class="p-2 mt-4">
                        <form class="needs-validation" novalidate action="{{ route('authens.postRegister') }}"
                            method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ Và Tên <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name='name'
                                    placeholder="Nhập họ và tên" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- <div class="invalid-feedback">
                                Vui lòng nhập Họ và Tên
                            </div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"> Tên đăng nhập <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="user_name" name='user_name'
                                    placeholder="Nhập họ và tên" required>
                                @error('user_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- {{-- <div class="invalid-feedback"> --}}
                                {{-- Vui lòng nhập Họ và Tên --}}
                                {{-- </div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Nhập địa chỉ Email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- <div class="invalid-feedback">
                                Vui lòng nhập địa chỉ Email
                            </div> --}}
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="password-input">Mật Khẩu</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" class="form-control pe-5 password-input" name='password'
                                        onpaste="return false" placeholder="Nhập Mật khẩu" id="password-input"
                                        aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        required>
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- <div class="invalid-feedback">
                                    Vui lòng nhập mật khẩu của bạn
                                </div> --}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password-input">Nhập Lại Mật Khẩu</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" class="form-control pe-5 password-input"
                                        name='password_confirmation' onpaste="return false" placeholder="Nhập Mật khẩu"
                                        id="password_confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- <div class="invalid-feedback">
                                    Vui lòng nhập mật khẩu của bạn
                                </div> --}}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Số điện thoại <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name='phone'
                                    placeholder="Nhập họ và tên" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- {{-- <div class="invalid-feedback"> --}}
                                {{-- Vui lòng nhập Họ và Tên --}}
                                {{-- </div> --}}
                            </div>

                            <div class="mb-4">
                                <p class="mb-0 fs-12 text-muted fst-italic">Bằng cách đăng kí bạn đã đồng ý <a
                                        href="#"
                                        class="text-primary text-decoration-underline fst-normal fw-medium">điều khoản của
                                        greenfood</a>
                                </p>
                            </div>

                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                <h5 class="fs-13">Password must contain:</h5>
                                <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Đăng Kí</button>
                            </div>

                            <div class="mt-4 text-center">
                                <div class="signin-other-title">
                                    <h5 class="fs-13 mb-4 title text-muted">Tạo Tài Khoản với</h5>
                                </div>

                                <div>
                                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i
                                            class="ri-facebook-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i
                                            class="ri-google-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i
                                            class="ri-github-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i
                                            class="ri-twitter-fill fs-16"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Bạn đã có sẵn Tài Khoản ? <a href="{{ route('authens.login') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Đăng Nhập </a> </p>
            </div>

        </div>
    </div>
@endsection
