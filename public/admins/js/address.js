document.addEventListener("DOMContentLoaded", function() {
    const provinceSelect = document.getElementById("province");
    const districtSelect = document.getElementById("district");
    const wardSelect = document.getElementById("ward");

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
});
