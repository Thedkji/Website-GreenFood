<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">@yield('title_page')</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('client.home') }}">@yield('title_page_home')</a></li>
        <li class="breadcrumb-item active text-white">@yield('title_page_active')</li>
    </ol>
</div>
