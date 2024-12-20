<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                        class="text-white">Nguyễn Cơ Thạch, Mỹ Đình 2, Bắc Từ Liêm, Hà Nội
                    </a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                        class="text-white">greenfood8386@gmail.com</a></small>
            </div>
            {{-- <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div> --}}
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl d-flex align-items-center">
            <a href="{{ route('client.home') }}" class="navbar-brand">
                <h1 class="text-primary display-6">GreenFood</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('client.introduce.index') }}" class="nav-item nav-link">Giới Thiệu</a>
                    <a href="{{ route('client.shop') }}" class="nav-item nav-link">Sản phẩm</a>
                    {{-- <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a> --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Danh mục</a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li class="dropdown-submenu">
                                    <a href="{{ route('client.shop', ['category_id' => $category->id]) }}" class="dropdown-item">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Công Cụ</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ route('client.bmi') }}" class="dropdown-item">Tính BMI</a>
                            <a href="{{ route('client.bmr') }}" class="dropdown-item">Tính BMR và TDEE</a>
                        </div>
                    </div>
                    <a href="{{ route('client.contact.index') }}" class="nav-item nav-link">Liên Hệ</a>


                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                        data-bs-toggle="modal" data-bs-target="#searchModal"><i
                            class="fas fa-search text-primary"></i></button>

                    <a href="#" class="position-relative me-4 my-auto" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span
                            class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                            {{ $cartQuantity }}
                        </span>
                    </a>
                    <div class="nav-item  dropdown">
                        @guest
                        <!-- Hiển thị liên kết đăng nhập và đăng ký nếu người dùng chưa đăng nhập -->
                        <a href="{{ route('client.login') }}" class="nav-link">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                        <div class="dropdown-menu bg-secondary rounded-0">
                            <a href="{{ route('client.login') }}" class="dropdown-item">Đăng Nhập</a>
                            <a href="{{ route('client.register') }}" class="dropdown-item">Đăng Ký</a>
                        </div>
                        @else
                        {{-- <a href="{{ route('client.login') }}" class="nav-link">
                            <i class="fas fa-user fa-2x"></i>
                        </a> --}}
                        <!-- Hiển thị tên người dùng và nút đăng xuất nếu người dùng đã đăng nhập -->
                        <a href="" class="nav-link">
                            @if (auth()->user()->avatar)
                            <img id="imagePreviewAvatar2" src="{{ Storage::url(auth()->user()->avatar) }}"
                                alt="Preview ảnh đại diện" style="object-fit: cover;" width="40" height="40"
                                class="rounded-circle d-block">
                        @else
                            <img id="imagePreviewAvatar2" src="{{ env('APP_URL') }}/clients/img/avatar-default.jpg"
                                alt="Preview ảnh đại diện" style="object-fit: cover; display: block;" width="40"
                                height="40" class="rounded-circle">
                        @endif
                        </a>
                        <div class="dropdown-menu mr-5-3 bg-secondary rounded-0">
                            <span class="nav-item nav-link dropdown-item">{{ Auth::user()->name }}</span>


                            <a href="{{ route('client.information.index') }}" class="dropdown-item nav-item nav-link">
                                Thông tin
                            </a>
                            <!-- Kiểm tra nếu người dùng là admin -->
                            @if (Auth::user()->role === 0)
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item nav-item nav-link">
                                Quản trị
                            </a>
                            @endif


                            <a href="{{ route('client.logout') }}" class="dropdown-item nav-item nav-link">
                                Đăng Xuất
                            </a>
                        </div>
                        @endguest

                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
