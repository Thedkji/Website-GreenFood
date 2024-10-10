<div class="container-fluid g-5 mb-5 hero-header">
    <div class="container-fluid">
        <div class="row align-items-center g-5">
            <div class="col-md-12 col-lg-6">
                <h4 class="mb-3 text-success">100% Organic Foods</h4>
                <h1 class="mb-5 display-3 text-primary">Organic Veggies & Fruits Foods</h1>
                <div class="position-relative mx-auto">
                    <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                        placeholder="Your Email">
                    <button type="submit"
                        class="btn btn-primary border-success border-0 py-3 px-4 position-absolute rounded-pill text-white"
                        style="top: 0; right: 0;">Subscribe Now</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="{{ env('VIEW_CLIENT') }}/img/hero-img-1.png" class="img-fluid w-100 h-100 bg-success rounded"
                                alt="First slide">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="{{ env('VIEW_CLIENT') }}/img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>