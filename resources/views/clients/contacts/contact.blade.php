@extends('clients.layouts.master')

@section('title', 'Fruitables - Liên hệ')

@section('content')
    @include('clients.layouts.components.singer-page')

    <div class="container-fluid py-5">
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-3">
                <div class="col-12">
                    <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                        <h1 class="text-primary fw-bold">Liên hệ</h1>
                        {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                    </div>

                </div>

                <div class="p-5 bg-light rounded">
                    <div class="row g-4">


                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" style="height: 400px;"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.003446954538!2d105.76316737503163!3d21.0325480806178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454bbe135a505%3A0x152cff27eb8815ee!2zxJDGoW4gbmd1ecOqbiA1IGvDvSB0w7pjIHjDoSBN4bu5IMSQw6xuaA!5e0!3m2!1svi!2s!4v1731146496283!5m2!1svi!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="" class="">
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Nhập tên">
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4"
                                    placeholder="Nhập Email">
                                <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"></textarea>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                    type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">123 Street New York.USA</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">info@example.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

    </div>
@endsection
