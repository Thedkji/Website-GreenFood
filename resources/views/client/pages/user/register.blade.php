@extends('client.index')
@section('content')


<!-- Checkout Page Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Đăng ký</h1>
        <form action="#">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="position-relative">
                        <img src="img/banner-fruits.jpg" class="img-fluid w-100 h-100 rounded" alt="">
                        <div class="position-absolute"
                            style="top: 50%; right: 100px; transform: translateY(-50%);">
                            <h3 class="text-success fw-bold ">Fresh <br> Fruits <br> Banner</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="form-item">
                        <label class="form-label my-3">Họ và tên</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Email</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Tên đăng nhập</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Mật khẩu</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Nhập lại mật khẩu</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Số điện thoại</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="login">
                        <div class="d-flex">
                            <p>Bạn đã có tài khoản ?</p><a href="login" class="text-success"> Đăng nhập</a>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="button"
                            class="btn border-success py-3 px-4 text-uppercase text-primary">Đăng ký</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
@endsection