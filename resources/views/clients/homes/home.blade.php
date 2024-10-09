@extends('clients.layouts.master')

@section('title', 'Fruitables - Vegetable Website Template')
@section('content')
<!-- Hero Start -->
@include('clients/homes/banner-slide/hero-start')
<!-- Hero End -->

<!-- Fruits Shop Start-->
@include('clients/homes/product/all-products')
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
            <h1 class="display-4">Bestseller Products</h1>
            <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which
                looks reasonable.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-success mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Free Shipping</h5>
                        <p class="mb-0">Free on order over $300</p>
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
                        <p class="mb-0">100% security payment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-success mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>30 Day Return</h5>
                        <p class="mb-0">30 day money guarantee</p>
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
                        <p class="mb-0">Support every time fast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->

<!-- Tastimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h4 class="text-primary">Our Testimonial</h4>
            <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-success position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-success">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-success rounded">
                            <img src="{{ env('VIEW_CLIENT') }}/img/testimonial-1.jpg" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-success position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-success">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-success rounded">
                            <img src="{{ env('VIEW_CLIENT') }}/img/testimonial-1.jpg" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-success position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-success">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-success rounded">
                            <img src="{{ env('VIEW_CLIENT') }}/img/testimonial-1.jpg" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Client Name</h4>
                            <p class="m-0 pb-3">Profession</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection