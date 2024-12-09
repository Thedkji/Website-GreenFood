@extends('clients.layouts.master')

@section('title', 'Fruitables - Giới thiệu')

@section('title_page', 'Giới thiệu')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Giới thiệu')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="container-fluid py-5">
        <!-- About Start -->
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="text-primary fw-bold">Chào mừng đến với Green Food</h1>
                <p class="mb-4">Nơi khởi nguồn của thực phẩm lành mạnh, hướng đến một cuộc sống xanh, khỏe và bền vững.</p>
            </div>
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="https://bizweb.dktcdn.net/100/004/714/files/xu-huong-healthy-snack.png?v=1667787567357" alt="Healthy Food" class="img-fluid rounded shadow">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-4">Giới thiệu về chúng tôi</h3>
                    <p class="mb-4">Green Food là một thương hiệu được xây dựng với niềm tin mạnh mẽ rằng "Một chế độ ăn uống lành mạnh chính là nền tảng của sức khỏe bền vững". Với sứ mệnh mang đến những sản phẩm thực phẩm tự nhiên, an toàn và dinh dưỡng, chúng tôi cam kết đồng hành cùng bạn trên hành trình chăm sóc sức khỏe.</p>
                    <a href="/contact.html" class="btn btn-primary py-3 px-4">Liên hệ với chúng tôi</a>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Values Start -->
        <div class="container-fluid bg-light py-5">
            <div class="container text-center">
                <h2 class="text-primary fw-bold mb-4">Giá trị cốt lõi</h2>
                <p class="mb-4">Chúng tôi không chỉ bán sản phẩm, mà còn mang lại giá trị lâu dài cho sức khỏe của bạn và gia đình.</p>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="value-item bg-white p-4 rounded shadow">
                            <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold">Tự nhiên</h5>
                            <p>Chúng tôi luôn chọn lọc các nguyên liệu tự nhiên nhất, không chất bảo quản và đảm bảo giữ trọn vẹn hương vị cũng như giá trị dinh dưỡng.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="value-item bg-white p-4 rounded shadow">
                            <i class="fa fa-users fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold">Khách hàng là trung tâm</h5>
                            <p>Chúng tôi luôn lắng nghe, thấu hiểu nhu cầu và mang đến các sản phẩm phù hợp với sức khỏe của bạn.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="value-item bg-white p-4 rounded shadow">
                            <i class="fa fa-globe fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold">Bền vững</h5>
                            <p>Green Food luôn đề cao trách nhiệm với môi trường, hướng tới việc giảm thiểu rác thải và sử dụng bao bì thân thiện với thiên nhiên.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Values End -->

        <!-- Mission and Vision Start -->
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="p-4 bg-light rounded shadow">
                        <h3 class="text-primary fw-bold">Sứ mệnh của chúng tôi</h3>
                        <p>Green Food cam kết mang đến những sản phẩm lành mạnh, tự nhiên, góp phần xây dựng một lối sống bền vững, nâng cao sức khỏe cộng đồng. Đưa lối sống healthy đến với tất cả mọi người.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-4 bg-light rounded shadow">
                        <h3 class="text-primary fw-bold">Tầm nhìn của chúng tôi</h3>
                        <p>Trở thành thương hiệu dẫn đầu trong lĩnh vực thực phẩm lành mạnh tại Việt Nam, đồng hành cùng mọi gia đình trên con đường chăm sóc sức khỏe toàn diện.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mission and Vision End -->

        <!-- Our Story Start -->
        <div class="container-fluid bg-light py-5">
            <div class="container text-center">
                <h2 class="text-primary fw-bold mb-4">Câu chuyện thương hiệu</h2>
                <p class="mb-4">Green Food khởi nguồn từ mong muốn xây dựng một lối sống khỏe mạnh cho cộng đồng. Chúng tôi hiểu rằng sức khỏe là tài sản quý giá nhất, và những gì bạn ăn mỗi ngày có thể tạo nên sự khác biệt lớn.</p>
                <p class="mb-4">Từ một cửa hàng nhỏ bán các loại hạt dinh dưỡng, chúng tôi đã mở rộng ra nhiều danh mục sản phẩm và ngày càng hoàn thiện để đáp ứng tốt nhất nhu cầu của khách hàng. Đằng sau mỗi sản phẩm là sự tâm huyết, trách nhiệm và nỗ lực không ngừng nghỉ của đội ngũ Green Food.</p>
                <img src="https://i.pinimg.com/736x/ab/95/da/ab95da68436b4803161d5988ae01756c.jpg" class="img-fluid rounded shadow" alt="Green Food Story">
            </div>
        </div>
        <!-- Our Story End -->
    </div>

    @endsection
