<style>
    .app-menu.navbar-menu {
        overflow-y: scroll;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */
    }

    .app-menu.navbar-menu::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari */
    }
</style>

<div class="app-menu navbar-menu " style="background-color: #252323">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ env('VIEW_ADMIN') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ env('VIEW_ADMIN') }}/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ env('VIEW_ADMIN') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <a href="{{ route('client.home') }}" class="navbar-brand">
                    <h1 class="text-primary display-7" style="color:#81C408 !important">GreenFood</h1>
                </a>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <!-- start Dashboard Menu -->
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-line"></i> <span data-key="t-dashboards">Bảng điều khiển</span>
                    </a>
                    {{-- <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard" class="nav-link" data-key="t-analytics">
                                    Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects">
                                    Projects </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-job.html" class="nav-link" data-key="t-job">Job</a>
                            </li>
                        </ul>
                    </div> --}}
                </li> <!-- end Dashboard Menu -->

                <!-- end Dashboard Menu -->

                {{-- danh mục sản phẩm --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCategories" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCategories">
                        <i class="ri-file-list-3-line"></i>
                        <span data-key="t-landing">Danh mục</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCategories">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link" role="button"
                                aria-controls="sidebarCategories" data-key="t-calender">
                                Danh sách danh mục
                            </a>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.categories.create') }}" class="nav-link" role="button"
                                aria-controls="sidebarCategories" data-key="t-calender">
                                Thêm danh mục
                            </a>
                        </ul>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Biến thể</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <div class="">
                                <a href="{{ route('admin.variants.index') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    Danh sách biến thể
                                </a>

                                <a href="{{ route('admin.variants.create') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    Thêm mới biến thể
                                </a>
                            </div>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSuppliers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSuppliers">
                        <i class="ri-list-check-2"></i>
                        <span data-key="t-landing">Nhà cung cấp</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSuppliers">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.suppliers.index') }}" class="nav-link" role="button"
                                aria-controls="sidebarSuppliers" data-key="t-calender">
                                Danh sách nhà cung cấp
                            </a>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.suppliers.create') }}" class="nav-link" role="button"
                                aria-controls="sidebarSuppliers" data-key="t-calender">
                                Thêm nhà cung cấp
                            </a>
                        </ul>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class=" ri-keyboard-box-line"></i> <span data-key="t-pages">Sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index', ['statusProduct' => 'allPro']) }}"
                                    class="nav-link" data-key="t-starter">
                                    Danh sách sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}" class="nav-link" data-key="t-team">
                                    Thêm mới sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                </li>

                

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarOrders">
                        <i class="ri-shopping-cart-line"></i>
                        <span data-key="t-landing">Đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarOrders">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.orders.showOder') }}" class="nav-link" role="button"
                                aria-controls="sidebarOrderParent" data-key="t-calender">
                                Danh sách đơn hàng
                            </a>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarComment" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarComment">
                        <i class="ri-chat-1-line"></i> <span data-key="t-forms">Bình luận</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarComment">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.comments.comment') }}" class="nav-link"
                                    data-key="t-basic-elements">Danh sách bình luận</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebar" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebar">
                        <i class=" ri-price-tag-3-line"></i> <span data-key="t-landing">Mã giảm giá</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebar">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.coupons.showCoupon') }}" class="nav-link"
                                    data-key="t-starter">
                                    Danh sách mã giảm giá</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.coupons.addCoupon') }}" class="nav-link" data-key="t-team">
                                    Thêm mới mã giảm giá</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#UserPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="UserPages">
                        <i class="ri-account-circle-line"></i> <span data-key="t-pages">Quản lý người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="UserPages">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link" data-key="t-starter">
                                    Danh sách người dùng</a>
                                <a href="{{ route('admin.users.create') }}" class="nav-link" data-key="t-starter">
                                    Thêm mới người dùng</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a href="{{ route('admin.products.products.create') }}" class="nav-link" data-key="t-team"> Thêm mới người dùng</a> --}}
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#123Pages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="123Pages">
                        <i class="ri-delete-bin-line"></i> <span data-key="t-pages">Thùng rác</span>
                    </a>
                    <div class="collapse menu-dropdown" id="123Pages">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.trashs.index') }}" class="nav-link" data-key="t-starter">
                                    Danh sách dữ liệu</a>

                            </li>
                            <li class="nav-item">
                                {{-- <a href="{{ route('admin.products.products.create') }}" class="nav-link" data-key="t-team"> Thêm mới người dùng</a> --}}
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
