@extends('clients.layouts.master')

@section('title', 'Fruitables - Đăng ký tài khoản')

@section('content')
    @include('clients.layouts.components.singer-page')

    <div class="container-fluid py-5">
        <div class="shadow-lg p-4 w-50 m-auto rounded bg-light">
            <div class="text-center">
                <h1 class="text-primary">Đăng Nhập</h1>
            </div>

            <div>
                <form action="" method="post" class="row justify-content-between g-4 mt-3">
                    <section class="col-md-12 d-flex flex-column gap-3">
                        <article>
                            <div>
                                <label for="" class="fw-bold">Tên đăng nhập <span class="text-danger">*</span></label>
                                <input type="text" class="form-control my-2 p-2" name="user_name"
                                    placeholder="Nhập tên đăng nhập hoặc số điện thoại của bạn">
                            </div>

                            @if (session('error.user_name'))
                                <div class="my-2 alert alert-danger">
                                    {{ session('error.user_name') }}
                                </div>
                            @endif
                        </article>

                        <article>
                            <div>
                                <label for="" class="fw-bold">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" class="form-control my-2 p-2" name="password"
                                    placeholder="Nhập tên mật khẩu của bạn">
                            </div>

                            @if (session('error.password'))
                                <div class="my-2 alert alert-danger">
                                    {{ session('error.password') }}
                                </div>
                            @endif
                        </article>

                        <article class="text-end">
                            <p class="">
                                <span class="text-primary">
                                    <a href="{{ route('client.forgotPass') }}">Quên mật khẩu</a>
                                </span>
                            </p>
                        </article>

                        <button class="btn btn-primary text-white p-2">Đăng nhập</button>

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
