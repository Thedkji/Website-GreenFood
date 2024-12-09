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


 // Helper function to get colors from data-colors
 function getChartColorsArray(e) {
    if (document.getElementById(e)) {
        let colors = document.getElementById(e).getAttribute("data-colors");
        if (colors) {
            return JSON.parse(colors).map(color => {
                let cssColor = getComputedStyle(document.documentElement).getPropertyValue(color.trim());
                return cssColor || color.trim();
            });
        }
    }
    console.warn("Data colors not found on element:", e);
    return [];
}

function getChartColorsArray(e) {
    if (document.getElementById(e)) {
        let colors = document.getElementById(e).getAttribute("data-colors");
        if (colors) {
            return JSON.parse(colors).map(color => {
                let cssColor = getComputedStyle(document.documentElement).getPropertyValue(color.trim());
                return cssColor || color.trim();
            });
        }
    }
    console.warn("Data colors not found on element:", e);
    return [];
}


// Render the donut chart
// document.addEventListener("DOMContentLoaded", function () {
//     const chartColors = getChartColorsArray("category-products-chart");

//     const options = {
//         series: [44, 55, 41, 17, 15], // Data for the donut chart
//         chart: {
//             height: 350,
//             type: "donut"
//         },
//         labels: ["Direct", "Social", "Email", "Other", "Referrals"], // Labels for each slice
//         colors: chartColors, // Colors for the chart
//         legend: {
//             position: "bottom"
//         },
//         dataLabels: {
//             enabled: true,
//             formatter: function (val) {
//                 return val.toFixed(1) + "%"; // Show percentages
//             }
//         },
//         tooltip: {
//             y: {
//                 formatter: function (val) {
//                     return val + " visits"; // Show visits in tooltip
//                 }
//             }
//         }
//     };

//     const chart = new ApexCharts(document.querySelector("#category-products-chart"), options);
//     chart.render();
//     // console.log($categories);
// });



