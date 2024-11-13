@extends('clients.layouts.master')

@section('title', 'Fruitables - Tính BMR và TDEE')

@section('content')
    @include('clients.layouts.components.singer-page')

    <div class="container-fluid py-5">
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-3  w-75">
                <div class="col-12">
                    <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                        <h1 class="text-primary fw-bold">Công cụ tính chỉ số BMR và TDEE</h1>
                        {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                    </div>
                </div>

                <form action="" class="row bg-light p-3 rounded gap-3">
                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold ">Chiều cao</label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="number" placeholder="Nhập chiều cao tính bằng cm" class="form-control p-2"
                                id="height_user">
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Cân nặng</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" placeholder="Nhập cân nặng tính bằng kg" class="form-control p-2"
                                id="weight_user">
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Tuổi</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" placeholder="Nhập tuổi" class="form-control p-2" id="age_user">
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Giới tính</label>
                        </div>
                        <div class="col-md-9">
                            <select name="options" id="gender_user" class="form-select p-2">
                                <option value="">Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Cường độ tập luyện</label>
                        </div>
                        <div class="col-md-9">
                            <select name="options" id="option_practice_user" class="form-select p-2">
                                <option selected>Chọn cường độ tập luyện</option>
                                <option value="1">Ít vận động / không tập luyện / nhân viên văn phòng</option>
                                <option value="2">Vận động nhẹ / Tập luyện 1-3 lần/tuần</option>
                                <option value="3">Vận động vừa / Tập luyện 3-5 ngày/tuần</option>
                                <option value="4">Vận động nhiều / Tập luyện 6-7 ngày/tuần</option>
                                <option value="5">Hoạt động cực nhiều / Ngày tập 2 lần / Là vận động viên</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6 row justify-content-between align-items-center w-100 g-3">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Kết quả BMR</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" placeholder="Kết quả BMR"
                                class="form-control result_bmr p-2 w-25 bg-white" readonly>
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100 g-3">
                        <div class="col-md-3">
                            <label for="" class="form-lable fw-bold">Kết quả TDEE</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" placeholder="Kết quả TDEE"
                                class="form-control result_tdee p-2 w-25 bg-white" readonly>
                        </div>
                    </div>

                    <div class="col-md-6 row justify-content-between align-items-center w-100">
                        <div class="col-md-3">
                            {{-- <label for="" class="form-lable">Cân nặng</label> --}}
                        </div>
                        <div class="col-md-9 w-100 text-end  ">
                            <button class="w-25 btn  border-secondary py-2 bg-white text-primary" type="button"
                                onclick="resultBMR()">Thực hiện
                                tính</button>
                        </div>
                    </div>
            </div>



            </form>

            <div class="container text-center py-2 mb-3">
                <img src="{{ env('VIEW_CLIENT') }}/img/tinh-luong-calo-can-nap.jpg" width="800" width="250"
                    class="" alt="Mô tả hình ảnh">
            </div>

            <p><span style="font-size: 14pt;">Calo là một thành phần quan trọng của <strong><a
                            href="https://healthyeating.shop/package/che-do-an-giam-can-eat-clean-7-ngay/" target="_blank"
                            rel="noopener">chế độ ăn uống</a> </strong>hàng ngày của chúng ta, bởi vì chúng cung cấp năng
                    lượng cần thiết cho cơ thể hoạt động đúng cách. Tuy nhiên, không phải tất cả các calo được tạo ra bằng
                    nhau và việc biết cần bao nhiêu calo cho cơ thể của bạn là rất quan trọng để duy trì trọng lượng khỏe
                    mạnh.</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Trong bài đăng này, chúng ta sẽ khám phá hai khái niệm quan trọng để hiểu bạn
                    nên tiêu thụ bao nhiêu calo bằng cách tính lượng calo cần nạp từ: tỷ lệ trao đổi chất cơ bản (BMR) và
                    tổng lượng năng lượng tiêu thụ hàng ngày (TDEE).</span></p>

            <p>&nbsp;</p>

            <span style="color: #008000;"><strong><span style="font-size: 18pt;">BMR là gì và cách tính
                        BMR?</span></strong></span>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Tỷ lệ trao đổi chất cơ bản (BMR) đề cập đến số calo mà cơ thể của bạn đốt cháy
                    khi ở trạng thái nghỉ ngơi. Có nghĩa là năng lượng cơ thể của bạn cần để thực hiện các chức năng cơ bản
                    như hô hấp, tuần hoàn máu và duy trì nhiệt độ cơ thể. BMR thay đổi tùy thuộc vào giới tính, độ tuổi,
                    chiều cao, cân nặng và mức độ hoạt động của bạn.</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Để tính lượng calo cần nạp, tính BMR của bạn có thể giúp bạn biết được cơ thể
                    cần bao nhiêu calo đấy. Công thức BMR này đươc tính bằng cách sử dụng giới tính, độ tuổi, chiều cao và
                    cân nặng của bạn như là các yếu tố chính.</span></p>

            <p>&nbsp;</p>

            <p><strong><span style="font-size: 14pt;">BMR cho nam giới (calo/ngày) = (10 x cân nặng kg) + (6,25 x chiều cao
                        cm) – (5 x tuổi) + 5</span></strong><br>
                <strong><span style="font-size: 14pt;">BMR cho nữ giới (calo/ngày) = (10 x cân nặng kg) + (6,25 x chiều cao
                        cm) – (5 x tuổi) – 161</span></strong>
            </p>

            <p>&nbsp;</p>

            <h2><span style="font-size: 18pt; color: #008000;"><strong>TDEE là gì và cách tính?</strong></span></h2>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Tổng lượng năng lượng tiêu thụ hàng ngày (TDEE) đề cập đến tổng số calo mà cơ
                    thể của bạn đốt cháy trong một ngày dựa trên mức độ hoạt động của bạn. Biết được tổng năng lượng tiêu
                    thụ hằng ngày có thể giúp bạn tính lượng calo cần nạp.</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Để tính TDEE của bạn, bạn sẽ cần biết BMR của mình và hệ số hoạt động của bạn
                    (activity level). Hệ số hoạt động này sẽ thay đổi tùy thuộc vào mức độ hoạt động của bạn, bao gồm công
                    việc hàng ngày, tập luyện thể dục và các hoạt động khác. Dưới đây là các hệ số hoạt động phổ
                    biến:</span></p>

            <p>&nbsp;</p>

            <ul>
                <li><strong><span style="font-size: 14pt;">Không hoặc ít vận động: 1.2</span></strong></li>
                <li><strong><span style="font-size: 14pt;">Vận động nhẹ (tập luyện 1-3 lần/tuần): 1.375</span></strong>
                </li>
                <li><strong><span style="font-size: 14pt;">Vận động trung bình (tập luyện 3-5 lần/tuần):
                            1.55</span></strong></li>
                <li><strong><span style="font-size: 14pt;">Vận động nặng (tập luyện 6-7 lần/tuần): 1.725</span></strong>
                </li>
                <li><span style="font-size: 14pt;"><strong>Vận động rất nặng (tập luyện cường độ cao hơn 7 lần/tuần):
                            1.9</strong></span></li>
            </ul>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Và để tính toán TDEE của bạn, bạn chỉ cần nhân BMR của mình với hệ số hoạt
                    động của bạn.</span></p>

            <p>&nbsp;</p>

            <p><strong><span style="font-size: 14pt;">TDEE = BMR x hệ số hoạt động</span></strong></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Ví dụ: Nếu BMR của bạn là 1500 calo và hệ số hoạt động của bạn là 1.55 (vận
                    động trung bình), thì TDEE của bạn sẽ là:</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">TDEE = 1500 x 1.55 = 2325 calo/ngày</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Nếu bạn muốn giảm cân, bạn sẽ cần tiêu thụ ít calo hơn TDEE của mình. Nếu bạn
                    muốn tăng cân, bạn sẽ cần tiêu thụ nhiều calo hơn TDEE của mình. Tuy nhiên, nên nhớ rằng quá tiêu thụ
                    calo cũng có thể dẫn đến tăng cân và các vấn đề sức khỏe khác.</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;"><strong><span style="color: #ff6600;">&gt;&gt;&gt; Bạn có thể tham khảo
                            thêm: </span><span style="color: #008000;"><a style="color: #008000;"
                                href="https://healthyeating.shop/blog-giam-can/thuc-pham-giam-can-tai-nha-hieu-qua/">Top 20
                                thực phẩm giảm cân tại nhà hiệu quả</a></span></strong></span></p>

            <p>&nbsp;</p>

            <h2><span style="font-size: 18pt; color: #008000;"><strong>Tại sao chỉ số BMR và TDEE lại quan
                        trọng?</strong></span></h2>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Chỉ số BMR (tỷ lệ trao đổi năng lượng cơ bản) và TDEE (tổng lượng calo tiêu
                    thụ trong một ngày) là hai chỉ số rất quan trọng để hiểu cần bao nhiêu calo cơ thể của bạn cần mỗi ngày
                    để duy trì hoạt động và sức khỏe tốt.</span></p>

            <p><span style="font-size: 14pt;">Nếu bạn tiêu thụ nhiều calo hơn TDEE của mình, bạn sẽ tích tụ mỡ và tăng cân.
                    Nếu bạn tiêu thụ ít calo hơn TDEE của mình, bạn sẽ đốt cháy mỡ và giảm cân. Vì vậy, việc hiểu BMR và
                    TDEE của bạn là rất quan trọng để bạn có thể lập kế hoạch cho chế độ ăn uống và luyện tập phù hợp để đạt
                    được mục tiêu cân nặng và sức khỏe của mình.</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Ngoài ra, việc hiểu chỉ số BMR và TDEE cũng giúp bạn đánh giá mức độ sức khỏe
                    của mình và giúp bạn cân bằng lượng calo tiêu thụ để đảm bảo cơ thể được cung cấp đủ năng lượng cho các
                    hoạt động hàng ngày mà không quá tiêu thụ calo và gây ra các vấn đề sức khỏe.</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Thêm vào đó, hiểu các chỉ số này cũng giúp bạn đánh giá được hiệu quả của các
                    chế độ ăn uống và luyện tập của mình. Nếu bạn đang giảm cân nhưng không thấy kết quả, có thể do bạn tiêu
                    thụ quá nhiều calo hoặc không đủ hoạt động vận động. Ngược lại, nếu bạn đang tăng cân nhưng không muốn,
                    có thể do bạn tiêu thụ quá nhiều calo hoặc không đủ hoạt động vận động.</span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Vì vậy, việc hiểu BMR và TDEE là rất quan trọng để bạn có thể quản lý sức
                    khỏe và cân nặng của mình. Nếu bạn muốn tính toán chỉ số BMR và TDEE, có thể tham khảo các <a
                        href="https://healthyeating.shop/cong-cu-tinh-bmr-va-tdee/"><strong>công cụ của Healthy
                            Eating</strong></a> đấy!</span></p>

            <p>&nbsp;</p>

            <h2><span style="font-size: 18pt; color: #008000;"><strong>Lời Kết</strong></span></h2>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Tính toán BMR và TDEE là rất quan trọng để hiểu cần bao nhiêu calo cho cơ thể
                    của bạn. Việc tiêu thụ quá nhiều hoặc quá ít calo có thể dẫn đến các vấn đề sức khỏe và cân nặng không
                    mong muốn. Tuy nhiên, nên nhớ rằng tính toán này chỉ là một chỉ số tham khảo. Các yếu tố khác như giới
                    tính, độ tuổi và cơ địa cũng có thể ảnh hưởng đến nhu cầu calo của bạn. </span></p>

            <p>&nbsp;</p>

            <p><span style="font-size: 14pt;">Nếu bạn cần hỗ trợ về chế độ ăn uống và luyện tập, bạn có thể tham khảo qua
                    các<a href="https://healthyeating.shop/category_package/goi-an-giam-can/"><strong> gói ăn giảm cân của
                            nhà Healthy Eating</strong></a> nhé!</span></p>

        </div>
    </div>
    </div>
    <!-- Contact End -->

    </div>

    <script>
        let heightUser = document.querySelector('#height_user');
        let weightUser = document.querySelector('#weight_user');
        let ageUser = document.querySelector('#age_user');
        let genderUser = document.querySelector('#gender_user');
        let optionPracticeUser = document.querySelector('#option_practice_user');
        let ResultBmr = document.querySelector('.result_bmr');
        let ResultTdee = document.querySelector('.result_tdee');

        function resultBMR() {
            if (genderUser.value == "Nam") {
                let bmr = (10 * weightUser.value) + (6.25 * heightUser.value) - (5 * ageUser.value) + 5;
                let tdee = bmr * optionPracticeUser.value;
                ResultBmr.value = bmr;
                ResultTdee.value = tdee;
            } else if (genderUser.value == "Nữ") {
                let bmr = (10 * weightUser.value) + (6.25 * heightUser.value) - (5 * ageUser.value) - 161;
                let tdee = bmr * optionPracticeUser.value;
                ResultBmr.value = bmr;
                ResultTdee.value = tdee;
            }

        }
    </script>
@endsection
