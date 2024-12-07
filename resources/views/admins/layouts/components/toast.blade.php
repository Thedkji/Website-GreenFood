<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tìm tất cả các toast
        const toastElements = document.querySelectorAll(".toast");

        toastElements.forEach((toast) => {
            // Hiển thị toast bằng Bootstrap
            const bsToast = new bootstrap.Toast(toast, {
                delay: 3000
            }); // 3000ms = 3 giây
            bsToast.show();

            // Tự động ẩn toast sau 3 giây
            setTimeout(() => {
                // toast.classList.remove("show");
                toast.classList.add("d-none");
            }, 3000);
        });
    });
    toastOptions = {
        autohide: true,
        delay: 3000 // Thời gian hiển thị (ms)
    };
    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
</script>
