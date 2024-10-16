<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .bg {
            background: linear-gradient(to bottom, #99cc00, #f2f2f2);
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .message-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            z-index: 10;
        }

        .message-icon {
            font-size: 100px;
        }

        .btn-success {
            background-color: #99cc00;
            border-color: #99cc00;
        }

        .btn-success:hover {
            background-color: #88b200;
            border-color: #88b200;
        }

        .floating-item {
            position: absolute;
            animation: float 6s ease-in-out infinite;
        }

        .floating-item img {
            width: 40px;
            height: 40px;
        }

        .item1 {
            bottom: 10%;
            left: 10%;
        }

        .item2 {
            bottom: 20%;
            right: 10%;
        }

        .item3 {
            top: 30%;
            left: 20%;
        }

        .item4 {
            bottom: 15%;
            right: 15%;
        }

        .item5 {
            top: 25%;
            left: 25%;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="message-container">
            <div class="message-icon">
                <i class="@yield('icon')" style="color: #28a745;"></i> <!-- Icon xác nhận màu xanh -->
            </div>
            <h1 style="@yield('color-title')">@yield('title-message')</h1>
            <p class="lead" style="font-size: 15px ; width: 500px; margin: auto">@yield('content-message')</p>

            @yield('link')
        </div>
        <div class="floating-item item1">
            <img src="https://img.icons8.com/fluency/48/4caf50/leaf.png" alt="Lá cây"> <!-- Màu xanh -->
        </div>
        <div class="floating-item item2">
            <img src="https://img.icons8.com/fluency/48/f57c00/deciduous-tree.png" alt="Cây xanh"> <!-- Màu cam -->
        </div>
        <div class="floating-item item3">
            <img src="https://img.icons8.com/fluency/48/9c27b0/palm-tree.png" alt="Cây cọ"> <!-- Màu tím -->
        </div>
        <div class="floating-item item4">
            <img src="https://img.icons8.com/fluency/48/00bcd4/natural-food.png" alt="Thực phẩm tự nhiên">
            <!-- Màu xanh dương -->
        </div>
        <div class="floating-item item5">
            <img src="https://img.icons8.com/fluency/48/ffc107/wheat.png" alt="Lúa mì"> <!-- Màu vàng -->
        </div>
    </div>
</body>

</html>
