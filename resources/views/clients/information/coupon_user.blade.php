<div class="container mt-3">
    <h4 class="mb-4 text-start">Khuyến mãi khách hàng mới</h4>
<p class="d-block text-start text-muted">(Chỉ được chọn 1 mã giảm giá duy nhất cho khách hàng mới!)</p>
    @if($coupons->isEmpty())
        <p class="text-center">Không có khuyến mãi nào.</p>
    @else
        <div class="row">
            @foreach ($coupons as $coupon)
                <div class="col-md-12 mb-4">
                    <div class="d-flex border p-3 rounded p-3 align-items-center">
                        <div class="text-white bg-primary text-center py-2 px-2" style="min-width: 150px; font-size: 20px; border-radius:10px;">
                            <p class="h6 mb-0 text-white">Giảm giá</p>
                            <p class="font-weight-bold text-white">{{ number_format($coupon->coupon_amount) }} {{ $coupon->discount_type == 0 ? '%' : 'đ' }}</p>
                        </div>
                        <div class="flex-grow-1 px-4">
                            <h5 class="mb-1">{{ $coupon->name }}</h5>
                            <p class="mb-0">
                                <strong>Hạn sử dụng:</strong> {{ date('d-m-Y', strtotime($coupon->expiration_date)) }} <br>
                                <strong>Mã giảm giá:</strong> 
                                <span class="font-weight-bold text-primary" id="coupon-code-{{ $coupon->id }}">{{ $coupon->name }}</span> <br>
                                {!! $coupon->description ?: '' !!}
                            </p>
                        </div>
                        <div>
                            <button class="btn btn-primary" onclick="copyCouponCode('{{ $coupon->id }}')">Sao chép</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.all.min.js"></script>

<script>
    function copyCouponCode(couponId) {
        var couponCode = document.getElementById('coupon-code-' + couponId).innerText;

        var tempInput = document.createElement("input");
        document.body.appendChild(tempInput);
        tempInput.value = couponCode;
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        Swal.fire({
            icon: 'success',
            title: 'Sao chép thành công!',
            text: 'Đã sao chép mã giảm giá: ' + couponCode,
            confirmButtonText: 'OK'
        });
    }
</script>
