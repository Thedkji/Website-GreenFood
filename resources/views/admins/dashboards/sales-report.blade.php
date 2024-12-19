@extends('admins.layouts.master')

@section('title', 'Dashboard | Velzon - Admin - Bảng điều khiển')

@section('start-page-title', 'Bảng điều khiển')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Doanh thu</h4>
                    {{-- <div>
                        <button type="button" class="btn btn-soft-secondary btn-sm">
                            ALL
                        </button>
                        <button type="button" class="btn btn-soft-secondary btn-sm">
                            1M
                        </button>
                        <button type="button" class="btn btn-soft-secondary btn-sm">
                            6M
                        </button>
                        <button type="button" class="btn btn-soft-primary btn-sm">
                            1Y
                        </button>
                    </div> --}}
                </div><!-- end card header -->

                <div class="card-header p-0 border-0 bg-light-subtle">
                    <div class="row g-0 text-center">
                        <div class="col-6 col-sm-3">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1"><span class="counter-value"
                                        data-target="7585">{{ $orderCountCompleted }}</span>
                                </h5>
                                <p class="text-muted mb-0">Đơn hàng</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6 col-sm-3">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1"><span class="counter-value"
                                        data-target="{{ number_format($totalEarnings, 0, ',', '.') }}">{{ number_format($totalEarnings, 0, ',', '.') }}</span>VNĐ
                                </h5>
                                <p class="text-muted mb-0">Doanh thu</p>
                            </div>
                        </div>
                        <!--end col-->
                        {{-- <div class="col-6 col-sm-3">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1"><span class="counter-value" data-target="367">0</span>
                                </h5>
                                <p class="text-muted mb-0">Hoàn tiền</p>
                            </div>
                        </div> --}}
                        <!--end col-->
                        {{-- <div class="col-6 col-sm-3">
                        <div class="p-3 border border-dashed border-start-0 border-end-0">
                            <h5 class="mb-1 text-success"><span class="counter-value"
                                    data-target="18.92">0</span>%</h5>
                            <p class="text-muted mb-0">Conversation Ratio</p>
                        </div>
                    </div> --}}
                        <!--end col-->
                    </div>
                </div><!-- end card header -->

                <div class="card-body p-0 pb-2">
                    <div class="w-100">
                        <div id="customer_impression_charts" data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                            class="apex-charts" dir="ltr"></div>
                    </div>

                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sản phẩm bán chạy nhất
                    </h4>
                    {{-- <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Xắp sếp theo:
                                </span><span class="text-muted">Hôm nay<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Hôm nay</a>
                                <a class="dropdown-item" href="#">Hôm qua</a>
                                <a class="dropdown-item" href="#">7 ngày qua</a>
                                <a class="dropdown-item" href="#">30 ngày qua</a>
                                <a class="dropdown-item" href="#">Tháng này </a>
                                <a class="dropdown-item" href="#">tháng trước</a>
                            </div>
                        </div>
                    </div> --}}
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Đã bán</th>
                                    <th>Còn hàng</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bestSellerProducts as $product)
                                    @php
                                        $minPriceVariantGroup = $product->variantGroups->sortBy('price_sale')->first();
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-light rounded p-1 me-2">
                                                    <img src="{{ Storage::url($product->img) }}" alt="{{ $product->name }}"
                                                        class="img-fluid d-block" />
                                                </div>
                                                <div>
                                                    <h5 class="truncate-text fs-14 my-1">
                                                        <a href="{{ route('client.product-detail', $product->id) }}"
                                                            class="truncate" data-fulltext="{{ $product->name }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 my-1 fw-normal">
                                                @if ($product->status == 0)
                                                    {{ app('formatPrice')($product->price_sale) }} VNĐ
                                                @else
                                                    {{ app('formatPrice')($minPriceVariantGroup->price_sale) }} VNĐ
                                                @endif
                                            </h5>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 my-1 fw-normal">{{ $product->total_sold }}</h5>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 my-1 fw-normal">{{ $product->quantity }}</h5>
                                        </td>
                                        <td>
                                            <h5 class="fs-14 my-1 fw-normal">
                                                {{ number_format($product->total_revenue, 0, ',', '.') }}đ
                                            </h5>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
        </div>

        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Danh mục sản phẩm</h4>
                    <div class="flex-shrink-0">
                        {{-- <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Download
                                    Report</a>
                                <a class="dropdown-item" href="#">Export</a>
                                <a class="dropdown-item" href="#">Import</a>
                            </div>
                        </div> --}}
                    </div>
                </div><!-- end card header -->

                <div id="category-products-chart"
                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info", "--vz-pink", "--vz-purple", "--vz-blue", "--vz-orange", "--vz-teal", "--vz-yellow", "--vz-gray", "--vz-light-blue", "--vz-dark-blue", "--vz-red", "--vz-light-green", "--vz-dark-green", "--vz-brown", "--vz-light-gray", "--vz-dark-gray", "--vz-light-orange", "--vz-light-pink", "--vz-dark-yellow", "--vz-dark-purple", "--vz-dark-teal", "--vz-light-brown", "--vz-light-dark", "--vz-light-violet", "--vz-dark-violet", "--vz-light-blue-gray"]'
                    class="apex-charts" dir="ltr">
                </div>

            </div> <!-- .card-->
        </div> <!-- .col-->
    </div> <!-- end row-->

