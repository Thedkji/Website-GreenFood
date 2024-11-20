<script src="{{ env('VIEW_ADMIN') }}/libs/bootstrap/js/bootstrap.bundle.min.js?time={{ time() }}"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/simplebar/simplebar.min.js?time={{ time() }}"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/node-waves/waves.min.js?time={{ time() }}"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/feather-icons/feather.min.js?time={{ time() }}"></script>
<script src="{{ env('VIEW_ADMIN') }}/js/pages/plugins/lord-icon-2.1.0.js?time={{ time() }}"></script>

<!-- Nếu javascript ko chạy đúng cách thì có thể mở thằng này ra -->
<script src="{{ env('VIEW_ADMIN') }}/js/plugins.js?time={{ time() }}"></script>

<!-- apexcharts -->
<script src="{{ env('VIEW_ADMIN') }}/libs/apexcharts/apexcharts.min.js?time={{ time() }}"></script>

<!-- Vector map-->
<script src="{{ env('VIEW_ADMIN') }}/libs/jsvectormap/js/jsvectormap.min.js?time={{ time() }}"></script>
<script src="{{ env('VIEW_ADMIN') }}/libs/jsvectormap/maps/world-merc.js?time={{ time() }}"></script>

<!--Swiper slider js-->
<script src="{{ env('VIEW_ADMIN') }}/libs/swiper/swiper-bundle.min.js?time={{ time() }}"></script>

<!-- Dashboard init -->
<script src="{{ env('VIEW_ADMIN') }}/js/pages/dashboard-ecommerce.init.js?time={{ time() }}"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- CKEditor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.0/ckeditor.js"
    integrity="sha512-7My1gsUz5JUQgT8+P0sHKaPel/77X3zjGZsXbTS8Y7MhDEJ+f9xg9H+pPzONFL5djye0zWLlxFLApGsWQ1gdfA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Khởi tạo CKEditor
    CKEDITOR.replace('ckeditor');

    // Product 
    // Description-short
    CKEDITOR.replace('product-ckeditor');

    // Description
    CKEDITOR.replace('product-ckeditor2');
</script>

<script>
    // Hàm xem trước 1 ảnh (Ảnh đại diện)
    function previewImage(event, previewId) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imagePreview = document.getElementById(previewId);
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
    // Hàm xem trước nhiều ảnh (Ảnh Slide)
    function previewMultipleImages(event) {
        var input = event.target;
        var files = input.files;
        var container = document.getElementById('imagePreviewSlideContainer');
        container.innerHTML = ''; // Xóa các ảnh preview trước đó

        // Kiểm tra xem có ảnh nào được chọn không
        if (files.length === 0) {
            container.style.display = 'none'; // Ẩn container nếu không có ảnh
            return;
        } else {
            container.style.display = 'block'; // Hiển thị container nếu có ảnh
        }

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function(e) {
                var imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.style.maxWidth = '150px';
                imgElement.style.marginRight = '10px';
                imgElement.style.marginBottom = '10px';
                container.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
<!-- prismjs plugin -->
<script src="{{ env('VIEW_ADMIN') }}/libs/prismjs/prism.js?time={{ time() }}"></script>

<script src="{{ env('VIEW_ADMIN') }}/js/pages/form-validation.init.js?time={{ time() }}"></script>

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- App js (Gặp lỗi xung đội với xử lý laravel , đã fix nhưng nếu gặp xung đột tiếp thì nên đóng lại)-->
{{-- <script src="{{ env('VIEW_ADMIN') }}/js/app.js?time={{ time() }}"></script> --}}