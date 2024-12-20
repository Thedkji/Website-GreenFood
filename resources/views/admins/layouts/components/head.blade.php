<meta charset="utf-8" />
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ env('VIEW_ADMIN') }}/assets/images/favicon.ico">

<!-- jsvectormap css -->
<link href="{{ env('VIEW_ADMIN') }}/libs/jsvectormap/css/jsvectormap.min.css?v={{ time() }}" rel="stylesheet"
    type="text/css" />

<!-- Swiper slider css -->
<link href="{{ env('VIEW_ADMIN') }}/libs/swiper/swiper-bundle.min.css?v={{ time() }}" rel="stylesheet"
    type="text/css" />

<!-- Layout config Js -->
<script src="{{ env('VIEW_ADMIN') }}/js/layout.js?v={{ time() }}"></script>
{{-- Address  --}}
<script src="{{ env('VIEW_ADMIN') }}/js/address.js?v={{ time() }}"></script>

<!-- Bootstrap Css -->
<link href="{{ env('VIEW_ADMIN') }}/css/bootstrap.min.css?v={{ time() }}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ env('VIEW_ADMIN') }}/css/icons.min.css?v={{ time() }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ env('VIEW_ADMIN') }}/css/app.min.css?v={{ time() }}" rel="stylesheet" type="text/css" />
<link href="{{ env('VIEW_ADMIN') }}/css/app.css?v={{ time() }}" rel="stylesheet" type="text/css" />
<!-- Custom Css-->
<link href="{{ env('VIEW_ADMIN') }}/css/custom.min.css?v={{ time() }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="{{ env('APP_URL') }}/jquery.js?v={{ time() }}"></script>

<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

