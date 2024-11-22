@extends('clients.layouts.master')

@section('title', 'Fruitables - Đăng ký tài khoản')

@section('content')

    <div class="container-fluid py-5">
        <div class="shadow-lg p-4 w-50 m-auto rounded bg-light">
            <div class="text-center">
                <h1 class="text-primary">Đăng Nhập</h1>
            </div>
            @if (session('message'))
                <div class="alert alert-warning" role="alert">
                    <strong> {{ session('message') }} </strong>
                </div>
            @endif
            @if ($errors->has('email'))
                <div class="my-2 alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <div>
                <form action="{{ route('client.login') }}" method="post" class="row justify-content-between g-4 mt-3">
                    @csrf
                    <section class="col-md-12 d-flex flex-column gap-3">
                        <article>
                            <div>
                                <label for="user_name" class="fw-bold">Tên đăng nhập <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control my-2 p-2" id="user_name" name="user_name"
                                    placeholder="Nhập tên đăng nhập hoặc số điện thoại của bạn">
                            </div>

                            {{-- @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            @if ($errors->has('user_name'))
                                <div class="my-2 alert alert-danger">
                                    {{ $errors->first('user_name') }}
                                </div>
                            @endif
                        </article>

                        <article>
                            <div>
                                <label for="" class="fw-bold">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" class="form-control my-2 p-2" name="password"
                                    placeholder="Nhập tên mật khẩu của bạn">
                            </div>
                            {{-- @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}

                            @if ($errors->has('password'))
                                <div class="my-2 alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </article>
                        @if (session('error_general'))
                            <span class="text-danger">{{ session('error_general') }}</span>
                        @endif
                        <main class="d-flex justify-content-between">

                            <article class="text-start">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="auth-remember-check">Ghi nhớ đăng nhập</label>
                            </article>
                            <article class="text-end">
                                <p class="">
                                    <span class="text-primary">
                                        <a href="{{ route('client.forgotPass') }}">Quên mật khẩu</a>
                                    </span>
                                </p>
                            </article>
                        </main>

                        <button class="btn btn-primary text-white p-2">Đăng nhập</button>
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
                        <p class=" p-2">Bạn chưa có tài khoản ?
                            <span class="text-primary">
                                <a href="{{ route('client.register') }}">Đăng ký ngay</a>
                            </span>
                        </p>

                    </section>


                </form>
            </div>
        </div>
    </div>

@endsection
