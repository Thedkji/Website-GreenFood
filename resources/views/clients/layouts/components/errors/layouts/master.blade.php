<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
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

        .error-container {
            max-width: 600px;
            z-index: 10;
        }

        .error-icon {
            font-size: 100px;
            color: #99cc00;
        }

        .btn-primary {
            background-color: #99cc00;
            border-color: #99cc00;
        }

        .btn-primary:hover {
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
        <div class="error-container">
            <div class="error-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <h1 class="display-1" style="font-size:100px">@yield('status-err')</h1>
            <h1>@yield('title-err')</h1>
            <p class="lead">@yield('content-err')</p>
            <a href="{{ route('client.home') }}" class="btn btn-primary"><i class="bi bi-house"></i> Về trang chủ</a>
        </div>
        <div class="floating-item item1">
            <img src="https://img.icons8.com/fluency/48/000000/leaf.png" alt="Lá cây">
        </div>
        <div class="floating-item item2">
            <img src="https://img.icons8.com/fluency/48/000000/deciduous-tree.png" alt="Cây xanh">
        </div>
        <div class="floating-item item3">
            <img src="https://img.icons8.com/fluency/48/000000/palm-tree.png" alt="Cây cọ">
        </div>
        <div class="floating-item item4">
            <img src="https://img.icons8.com/fluency/48/000000/natural-food.png" alt="Thực phẩm tự nhiên">
        </div>
        <div class="floating-item item5">
            <img src="https://img.icons8.com/fluency/48/000000/wheat.png" alt="Lúa mì">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.js"></script>
</body>

</html>
