<!DOCTYPE html>
<html lang="en">

<head>
    @include('clients.layouts.components.head')
</head>

<body>
    @include('clients.layouts.components.nav')
    
    <div class="container-fluid py-5 mb-5 hero-header">
        @yield('content')
    </div>

    @include('clients.layouts.components.footer')
</body>

@include('clients.layouts.components.script')

</html>
