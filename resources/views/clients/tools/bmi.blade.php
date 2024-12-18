@extends('clients.layouts.master')

@section('title', 'Fruitables - Tính BMI')

@section('title_page', 'Tính BMI')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Tính BMI')

@section('content')


    <div class="container-fluid py-5">
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-3  w-75">
                <div class="col-12">
                    <div class="text-center mx-auto mb-5" style="max-height: 700px;">
                        <h1 class="text-primary fw-bold">Công cụ tính chỉ số BMI</h1>
                        {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                    </div>
                </div>

                <form action="" class="row bg-light p-3 rounded gap-3">
                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold ">Chiều cao (cm)</label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="number" placeholder="Nhập chiều cao tính bằng cm" class="form-control p-2"
                                id="height_user">
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Cân nặng (kg)</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" id="weight_user" placeholder="Nhập cân nặng tính bằng kg"
                                class="form-control p-2">
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <div class="col-md-3">
                                <label for="" class="form-lable fw-bold" onclick="TotalBMI()">Kết quả</label>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <input type="text" placeholder="Kết quả" class="form-control p-2 w-25 bg-white"
                                id="result_bmi" readonly>
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            {{-- <label for="" class="form-lable">Cân nặng</label> --}}
                        </div>
                        <div class="col-md-9 w-100 text-end  ">
                            <button class="w-25 btn  border-secondary py-2 bg-white text-primary" type="button"
                                onclick="totalBMI()">Thực hiện
                                tính</button>
                        </div>
                    </div>
                </form>

                <div class="my-3 bg-white shadow-md">
                    <div class="result-bmi"></div>
                    <div class="recommen-sp">
                        <h5 class="text-primary fw-bold">Dưới đây là 1 số sản phẩm bạn có thể tham khảo</h5>
                        <div class="row">
                            <div class="col-md-3">

                        </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>

                <div class="container text-center py-2 mb-3">
                    <img src="{{ env('VIEW_CLIENT') }}/img/che-do-an-giam-can-1 (1).png" width="800" class=""
                        alt="Mô tả hình ảnh" />
                </div>

                <div style="text-align: justify;" align="justify">
                    <p><span style="font-size: 14pt;">BMI hay còn gọi là chỉ số khối cơ thể, là một trong những chỉ số quan
                            trọng để đánh giá tình trạng sức khỏe của con người. BMI là tỉ lệ giữa cân nặng và chiều cao của
                            một người. Cách tính BMI thường mà mọi người thường sử dụng là: chia cân nặng (kg) cho bình
                            phương chiều cao (m).</span></p>
                </div>

                <div style="text-align: justify;" align="justify">
                    <p><span style="font-size: 14pt;">Cách tính BMI rất dễ dàng và nhanh chóng, không yêu cầu kiến thức
                            chuyên môn cao, tuy nhiên việc hiểu và áp dụng đúng cách tính BMI là một câu chuyện khác . Trong
                            bài viết này, chúng ta sẽ tìm hiểu chi tiết về cách tính BMI và cách áp dụng nó vào đánh giá sức
                            khỏe.</span></p>
                    <p>&nbsp;</p>
                    <h2><span style="color: #008000;"><strong><span style="font-size: 18pt;">Cách tính
                                    BMI</span></strong></span></h2>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Công thức và cách tính BMI khá đơn giản, bạn chỉ cần chia cân nặng
                            (kg) cho bình phương chiều cao (m):</span></p>
                    <p>&nbsp;</p>
                    <p><strong><span style="font-size: 14pt;">BMI = cân nặng (kg) / (chiều cao (m))^2</span></strong></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Ví dụ: Nếu bạn cao 1,7m và nặng 65kg, thì BMI của bạn sẽ được tính như
                            sau:</span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">BMI = 65 / (1.7)^2 = 22.5</span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Nếu bạn vẫn chưa rõ cách tính BMI. Bạn có thể <a
                                href="https://healthyeating.shop/cong-cu-tinh-chi-so-bmi/">tính BMI tại Healthy eating</a>
                            để có được một kết quả nhanh chóng và chính xác nhất. Ngoài ra còn có lời khuyên từ các chuyên
                            gia dinh dưỡng phù hợp với từng chỉ số BMI của bạn.</span></p>
                    <h2><strong><span style="font-size: 18pt; color: #008000;">Đánh giá chỉ số BMI của bạn</span></strong>
                    </h2>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Sau khi tính được BMI, chúng ta cần phải đánh giá và so sánh với các
                            mức độ chuẩn của BMI. Theo tiêu chuẩn của Tổ chức Y tế Thế giới (WHO), mức độ BMI được phân loại
                            như sau:</span></p>
                    <p>&nbsp;</p>
                    <ul>
                        <li><strong><span style="font-size: 14pt;">Dưới 18.5: Thiếu cân</span></strong></li>
                        <li><strong><span style="font-size: 14pt;">Từ 18.5 đến 24.9: Bình thường</span></strong></li>
                        <li><strong><span style="font-size: 14pt;">Từ 25 đến 29.9: Thừa cân</span></strong></li>
                        <li><strong><span style="font-size: 14pt;">Từ 30 đến 34.9: Béo phì độ I</span></strong></li>
                        <li><strong><span style="font-size: 14pt;">Từ 35 đến 39.9: Béo phì độ II</span></strong></li>
                        <li><strong><span style="font-size: 14pt;">Trên 40: Béo phì độ III</span></strong></li>
                    </ul>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Tuy nhiên, chỉ số BMI chỉ là một phần trong quá trình đánh giá tình
                            trạng sức khỏe của con người. Để đánh giá một cách chính xác hơn, chúng ta cần kết hợp với các
                            chỉ số khác như vòng eo, vòng bụng, tỷ lệ mỡ cơ thể, tỷ lệ cơ và mỡ cơ thể, áp lực máu, huyết
                            áp, đường huyết, lipid máu, chức năng thận, tim mạch và phổi, hệ tiêu hóa, hệ miễn dịch, chức
                            năng não bộ,…</span></p>
                    <p>&nbsp;</p>
                    <h2><span style="font-size: 18pt; color: #008000;">Tại sao chỉ số BMI quan trọng?</span></h2>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">BMI quan trọng vì nó là một chỉ số đơn giản của cơ thể con người, dễ
                            đo và dễ tính toán, có thể áp dụng cho mọi lứa tuổi và giới tính. Chỉ số BMI cũng được sử dụng
                            để đánh giá tình trạng sức khỏe của một số tập thể như người lớn tuổi, trẻ em, phụ nữ mang thai,
                            người vận động viên,…</span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">BMI được sử dụng để phát hiện nguy cơ bệnh tật do béo phì hoặc thiếu
                            cân, ví dụ như bệnh tiểu đường, bệnh tim mạch, bệnh tăng huyết áp, bệnh ung thư, bệnh về xương
                            khớp, bệnh hô hấp, bệnh thần kinh, bệnh tâm thần,… Nếu BMI của bạn nằm trong khoảng bình thường
                            (18.5 – 24.9), bạn có nguy cơ thấp hơn mắc các bệnh liên quan đến cân nặng.</span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Tuy nhiên, BMI không phải là chỉ số tuyệt đối để đánh giá tình trạng
                            sức khỏe của con người. Ví dụ, nếu bạn là một vận động viên, có tỷ lệ cơ nhiều hơn mỡ, thì chỉ
                            số BMI có thể bị sai lệch vì nó không phân biệt được giữa mỡ và cơ. Hoặc nếu bạn là người già,
                            chỉ số BMI có thể không phản ánh chính xác tình trạng sức khỏe của bạn vì các yếu tố khác như
                            thay đổi về cơ thể, tỷ lệ cơ và mỡ cơ thể,…</span></p>
                    <p>&nbsp;</p>
                    <h2><strong><span style="font-size: 18pt; color: #008000;">Cách giảm chỉ số BMI</span></strong></h2>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Để giúp các chỉ số BMI trong cơ thể giảm xuống. Tuy nhiên, để cơ thể
                            đạt được chỉ số BMI mong muốn, các chuyên gia khuyến khích bạn giảm cân và có rất nhiều cách
                            khác nhau để <strong><a
                                    href="https://healthyeating.shop/blog-giam-can/thuc-pham-giam-can-tai-nha-hieu-qua/">giảm
                                    cân một cách an toàn và hiệu quả</a>.</strong></span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Để giảm cân, bạn cần ăn uống đầy đủ dinh dưỡng, tập luyện thể thao
                            thường xuyên và duy trì một phong cách sống lành mạnh. Bạn cũng có thể tìm kiếm sự trợ giúp từ
                            chuyên gia dinh dưỡng hoặc huấn luyện viên để có <a
                                href="https://healthyeating.shop/category_package/goi-an-giam-can/"><strong>kế hoạch giảm
                                    cân hợp lý</strong></a>.</span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Bạn cũng có thể tham khảo ý kiến của chuyên gia dinh dưỡng hoặc huấn
                            luyện viên để có <a href="https://healthyeating.shop/category_package/goi-an-giam-can/">kế hoạch
                                giảm cân hiệu quả.</a></span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Hãy cùng nhà <a
                                href="https://healthyeating.shop/category_package/goi-an-giam-can/">healthyeating</a> tìm
                            hiểu 5+ lời khuyên giúp giảm chỉ số BMI từ các chuyên gia sức khỏe hàng đầu nhé:</span></p>
                    <p><span style="color: #008000;"><strong><span style="font-size: 14pt;">1. Tập trung vào thay đổi lối
                                    sống</span></strong></span></p>
                    <p><span style="font-size: 14pt;">Giảm cân không chỉ là việc ăn ít hơn và tập luyện nhiều hơn. Để giảm
                            cân hiệu quả, bạn cần thay đổi lối sống của mình bằng cách ăn uống đầy đủ dinh dưỡng và tập
                            luyện thể thao thường xuyên.</span></p>
                    <p>&nbsp;</p>
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">2. Ăn ít calo
                                    hơn</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Việc giảm calo là một trong những cách hiệu quả để giảm cân. Tuy
                            nhiên, bạn không nên giảm quá nhiều calo một cách đột ngột, vì điều này có thể gây hại cho sức
                            khỏe của bạn. Thay vào đó, bạn nên giảm dần lượng calo trong khẩu phần ăn của mình một cách dần
                            dần.</span></p>
                    <p>&nbsp;</p>
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">3. Tập thể dục đều
                                    đặn</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Tập thể dục đều đặn là một phần quan trọng của việc giảm cân. Bạn nên
                            tập luyện ít nhất 30 phút mỗi ngày, ít nhất 5 ngày trong tuần. Các hoạt động như chạy bộ, đi bộ,
                            bơi lội và tập thể dục trong phòng gym đều rất tốt cho sức khỏe của bạn.</span></p>
                    <p>&nbsp;</p>
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">4. Điều chỉnh khẩu phần
                                    ăn</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Điều chỉnh khẩu phần ăn của bạn là một phần quan trọng trong việc
                            giảm
                            cân. Bạn nên tập trung vào ăn các loại thực phẩm tươi, giàu dinh dưỡng như rau xanh, trái cây,
                            thịt trắng, đậu hạt, hạt giống và các sản phẩm từ sữa không béo.</span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;"><strong><span style="color: #ff6600;">&gt;&gt;&gt; Bạn có thể tham
                                    khảo thêm: </span><span style="color: #008000;"><a style="color: #008000;"
                                        href="https://healthyeating.shop/blog-giam-can/lam-sao-de-giam-can-cap-toc-13-loi-khuyen-tu-chuyen-gia-giup-ban-giam-can-nhanh-chong/">Làm
                                        Sao Để Giảm Cân Cấp Tốc? 13 Lời Khuyên Từ Chuyên Gia Giúp Bạn Giảm Cân Nhanh
                                        Chóng</a></span></strong></span></p>
                    <p>&nbsp;</p>
                    <h2><span style="font-size: 18pt; color: #008000;"><strong>Cách tăng chỉ số BMI</strong></span></h2>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Để tăng BMI, bạn cần tập trung vào việc tăng cân một cách khỏe mạnh
                            bằng cách tập trung vào việc tăng cường cơ bắp và tiêu thụ đầy đủ các dưỡng chất cần thiết cho
                            cơ thể. Dưới đây là một số cách để tăng BMI của bạn:</span></p>
                    <p>&nbsp;</p>
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">1. Ăn nhiều hơn
                                    calo</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Để tăng cân, bạn cần tiêu thụ nhiều calo hơn so với lượng calo bạn
                            tiêu thụ hàng ngày. Bạn có thể tăng lượng calo bằng cách ăn thêm bữa ăn trong ngày hoặc ăn các
                            loại thực phẩm có nhiều calo như bơ đậu phộng, hạt giống, thịt đỏ và sản phẩm từ sữa béo.</span>
                    </p>
                    <p>&nbsp;</p>
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">2. Tập thể dục và tăng cường
                                    cơ bắp</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Để tăng cân một cách khỏe mạnh, bạn cần tập trung vào việc tăng cường
                            cơ bắp. Tập thể dục định kỳ, đặc biệt là tập luyện sức mạnh và tập thể dục cardio, có thể giúp
                            tăng cường cơ bắp và tăng cân.</span></p>
                    <p>&nbsp;</p>
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">3. Ăn thực phẩm giàu chất
                                    đạm</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Chất đạm là thành phần quan trọng giúp tăng cường cơ bắp. Bạn có thể
                            tăng cường việc tiêu thụ chất đạm bằng cách ăn các loại thực phẩm như trứng, thịt, đậu hạt, hạt
                            giống và sản phẩm từ sữa.</span></p>
                    <p>&nbsp;</p>
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">4. Ăn đầy đủ dinh
                                    dưỡng</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Ăn đầy đủ dinh dưỡng cũng rất quan trọng để tăng cân một cách khỏe
                            mạnh. Bạn cần ăn các loại thực phẩm giàu dinh dưỡng và đảm bảo lượng calo tiêu thụ hàng ngày của
                            bạn phù hợp với mục tiêu tăng cân của mình.</span></p>
                    <p>&nbsp;</p>
                    <h3><strong><span style="font-size: 14pt; color: #008000;">5. Thêm chất béo vào khẩu phần
                                ăn</span></strong></h3>
                    <p><span style="font-size: 14pt;">Chất béo là một nguồn calo cao và có thể giúp bạn tăng cân. Tuy
                            nhiên, bạn cần chọn các loại chất béo lành mạnh như dầu oliu, dầu hạt lanh và dầu hạt điều, và
                            đảm bảo lượng chất béo trong khẩu phần ăn của bạn vừa đủ.</span></p>
                    <p>&nbsp;</p>
                </div>

                <p><span style="font-size: 14pt;"><strong><span style="color: #ff6600;">&gt;&gt;&gt; Bạn có thể tham khảo
                                thêm: </span><span style="color: #008000;"><a style="color: #008000;"
                                    href="https://healthyeating.shop/blog-giam-can/che-do-an-eat-clean-tang-can/">Chế Độ Ăn
                                    Eat Clean Tăng Cân Cho Người Gầy, Tại Sao Không?</a></span></strong></span></p>

                <p>&nbsp;</p>

                <div style="text-align: justify;" align="justify">
                    <h3><span style="color: #008000;"><strong><span style="font-size: 14pt;">6. Uống đủ
                                    nước</span></strong></span></h3>
                    <p><span style="font-size: 14pt;">Uống đủ nước là rất quan trọng cho cả quá trình giảm cân và tăng cân.
                            Nước giúp giảm thiểu sự khát và giúp cơ thể hoạt động tốt hơn. Bạn nên uống ít nhất 8 ly nước
                            mỗi ngày để đảm bảo cơ thể được cung cấp đủ nước.</span></p>
                    <p>&nbsp;</p>
                    <h2><span style="color: #008000;"><strong><span style="font-size: 18pt;">Lời
                                    Kết</span></strong></span></h2>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">BMI là một chỉ số đơn giản và cách tính BMI cũng không hề khó nhưng
                            rất quan trọng và không thể thiếu để đánh giá trạng thái dinh dưỡng của một người. Tuy nhiên,
                            chỉ số này không thể đánh giá được tất cả các yếu tố liên quan đến sức khỏe, và không phải là
                            giải pháp duy nhất để đạt được mục tiêu giảm cân hoặc tăng cân. </span></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: 14pt;">Bạn nên tham khảo ý kiến của bác sĩ hoặc chuyên gia dinh dưỡng trước
                            khi thực hiện bất kỳ phương pháp giảm cân hoặc tăng cân đấy!</span></p>
                    <p>&nbsp;</p>
                </div>

                <h2 style="text-align: justify;"><span style="color: #008000; font-size: 18pt;"><strong>Để biết thêm thông
                            tin chi tiết vui lòng liên hệ:</strong></span></h2>

                <p>&nbsp;</p>

                <p style="text-align: justify;"><span style="font-size: 14pt;"><span
                            class="pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu"><img
                                loading="lazy" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t4d/1/16/1f4de.png"
                                alt="📞" width="16" height="16"></span>&nbsp; Hotline: 078 663 1194</span>
                </p>

                <p>&nbsp;</p>

                <p style="text-align: justify;"><span style="font-size: 14pt;"><span
                            class="pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu"><img
                                loading="lazy" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tf6/1/16/1f3e0.png"
                                alt="🏠" width="16" height="16"></span>&nbsp; Địa chỉ: 219 Dương Bá Trạc,
                        Quận 8, TPHCM</span></p>

                <p>&nbsp;</p>

                <p style="text-align: justify;"><span style="font-size: 14pt;"><span
                            class="pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu"><img
                                loading="lazy" src="https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1/16/1f310.png"
                                alt="🌐" width="16" height="16"></span>&nbsp; Website :&nbsp;<span
                            style="color: #008000;"><strong><a style="color: #008000;"
                                    href="https://healthyeating.shop/">www.healthyeating.shop</a></strong></span></span>
                </p>

                <p>&nbsp;</p>

                <div class="o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q" style="text-align: justify;">
                    <div dir="auto" style="text-align: left;"><span style="font-size: 14pt;">⚜️ Fanpage:&nbsp;<span
                                style="color: #008000;"><strong><a style="color: #008000;"
                                        href="https://www.facebook.com/HealthyEatingHCM">HealthyEatingHCM</a></strong></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    </div>

    <script>
        let heightUser = document.querySelector('#height_user');
        let weightUser = document.querySelector('#weight_user');
        let result = document.querySelector("#result_bmi");
        let resultBmi = document.querySelector(".result-bmi");
        console.log(resultBmi);

        function totalBMI() {
            let heightInMeters = heightUser.value / 100;
            let bmi = weightUser.value / (heightInMeters ** 2);

            result.value = bmi.toFixed(2);


            if (bmi > 40) {
                // Béo phì cấp độ 3
                result.style.color = "red";
                result.style.border = "1px solid red";
                result.style.fontWeight = "bold";
                resultBmi.innerHTML =
                    `<h3 class="fw-bold">Kết luận: <span class="text-danger">Bạn đang ở tình trạng béo phì cấp độ 3.</span></h3>
        <p>Giải pháp: Hãy tham khảo bác sĩ và lên kế hoạch giảm cân chi tiết. Tăng cường tập thể dục và duy trì chế độ ăn lành mạnh.</p>`;
            } else if (bmi > 35) {
                // Béo phì cấp độ 2
                result.style.color = "orangered";
                result.style.border = "1px solid orangered";
                result.style.fontWeight = "bold";
                resultBmi.innerHTML =
                    `<h3 class="fw-bold">Kết luận: <span class="text-warning">Bạn đang ở tình trạng béo phì cấp độ 2.</span></h3>
        <p>Giải pháp: Cắt giảm calo trong bữa ăn và tập luyện nhẹ nhàng hàng ngày. Kiểm tra sức khỏe định kỳ.</p>`;
            } else if (bmi > 30) {
                // Béo phì cấp độ 1
                result.style.color = "orange";
                result.style.border = "1px solid orange";
                result.style.fontWeight = "bold";
                resultBmi.innerHTML =
                    `<h3 class="fw-bold">Kết luận: <span class="text-warning">Bạn đang ở tình trạng béo phì cấp độ 1.</span></h3>
        <p>Giải pháp: Bắt đầu với các bài tập cardio như đi bộ, chạy bộ, và điều chỉnh khẩu phần ăn hợp lý.</p>`;
            } else if (bmi > 25) {
                // Thừa cân
                result.style.color = "yellow";
                result.style.border = "1px solid yellow";
                result.style.fontWeight = "bold";
                resultBmi.innerHTML =
                    `<h3 class="fw-bold">Kết luận: <span class="text-warning">Bạn đang trong tình trạng thừa cân.</span></h3>
        <p>Giải pháp: Tăng cường vận động, giảm ăn thực phẩm nhiều đường và dầu mỡ.</p>`;
            } else if (bmi >= 18.5) {
                // Bình thường
                result.style.color = "green";
                result.style.border = "1px solid green";
                result.style.fontWeight = "bold";
                resultBmi.innerHTML =
                    `<h3 class="fw-bold">Kết luận: <span class="text-success">Bạn đang có cân nặng bình thường.</span></h3>
        <p>Giải pháp: Tiếp tục duy trì lối sống lành mạnh và chế độ ăn uống cân đối.</p>`;
            } else if (bmi >= 16) {
                // Thiếu cân
                result.style.color = "blue";
                result.style.border = "1px solid blue";
                result.style.fontWeight = "bold";
                resultBmi.innerHTML =
                    `<h3 class="fw-bold">Kết luận: <span class="text-primary">Bạn đang trong tình trạng thiếu cân.</span></h3>
        <p>Giải pháp: Bổ sung thực phẩm giàu dinh dưỡng và tăng lượng calo trong các bữa ăn.</p>`;
            } else {
                // Thiếu cân nghiêm trọng
                result.style.color = "red";
                result.style.border = "1px solid red";
                result.style.fontWeight = "bold";
                resultBmi.innerHTML =
                    `<h3 class="fw-bold">Kết luận: <span class="text-danger">Bạn đang thiếu cân nghiêm trọng.</span></h3>
        <p>Giải pháp: Hãy gặp chuyên gia dinh dưỡng để được tư vấn cụ thể. Ăn đủ chất và nghỉ ngơi hợp lý.</p>`;
            }

        }
    </script>
@endsection
