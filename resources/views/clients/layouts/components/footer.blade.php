<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 position-relative">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="{{ route('client.home') }}" class="navbar-brand">
                        <h1 class="text-primary display-6">GreenFood</h1>
                    </a>
                    <p class="text-secondary mb-0">Sản phẩm healthy !</p>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative mx-auto">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://x.com/"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://www.youtube.com/watch?v=AYXfaVD5o40"><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="https://www.instagram.com/"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Tại sao mọi người thích chúng tôi!</h4>
                    <p class="mb-4">Bởi vì chúng tôi luôn trao đến tay khách hàng những sản phẩm chất lượng nhất. Mang lại cho khách hàng những trải nghiệm tối nhất khi mua hàng tại GreenFood
                    </p>
                    <a href="{{ route('client.shop') }}" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Mua ngay</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Thông tin cửa hàng</h4>
                    <a class="btn-link" href="{{ route('client.introduce.index') }}"   >Về chúng tôi</a>
                    <a class="btn-link" href="{{ route('client.contact.index') }}">Liên hệ với chúng tôi</a>
                    <a class="btn-link" href="###">Chính sách bảo mật</a>
                    <a class="btn-link" href="###">Điều khoản & Điều kiện</a>
                    <a class="btn-link" href="###">Chính sách đổi trả</a>
                    <a class="btn-link" href="###">Câu hỏi thường gặp & hỗ trợ</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Tài khoản</h4>
                    <a class="btn-link" href="{{ route('client.information.index') }}">Tài khoản của tôi</a>
                    <a class="btn-link" href="{{ route('client.cart') }}">Giỏ hàng</a>
                    <a class="btn-link" href="{{ route('client.information.index') }}">Trạng thái đơn hàng</a>
                    <a class="btn-link" href="{{ route('client.information.index') }}">Lịch sử đặt hàng</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Thông tin về chúng tôi</h4>
                    <p>Address: Nguyễn Cơ Thạch, Mỹ Đình 2, Bắc Từ Liêm, Hà Nội</p>
                    <p>Email: greenfood8386@gmail.com</p>
                    <p>Hotline: 0369 868 999</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->




<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>


{{-- message --}}
{{-- <a href="#" class="contact-realtime">
    <i class="fa fa-message fs-1"></i>
</a>

<style>
    .contact-realtime{
        position: fixed;
        bottom: 100px;
        right: 35px;
    }

</style> --}}
