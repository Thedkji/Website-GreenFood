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
                        <div class="my-auto dropdown text-primary user">
                            <i class="fas fa-user fa-2x dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="register">Đăng ký</a></li>
                                <li><a class="dropdown-item" href="login">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Tìm kiếm -->
    @include('client.components.search')
    <!-- Hết tìm kiếm -->

    <!-- Giỏ hàng -->
    @include('client.components.cart')
    <!-- Hết giỏ hàng -->
</Header>