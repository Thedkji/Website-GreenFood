<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    @include('admins.layouts.components.head')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            @include('admins.layouts.components.header')
        </header>

        <!-- removeNotificationModal -->
        @include('admins.layouts.components.remove-notification-modal')
        <!-- /.modal -->
        <!-- ========== App Menu (Nav)========== -->
        @include('admins.layouts.components.nav')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    @include('admins.layouts.components.start-page-title')
                    <!-- end page title -->

                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                @include('admins.layouts.components.footer')
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!--preloader-->
    @include('admins.layouts.components.preloader')


    <!-- JAVASCRIPT -->
    @include('admins.layouts.components.script')




    @stack('scripts')

</body>

</html>
