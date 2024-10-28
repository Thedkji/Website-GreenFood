<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if ($cartItems->isNotEmpty())
        @foreach ($cartItems as $item)
        <div class="form-check text-start my-3">
            <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                name="Delivery" value="Delivery">
            <label class="form-check-label d-flex justify-content-between" for="Delivery-1">
                <img src="{{ env('VIEW_CLIENT') }}/img/fruite-item-5.jpg" class="img-fluid rounded" style="width:30%;height:30%" alt="">
                <div class="px-4">
                    <h4>{{$item->name}}</h4>
                    <h6>3kg</h6>
                    <div class="d-flex justify-content-between">
                        <p>x{{$item->quantity}}</p>
                        <p class="text-danger">{{number_format(($item->price)*($item->quantity))}}</p>
                    </div>
                </div>
                <i class="fas fa-trash text-success"></i>
            </label>
        </div>
        @endforeach
        @endif
    </div>
</div>
<!-- End Offcanvas -->