<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Chọn quận huyện -------------------------------------------------------
        const ghnKey = "{{ env('GHN_KEY') }}";
        const ghnShop = "{{ env('GHN_SHOPID') }}";
        const decodedItems = @json($decodedItems);
        const totalPrice = @json($totalPrice);
        const variantDetails = @json($variantDetails);
        const Products = @json($Products);
        const userInfo = @json($userInfo);
        let shippingFee = 0;
        let final = 0;
        let finalCoupon = 0;
        var insuranceValue = parseInt(totalPrice, 10);
        var provinceName = $('#province option:selected').text();
        if (userInfo && userInfo['province']) {
            // Lấy danh sách quận dựa trên `province`
            const provinceId = $('#province').val();
            $.ajax({
                url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district',
                type: 'POST',
                headers: {
                    'token': ghnKey,
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    'province_id': parseInt($('#province').val(), 10)
                }),
                success: function(response) {
                    let districts = response.data;

                    $('#district-dropdown').append('<option value="">Chọn Quận/Huyện</option>');

                    districts.forEach(district => {
                        let selected = '';
                        // Loại bỏ khoảng trắng thừa và chuyển về chữ thường trước khi so sánh
                        if (userInfo['district'] && district.DistrictName.trim().toLowerCase().includes(userInfo['district'].trim().toLowerCase())) {
                            $('#district-dropdown').append(
                                `<option value="${district.DistrictID}" selected>${district.DistrictName}</option>`
                            );
                        } else {
                            $('#district-dropdown').append(
                                `<option value="${district.DistrictID}" >${district.DistrictName}</option>`
                            );
                        }
                    });
                    // Tự động gọi API phường/xã nếu có `district`
                    if (userInfo['district']) {
                        // Gọi API để lấy danh sách phường/xã
                        $.ajax({
                            url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward',
                            type: 'POST',
                            headers: {
                                'token': ghnKey,
                                'Content-Type': 'application/json'
                            },
                            data: JSON.stringify({
                                'district_id': parseInt($('#district-dropdown').val(), 10)
                            }),
                            success: function(response) {
                                let wards = response.data;

                                $('#ward-dropdown').empty();
                                $('#ward-dropdown').append('<option value="">Chọn Phường/Xã</option>');
                                wards.forEach(ward => {
                                    let selected = '';
                                    if (userInfo['ward'] && ward.WardName.trim().toLowerCase().includes(userInfo['ward'].trim().toLowerCase())) {
                                        $('#ward-dropdown').append(
                                            `<option value="${ward.WardCode}" selected>${ward.WardName}</option>`
                                        );

                                    } else {
                                        $('#ward-dropdown').append(
                                            `<option value="${ward.WardCode}" >${ward.WardName}</option>`
                                        );
                                    }
                                });
                                const wardCode = $('#ward-dropdown').val();
                                const districtId = $('#district-dropdown').val();
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
                                        calculateShippingFee(service.service_id, districtId, wardCode);
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
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

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

                        // Xóa danh sách dropdown cũ
                        $('#district-dropdown').empty();
                        $('#ward-dropdown').empty();
                        $('#feeShip').empty();

                        // Thêm tùy chọn mặc định
                        $('#district-dropdown').append('<option value="">Chọn Quận/Huyện</option>');

                        // Duyệt danh sách quận/huyện
                        districts.forEach(district => {
                            let selected = '';

                            // Kiểm tra nếu quận/huyện khớp với userInfo
                            if (userInfo && userInfo['district'] && userInfo['district'].trim() === district.DistrictName.trim()) {
                                selected = 'selected';
                            }

                            // Tạo tùy chọn dropdown
                            $('#district-dropdown').append(
                                `<option value="${district.DistrictID}" ${selected}>${district.DistrictName}</option>`
                            );
                        });

                        // Gọi sự kiện change cho district nếu cần
                        if ($('#district-dropdown').val()) {
                            $('#district-dropdown').trigger('change');
                        }
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
                            // Kiểm tra nếu giá trị phường/xã đã được chọn (dựa trên old('ward') hoặc $userInfo->ward)
                            let selected = '';
                            $('#ward-dropdown').append('<option value="' + ward.WardCode + '" >' + ward.WardName + '</option>');
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
                            let total = parseFloat(totalPrice);
                            total += fee.total; // Cộng phí ship vào giá trị total
                            shippingFee = fee.total;
                            updateTotalPrice();
                        } else {
                            // Nếu không có phí ship thì chỉ sử dụng giá trị mặc định
                            $('input[name="total"]').val(totalPrice);
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
        // Áp mã giảm giá -------------------------------------------------------------
        $('#coupon_id').change(function() {
            var couponId = $(this).val();
            var hiddenInput = document.querySelector('input[name="coupon[]"]');
            // Nếu không chọn coupon thì không gửi AJAX
            if (couponId === "") {
                return;
            }
            // Gửi yêu cầu AJAX để áp dụng mã giảm giá
            $.ajax({
                url: "{{ route('client.applyCoupon') }}", // Lấy URL action của form
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    coupon_id: couponId
                },
                success: function(response) {
                    if (response.success) {
                        let coupon = response.coupon;
                        // Chuyển coupon thành chuỗi JSON
                        let couponJson = JSON.stringify(coupon);
                        // Cập nhật giá trị vào trường input type="hidden"
                        hiddenInput.value = couponJson;
                        console.log(couponJson);

                        let couponDetail = `
                            <div class="border rounded p-3 bg-light" id="coupon-detail">
                                <h5 class="text-primary">Chi tiết mã giảm giá</h5>
                        `;
                        let couponDetailHtml = ''; // Khởi tạo nội dung hàng trống
                        let final = totalPrice; // Khởi tạo final bằng tổng giá trị ban đầu

                        // Nếu là mã giảm giá áp dụng toàn bộ sản phẩm
                        if (coupon.type == 0) {
                            couponDetail += `
                                <div class="mb-3">
                                    <strong>Loại giảm giá:</strong> Tổng đơn hàng
                                </div>
                            `;
                            if (coupon.discount_type == 1) { // Giảm giá theo số tiền cố định
                                let totalPriceCoupon = totalPrice - coupon.amount;
                                finalCoupon = coupon.amount;
                                final = totalPriceCoupon;
                                couponDetailHtml += `
                                <td colspan="2" class="text-end"><strong>Giảm giá:</strong></td>
                                <td><strong class="text-danger">${new Intl.NumberFormat('vi-VN').format(coupon.amount)} VNĐ</strong></td>
                            `;
                            } else if (coupon.discount_type == 0) { // Giảm giá theo phần trăm
                                let discountAmount = totalPrice * coupon.amount / 100;
                                let totalPriceCoupon = totalPrice - discountAmount;
                                finalCoupon = discountAmount;
                                final = totalPriceCoupon;
                                couponDetailHtml += `
                                    <td colspan="2" class="text-end"><strong>Giảm giá:</strong></td>
                                    <td><strong class="text-danger">${new Intl.NumberFormat('vi-VN').format(parseInt(discountAmount))} VNĐ</strong></td>
                                `;
                            }
                        }
                        // Nếu là mã giảm giá áp dụng cho một số sản phẩm
                        else if (coupon.type == 1) {
                            couponDetail += `
                                <div class="mb-3">
                                    <strong>Loại giảm giá:</strong> Áp dụng cho một số sản phẩm
                                </div>
                                <h6 class="text-primary">Chi tiết giảm giá từng sản phẩm:</h6>
                                <ul class="list-unstyled">
                            `;
                            let totalDiscount = 0;
                            let totalPriceCoupon = 0;
                            let finalPrice = 0;
                            const decodedArray = Array.isArray(decodedItems) ? decodedItems : Object.values(decodedItems);
                            decodedArray.forEach(item => {
                                let itemPrice;
                                if (userInfo ? item.product.status === 0 : item.attributes.status === 0) {
                                    itemPrice = userInfo ? item.product.price_sale : item.price;
                                } else {
                                    itemPrice = userInfo ? variantDetails[item.sku].price_sale : item.price;
                                }
                                let itemQuantity = item.quantity;
                                let discount = 0;
                                // Lấy tất cả các categories từ Products
                                const categories = Products.flatMap(product => product.categories || []);
                                // Lấy danh sách id từ categories
                                const categoryIds = categories.map(category => category.id);
                                // Loại bỏ các id trùng lặp (unique)
                                const uniqueCategoryIds = [...new Set(categoryIds)];
                                if (
                                    coupon.product_id.includes(userInfo ? item.product.id : Number(item.attributes.product_id)) ||
                                    coupon.category_id.some(id => uniqueCategoryIds.includes(id)) // Kiểm tra giao giữa category_id và uniqueCategoryIds
                                ) {
                                    if (coupon.discount_type == 1) {
                                        discount = coupon.amount * itemQuantity;
                                        finalCoupon = coupon.amount;
                                        final = totalPriceCoupon;
                                    } else {
                                        discount = (itemPrice * coupon.amount / 100) * itemQuantity;
                                    }
                                    finalPrice = (itemPrice * itemQuantity) - discount;
                                    if (finalPrice < 0) {
                                        finalPrice = 1000; // Giá trị tối thiểu
                                    }
                                    totalDiscount += discount;
                                    totalPriceCoupon += finalPrice;
                                } else {
                                    finalPrice = itemPrice * itemQuantity;
                                    totalPriceCoupon += finalPrice;
                                }

                                couponDetail += `
                                    <li class="mb-2">
                                        <strong>${userInfo ? item.product.name : item.name}</strong>
                                        <ul class="mb-0">
                                            <li>Giá gốc: ${new Intl.NumberFormat('vi-VN').format(itemPrice)} VNĐ</li>
                                            <li>Số lượng: ${itemQuantity}</li>
                                            <li>Giảm giá: <span class="text-danger">${new Intl.NumberFormat('vi-VN').format(parseInt(discount))} VNĐ</span></li>
                                            <li>Thành tiền sau giảm: <span class="text-success">${new Intl.NumberFormat('vi-VN').format(parseInt(finalPrice))} VNĐ</span></li>
                                        </ul>
                                    </li>
                                `;
                            });
                            couponDetail += `
                                </ul>
                                <div class="mt-3">
                                    <strong>Tổng số tiền giảm giá:</strong>
                                    <span class="text-danger">${new Intl.NumberFormat('vi-VN').format(parseInt(totalDiscount))} VNĐ</span>
                                </div>
                            `;
                            final = totalPriceCoupon; // Cập nhật final sau khi tính toán xong
                            finalCoupon = totalDiscount;
                            couponDetailHtml += `
                                <td colspan="2" class="text-end"><strong>Tổng giảm giá:</strong></td>
                                <td><strong class="text-danger">${new Intl.NumberFormat('vi-VN').format(parseInt(totalDiscount))} VNĐ</strong></td>
                            `;
                        }
                        couponDetail += `</div>`; // Đóng div coupon-detail
                        document.getElementById('coupon-detail123').innerHTML = couponDetail;
                        // Gắn nội dung vào <tr id="coupon-detail-table">
                        document.getElementById('coupon-detail-table').innerHTML = couponDetailHtml;

                        // Cập nhật tổng tiền mới
                        document.getElementById('totalPrice').textContent = `${new Intl.NumberFormat('vi-VN').format(final)} VNĐ`;

                        // Cập nhật tổng tiền sau khi giảm giá
                        updateTotalPrice(); // Gọi updateTotalPrice sau khi tính toán xong
                    }
                },

                error: function(xhr, status, error) {
                    console.error('Error applying coupon:', error);
                    alert('Có lỗi xảy ra. Vui lòng thử lại!');
                }
            });
        });

        function updateTotalPrice() {
            let total = totalPrice;
            if (isNaN(total)) total = 0;
            total = total + shippingFee - finalCoupon; // Cộng phí ship vào tổng tiền
            $('input[name="total"]').val(total.toFixed(2)); // Cập nhật giá trị vào input "total"
            $('#totalPrice').text(total.toLocaleString('vi-VN') + ' VNĐ');

        }
    });
</script>