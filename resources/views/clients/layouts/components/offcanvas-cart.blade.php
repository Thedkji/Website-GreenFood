<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header bg-primary text-white">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Giỏ hàng của bạn</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if ($cartItems->isNotEmpty())
        @foreach ($cartItems as $item)
        <div class="cart-item border-bottom py-3">
            <div class="d-flex align-items-center">
                <img src="{{ env('VIEW_IMG').(isset($userId) ? $item->product->img : $item->attributes->img) }}"
                    class="img-fluid rounded" style="width:80px; height:80px;" alt="Sản phẩm">
                <div class="item-details ms-3 w-100">
                    <h6 class="mb-1">{{ isset($userId) ? $item->product->name : $item->name }}</h6>
                    <div class="d-flex flex-row gap-2 p-3 border rounded mb-3 bg-light justify-content-between">
                        <div class="d-flex flex-column">
                            <span>Số lượng: <strong>x{{ $item->quantity }}</strong></span>
                            <span>
                                Mã :
                                @if (isset($userId))
                                @if ($item->product->status == 0)
                                <strong>{{ $item->product->sku }}</strong>
                                @else
                                @if (isset($variantGroups[$item->sku]))
                                @foreach ($variantGroups[$item->sku] as $variant)
                                <strong>{{ $variant->sku }}</strong>
                                @endforeach
                                @else
                                <span class="text-muted">Không xác định</span>
                                @endif
                                @endif
                                @else
                                <strong>{{ $item->attributes->sku }}</strong>
                                @endif
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger fw-bold">
                                @if (isset($userId) && $item->product->status === 0)
                                {{ number_format($item->product->price_sale * $item->quantity) }} VNĐ
                                @elseif (isset($variantGroups[$item->sku]) && $variantGroups[$item->sku]->isNotEmpty())
                                @foreach ($variantGroups[$item->sku] as $variant)
                                {{ number_format($variant->price_sale * $item->quantity) }} VNĐ
                                @endforeach
                                @elseif (!isset($userId))
                                {{ number_format($item->price * $item->quantity) }} VNĐ
                                @else
                                <span class="text-muted">Không có sẵn</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('client.removeCart', ['id' => $item->id]) }}" method="post" class="ms-2">
                    @csrf
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <p class="text-center text-muted py-5">Giỏ hàng của bạn trống</p>
        @endif
    </div>
    <div class="offcanvas-footer p-3 border-top">
        @if ($cartItems->isNotEmpty())
        <a href="{{ route('client.cart') }}" class="btn btn-primary w-100">
            <i class="fas fa-shopping-cart me-2"></i> Truy cập giỏ hàng
        </a>
        @else
        <a href="{{ route('client.home') }}" class="btn btn-secondary w-100">
            <i class="fas fa-arrow-left me-2"></i> Tiếp tục mua sắm
        </a>
        @endif
    </div>
</div>
<!-- End Offcanvas -->