@endsection

<script>
    let debounceTimeout;

    function debounceSearch() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            document.getElementById("search-form").submit();
        }, 600);
    }

    // Hàm lấy màu từ CSS
    document.addEventListener("DOMContentLoaded", function() {
        const orderData = @json($orderCountsForChart);
        const revenueData = @json($earningsByMonthJson);
        const refundData = Array(12).fill(0); // Dữ liệu hoàn tiền mặc định là 0

        const colorsArray = getChartColorsArray("customer_impression_charts");

        const options = {
            series: [{
                    name: "Đơn hàng", // Để Đơn hàng lên trên
                    type: "area", // Dạng đường vùng
                    data: orderData,
                },
                {
                    name: "Doanh thu", // Để Doanh thu nằm dưới Đơn hàng
                    type: "bar", // Dạng cột
                    data: revenueData,
                },
            ],
            chart: {
                height: 350,
                type: "line", // Biểu đồ chính
                toolbar: {
                    show: false,
                },
            },
            stroke: {
                curve: "smooth", // Đường mượt mà
                width: [3, 0], // Đơn hàng: 3px, Doanh thu: không có nét
            },
            fill: {
                opacity: [0.2, 0.8], // Đơn hàng: trong suốt hơn, Doanh thu: rõ ràng
            },
            markers: {
                size: [4, 0], // Đơn hàng: có điểm, Doanh thu: không có
                strokeWidth: 2,
            },
            xaxis: {
                categories: [
                    "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6",
                    "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12",
                ],
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
            },
            yaxis: [{
                    title: {
                        text: "Đơn hàng",
                    },
                    labels: {
                        formatter: (val) => val ? `${val}` : val,
                    },
                },
                {
                    opposite: true,
                    title: {
                        text: "Doanh thu",
                    },
                    labels: {
                        formatter: (val) => val ? `${new Intl.NumberFormat("vi-VN").format(val)} VNĐ` :
                            val,
                    },
                },
            ],
            grid: {
                show: true,
                xaxis: {
                    lines: {
                        show: true,
                    },
                },
                yaxis: {
                    lines: {
                        show: false,
                    },
                },
            },
            legend: {
                show: true,
                horizontalAlign: "center",
                offsetX: 0,
                offsetY: -5,
                markers: {
                    width: 9,
                    height: 9,
                    radius: 6,
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0,
                },
            },
            colors: colorsArray,
            tooltip: {
                shared: true,
                y: [{
                        formatter: (val) => (val ? `${val} Đơn hàng` : val),
                    },
                    {
                        formatter: (val) =>
                            val ?
                            `${new Intl.NumberFormat("vi-VN").format(val)} VNĐ` : val,
                    },
                ],
            },
            plotOptions: {
                bar: {
                    columnWidth: "40%", // Kích thước cột
                },
            },
            // dataLabels: {
            //     enabled: true,
            //     formatter: (val) => val ? `${new Intl.NumberFormat("vi-VN").format(val)} VNĐ` : val,
            // },
        };

        const chart = new ApexCharts(
            document.querySelector("#customer_impression_charts"),
            options
        );
        chart.render();
    });


    // danh mục sản phẩm
    document.addEventListener("DOMContentLoaded", function () {
    const chartColors = getChartColorsArray("category-products-chart");

    // Dữ liệu từ PHP
    const categoryData = @json($categoryData);  // Số lượng sản phẩm theo danh mục
    const categoryNames = @json($categoryNames);  // Tên danh mục

    const options = {
        series: categoryData, // Dữ liệu cho biểu đồ
        chart: {
            height: 350,
            type: "donut"
        },
        labels: categoryNames, // Nhãn cho từng phần trong biểu đồ
        colors: chartColors, // Màu sắc cho biểu đồ
        legend: {
            position: "bottom"
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val.toFixed(0); // Hiển thị số lượng (không có phần trăm)
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " sản phẩm"; // Hiển thị số lượng sản phẩm trong tooltip
                }
            }
        }
    };

    const chart = new ApexCharts(document.querySelector("#category-products-chart"), options);
    chart.render();
});
</script>
{{-- @push('scripts')
@endpush --}}
