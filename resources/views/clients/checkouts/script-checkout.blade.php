<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Chọn quận huyện -------------------------------------------------------
        const ghnKey = "{{ env('GHN_KEY') }}";
        const ghnShop = "{{ env('GHN_SHOPID') }}";
        var insuranceValue = parseInt("{{ session('coupon') ? $totalPriceCoupon : $totalPrice }}", 10);
        $('#province').change(function() {
            const provinceId = $(this).val();
            console.log(provinceId);
            if (provinceId) {
                $.ajax({
                    url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district',
                    type: 'POST',
                    headers: {
                        'token': ghnKey,
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify({
                        'province_id': parseInt(provinceId, 10)
                    }),
                    success: function(response) {
                        let districts = response.data;
                        $('#district-dropdown').empty(); // Xóa các quận cũ
                        $('#ward-dropdown').empty();
                        $('#feeShip').empty();
                        $('#district-dropdown').append('<option value="">Chọn Quận/Huyện</option>');
                        districts.forEach(district => {
                            $('#district-dropdown').append('<option value="' + district.DistrictID + '">' + district.DistrictName + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });

        $('#district-dropdown').change(function() {
            const districtId = $(this).val();
            console.log(districtId);
            if (districtId) {
                $.ajax({
                    url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward',
                    type: 'POST',
                    headers: {
                        'token': ghnKey,
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify({
                        'district_id': parseInt(districtId, 10)
                    }),
                    success: function(response) {
                        let wards = response.data;
                        $('#ward-dropdown').empty();
                        $('#feeShip').empty();
                        $('#ward-dropdown').append('<option value="">Chọn Phường/Xã</option>');
                        wards.forEach(ward => {
                            $('#ward-dropdown').append('<option value="' + ward.WardCode + '">' + ward.WardName + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
        $('#ward-dropdown').change(function() {
            const wardCode = $(this).val();
            const districtId = $('#district-dropdown').val();
            const provinceId = $('#province').val();
            console.log(wardCode + '-' + districtId);
            if (provinceId && districtId && wardCode) {
                $.ajax({
                    url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services',
                    type: 'POST',
                    headers: {
                        'token': ghnKey,
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify({
                        "shop_id": parseInt(ghnShop, 10),
                        "from_district": 3440, // Quận Nam từ Liêm
                        "to_district": parseInt(districtId, 10),
                    }),
                    success: function(response) {
                        let service = response.data[0];
                        console.log(service);
                        calculateShippingFee(service.service_id, districtId, wardCode);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });

        function calculateShippingFee(serviceId, districtId, wardCode) {
            $.ajax({
                url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee',
                type: 'POST',
                headers: {
                    'token': ghnKey,
                    'shop_id': ghnShop,
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    "service_id": parseInt(serviceId, 10), // Phương tiện giao hàng
                    "insurance_value": insuranceValue, // Tổng tiền để tính toán giá ship
                    "from_district_id": 3440, // Quận Nam từ Liêm
                    "to_district_id": parseInt(districtId, 10),
                    "to_ward_code": wardCode,
                    "weight": 1000 // Cân nặng (Chưa xử lý)
                }),
                success: function(response) {
                    if (response.data) {
                        let fee = response.data;
                        if (fee && fee.total) {
                            let total = parseFloat('{{session('
                                coupon ') ? $totalPriceCoupon : $totalPrice}}');
                            total += fee.total; // Cộng phí ship vào giá trị total
                            $('input[name="total"]').val(total.toFixed(2)); // Cập nhật giá trị vào input "total"
                            $('#totalPrice').text(total.toLocaleString('vi-VN') + 'VNĐ');
                        } else {
                            // Nếu không có phí ship thì chỉ sử dụng giá trị mặc định
                            $('input[name="total"]').val('{{session('
                                coupon ') ? $totalPriceCoupon : $totalPrice}}');
                        }
                        $('#feeShip').empty();
                        $('#feeShip').text(new Intl.NumberFormat('vi-VN').format(fee.total) + ' VNĐ');

                    } else {
                        console.log('Không thể tính phí vận chuyển.');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        // Xử lý thông báo -------------------------------------------------
        // Toast xử lý
        const toastElements = document.querySelectorAll(".toast");
        toastElements.forEach((toastElement) => {
            const bsToast = new bootstrap.Toast(toastElement, {
                delay: 5000
            }); // 5 giây
            bsToast.show();

            // Ẩn toast sau 5 giây
            setTimeout(() => {
                toastElement.classList.remove("show");
            }, 5000);
        });

        // Toast success (nếu có)
        const toastSuccess = document.getElementById("toastSuccess");
        if (toastSuccess) {
            const toastOptions = {
                autohide: true,
                delay: 5000
            }; // Hiển thị 5 giây
            const bsToastSuccess = new bootstrap.Toast(toastSuccess, toastOptions);
            bsToastSuccess.show();
        }
    });
</script>