<div class="container-fluid banner bg-success my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Đồ ăn ít Calo</h1>
                    <p class="fw-normal display-3 text-white mb-4">Có trong cửa hàng</p>
                    <p class="mb-4 text-white">GreenFood mang đến nhứng điều chất lượng nhất cho bạn!
                        Giúp bạn tự tin hơn và duy trì được thói quen ăn uống lành mạnh</p>

                    <a href="{{ route('client.shop') }}"
                        class="banner-btn btn border-secondary border-white border-success rounded-pill text-white py-3 px-5">Mua ngay</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ env('VIEW_CLIENT') }}/img/baner-1.png" class=" img-fluid w-100 rounded" alt="">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                        style="width: 140px; height: 140px; top: 0; left: 0;">
                        <h2 style="font-size: 75px;"> 35</h2>
                        <div class="d-flex flex-column">
                            <span class="h3 mb-0">Calo</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
