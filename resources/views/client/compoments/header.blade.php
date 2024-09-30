<Header>

    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container p-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl justify-content-center">
                <a href="/" class="navbar-brand">
                    <h1 class="text-primary display-6">Fruitables</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="shop" class="nav-item nav-link">Shop</a>
                        <a href="shop-detail" class="nav-item nav-link">Shop Detail</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 bg-success rounded-0">
                                <a href="cart" class="dropdown-item">Cart</a>
                                <a href="chackout" class="dropdown-item">Chackout</a>
                                <a href="404page" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <a class="btn-search btn border border-success bg-white btn-md-square rounded-circle  me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i></a>
                        <a href="#" class="position-relative me-4 my-auto" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <i class="fa fa-shopping-bag fa-2x"></i>

                            <span
                                class="position-absolute bg-success rounded-circle d-flex align-items-center justify-content-center text-white px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
                        </a>
                        <a href="#" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-0">
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3 btn btn-primary border-success"><i
                                class="fa fa-search text-white"></i></span>
                    </div>
                </div>
                <div class="modal-body d-flex align-items-center bg-light">
                    <div class="input-group w-75 mx-auto d-flex fruite">
                        <div class="row g-4 ">
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{asset('img/fruite-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-success px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div>
                                    <div class="p-4 border border-success border-top-0 rounded-bottom">
                                        <h4>Grapes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            <a href="#"
                                                class="btn border border-success rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{asset('img/fruite-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-success px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div>
                                    <div class="p-4 border border-success border-top-0 rounded-bottom">
                                        <h4>Grapes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            <a href="#"
                                                class="btn border border-success rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{asset('img/fruite-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-success px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div>
                                    <div class="p-4 border border-success border-top-0 rounded-bottom">
                                        <h4>Grapes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            <a href="#"
                                                class="btn border border-success rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{asset('img/fruite-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-success px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div>
                                    <div class="p-4 border border-success border-top-0 rounded-bottom">
                                        <h4>Grapes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            <a href="#"
                                                class="btn border border-success rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
    </div>
    <!-- End Offcanvas -->
</Header>