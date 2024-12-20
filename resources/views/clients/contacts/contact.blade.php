@extends('clients.layouts.master')

@section('title', 'Fruitables - Liên hệ')

@section('title_page', 'Liên hệ')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Liên hệ')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
 --}}

    @include('admins.layouts.components.toast-container')
    <div class="container-fluid py-5">
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-3">
                {{-- <div class="col-12">
                    <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                        <h1 class="text-primary fw-bold">Liên hệ</h1>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    </div>

                </div> --}}

                <div class="p-5 bg-light rounded">
                    <div class="row g-4">


                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                              
                                <iframe class="rounded w-100" style="height: 400px;"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9954019562606!2d105.76261357503152!3d21.03286998061745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454bbe2a5ed87%3A0x2b95c75e021662d0!2zS2h1IMSQw7QgVGjhu4sgTeG7uSDEkMOsbmggSUktIE5ndXnhu4VuIEPGoSBUaOG6oWNo!5e0!3m2!1svi!2s!4v1734626537557!5m2!1svi!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="{{ route('client.contact.sendContact') }}" class="" method="POST">
                                @csrf
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="name"
                                    placeholder="Nhập tên">

                                <div class="my-2">
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4" name="email"
                                    placeholder="Nhập Email">

                                <div class="my-2">
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" name="message"
                                    placeholder="Nhập nội dung"></textarea>
                                <div class="my-2">
                                    @error('message')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                    type="submit">Gửi</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Địa chỉ</h4>
                                    <p class="mb-2">Nguyễn Cơ Thạch, Mỹ Đình 2, Bắc Từ Liêm, Hà Nội</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p class="mb-2">greenfood8386@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Số điện thoại</h4>
                                    <p class="mb-2">0369 868 999</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        @include('admins.layouts.components.toast')
    </div>


@endsection
