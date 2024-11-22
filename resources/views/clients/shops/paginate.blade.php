<div class="col-12">
    <div class="pagination d-flex justify-content-center mt-5">
        {{-- Nút quay về đầu --}}
        <a href="{{ $products->url(1) }}" class="rounded {{ $products->onFirstPage() ? 'disabled' : '' }}">
            <i class="fas fa-angle-double-left"></i>
        </a>

        {{-- Nút phân trang trước --}}
        <a href="{{ $products->previousPageUrl() }}" class="rounded {{ $products->onFirstPage() ? 'disabled' : '' }}">
            <i class="fas fa-chevron-left"></i>
        </a>

        {{-- Hiển thị các trang --}}
        @php
            $currentPage = $products->currentPage();
            $lastPage = $products->lastPage();
            $pageLimit = 5;
            $startPage = max($currentPage - 2, 1); // Giới hạn số trang hiển thị phía trước
            $endPage = min($currentPage + 2, $lastPage); // Giới hạn số trang hiển thị phía sau
        @endphp

        {{-- Các trang --}}
        @for ($i = $startPage; $i <= $endPage; $i++)
            <a href="{{ $products->url($i) }}" class="rounded {{ $i == $currentPage ? 'active' : '' }}">
                {{ $i }}
            </a>
        @endfor

        {{-- Nút phân trang tiếp theo --}}
        <a href="{{ $products->nextPageUrl() }}" class="rounded {{ $products->hasMorePages() ? '' : 'disabled' }}">
            <i class="fas fa-chevron-right"></i>
        </a>

        {{-- Nút quay về cuối --}}
        <a href="{{ $products->url($lastPage) }}" class="rounded {{ $products->onLastPage() ? 'disabled' : '' }}">
            <i class="fas fa-angle-double-right"></i>
        </a>
    </div>
</div>
