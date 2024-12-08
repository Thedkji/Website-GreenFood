<div class="toast-container">
    @if (session('success'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastSuccess">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Thông báo</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white text-dark">
                {{ session('success') }}
            </div>
            <div class="toast-progress bg-success"></div>
        </div>
    @endif

    @if (session('error'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastError">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Lỗi</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white text-dark">
                {{ session('error') }}
            </div>
            <div class="toast-progress bg-danger"></div>
        </div>
    @endif
</div>
