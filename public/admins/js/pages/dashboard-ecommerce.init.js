// document.addEventListener("DOMContentLoaded", function() {
    const chartElement = document.querySelector("#category-products-chart");
    const chartColors = getChartColorsArray("category-products-chart");

    // Gọi API để lấy dữ liệu từ backend
    fetch('/api/product-statistics')
        .then((response) => response.json())
        .then((data) => {
            const options = {
                series: data.series, // Dữ liệu số lượng sản phẩm
                labels: data.labels, // Tên danh mục
                chart: {
                    type: 'donut',
                    height: 350,
                },
                colors: chartColors, // Màu sắc
                legend: {
                    position: 'bottom', // Hiển thị chú thích ở dưới
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            // Vẽ biểu đồ
            const chart = new ApexCharts(chartElement, options);
            chart.render();
        })
        .catch((error) => {
            console.error('Lỗi khi lấy dữ liệu thống kê sản phẩm:', error);
        });


// Hàm hỗ trợ lấy màu từ thuộc tính data-colors
function getChartColorsArray(id) {
    const colors = document.getElementById(id).getAttribute("data-colors");
    return JSON.parse(colors).map((color) => getComputedStyle(document.documentElement).getPropertyValue(color
        .trim()));
}
