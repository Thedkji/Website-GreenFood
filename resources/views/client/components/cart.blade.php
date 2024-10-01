<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="form-check text-start my-3">
            <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                name="Delivery" value="Delivery">
            <label class="form-check-label d-flex justify-content-between" for="Delivery-1">
                <img src="{{asset('img/fruite-item-5.jpg')}}" class="img-fluid rounded" style="width:30%;height:30%" alt="">
                <div class="px-4">
                    <h4>Grapes</h4>
                    <h6>3kg</h6>
                    <div class="d-flex justify-content-between">
                        <p>x1</p>
                        <p class="text-danger">10000</p>
                    </div>
                </div>
                <i class="fas fa-trash text-success"></i>
            </label>
        </div>
        <div class="form-check text-start my-3">
            <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-2"
                name="Delivery" value="Delivery">
            <label class="form-check-label d-flex justify-content-between" for="Delivery-2">
                <img src="{{asset('img/fruite-item-5.jpg')}}" class="img-fluid rounded" style="width:30%;height:30%" alt="">
                <div class="px-4">
                    <h4>Grapes</h4>
                    <h6>3kg</h6>
                    <div class="d-flex justify-content-between">
                        <p>x1</p>
                        <p class="text-danger">10000</p>
                    </div>
                </div>
                <i class="fas fa-trash text-success"></i>
            </label>
        </div>
        <div class="form-check text-start my-3">
            <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-3"
                name="Delivery" value="Delivery">
            <label class="form-check-label d-flex justify-content-between" for="Delivery-3">
                <img src="{{asset('img/fruite-item-5.jpg')}}" class="img-fluid rounded" style="width:30%;height:30%" alt="">
                <div class="px-4">
                    <h4>Grapes</h4>
                    <h6>3kg</h6>
                    <div class="d-flex justify-content-between">
                        <p>x1</p>
                        <p class="text-danger">10000</p>
                    </div>
                </div>
                <i class="fas fa-trash text-success"></i>
            </label>
        </div>
        <div class="position-absolute bottom-0 d-flex justify-content-between">
            <div class="d-flex justify-content-between">
                <div class="text-center align-items-center justify-content-center pt-4">
                    <button type="button"
                        class="btn border-success py-3 px-4 text-uppercase text-primary ">Xem giỏ hàng</button>
                </div>
                <div class="text-center align-items-center justify-content-center pt-4 mx-5">
                    <button type="button"
                        class="btn border-success py-3 px-4 text-uppercase text-primary ">Mua hàng</button>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Offcanvas -->