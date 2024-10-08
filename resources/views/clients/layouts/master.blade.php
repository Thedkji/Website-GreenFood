<!DOCTYPE html>
<html lang="en">

<head>
    @include('clients.layouts.components.head')
</head>

<body>
    @include("clients.layouts.components.nav")

    @yield('content')

    @include("clients.layouts.components.footer")
</body>

@include('clients.layouts.components.script')

</html>
