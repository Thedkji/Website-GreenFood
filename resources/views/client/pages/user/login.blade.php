@extends('client.index')
@section('content')


<!-- Checkout Page Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Đăng nhập</h1>
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
                        <label class="form-label my-3">Tên đăng nhập</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Mật khẩu</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="login">
                        <div class="form-check text-start my-3">
                            <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                name="Delivery" value="Delivery">
                            <label class="form-check-label" for="Delivery-1">Lưu tài khoản</label>
                        </div>
                        <div class="d-flex">
                            <p>Bạn chưa có tài khoản ?</p><a href="register" class="text-success"> Đăng ký</a>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="button"
                            class="btn border-success py-3 px-4 text-uppercase text-primary">Đăng nhập</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
@endsection