<!DOCTYPE html>
<html lang="en">

<head>
    @include('clients.layouts.components.head')
</head>

<body>

    <!-- Navbar start -->
    @include('clients.layouts.components.nav')
    <!-- Navbar End -->

    <!-- Spinner Start -->
    @include('clients.layouts.components.spinner')
    <!-- Spinner End -->

    <!-- Modal Search Start -->
    @include('clients.layouts.components.modal-search')
    <!-- Modal Search End -->

    <!-- Offcanvas Cart Start -->
    @include('clients.layouts.components.offcanvas-cart')
    <!-- Offcanvas Cart End -->

    @yield('content')

    @include('clients.layouts.components.footer')
</body>

@include('clients.layouts.components.script')

</html>