@extends('clients.layouts.master')

@section('title', 'Fruitables - Tính BMI')

@section('content')
    @include('clients.layouts.components.singer-page')

    <div class="container-fluid py-5">
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-3  w-75">
                <div class="col-12">
                    <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                        <h1 class="text-primary fw-bold">Công cụ tính chỉ số BMI</h1>
                        {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                    </div>
                </div>

                <form action="" class="row bg-light p-3 rounded gap-3">
                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold ">Chiều cao</label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" placeholder="Nhập chiều cao tính bằng cm" class="form-control p-2">
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Cân nặng</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" placeholder="Nhập cân nặng tính bằng kg" class="form-control p-2">
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Kết quả</label>
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            {{-- <label for="" class="form-lable">Chiều cao</label> --}}
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" placeholder="Kết quả" class="form-control p-2 w-25 bg-white" readonly>
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            {{-- <label for="" class="form-lable">Cân nặng</label> --}}
                        </div>
                        <div class="col-md-9 w-100 text-end  ">
                            <button class="w-25 btn  border-secondary py-2 bg-white text-primary " type="submit">Thực hiện tính</button>
                        </div>
                    </div>
                </form>

                <div class="container text-center py-2 mb-3">
                    <img src="https://cellphones.com.vn/sforum/wp-content/uploads/2024/02/avatar-anh-meo-cute-5.jpg" width="250" class="" alt="Mô tả hình ảnh" />
                </div>

                <div class="container mt-5 ">
                    <p class="text-body">
                        BMI hay còn gọi là chỉ số khối cơ thể, là một trong những chỉ số quan trọng để đánh giá
                        tình trạng sức khỏe của con người. BMI là tỉ lệ giữa cân nặng và chiều cao của một người.
                        Cách tính BMI thường mà mọi người thường sử dụng là: chia cân nặng (kg) cho bình phương chiều cao
                        (m).
                    </p>
                    <p class="text-body">
                        Cách tính BMI rất dễ dàng và nhanh chóng, không yêu cầu kiến thức chuyên môn cao, tuy nhiên việc
                        hiểu và áp dụng đúng cách tính BMI là một câu chuyện khác . Trong bài viết này, chúng ta sẽ tìm hiểu
                        chi tiết về cách tính BMI và cách áp dụng nó vào đánh giá sức khỏe
                    </p>
                </div>


                <div class="container mt-5 ">
                    <h2 class="text-success">Cách tính BMI</h2>
                    <p class="text-body">
                        Công thức và cách tính BMI khá đơn giản, bạn chỉ cần chia cân nặng (kg) cho bình phương chiều cao
                        (m):
                    </p>
                    <p class="fw-bold">BMI = cân nặng (kg) / (chiều cao (m))<sup>2</sup></p>

                    <p class="text-body">
                        Ví dụ: Nếu bạn cao 1,7m và nặng 65kg, thì BMI của bạn sẽ được tính như sau:
                    </p>
                    <p class="fw-bold">BMI = 65 / (1.7)<sup>2</sup> = 22.5</p>

                    <p class="text-body">
                        Nếu bạn vẫn chưa rõ cách tính BMI, bạn có thể
                        <a href="#" class="text-primary">tính BMI tại GreenFood</a>
                        để có được một kết quả nhanh chóng và chính xác nhất. Ngoài ra còn có lời khuyên từ các chuyên gia
                        dinh dưỡng phù hợp với từng chỉ số BMI của bạn.
                    </p>
                </div>


            </div>
        </div>
    </div>
    <!-- Contact End -->

    </div>
@endsection
