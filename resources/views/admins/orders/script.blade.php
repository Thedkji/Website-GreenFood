<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tìm tất cả các toast
        const toastElements = document.querySelectorAll(".toast");
        const ghnKey = "{{ env('GHN_KEY') }}";
        const ghnShop = "{{ env('GHN_SHOPID') }}";
        const data = @json($orders);
        const totalDiscount = @json($totalDiscount);

        toastElements.forEach((toast) => {
            // Hiển thị toast bằng Bootstrap
            const bsToast = new bootstrap.Toast(toast, {
                delay: 3000
            }); // 3000ms = 3 giây
            bsToast.show();

            // Tự động ẩn toast sau 3 giây
            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        });
        let provinceData = null;
        let districtData = null;
        let wardData = null;
        $.ajax({
            url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province',
            type: 'POST',
            headers: {
                'token': ghnKey,
                'Content-Type': 'application/json'
            },
            success: function(response) {
                let provinces = response.data;
                provinceData = provinces.find(province => province.ProvinceID == data['province']);

                // Cập nhật nội dung tỉnh vào giao diện
                $('#province').empty();
                $('#province').text(provinceData.ProvinceName);

                // Sau khi provinceData đã có giá trị, thực hiện yêu cầu để lấy district
                $.ajax({
                    url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district',
                    type: 'POST',
                    headers: {
                        'token': ghnKey,
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify({
                        'province_id': parseInt(provinceData.ProvinceID, 10)
                    }),
                    success: function(response) {
                        let districts = response.data;
                        districtData = districts.find(district => district.DistrictID == data['district']);
                        // Cập nhật nội dung quận vào giao diện
                        $('#district').empty();
                        $('#district').text(districtData.DistrictName);
                        $.ajax({
                            url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward',
                            type: 'POST',
                            headers: {
                                'token': ghnKey,
                                'Content-Type': 'application/json'
                            },
                            data: JSON.stringify({
                                'district_id': parseInt(districtData.DistrictID, 10)
                            }),
                            success: function(response) {
                                let wards = response.data;
                                wardData = wards.find(ward => ward.WardCode == data['ward']);
                                $('#ward').empty();
                                $('#ward').text(wardData.WardName);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            },
            error: function(error) {
                console.log(error);
            }
        });




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
                "to_district": parseInt(data['district'], 10),
            }),
            success: function(response) {
                let service = response.data[0];
                calculateShippingFee(service.service_id, data['district'], data['ward']);
            },
            error: function(error) {
                console.log(error);
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
                    "insurance_value": parseInt(data['total'], 10), // Tổng tiền để tính toán giá ship
                    "from_district_id": 3440, // Quận Nam từ Liêm
                    "to_district_id": parseInt(data['district'], 10),
                    "to_ward_code": data['ward'],
                    "weight": 1000 // Cân nặng (Chưa xử lý)
                }),
                success: function(response) {
                    if (response.data) {
                        let fee = response.data;
                        $('#feeShip').empty();
                        $('#feeShip').text(new Intl.NumberFormat('vi-VN').format(fee.total) + ' VNĐ');
                        $('#coupon-fee').text(new Intl.NumberFormat('vi-VN').format(totalDiscount + fee.total - data['total']) + ' VNĐ');
                    } else {
                        console.log('Không thể tính phí vận chuyển.');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
    toastOptions = {
        autohide: true,
        delay: 5000 // Thời gian hiển thị (ms)
    };
    const toast = new bootstrap.Toast(toastSuccess, toastOptions);
    toast.show();
</script>