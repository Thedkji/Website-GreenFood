<div class="layout-width">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ env('VIEW_ADMIN') }}/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ env('VIEW_ADMIN') }}/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ env('VIEW_ADMIN') }}/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ env('VIEW_ADMIN') }}/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
            </div>
        </div>

        <div class="d-flex align-items-center">

            <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">

                        @if (auth()->user()->avatar && Storage::exists(auth()->user()->avatar))
                            <img class="rounded-circle header-profile-user"
                                src="{{ Storage::url(auth()->user()->avatar) }}">
                        @else
                            <img class="rounded-circle header-profile-user"
                                src="{{ env('APP_URL') }}/clients/img/avatar-default.jpg" alt="Header Avatar">
                        @endif

                        <span class="text-start ms-xl-2">
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                            <span
                                class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ auth()->user()->role === 0 ? 'Quản trị viên' : 'User' }}</span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <h6 class="dropdown-header">Chào mừng {{ auth()->user()->name }}!</h6>
                    {{-- <a class="dropdown-item" href="{{ route('admin.profiles.profileDetail') }}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Thông tin tài khoản</span></a>
                    <a class="dropdown-item" href="apps-chat.html"><i
                            class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                        <span class="align-middle">Messages</span></a>
                    <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                            class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                        <span class="align-middle">Taskboard</span></a>
                    <a class="dropdown-item" href="pages-faqs.html"><i
                            class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Help</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages-profile.html"><i
                            class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Balance : <b>$5971.67</b></span></a>
                    <a class="dropdown-item" href="pages-profile-settings.html"><span
                            class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                            class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Settings</span></a>
                    <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                            class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Lock screen</span></a> --}}
                    <a class="dropdown-item" href="{{ route('client.logout') }}"><i
                            class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                            data-key="t-logout">Đăng xuất</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
