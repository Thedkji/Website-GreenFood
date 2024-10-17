@extends('clients.layouts.master')

@section('title', 'Fruitables - Đăng ký tài khoản')

@section('content')
    @include('clients.layouts.components.singer-page')

    <div class="container-fluid py-5">
        <div class="shadow-lg p-4 w-50 m-auto rounded bg-light">
            <div class="text-center">
                <h1 class="text-primary">Quên Mật Khẩu</h1>
            </div>

            <div>
                <form action="" method="post" class="row justify-content-between g-4 mt-3">
                    <section class="col-md-12 d-flex flex-column gap-3">
                        <article>
                            <div>
                                <label for="" class="fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control my-2 p-2" name="user_name"
                                    placeholder="Nhập vào email của bạn để tìm lại mật khẩu">
                            </div>

                            @if (session('error.user_name'))
                                <div class="my-2 alert alert-danger">
                                    {{ session('error.user_name') }}
                                </div>
                            @endif
                        </article>

                        <button class="btn btn-primary text-white p-2">Tìm mật khẩu</button>

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
