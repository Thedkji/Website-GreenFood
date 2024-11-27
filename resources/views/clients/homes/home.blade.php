@extends('clients.layouts.master')

@section('title', 'Fruitables - Trang chủ')

{{-- Link --}}
@section('title_page', 'Trang chủ')
{{-- @section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Sản phẩm') --}}

@section('content')


    <!-- Hero Start -->
    @include('clients/homes/banner-slide/hero-start')
    <!-- Hero End -->

    <!-- Fruits Shop Start-->
    @include('clients/homes/all-products/all-products')
    <!-- Fruits Shop End-->

    <!-- Featurs Start -->
    @include('clients/homes/categories/category')
    <!-- Featurs End -->

    <!-- Banner Section Start-->
    @include('clients/homes/banner-slide/banner2')
    <!-- Banner Section End -->


    <!-- Bestsaler Product Start -->
    @include('clients/homes/product/best-seller')
    <!-- Bestsaler Product End -->

    <!-- Featurs Section Start -->

    <div class="container-fluid featurs py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Chính Sách</h1>
                <p>Chính sách của chúng tôi luôn luôn đảm bảo quyền lợi của khách hàng lên hàng đầu</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-success mb-5 mx-auto">
                            <i class="fas fa-car-side fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Free Shipping</h5>
                            <p class="mb-0">Miễn phí trong nội thành </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-success mb-5 mx-auto">
                            <i class="fas fa-user-shield fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Security Payment</h5>
                            <p class="mb-0">Thanh toán bảo mật 100%</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-success mb-5 mx-auto">
                            <i class="fas fa-exchange-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Return of food</h5>
                            <p class="mb-0">Đổi trả miển phí khi sản phẩm lỗi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-success mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>24/7 Support</h5>
                            <p class="mb-0">Hỗ trợ mọi lúc nhanh chóng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->

  <!-- Testimonial Section -->
  <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center">
                <h4 class="text-primary">Our Testimonial</h4>
                <h1 class="display-5 mb-5 text-dark">Đánh giá nổi bật</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach($topRatedComments as $topRatedComments)
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-success position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-success">
                                <p class="mb-0">{{ $topRatedComments->content }}</p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-success rounded">
                                    <!-- Hiển thị avatar của người dùng -->
                                    <img src="{{ asset('storage/' . $topRatedComments->user->avatar) }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <!-- Hiển thị tên và profession (nếu có) -->
                                    <h4 class="text-dark">{{ $topRatedComments->user->name }}</h4>
                                    <p class="m-0 pb-3">{{ 'Khách hàng' }}</p>
                                    
                                    <!-- Hiển thị sao đánh giá -->
                                    <div class="d-flex pe-5">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fas fa-star {{ $i < $topRatedComments->rates->avg('star') ? 'text-primary' : '' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<!-- Testimonial End -->
@endsection
