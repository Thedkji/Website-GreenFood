@extends('clients.layouts.master')

@section('title', 'Thông tin')

{{-- Link --}}
@section('title_page', 'Thông tin')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Thông tin')

@section('content')
    @include('clients.information.header-link')

    <div class="container mt-4">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        @include('clients.information.tab-menu')
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">

                                <div class="row row-40">

                                    @include('clients.information.infor-user')

                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    @include('clients.information.status-order')
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <div class="tab-pane fade" id="history_order" role="tabpanel">
                                <div class="myaccount-content">
                                    @include('clients.information.history-order')
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pass" role="tabpanel">
                                <div class="myaccount-content">
                                    @include('clients.information.pass')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="coupon" role="tabpanel">
                                <div class="myaccount-content">
                                    @include('clients.information.coupon_user')
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>

            </div>

        </div>
    </div>


    @include('clients.information.script')
@endsection
