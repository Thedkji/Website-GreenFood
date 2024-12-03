<script src="{{ env('APP_CLIENT') }}/information/assets/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.btn-show-infor').click(function (e) {
            e.preventDefault();
            const url = $(this).attr('href');
            
            // Tải dữ liệu từ route vào phần #billing-show
            $('#billing-show').load(url);
        });
    });
</script>

