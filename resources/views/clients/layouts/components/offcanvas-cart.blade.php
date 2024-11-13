<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Giỏ hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if ($cartItems->isNotEmpty())
        @foreach ($cartItems as $item)
        <div class="form-check text-start my-3">
            <form action="{{ route('client.removeCart', ['id' => $item->id]) }}" method="post">
                @csrf
                <label class="form-check-label d-flex justify-content-between" for="{{ $item->id }}">
                    <img src="{{ env('VIEW_CLIENT') }}/img/fruite-item-5.jpg" class="img-fluid rounded" style="width:80px; height:80px;" alt="">
                    <div class="px-4">
                        <h4>{{ isset($userId) ? $item->product->name : $item->name }}</h4>
                        <div class="d-flex justify-content-between">
                            <p>x{{ $item->quantity }}</p>
                            <p class="text-danger">
                                @if(isset($userId) && $item->product->status === 0)
                                {{ number_format($item->product->price_sale * $item->quantity) }} VNĐ
                                @elseif(isset($variantGroups[$item->sku]) && $variantGroups[$item->sku]->isNotEmpty())
                                @foreach($variantGroups[$item->sku] as $variant)
                                {{ number_format($variant->price_sale * $item->quantity) }} VNĐ
                                @endforeach
                                @elseif(!isset($userId))
                                {{ number_format($item->price * $item->quantity) }} VNĐ
                                @else
                                <span>Không có sẵn</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="fas fa-trash text-success"></button>
                </label>
            </form>
        </div>
        @endforeach
        @else
        <p>Giỏ hàng của bạn trống</p>
        @endif
    </div>
    <div class="offcanvas-footer">
        <a href="{{route('client.cart')}}" class="px-5 d-flex justify-content-between mx-5 my-5 btn btn-success">Truy cập giỏ hàng </a>
    </div>
</div>
<!-- End Offcanvas -->