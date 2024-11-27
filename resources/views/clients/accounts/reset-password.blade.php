@extends('clients.layouts.master')

@section('title', 'Fruitables - Đăng ký tài khoản')

@section('title_page', 'Đặt lại mật khẩu')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Đặt lại mật khẩu')

@section('content')

    <div class="container-fluid py-5">
        <div class="shadow-lg p-4 w-50 m-auto rounded bg-light">
            <div class="text-center">
                <h1 class="text-primary">Đặt lại mật khẩu</h1>
            </div>
            @if (session('message'))
                <div class="alert alert-warning" role="alert">
                    <strong> {{ session('message') }} </strong>
                </div>
            @endif
            <div>
                <form action="" method="post" class="row justify-content-between g-4 mt-3">
                    @csrf
                    <section class="col-md-12 d-flex flex-column gap-3">

                        <article>
                            <div>
                                <label for="" class="fw-bold">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" class="form-control my-2 p-2" name="password"
                                    placeholder="Nhập tên mật khẩu của bạn">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </article>

                        <article>
                            <div>
                                <label for="" class="fw-bold">Nhập lại mật khẩu <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control my-2 p-2" name="password_confirmation"
                                    placeholder="Nhập lại mật khẩu của bạn">
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </article>

                        <button class="btn btn-primary text-white p-2">Đổi mật khẩu</button>
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
                        <p class=" p-2">Đã có tài khoản ?
                            <span class="text-primary">
                                <a href="{{ route('client.login') }}">Đăng nhập ngay</a>
                            </span>
                        </p>
                    </section>


                </form>


            </div>
        </div>

    @endsection
