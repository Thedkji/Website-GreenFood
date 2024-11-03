@extends('authens.main')
@section('contentInHere')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Chào mừng !</h5>
                        <p class="text-muted">Bạn đã đến với chúng tôi</p>
                        @if (session('errorsMessage'))
                            <div class="alert alert-danger" role="alert">
                                <strong> {{ session('errorsMessage') }} </strong>
                            </div>
                        @endif
                    </div>
                    <div class="p-2 mt-4">
                        <form action="{{ route('authens.login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="useremail" name="email"
                                    placeholder="Nhập Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">

                                <label class="form-label" for="password-input">Mật Khẩu</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5 password-input"
                                        placeholder="Nhập mật khẩu" id="password-input" name="password">
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if (session('messageError'))
                                        <span class="text-danger">{{ session('messageError') }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="auth-remember-check">Remember
                                    me</label>
                                <div class="float-end ">
                                    <a href="#" class="text-muted">Bạn quên mật khẩu
                                        ?</a>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Đăng Nhập</button>
                            </div>

                            <div class="mt-4 text-center">
                                <div class="signin-other-title">
                                    <h5 class="fs-13 mb-4 title">Đăng Nhập Với</h5>
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
                <p class="mb-0">Bạn Không có tài khoản ? <a href="{{ route('authens.register') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Đăng Ký </a> </p>
            </div>

        </div>
    </div>
@endsection
