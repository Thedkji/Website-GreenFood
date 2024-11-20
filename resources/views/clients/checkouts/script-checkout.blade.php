<script>
    document.addEventListener("DOMContentLoaded", function() {
        const provincesData = @json($provinces);
        const districtsData = @json($districts);
        const wardsData = @json($wards);

        // Lấy các select box và input
        const provinceSelect = document.getElementById("province123");
        const districtSelect = document.getElementById("district123");
        const wardSelect = document.getElementById("ward123");

        // Khi chọn Thành phố/Tỉnh
        provinceSelect.addEventListener("change", function() {
            const selectedProvince = this.value;

            // Lọc danh sách Quận/Huyện theo Thành phố/Tỉnh đã chọn
            const filteredDistricts = districtsData.filter(d => d.province_code === selectedProvince);

            // Xóa Quận/Huyện cũ và thêm Quận/Huyện mới
            districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
            filteredDistricts.forEach(district => {
                districtSelect.innerHTML +=
                    `<option value="${district.code}">${district.name}</option>`;
            });

            // Xóa Phường/Xã khi thay đổi Tỉnh
            wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
        });

        // Khi chọn Quận/Huyện
        districtSelect.addEventListener("change", function() {
            const selectedDistrict = this.value;

            // Lọc danh sách Phường/Xã theo Quận/Huyện đã chọn
            const filteredWards = wardsData.filter(w => w.district_code === selectedDistrict);

            // Xóa Phường/Xã cũ và thêm Phường/Xã mới
            wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
            filteredWards.forEach(ward => {
                wardSelect.innerHTML += `<option value="${ward.code}">${ward.name}</option>`;
            });
        });
        const addressInput = document.getElementById("address123");

        // Hàm cập nhật địa chỉ
        function updateAddress() {
            const ward = wardSelect?.options[wardSelect.selectedIndex]?.text || "";
            const district = districtSelect?.options[districtSelect.selectedIndex]?.text || "";
            const province = provinceSelect?.options[provinceSelect.selectedIndex]?.text || "";

            addressInput.value =
                `${ward !== "Chọn Phường/Xã" ? ward + ", " : ""}` +
                `${district !== "Chọn Quận/Huyện" ? district + ", " : ""}` +
                `${province !== "Chọn Thành phố/Tỉnh" ? province : ""}`;
        }

        // Đảm bảo các phần tử tồn tại trước khi gắn sự kiện
        if (provinceSelect && districtSelect && wardSelect && addressInput) {
            provinceSelect.addEventListener("change", updateAddress);
            districtSelect.addEventListener("change", updateAddress);
            wardSelect.addEventListener("change", updateAddress);
        }

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