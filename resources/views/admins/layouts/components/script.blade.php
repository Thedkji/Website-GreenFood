<script src="{{ env('VIEW_ADMIN') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/node-waves/waves.min.js"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/feather-icons/feather.min.js"></script>
<script src="{{ env('VIEW_ADMIN') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>

<!-- Nếu javascript ko chạy đúng cách thì có thể mở thằng này ra -->
{{-- <script src="{{ env("VIEW_ADMIN") }}/js/plugins.js?time={{ time() }}"></script> --}}

<!-- apexcharts -->
<script src="{{ env('VIEW_ADMIN') }}/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="{{ env('VIEW_ADMIN') }}/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="{{ env('VIEW_ADMIN') }}/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="{{ env('VIEW_ADMIN') }}/js/pages/dashboard-ecommerce.init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- App js (Gặp lỗi xung đội với xử lý laravel , đã fix nhưng nếu gặp xung đột tiếp thì nên đóng lại)-->
{{-- <script src="{{ env('VIEW_ADMIN') }}/js/app.js?time={{ time() }}"></script> --}}
