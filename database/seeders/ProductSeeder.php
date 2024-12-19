<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = array(
            array('id' => '1', 'supplier_id' => NULL, 'sku' => NULL, 'name' => 'Cookies Hạnh Nhân', 'slug' => 'cookies-hanh-nhan', 'img' => 'products/1734603577_6763f339597c5.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<h2><strong>B&Aacute;NH COOKIE HẠNH NH&Acirc;N NGUY&Ecirc;N C&Aacute;M 3 VỊ HEALTHY - ĂN NGON KH&Ocirc;NG LO VỀ D&Aacute;NG</strong></h2>
      
      <p>Với c&ocirc;ng thức độc quyền sử dụng&nbsp;<strong>bột m&igrave; nguy&ecirc;n c&aacute;m</strong>&nbsp;v&agrave;&nbsp;<strong>bột hạnh nh&acirc;n tự nhi&ecirc;n</strong>, Hebekery tự h&agrave;o giới thiệu&nbsp; hương vị Cookie Độc Lạ với&nbsp;<strong>topping custom</strong>!💕 Đ&acirc;y kh&ocirc;ng chỉ l&agrave; m&oacute;n&nbsp;<strong>ăn vặt ngon miệng</strong>&nbsp;m&agrave; c&ograve;n l&agrave; sự kết hợp tinh tế giữa nguy&ecirc;n liệu cao cấp v&agrave; dinh dưỡng ho&agrave;n hảo, gi&uacute;p bạn&nbsp;<strong>giữ d&aacute;ng, chăm s&oacute;c sức khỏe</strong>&nbsp;mỗi ng&agrave;y.</p>
      
      <h3><strong>Tại Sao N&oacute;i B&aacute;nh Cookie Hạnh Nh&acirc;n Nguy&ecirc;n C&aacute;m Nh&agrave; Hebekery &quot;Đ&aacute;ng Đồng Tiền B&aacute;t Gạo&quot;?</strong></h3>
      
      <p>Đ&oacute; l&agrave; v&igrave; b&ecirc;n cạnh sự cuốn h&uacute;t về hương vị, b&aacute;nh Cookie Hebekery c&ograve;n được l&agrave;m từ&nbsp;<strong>bột m&igrave; nguy&ecirc;n c&aacute;m</strong>&nbsp;gi&agrave;u dưỡng chất v&agrave;&nbsp;<strong>bột hạnh nh&acirc;n tự nhi&ecirc;n</strong>, b&aacute;nh kh&ocirc;ng chỉ gi&uacute;p cung cấp năng lượng m&agrave; c&ograve;n mang lại nhiều lợi &iacute;ch dinh dưỡng như:</p>
      
      <ul>
          <li>
          <p><em><strong>Carb chậm</strong></em><em>&nbsp;</em>c&ugrave;ng h&agrave;m lượng chất xơ dồi d&agrave;o gi&uacute;p bạn&nbsp;<em>no l&acirc;u</em>&nbsp;hơn, đồng thời&nbsp;<em>giảm cảm gi&aacute;c th&egrave;m ăn</em>.</p>
          </li>
          <li>
          <p><strong>Protein thực vật</strong>&nbsp;từ c&aacute;c&nbsp;<strong>nguy&ecirc;n liệu tự nhi&ecirc;n</strong>&nbsp;th&uacute;c đẩy trao đổi chất v&agrave; hỗ trợ&nbsp;<em>đốt ch&aacute;y năng lượng nhanh hơn</em>, gi&uacute;p bạn duy tr&igrave; năng lượng trong suốt cả ng&agrave;y, đặc biệt l&agrave; trong c&aacute;c buổi tập luyện.</p>
          </li>
      </ul>
      
      <p><img alt="Tại Sao Nói Bánh Cookie Hạnh Nhân Nguyên Cám Nhà Hebekery &quot;Đáng Đồng Tiền Bát Gạo&quot;?" src="https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-ljl6f43wtfyabc.webp" /></p>
      
      <p><em>Mời bạn t&igrave;m hiểu th&ecirc;m:&nbsp;</em><em><a href="https://www.vista.gov.vn/vi/news/khoa-hoc-doi-song/protein-dong-vat-va-protein-thuc-vat-loai-nao-tot-hon-6636.html">Protein động vật v&agrave; protein thực vật - Loại n&agrave;o tốt hơn?</a></em></p>
      
      <p>Kh&ocirc;ng chỉ dừng lại ở đ&oacute;, những th&agrave;nh phần tự nhi&ecirc;n cao cấp c&ograve;n mang đến nhiều c&ocirc;ng dụng đ&aacute;ng kinh ngạc cho sức khỏe v&agrave; l&agrave;n da của bạn, điển h&igrave;nh l&agrave; ca cao:</p>
      
      <ul>
          <li>
          <p>Th&uacute;c đẩy trao đổi chất, hỗ trợ qu&aacute; tr&igrave;nh&nbsp;<strong>giảm c&acirc;n v&agrave; giữ d&aacute;ng</strong>&nbsp;hiệu quả.</p>
          </li>
          <li>
          <p><strong>Giảm căng thẳng</strong>&nbsp;v&agrave; gi&uacute;p tinh thần&nbsp;<strong>tỉnh t&aacute;o</strong>&nbsp;hơn.</p>
          </li>
          <li>
          <p>Cải thiện l&agrave;n da,&nbsp;<strong>gi&uacute;p da s&aacute;ng mịn, căng b&oacute;ng tự nhi&ecirc;n</strong>.</p>
          </li>
          <li>
          <p>Đặc biệt, ca cao c&ograve;n c&oacute; thể&nbsp;<strong>giảm đau bụng trong c&aacute;c ng&agrave;y &quot;đ&egrave;n đỏ&quot;</strong>&nbsp;cho chị em phụ nữ, mang lại sự dễ chịu v&agrave; thoải m&aacute;i.</p>
          </li>
      </ul>
      
      <h3><strong>B&ugrave;ng Nổ Với &nbsp;Hương Vị &ldquo;Ngọt Ng&agrave;o Một C&aacute;ch Tự Nhi&ecirc;n&rdquo; Của B&aacute;nh Cookie Hạnh Nh&acirc;n Nguy&ecirc;n C&aacute;m Nh&agrave; HEBEKERY</strong></h3>
      
      <p>🍫&nbsp;<strong>DARK CHOCO</strong>: Hương vị đậm đ&agrave;, quyến rũ của&nbsp;<em><strong>Cacao Trinitario nguy&ecirc;n chất</strong></em>&nbsp;&ndash; thuộc top 10% loại cacao ngon nhất thế giới.</p>
      
      <p><img alt="dark choco" src="https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-ljl6f43wp88yff.webp" /></p>', 'description_short' => '<p>🍪 COOKIES HẠNH NH&Acirc;N NGUY&Ecirc;N C&Aacute;M CHOCO CHIPS&nbsp;DARK CHOCO</p>
      
      <p>- B&iacute; Quyết Healthy cho c&aacute;c chị em, c&aacute;c Mom nh&agrave; m&igrave;nh Phi&ecirc;n bản Cookies mới của nh&agrave; Hebekery&nbsp;</p>
      
      <p>&nbsp;Hương Vị Si&ecirc;u Cuốn cực chiều l&ograve;ng c&aacute;c Mom nh&agrave; m&igrave;nh đang thai ngh&eacute;n cũng như th&egrave;m ngọt 🍫 DARK CHOCO&nbsp;</p>', 'quantity' => NULL, 'view' => '23', 'manufacture_date' => NULL, 'expiry_date' => NULL, 'status' => '1', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-19 17:19:58', 'deleted_at' => NULL),
            array('id' => '4', 'supplier_id' => '14', 'sku' => 'SP157866', 'name' => 'Bánh Ngói Hạnh Nhân Ăn Kiêng Siêu Hạt Keto Hộp Tiện Lợi 160g', 'slug' => 'banh-ngoi-hanh-nhan-an-kieng-sieu-hat-keto-hop-tien-loi-160g', 'img' => 'products/1732271495_67405d87071b9.jpg', 'price_regular' => '149000', 'price_sale' => '129000', 'description' => '<h1><strong>B&Aacute;NH NG&Oacute;I HẠNH NH&Acirc;N SI&Ecirc;U HẠT ĂN KI&Ecirc;NG CHUẨN KETO HEBEKERY BY HEBE</strong></h1>
      
                <p>Bạn l&agrave; t&iacute;n đồ của chế độ ăn&nbsp;<strong>Keto, Eat Clean</strong>&nbsp;hay đơn giản chỉ muốn t&igrave;m kiếm một m&oacute;n ăn vặt l&agrave;nh mạnh?&nbsp;<a href="https://hebekery.vn/banh-ngoi-hanh-nhan-an-kieng-sieu-hat-keto-hop-tien-loi-160g">B&aacute;nh ng&oacute;i hạnh nh&acirc;n Hebekery</a>&nbsp;sẽ l&agrave;m bạn h&agrave;i l&ograve;ng với hương vị thơm ngon, gi&ograve;n rụm c&ugrave;ng th&agrave;nh phần tự nhi&ecirc;n, ho&agrave;n to&agrave;n kh&ocirc;ng chứa bột m&igrave;. H&atilde;y c&ugrave;ng Hebekery tận hưởng những gi&acirc;y ph&uacute;t ẩm thực tuyệt vời với b&aacute;nh ng&oacute;i hạnh nh&acirc;n si&ecirc;u hạt m&agrave; kh&ocirc;ng lo ngại về c&acirc;n nặng nh&eacute;!</p>
      
                <h2><strong>B&aacute;nh ng&oacute;i hạnh nh&acirc;n nh&agrave; Hebekery l&agrave;m từ nguy&ecirc;n liệu g&igrave; m&agrave; ngon vậy!</strong></h2>
      
                <p>B&aacute;nh ng&oacute;i hạnh nh&acirc;n nh&agrave; Hebekery l&agrave;m ho&agrave;n to&agrave;n từ&nbsp;<strong>bột hạnh nh&acirc;n tự nhi&ecirc;n</strong>&nbsp;v&agrave;&nbsp;<strong>kh&ocirc;ng chứa bột m&igrave; trắng</strong>. Những l&aacute;t hạnh nh&acirc;n tươi c&ugrave;ng với&nbsp;<strong>hạt b&iacute; gi&ograve;n rụm</strong>&nbsp;phủ đầy bề mặt b&aacute;nh, nướng hai lần gi&uacute;p b&aacute;nh ng&oacute;i đạt được độ gi&ograve;n ho&agrave;n hảo. Mỗi miếng b&aacute;nh ng&oacute;i đều đậm vị&nbsp;<strong>bơ cao cấp</strong>&nbsp;cực thơm v&agrave; b&eacute;o. M&oacute;n b&aacute;nh ng&oacute;i si&ecirc;u hạt n&agrave;y kh&ocirc;ng chỉ ngon m&agrave; c&ograve;n ph&ugrave; hợp với chế độ&nbsp;<strong>ăn ki&ecirc;ng</strong>,&nbsp;<strong>Keto</strong>,&nbsp;<strong>Das</strong>, v&agrave;&nbsp;<strong>Eatclean</strong>&nbsp;nữa ạ!<img alt="Không bột mỳ trắng" src="https://bizweb.dktcdn.net/100/415/009/products/vn-11134207-7r98o-lrczke9cru10aa-jpeg.jpg?v=1725853316560" /></p>
      
                <p><em>Bạn c&oacute; thể t&igrave;m hiểu th&ecirc;m về c&aacute;c chế độ ăn ki&ecirc;ng&nbsp;<a href="https://nhathuoclongchau.com.vn/bai-viet/tong-hop-10-che-do-an-giam-can-duoc-nhieu-nguoi-ap-dung-nhat.html">tại đ&acirc;y</a>.</em></p>
      
                <h2><strong>Lợi &iacute;ch của b&aacute;n ng&oacute;i hạnh nh&acirc;n chuẩn ăn ki&ecirc;ng&nbsp;</strong></h2>
      
                <p>Tại sao b&aacute;nh ng&oacute;i hạnh nh&acirc;n nh&agrave; Hebe c&oacute; thể gi&uacute;p bạn c&oacute; được một l&agrave;n da căng mọng, tươi trẻ như những c&ocirc; g&aacute;i H&agrave;n Quốc? Điều đ&oacute; ch&iacute;nh l&agrave; nhờ h&agrave;m lượng vitamin E v&agrave; C dồi d&agrave;o, b&aacute;nh kh&ocirc;ng chỉ gi&uacute;p bạn c&oacute; một l&agrave;n da khỏe mạnh m&agrave; c&ograve;n bảo vệ tim mạch.&nbsp;Hơn thế nữa, b&aacute;nh ng&oacute;i hạnh nh&acirc;n ăn ki&ecirc;ng c&ograve;n chứa&nbsp;<strong>chất xơ dồi d&agrave;o từ hạt</strong>&nbsp;gi&uacute;p bạn&nbsp;<strong>no l&acirc;u</strong>&nbsp;hơn, c&ograve;n&nbsp;<strong>protein thực vật l&agrave;nh mạnh</strong>&nbsp;lại hỗ trợ&nbsp;<strong>qu&aacute; tr&igrave;nh ăn ki&ecirc;ng</strong>&nbsp;hiệu quả hơn nhiều đ&oacute; ạ! Đặc biệt, b&aacute;nh ng&oacute;i hạnh nh&acirc;n si&ecirc;u hạt nh&agrave; Hebe c&ograve;n l&agrave; &#39;vũ kh&iacute;&#39; đốt ch&aacute;y calo hiệu quả, gi&uacute;p bạn tự tin hơn với v&oacute;c d&aacute;ng thon gọn.&nbsp;</p>
      
                <ul>
                  <li>
                  <p><strong>Gi&agrave;u vitamin E</strong>: Gi&uacute;p da căng mịn, hồng h&agrave;o từ b&ecirc;n trong.</p>
                  </li>
                  <li>
                  <p><strong>Vitamin C</strong>: Hỗ trợ l&agrave;m chậm qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a da.</p>
                  </li>
                  <li>
                  <p><strong>Bảo vệ tim mạch</strong>: Gi&uacute;p tr&aacute;i tim khỏe mạnh tự nhi&ecirc;n.</p>
                  </li>
                  <li>
                  <p><strong>Hỗ trợ ăn ki&ecirc;ng bằng c&aacute;ch tăng tốc đốt ch&aacute;y năng lượng</strong>: Gấp đ&ocirc;i hiệu quả ngay cả khi nghỉ ngơi.</p>
                  </li>
                  <li>
                  <p><strong>Chứa nhiều chất xơ v&agrave; protein thực vật</strong>: Gi&uacute;p no l&acirc;u v&agrave; hỗ trợ ăn ki&ecirc;ng l&agrave;nh mạnh.<img alt="Giàu vitamin C và E" src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lrczke9cqfgk43" /></p>
                  </li>
                </ul>
      
                <p>B&aacute;nh c&ograve;n cực kỳ&nbsp;<strong>tiện lợi</strong>&nbsp;để mang đi l&agrave;m bữa phụ hay bữa s&aacute;ng nhẹ nh&agrave;ng, gi&agrave;u dinh dưỡng. C&aacute;c bạn tập gym, vận động vi&ecirc;n, hay d&acirc;n văn ph&ograve;ng đều c&oacute; thể thưởng thức b&aacute;nh ng&oacute;i hạnh nh&acirc;n nh&agrave; Hebe m&agrave; kh&ocirc;ng lo tăng c&acirc;n đ&acirc;u ạ.</p>
      
                <p><strong>MUA B&Aacute;NH NG&Oacute;I HẠNH NH&Acirc;N ĂN KI&Ecirc;NG NGAY TH&Ocirc;I!</strong></p>
      
                <p>Đừng bỏ lỡ cơ hội trải nghiệm ngay&nbsp;<strong>[HỘP TIỆN LỢI] B&aacute;nh Ng&oacute;i Hạnh Nh&acirc;n Si&ecirc;u Hạt Ăn Ki&ecirc;ng Chuẩn Keto</strong>&nbsp;từ Hebekery để chăm s&oacute;c sức khỏe v&agrave; sắc đẹp mỗi ng&agrave;y nh&eacute;. H&atilde;y đặt mua ngay sản phẩm n&agrave;y tr&ecirc;n website&nbsp;<strong>Hebekery.vn</strong>&nbsp;hoặc tại&nbsp;<strong>Shopee</strong>,&nbsp;<strong>Lazada</strong>&nbsp;để được giao h&agrave;ng tận nơi với nhiều ưu đ&atilde;i hấp dẫn nh&eacute;!</p>', 'description_short' => '<p>Ăn&nbsp;<strong>b&aacute;nh ng&oacute;i</strong>&nbsp;mỗi ng&agrave;y mang lại nhiều lợi &iacute;ch cho chị em:</p>
      
                <p>✨&nbsp;<strong>Gi&agrave;u vitamin E</strong>&nbsp;&ndash; Gi&uacute;p da hồng h&agrave;o, căng mịn từ b&ecirc;n trong.<br />
                ✨&nbsp;<strong>Dồi d&agrave;o vitamin C</strong>&nbsp;&ndash; Hỗ trợ l&agrave;m chậm qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a da.<br />
                ✨&nbsp;<strong>Tốt cho tim mạch</strong>&nbsp;&ndash; Gi&uacute;p duy tr&igrave; tr&aacute;i tim khỏe mạnh tự nhi&ecirc;n.<br />
                ✨&nbsp;<strong>Đốt ch&aacute;y năng lượng hiệu quả</strong>&nbsp;&ndash; Tăng tốc độ chuyển h&oacute;a gấp đ&ocirc;i, ngay cả khi nghỉ ngơi.</p>
      
                <p>&nbsp;</p>', 'quantity' => '41', 'view' => '5', 'manufacture_date' => NULL, 'expiry_date' => '2025-03-07', 'status' => '0', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-12-07 13:50:52', 'deleted_at' => NULL),
            array('id' => '5', 'supplier_id' => '12', 'sku' => NULL, 'name' => 'Bánh Thuyền Siêu Hạt Dinh Dưỡng', 'slug' => 'banh-thuyen-sieu-hat-dinh-duong', 'img' => 'products/1732272143_6740600f45158.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p><strong>B&aacute;nh thuyền mix si&ecirc;u hạt dinh dưỡng</strong>&nbsp;l&agrave; một sản phẩm v&ocirc; c&ugrave;ng hấp dẫn của thương hiệu Vigonuts. Với nguồn nguy&ecirc;n liệu chất lượng cao v&agrave; quy tr&igrave;nh sản xuất kh&eacute;p k&iacute;n, sản phẩm đ&atilde; chinh phục h&agrave;ng ng&agrave;n người ti&ecirc;u d&ugrave;ng kh&ocirc;ng chỉ bởi vị ngon m&agrave; c&ograve;n bởi gi&aacute; trị dinh dưỡng.</p>
      
                <p><img alt="" src="https://vigonuts.com.vn/wp-content/uploads/2022/11/banh-thuyen-sieu-hat-200gr.jpg" style="height:1000px; width:1000px" /></p>
      
                <h3>Đặc điểm nổi bật của sản phẩm</h3>
      
                <p>B&aacute;nh thuyền mix si&ecirc;u hạt Vigonuts được chế biến từ mật ong tự nhi&ecirc;n, mạch nha gi&agrave;u chất xơ v&agrave; c&aacute;c loại hạt dinh dưỡng như hạnh nh&acirc;n, hạt điều, nho kh&ocirc;&hellip; Những th&agrave;nh phần n&agrave;y kh&ocirc;ng chỉ mang lại hương vị đậm đ&agrave; m&agrave; c&ograve;n cung cấp năng lượng, dinh dưỡng cần thiết cho cơ thể.</p>
      
                <p>B&aacute;nh thuyền mix si&ecirc;u hạt dinh dưỡng l&agrave; m&oacute;n ăn vặt kho&aacute;i khẩu của c&aacute;c chị em trong những l&uacute;c rảnh rỗi d&ugrave; l&agrave; mưa hay nắng d&ugrave; l&agrave; ở nh&agrave; hay đi chơi đều th&iacute;ch hợp mang theo b&ecirc;n người.</p>
      
                <p>B&aacute;nh mix si&ecirc;u hạt Vigonuts được ph&acirc;n loại v&agrave; kiểm tra tỉ mỉ trước khi đưa v&agrave;o chế biến v&agrave; đ&oacute;ng g&oacute;i. C&aacute;c loại hạt phải đảm bảo: kh&ocirc;ng bị s&acirc;u, mốc, kh&ocirc;ng m&ugrave;i dầu &ocirc;i, nguy&ecirc;n liệu phải lu&ocirc;n mới.</p>
      
                <p>B&aacute;nh được mix với đế b&aacute;nh mỏng gi&ograve;n kết hợp với độ ngậy, thơm, b&ugrave;i của hạt điều. Vị ngọt thanh của nho v&agrave; gi&ograve;n, b&eacute;o của hạnh nh&acirc;n tạo n&ecirc;n một hương vị vừa gi&ograve;n vừa ngon m&agrave; kh&ocirc;ng lo bị ng&aacute;n.</p>
      
                <p>Việc mix c&aacute;c loại hạt cẩn thận tạo n&ecirc;n sự đa dạng về vị cũng như texture, từ hạt gi&ograve;n gi&ograve;n đến hạt b&eacute;o ngọt, tạo n&ecirc;n trải nghiệm ẩm thực độc đ&aacute;o v&agrave; đầy hứng khởi.</p>
      
                <p><img alt="" src="https://vigonuts.com.vn/wp-content/uploads/2022/11/banh-thuyen-sieu-hat-200gr-2-1.jpg" style="height:1000px; width:1000px" /></p>
      
                <h3>C&ocirc;ng dụng của sản phẩm</h3>
      
                <p>Sản phẩm b&aacute;nh thuyền hạt dinh dưỡng Vigonuts gi&uacute;p bổ sung nguồn năng lượng cho hoạt động trong ng&agrave;y. Đồng thời l&agrave; m&oacute;n ăn vặt rất ngon v&agrave; gi&agrave;u dinh dưỡng. Dưới đ&acirc;y l&agrave; một số c&ocirc;ng dụng nổi bật của sản phẩm:</p>
      
                <p>&ndash; Hỗ trợ ăn ki&ecirc;ng v&agrave; giảm c&acirc;n hiệu quả.</p>
      
                <p>&ndash; Gi&uacute;p kiểm so&aacute;t lượng đường v&agrave; mỡ trong m&aacute;u.</p>
      
                <p>&ndash; Cung cấp chất chống oxy h&oacute;a, tốt cho l&agrave;n da.</p>
      
                <p>&ndash; Hỗ trợ sức khỏe tim mạch.</p>
      
                <p>&ndash; Cải thiện hệ ti&ecirc;u h&oacute;a, tăng cường sức khỏe của ruột.</p>
      
                <p>&ndash; Đặc biệt ph&ugrave; hợp cho phụ nữ mang thai v&agrave; người bị tiểu đường.</p>
      
                <p>Với những t&iacute;nh năng đặc biệt n&agrave;y, b&aacute;nh thuyền mix si&ecirc;u hạt dinh dưỡng Vigonuts kh&ocirc;ng chỉ l&agrave; một m&oacute;n ăn vặt ngon m&agrave; c&ograve;n l&agrave; một lựa chọn th&ocirc;ng minh để bổ sung dinh dưỡng h&agrave;ng ng&agrave;y.</p>
      
                <p><img alt="" src="https://vigonuts.com.vn/wp-content/uploads/2022/11/banh-thuyen-sieu-hat-200gr-1.jpg" style="height:1000px; width:1000px" /></p>
      
                <h3>Hướng dẫn sử dụng</h3>
      
                <p>Đơn giản v&agrave; tiện lợi, chỉ cần mở g&oacute;i v&agrave; thưởng thức trực tiếp v&agrave;o mỗi bữa s&aacute;ng hoặc bữa phụ. Bạn cũng c&oacute; thể kết hợp b&aacute;nh với tr&aacute;i c&acirc;y, sữa chua hoặc sữa tươi để tăng th&ecirc;m hương vị v&agrave; dinh dưỡng.</p>
      
                <p>Bảo quản sản phẩm tốt nhất trong ngăn m&aacute;t của tủ lạnh để đảm bảo độ tươi ngon v&agrave; an to&agrave;n cho sức khỏe.</p>
      
                <p><strong>LƯU &Yacute;</strong></p>
      
                <p>&ndash; Kh&ocirc;ng sử dụng sản phẩm nếu c&oacute; biến đổi về m&agrave;u sắc hoặc m&ugrave;i vị.</p>
      
                <p>&ndash; Ngưng sử dụng khi bị dị ứng với bất k&igrave; th&agrave;nh phần n&agrave;o của sản phẩm</p>
      
                <p>Với nguồn nguy&ecirc;n liệu chất lượng, c&ocirc;ng dụng tốt cho sức khỏe v&agrave; hương vị độc đ&aacute;o,<strong>&nbsp;b&aacute;nh thuyền mix si&ecirc;u hạt dinh dưỡng Vigonuts</strong>&nbsp;chắc chắn sẽ l&agrave; một sản phẩm kh&ocirc;ng thể thiếu trong thực đơn h&agrave;ng ng&agrave;y của bạn.</p>', 'description_short' => '<p>Thương hiệu: Vigonuts</p>
      
                <p>Xuất xứ: Việt Nam</p>
      
                <p>Khối lượng: 200gr</p>
      
                <p>Th&agrave;nh phần: Mật ong, Mạch nha v&agrave; c&aacute;c loại hạt dinh dưỡng cao cấp nhất.</p>
      
                <p>Hạn sử dụng: 6 th&aacute;ng kể từ ng&agrave;y sản xuất</p>
      
                <p>Ng&agrave;y sản xuất: In tr&ecirc;n bao b&igrave; sản phẩm</p>', 'quantity' => NULL, 'view' => '1', 'manufacture_date' => NULL, 'expiry_date' => '2025-03-07', 'status' => '1', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-12-07 13:50:59', 'deleted_at' => NULL),
            array('id' => '6', 'supplier_id' => '15', 'sku' => NULL, 'name' => 'Thanh Hạt Muối Hồng Dinh Dưỡng 114Kcal', 'slug' => 'thanh-hat-muoi-hong-dinh-duong-114kcal', 'img' => 'products/1732273116_674063dc44e64.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>THANH NĂNG LƯỢNG SI&Ecirc;U HẠT MUỐI HỒNG by HEBEKERY - Nguồn năng lượng #healthy v&agrave; tiện lợi d&agrave;nh cho c&aacute;c c&ocirc; N&agrave;ng c&ocirc;ng sở!</p>
      
                <p>&nbsp;</p>
      
                <p>🕘 Bận rộn khiến chị em m&igrave;nh ng&agrave;y c&agrave;ng &iacute;t c&oacute; thời gian chuẩn bị những m&oacute;n ăn ngon m&agrave; vẫn phải đảm bảo đầy đủ dinh dưỡng th&igrave; THANH HẠT DINH DƯỠNG ch&iacute;nh l&agrave; trợ thủ đắc lực cho chị em nh&agrave; m&igrave;nh đ&acirc;y!!!!!!</p>
      
                <p>&nbsp;</p>
      
                <p>✨ Tiện lợi chị em #Eatclean c&oacute; thể mang đi bất cứ đ&acirc;u v&agrave; ăn bất cứ khi n&agrave;o - chuẩn &#39;Snack Healthy&#39; gi&uacute;p chị em c&oacute; v&oacute;c d&aacute;ng xinh đẹp dễ d&agrave;ng hơn rất nhiều!!</p>
      
                <p>&nbsp;</p>
      
                <p>THANH HẠT DINH DƯỠNG của ch&uacute;ng m&igrave;nh c&oacute; g&igrave; đặc biệt thế nhỉ?&nbsp;</p>
      
                <p>&nbsp;</p>
      
                <p>✔️ 114Kcal/Thanh - đủ năng lượng để l&agrave;m bữa phụ trước 30&#39; cho c&aacute;c buổi tập</p>
      
                <p>✔️ Dễ d&agrave;ng kiểm so&aacute;t lượng calo nạp v&agrave;o nhờ số lượng thanh được chia nhỏ!</p>
      
                <p>✔️ Gi&agrave;u Protein v&agrave; Chất Xơ tốt cho cơ v&agrave; hỗ trợ qu&aacute; tr&igrave;nh giữ d&aacute;ng của chị em hiệu quả</p>
      
                <p>&nbsp;</p>
      
                <p>C&Aacute;CH SỬ DỤNG:&nbsp;</p>
      
                <p>-Chỉ cần 1 thanh (114Kcal) trước 30&#39; l&agrave; c&aacute;c chị em c&oacute; nguồn calories đủ để chuẩn bị cho c&aacute;c buổi tập hoặc c&aacute;c hoạt động thể thao rồi nhen!&nbsp;</p>
      
                <p>&nbsp;</p>
      
                <p>-Những l&uacute;c cơn đ&oacute;i ập đến bất chợt th&igrave; THANH HẠT ch&iacute;nh l&agrave; người bạn kh&ocirc;ng thể thiếu để chị em m&igrave;nh vượt qua cơn đ&oacute;i v&agrave; tập trung hơn khi l&agrave;m việc đ&oacute; ạ!</p>
      
                <p>&nbsp;</p>
      
                <p>RẤT PH&Ugrave; HỢP:</p>
      
                <p>- Ăn Ki&ecirc;ng</p>
      
                <p>- Eatclean</p>
      
                <p>- Keto / Low Carb / Das</p>
      
                <p>- Fitness&nbsp;</p>
      
                <p>&nbsp;</p>
      
                <p>C&Aacute;CH BẢO QUẢN</p>
      
                <p>-Bảo quản nơi ngăn m&aacute;t tủ lạnh để ăn được gi&ograve;n hơn.</p>
      
                <p>&nbsp;</p>
      
                <p>HẠN SỬ DỤNG</p>
      
                <p>-9 th&aacute;ng kể từ ng&agrave;y sản xuất.</p>
      
                <p>&nbsp;</p>
      
                <p>CAM KẾT&nbsp;</p>
      
                <p>- Nguy&ecirc;n liệu c&oacute; nguồn gốc, xuất xứ r&otilde; r&agrave;ng.</p>
      
                <p>- Thanh hạt lu&ocirc;n được nướng mới v&agrave; ra l&ograve; mỗi ng&agrave;y</p>
      
                <p>- Đạt chứng nhận chuẩn quy tr&igrave;nh sản xuất HACCP</p>
      
                <p>- Đạt chứng nhận ATTVSTP ti&ecirc;u chuẩn ISO:22000</p>
      
                <p>&nbsp;</p>
      
                <p>Inbox ngay cho ch&uacute;ng m&igrave;nh để được tư vấn tất tần tật về chế độ dinh dưỡng v&agrave; c&aacute;ch sử dụng nh&eacute;</p>
      
                <p>&nbsp;</p>
      
                <p>&nbsp;</p>
      
                <p>&nbsp;</p>
      
                <p><img src="https://down-vn.img.susercontent.com/file/vn-11134208-7r98o-lkjh78z3kakw18" /></p>', 'description_short' => '<p>✅&nbsp;Mỗi thanh 114kcal nạp&nbsp;năng lượng l&agrave;nh mạnh</p>
      
                <p>✅ 28g mỗi thanh vừa&nbsp;đủ để l&agrave;m việc, tập luyện</p>
      
                <p>✅ 6 loại hạt si&ecirc;u&nbsp;dinh dưỡng gi&ograve;n ngon, thơm b&ugrave;i</p>
      
                <p>✅&nbsp;C&oacute; thể d&ugrave;ng&nbsp;v&agrave;o bữa s&aacute;ng, bữa phụ, trước tập</p>
      
                <p>✅&nbsp;Chứa&nbsp;chất b&eacute;o tốt, kh&ocirc;ng chứa chất bảo quản</p>', 'quantity' => NULL, 'view' => '13', 'manufacture_date' => NULL, 'expiry_date' => '2025-01-07', 'status' => '1', 'created_at' => '2024-11-22 10:48:44', 'updated_at' => '2024-12-19 15:36:07', 'deleted_at' => NULL),
            array('id' => '8', 'supplier_id' => '15', 'sku' => 'SP160564', 'name' => 'Bánh Mì Đen Nguyên Cám, Healthy, Eatclean 250g', 'slug' => 'banh-mi-den-nguyen-cam-healthy-eatclean-250g', 'img' => 'products/1732618355_6745a87311c26.jpg', 'price_regular' => '153000', 'price_sale' => '135000', 'description' => '<p><strong>B&aacute;nh M&igrave; Đen Nguy&ecirc;n C&aacute;m - Healthy, Eatclean (Nướng mỗi ng&agrave;y)</strong><br />
                Chiếc b&aacute;nh m&igrave; đen nguy&ecirc;n c&aacute;m từ&nbsp;<strong>CHI&Ecirc;NG FOOD</strong>&nbsp;l&agrave; lựa chọn ho&agrave;n hảo cho những ai theo đuổi chế độ ăn uống l&agrave;nh mạnh. Được l&agrave;m từ nguy&ecirc;n liệu&nbsp;<strong>100% nguy&ecirc;n c&aacute;m tự nhi&ecirc;n</strong>, b&aacute;nh m&igrave; cung cấp h&agrave;m lượng chất xơ cao, hỗ trợ ti&ecirc;u h&oacute;a v&agrave; tạo cảm gi&aacute;c no l&acirc;u, gi&uacute;p kiểm so&aacute;t c&acirc;n nặng hiệu quả. Sản phẩm được nướng tươi mới mỗi ng&agrave;y, đảm bảo hương vị thơm ngon v&agrave; độ mềm ho&agrave;n hảo, th&iacute;ch hợp cho c&aacute;c bữa s&aacute;ng hoặc bữa phụ trong ng&agrave;y. Đặc biệt, đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho c&aacute;c thực đơn&nbsp;<strong>healthy</strong>&nbsp;v&agrave;&nbsp;<strong>eatclean</strong>.</p>
      
                <p><img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lpkbbtgh7q91a6" /></p>
      
                <hr />
                <p><strong>Bơ Đậu Phộng Kh&ocirc;ng Đường - Giảm c&acirc;n, Ăn ki&ecirc;ng</strong><br />
                Sản phẩm&nbsp;<strong>bơ đậu phộng kh&ocirc;ng đường</strong>&nbsp;của&nbsp;<strong>CHI&Ecirc;NG FOOD</strong>&nbsp;l&agrave; người bạn đồng h&agrave;nh cho mọi chế độ ăn ki&ecirc;ng. Được chế biến từ&nbsp;<strong>100% đậu phộng tự nhi&ecirc;n</strong>, bơ kh&ocirc;ng chỉ thơm ngon m&agrave; c&ograve;n giữ trọn dưỡng chất, bao gồm protein v&agrave; chất b&eacute;o l&agrave;nh mạnh. Kh&ocirc;ng chứa đường v&agrave; c&aacute;c chất phụ gia, sản phẩm ph&ugrave; hợp cho người ăn ki&ecirc;ng, người tập gym, hoặc bất kỳ ai muốn c&oacute; một chế độ ăn uống l&agrave;nh mạnh m&agrave; vẫn ngon miệng.</p>
      
                <p><img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lr136cnv0qf800" /></p>
      
                <hr />
                <p><strong>Kết hợp ho&agrave;n hảo cho bữa ăn l&agrave;nh mạnh</strong><br />
                Bộ đ&ocirc;i&nbsp;<strong>B&aacute;nh M&igrave; Đen Nguy&ecirc;n C&aacute;m</strong>&nbsp;v&agrave;&nbsp;<strong>Bơ Đậu Phộng Kh&ocirc;ng Đường</strong>&nbsp;từ&nbsp;<strong>CHI&Ecirc;NG FOOD</strong>&nbsp;ch&iacute;nh l&agrave; giải ph&aacute;p l&yacute; tưởng cho những ai đang t&igrave;m kiếm một lối sống c&acirc;n đối v&agrave; bền vững. H&atilde;y thử ngay h&ocirc;m nay để cảm nhận sự kh&aacute;c biệt! ❤️</p>', 'description_short' => '<p>❗️ Th&agrave;nh phần: Bột m&igrave; nguy&ecirc;n c&aacute;m, bột l&uacute;a mạch đen, sữa tươi, men, dầu hoa hướng dương, muối hồng, mật m&iacute;a (&iacute;t). B&aacute;nh m&igrave; đen c&oacute; h&agrave;m lượng chất xơ cao gấp 4 lần loại b&aacute;nh m&igrave; trắng th&ocirc;ng thường, &iacute;t ngọt v&agrave; &iacute;t b&eacute;o hơn. Đặc biệt b&aacute;nh m&igrave; đen c&oacute; chỉ số đường huyết trong thực phẩm thấp, rất ph&ugrave; hợp c&aacute;c chị em muốn giữ hay giảm c&acirc;n. Gi&aacute; trị dinh dưỡng trong 100g : 250 kcal - 4g Fat - 50g Carb - 10g Protein.&nbsp;</p>
      
                <p>🥪HDSD: Ăn trực tiếp hoặc th&ecirc;m đồ kẹp rau thịt đều rất ngon - Đặc biệt COMBO B&Aacute;NH M&Igrave; ĐEN + BƠ ĐẬU PHỘNG sẽ kh&ocirc;ng l&agrave;m bạn phải thất vọng.</p>
      
                <p>🥪 Hạn sử dụng của b&aacute;nh m&igrave; đen : 6 ng&agrave;y ở nơi kh&ocirc; ráo thoáng mát / 10 ng&agrave;y tủ m&aacute;t / 30 ng&agrave;y tủ đ&ocirc;ng</p>', 'quantity' => '29', 'view' => '5', 'manufacture_date' => '2024-12-07', 'expiry_date' => '2025-02-07', 'status' => '0', 'created_at' => '2024-11-26 10:52:35', 'updated_at' => '2024-12-19 15:38:43', 'deleted_at' => NULL),
            array('id' => '9', 'supplier_id' => '12', 'sku' => NULL, 'name' => 'HẠT ĐIỀU RANG MUỐI NGUYÊN LỤA BÌNH PHƯỚC', 'slug' => 'hat-dieu-rang-muoi-nguyen-lua-binh-phuoc', 'img' => 'products/1732619637_6745ad755da75.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>✅Hạt điều rang muối Mẹ r&ocirc; cam kết b&aacute;n h&agrave;ng uy t&iacute;n, chuẩn size (k&iacute;ch thước hạt), hạt mới rang gi&ograve;n, dễ tr&oacute;c lụa, đ&oacute;ng g&oacute;i cẩn thận để mang đến cho kh&aacute;ch h&agrave;ng sự h&agrave;i l&ograve;ng</p>
      
                <p>✅Hạt điều Mẹ r&ocirc; c&oacute; nhiều loại hạt để kh&aacute;ch lựa chọn 1. Loại xuất khẩu, giống cao sản: 380-410 hạt/kg(nếu bạn 100gram sẽ c&oacute; từ 38-41 hạt, nếu vượt qu&aacute; số hạt sẽ l&agrave; ph&acirc;n size kh&ocirc;ng chuẩn), đ&acirc;y l&agrave; giống ăn c&oacute; vị b&eacute;o, thơm, b&ugrave;i nhậu, h&agrave;ng xuất khẩu mẫu m&atilde; đẹp nhất, đều hạt nhất. 2. Giống điều thuần B&igrave;nh Phước : loại từ 450-520 hạt ( c&acirc;n 100gram l&ecirc;n sẽ c&oacute; 45-52 hạt t&ugrave;y đợt ) hoặc 600-650 hạt hoặc 700-750 hạt. Số hạt c&agrave;ng nhiều tr&ecirc;n mỗi kg th&igrave; hạt c&agrave;ng nhỏ v&agrave; gi&aacute; sẽ rẻ hơn, hạt to th&igrave; dễ nh&igrave;n n&ecirc;n Shop ph&acirc;n h&agrave;ng sẽ kỹ hơn &iacute;t s&acirc;u nhỏ hơn. Đ&acirc;y l&agrave; loại giống cổ c&oacute; vị ngọt, thơm, b&ugrave;i v&agrave; dễ b&oacute;c bỏ lớp lụa b&ecirc;n ngo&agrave;i nhất. Hạt vỡ c&ograve;n vỏ: Hạt vỡ sẽ mặn hơn hạt nguy&ecirc;n v&igrave; vỡ trong qu&aacute; tr&igrave;nh rang sẽ d&iacute;nh muối. Hạt vỡ Shop tầm 70% vỡ đ&ocirc;i v&agrave; 30% vỡ ba, tư</p>
      
                <p>✅QUY C&Aacute;CH Đ&Oacute;NG G&Oacute;I : T&uacute;i Zip</p>
      
                <p>✅TRỌNG LƯỢNG TỊNH: C&acirc;n cả trọng lượng bao b&igrave;: 500Gram - Kh&aacute;ch mua ăn n&ecirc;n mua t&uacute;i zip sẽ c&oacute; được nhiều điều nhất. Mua biếu mua hộp tr&ograve;n v&agrave; lon sẽ sang hơn.</p>
      
                <p>✅TI&Ecirc;U CHUẨN SẢN PHẨM - Shop c&oacute; trụ sở tại B&igrave;nh Phước, khu vực nguy&ecirc;n - Shop hỗ trợ đổi trả hoặc ho&agrave;n tiền 100% với c&aacute;c trường hợp thiếu h&agrave;ng hay h&agrave;ng bị hư hỏng do</p>
      
                <p>✅ Ng&agrave;y sản xuất : In tr&ecirc;n bao b&igrave; (ng&agrave;y sản xuất của hạt điều được t&iacute;nh từ ng&agrave;y chẻ nh&acirc;n th&ocirc; hạt điều kh&ocirc;, đ&oacute; l&agrave; l&iacute; do 1 năm chỉ c&oacute; 1 vụ điều nhưng Hạt điều rang muối lại c&oacute; h&agrave;ng mới quanh năm)</p>
      
                <p>✅Hạn sử dụng : 12 th&aacute;ng (c&ocirc;ng nghệ rang cải tiến, kh&ocirc; hạt để đảm bảo hạt dễ b&oacute;c v&agrave; dễ bảo quản</p>
      
                <p>✅QUY C&Aacute;CH Đ&Oacute;NG G&Oacute;I : HỘP TR&Ograve;N/ LON P&Eacute;T HOẶC ZIP</p>
      
                <p>✅TRỌNG LƯỢNG TỊNH: C&acirc;n cả trọng lượng bao b&igrave;: 500Gram - Kh&aacute;ch mua ăn n&ecirc;n mua t&uacute;i zip sẽ c&oacute; được nhiều điều nhất. Mua biếu mua hộp tr&ograve;n v&agrave; lon sẽ sang hơn.</p>
      
                <p>✅TI&Ecirc;U CHUẨN SẢN PHẨM - Shop c&oacute; trụ sở tại B&igrave;nh Phước, khu vực nguy&ecirc;n liệu cũng như chế biến Hạt điều, lợi thế Nguồn h&agrave;ng sạch lu&ocirc;n mới mỗi tuần. - Quy tr&igrave;nh sản xuất v&agrave; đ&oacute;ng g&oacute;i đạt chuẩn ATVSTP(c&oacute; giấy chứng nhận k&egrave;m theo). ✅CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ - Shop hỗ trợ đổi trả hoặc ho&agrave;n tiền 100% với c&aacute;c trường hợp thiếu h&agrave;ng hay h&agrave;ng bị hư hỏng do lỗi của Shop (trong v&ograve;ng 7 ng&agrave;y sau khi nhận h&agrave;ng)</p>
      
                <p>✅ Ng&agrave;y sản xuất : In tr&ecirc;n bao b&igrave; (ng&agrave;y sản xuất của hạt điều được t&iacute;nh từ ng&agrave;y chẻ nh&acirc;n th&ocirc; hạt điều kh&ocirc;, đ&oacute; l&agrave; l&iacute; do 1 năm chỉ c&oacute; 1 vụ điều nhưng Hạt điều rang muối lại c&oacute; h&agrave;ng mới quanh năm)</p>
      
                <p>✅Hạn sử dụng : 12 th&aacute;ng (c&ocirc;ng nghệ rang cải tiến, kh&ocirc; hạt để đảm bảo hạt dễ b&oacute;c v&agrave; dễ bảo quản hơn)</p>
      
                <p>✅ Bảo quản: Bảo quản k&iacute;n hơi, kh&ocirc;ng cho kh&ocirc;ng kh&iacute; ẩm v&agrave;o sẽ l&agrave;m hạt ỉu mềm kh&ocirc;ng thể tr&oacute;c lụa, sau khi khui bạn ăn ngon trong 2 th&aacute;ng, nếu bạn ăn l&acirc;u hơn h&atilde;y bảo quản tủ lạnh ngăn m&aacute;t.</p>
      
                <p>✅XUẤT XỨ : B&igrave;nh Phước Ph&acirc;n phối bởi Hộ Kinh Doanh Thực Phẩm Sạch Mẹ r&ocirc;</p>', 'description_short' => '<p>Hạn sử dụng:12 th&aacute;ng</p>
      
                <p>K&iacute;ch ứng: Kh&ocirc;ng</p>
      
                <p>Xuất xứ: Việt Nam</p>
      
                <p>Giảm c&acirc;n đặc biệt</p>
      
                <p>Kh&ocirc;ng caffeine, Kh&ocirc;ng cholesterol, Tốt cho sức khỏe, Kh&ocirc;ng đường</p>
      
                <p>Ng&agrave;y hết hạn: 06-10-2025</p>
      
                <p>T&ecirc;n tổ chức chịu tr&aacute;ch nhiệm sản xuất: Hộ Kinh Doanh Thực Phẩm Sạch Mẹ R&ocirc;</p>', 'quantity' => NULL, 'view' => '7', 'manufacture_date' => NULL, 'expiry_date' => '2026-02-07', 'status' => '1', 'created_at' => '2024-11-26 11:13:57', 'updated_at' => '2024-12-19 15:45:54', 'deleted_at' => NULL),
            array('id' => '10', 'supplier_id' => '12', 'sku' => NULL, 'name' => 'Nhân hạt óc chó tách vỏ ANNUT, hạt ngũ cốc dinh dưỡng, ăn kiêng, giảm cân', 'slug' => 'nhan-hat-oc-cho-tach-vo-annut-hat-ngu-coc-dinh-duong-an-kieng-giam-can', 'img' => 'products/1732620293_6745b0054c579.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>Hạt &oacute;c ch&oacute; t&aacute;ch vỏ ANNUT nh&acirc;n &oacute;c ch&oacute; v&agrave;ng Chile hạt ngũ cốc dinh dưỡng cho b&agrave; bầu,b&eacute;</p>
      
                <p>&nbsp;</p>
      
                <p>Nh&acirc;n hạt &oacute;c ch&oacute; v&agrave;ng Chile được l&agrave;m từ nguồn nguy&ecirc;n liệu nhập khẩu, hạt vụ mới tươi ngon. Sản phẩm được sấy theo c&ocirc;ng nghệ cao cho đầu ra hạt chất lượng, đạt độ ẩm ti&ecirc;u chuẩn, dễ t&aacute;ch vỏ hạt. Sau đ&oacute; được xử l&yacute; bảo quản lạnh kỹ lưỡng trong m&ocirc;i trường ch&acirc;n kh&ocirc;ng, chống nấm mốc.</p>
      
                <p>&nbsp;</p>
      
                <p>Tất cả sản phẩm sấy kh&ocirc; của ANNUT đều đạt chuẩn về vệ sinh an to&agrave;n thực phẩm v&agrave; kh&ocirc;ng chứa chất bảo quản, tuyệt đối an to&agrave;n cho sức khỏe người d&ugrave;ng.</p>
      
                <p>&nbsp;</p>
      
                <p>Th&ocirc;ng tin nh&acirc;n hạt &oacute;c ch&oacute; v&agrave;ng</p>
      
                <p>- Thương hiệu: ANNUT</p>
      
                <p>- Xuất xứ: Việt Nam</p>
      
                <p>- Hạn sử dụng: 6 th&aacute;ng kể từ ng&agrave;y sản xuất</p>
      
                <p>- Ng&agrave;y sản xuất: Xem tr&ecirc;n bao b&igrave; sản phẩm</p>
      
                <p><img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lstdvlz8ye9w66" /></p>
      
                <p>C&ocirc;ng dụng nh&acirc;n hạt &oacute;c ch&oacute;</p>
      
                <p>- Hạt &oacute;c ch&oacute; bổ sung vitamin B1, B2, A,E, Protein,... v&agrave; kho&aacute;ng chất cho cơ thể như canxi, phốt pho, mangan, sắt, đồng,&hellip;</p>
      
                <p>- Axit b&eacute;o Omega 3 c&oacute; trong quả &oacute;c ch&oacute; (cao gấp 5 lần c&aacute; hồi) n&ecirc;n gi&uacute;p duy tr&igrave; chất b&eacute;o cấu tr&uacute;c loại chất chiếm đến 60% bộ n&atilde;o n&ecirc;n đặc biệt rất tốt cho mẹ mang thai v&agrave; trẻ em.</p>
      
                <p>- Nh&acirc;n hạt &oacute;c ch&oacute; v&agrave;ng Chile gi&agrave;u dưỡng chất tốt cho phụ nữ mang thai v&agrave; sự ph&aacute;t triển tr&iacute; n&atilde;o ở trẻ nhỏ.</p>
      
                <p>- Sử dụng &oacute;c ch&oacute; thường xuy&ecirc;n c&oacute; t&aacute;c dụng gi&uacute;p giảm Cholesterol xấu, điều h&ograve;a huyết &aacute;p, ngăn ngừa c&aacute;c vấn đề về tim mạch, giảm nguy cơ mắc ung thư.</p>
      
                <p>- Hạt &oacute;c ch&oacute; c&ograve;n gi&uacute;p cải thiện tr&iacute; nhớ, tốt cho người bị tiểu đường.</p>
      
                <p>- Ngo&agrave;i ra, đối với l&agrave;m đẹp, &oacute;c ch&oacute; c&ograve;n c&oacute; c&ocirc;ng dụng gi&uacute;p c&aacute;c chị em cải thiện v&ograve;ng một, giảm c&acirc;n, l&agrave;m đẹp da v&agrave; t&oacute;c.</p>
      
                <p>&nbsp;</p>
      
                <p>Hướng dẫn sử dụng hạt &oacute;c ch&oacute;</p>
      
                <p>- Mẹ bầu c&oacute; thể ăn &oacute;c ch&oacute; bất cứ khi n&agrave;o m&agrave; m&igrave;nh th&iacute;ch.</p>
      
                <p>- Tốt nhất n&ecirc;n ăn v&agrave;o buổi s&aacute;ng v&agrave; buổi trưa.</p>
      
                <p>- Mỗi ng&agrave;y chỉ n&ecirc;n sử dụng 6 đến 8 quả &oacute;c ch&oacute;.</p>
      
                <p>- L&uacute;c đầu, khi mới ăn, bạn chỉ n&ecirc;n sử dụng 1-2 quả cho quen dần sau đ&oacute; mới tăng đến lượng như tr&ecirc;n.</p>
      
                <p>- N&ecirc;n sử dụng cả lớp da vỏ mỏng của quả &oacute;c ch&oacute; kh&ocirc;ng n&ecirc;n bỏ đi, lớp n&agrave;y c&oacute; chứa rất nhiều dưỡng chất cần thiết cho thai kỳ.</p>
      
                <p>- N&ecirc;n duy tr&igrave; thường xuy&ecirc;n trong qu&aacute; tr&igrave;nh mang thai để c&oacute; được hiệu quả tốt nhất.</p>
      
                <p>- N&ecirc;n nhai kỹ, ăn từ từ để cảm nhận vị b&ugrave;i, ngọt của nh&acirc;n hạt &oacute;c ch&oacute; cũng như gi&uacute;p cơ thể hấp thu tốt hơn.</p>
      
                <p>&nbsp;</p>
      
                <p>Hướng dẫn bảo quản nh&acirc;n &oacute;c ch&oacute; v&agrave;ng</p>
      
                <p>- Cho hạt &oacute;c ch&oacute; v&agrave;o trong t&uacute;i k&iacute;n, để nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh tiếp x&uacute;c với &aacute;nh nắng mặt trời.</p>
      
                <p>- Hạt &oacute;c ch&oacute; hấp thụ m&ugrave;i vị thức ăn kh&aacute; dễ d&agrave;ng, n&ecirc;n khi bảo quản trong tủ lạnh cần tr&aacute;nh xa c&aacute;c loại thực phẩm như: h&agrave;nh t&acirc;y, bắp cải hoặc c&aacute;.</p>
      
                <p>&nbsp;</p>
      
                <p>🔥CAM KẾT</p>
      
                <p>- Nguồn gốc r&otilde; r&agrave;ng từ n&ocirc;ng trại Hữu cơ, đầy đủ h&oacute;a đơn chứng từ nhập khẩu</p>
      
                <p>- Quy tr&igrave;nh chế biến đảm bảo theo Ti&ecirc;u chuẩn vệ sinh An to&agrave;n thực phẩm</p>
      
                <p>- Sản phẩm được đăng k&yacute; M&atilde; vạch v&agrave; c&ocirc;ng bố sản phẩm, dễ d&agrave;ng truy xuất nguồn gốc xuất xứ</p>
      
                <p>- Annut sẽ hỗ trợ, giải quyết mọi vấn đề về đơn h&agrave;ng Trước - Trong - Sau khi sử dụng sản phẩm với th&aacute;i độ nhiệt t&acirc;m nhất</p>
      
                <p>&nbsp;</p>
      
                <p>🔥 NGUỒN GỐC XUẤT XỨ</p>
      
                <p>Sản phẩm của C&ocirc;ng ty TNHH Thương Mại Dịch Vụ N&ocirc;ng Sản Annut</p>
      
                <p>Đ.C: Số 24 ng&otilde; 902 Kim Giang, Thanh Liệt, Thanh Tr&igrave;, H&agrave; Nội</p>', 'description_short' => '<p>Thương hiệu&nbsp;<a href="https://shopee.vn/search?brands=3467894" target="_blank">Annut</a></p>
      
                <p>K&iacute;ch ứng Kh&ocirc;ng</p>
      
                <p>Xuất xứ Việt Nam</p>
      
                <p>Ng&agrave;y hết hạn 17-08-2025</p>
      
                <p>Loại hạt Hat &oacute;c ch&oacute; v&agrave;ng nguy&ecirc;n chất</p>
      
                <p>Giảm c&acirc;n đặc biệt Kh&ocirc;ng đường, Tốt cho sức khỏe, Kh&ocirc;ng GMO, Kh&ocirc;ng gluten, Kh&ocirc;ng cholesterol</p>
      
                <p>Th&agrave;nh phần Hạt &oacute;c ch&oacute; v&agrave;ng nguy&ecirc;n chất</p>
      
                <p>T&ecirc;n tổ chức chịu tr&aacute;ch nhiệm sản xuất C&Ocirc;NG TY TNHH TM DV N&Ocirc;NG SẢN TRUNG HƯNG</p>
      
                <p>Địa chỉ tổ chức chịu tr&aacute;ch nhiệm sản xuất C&Ocirc;NG TY TNHH TM DV N&Ocirc;NG SẢN TRUNG HƯNG</p>', 'quantity' => NULL, 'view' => '4', 'manufacture_date' => NULL, 'expiry_date' => '2026-01-07', 'status' => '1', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-12-07 13:30:46', 'deleted_at' => NULL),
            array('id' => '13', 'supplier_id' => '15', 'sku' => NULL, 'name' => 'Bánh mì đen hoa cúc - Không đường - Thơm mềm - Nhiều chất Xơ', 'slug' => 'banh-mi-den-hoa-cuc-khong-duong-thom-mem-nhieu-chat-xo', 'img' => 'products/1734589592_6763bc989bf7c.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p><strong>B&aacute;nh m&igrave; đen hoa c&uacute;c - Kh&ocirc;ng đường - Thơm mềm - Nhiều chất xơ</strong></p>
      
            <p>B&aacute;nh m&igrave; đen hoa c&uacute;c l&agrave; lựa chọn ho&agrave;n hảo cho những ai y&ecirc;u th&iacute;ch hương vị tự nhi&ecirc;n v&agrave; quan t&acirc;m đến sức khỏe. Với th&agrave;nh phần kh&ocirc;ng đường, b&aacute;nh m&igrave; mang đến sự lựa chọn l&agrave;nh mạnh cho người ăn ki&ecirc;ng hoặc cần kiểm so&aacute;t đường huyết. B&aacute;nh thơm nhẹ m&ugrave;i hoa c&uacute;c, kết hợp với kết cấu mềm mịn, dễ ăn, ph&ugrave; hợp với mọi lứa tuổi. Đặc biệt, b&aacute;nh gi&agrave;u chất xơ, hỗ trợ tốt cho hệ ti&ecirc;u h&oacute;a v&agrave; mang lại cảm gi&aacute;c no l&acirc;u.</p>
      
            <p><img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lmf1bzmvhja7cf" /></p>
      
            <p>Thưởng thức b&aacute;nh m&igrave; đen hoa c&uacute;c như một bữa s&aacute;ng nhanh gọn hoặc bữa nhẹ đầy dinh dưỡng!</p>', 'description_short' => '<p>😝 B&aacute;nh m&igrave; đen hoa c&uacute;c - Thơm dịu d&agrave;ng Ngon ngỡ ng&agrave;ng m&agrave; kh&ocirc;ng tăng k&iacute;</p>
      
            <p>😍 😎 CỰC PHẨM B&aacute;nh m&igrave; đen Hoa c&uacute;c nh&agrave; Snap với th&agrave;nh phần từ bột l&uacute;a mạch đen, bột ngũ cốc, tinh hoa cam Ph&aacute;p - Chuẩn Healthy c&acirc;n mọi bữa ăn, chỉ 148 calories/100gr</p>
      
            <p>🥰 Thơm mềm, hương dịu nhẹ - B&aacute;nh m&igrave; đen Hoa c&uacute;c với gi&aacute; chỉ từ 45k/chiếc</p>', 'quantity' => NULL, 'view' => '4', 'manufacture_date' => '2024-12-07', 'expiry_date' => '2025-02-07', 'status' => '1', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-19 13:26:32', 'deleted_at' => NULL),
            array('id' => '14', 'supplier_id' => '15', 'sku' => 'SP152217', 'name' => 'Trái Cây Sấy Dẻo Không Đường 500g Mix 5 loại Dâu Tây, Kiwi, Nam Việt Quất, Xoài, Nho nhập khẩu, Hoa quả sấy dẻo', 'slug' => 'trai-cay-say-deo-khong-duong-500g-mix-5-loai-dau-tay-kiwi-nam-viet-quat-xoai-nho-nhap-khau-hoa-qua-say-deo', 'img' => 'products/1733202914_674e93e21ffc4.jpg', 'price_regular' => '209000', 'price_sale' => '113950', 'description' => '<p>TH&Ocirc;NG TIN SẢN PHẨM _ Đối tượng sử dụng: Người lớn v&agrave; trẻ em từ 18 th&aacute;ng tuổi. Phụ nữ trong thời gian mang thai v&agrave; cho con b&uacute;. Người đang theo c&aacute;c chế độ ăn ki&ecirc;ng v&agrave; c&aacute;c chế độ ăn l&agrave;nh mạnh, người ăn chay, ăn healthy, keto, eatclean/ eat clean, das, lowcarb/ low carb v&agrave; nocarb/no carb _ Th&agrave;nh phần dinh dưỡng: Vitamin B, C, E, D, K, B15, Mangan, Kali, Natri, Magie, Canxi, Folate, Protein, Chất xơ, Chất chống Oxy h&oacute;a. _ Gi&aacute; trị dinh dưỡng: 5.6g chất xơ, 2.3g Protein, 0.74g chất b&eacute;o tổng hợp, năng lượng 654Kcal, canxi 85mg _ Hướng dẫn sử dụng: D&ugrave;ng ngay kh&ocirc;ng qua chế biến. _ Bảo quản: Nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh &aacute;nh nắng trực tiếp. _ Hạn sử dụng: 6 Th&aacute;ng (sử dụng trong 30 ng&agrave;y từ khi mở nắp sản phẩm trải nghiệm hương vị tốt nhất) _</p>
      
                <p>C&aacute;c loại tr&aacute;i c&acirc;y sấy đều kh&ocirc;ng sử dụng đường trong suốt qu&aacute; tr&igrave;nh sản xuất. Mỗi loại tr&aacute;i c&acirc;y đều chứa rất nhiều vitamin v&agrave; kho&aacute;ng chất, gi&uacute;p củng cố hệ thống miễn dịch để cơ thể lu&ocirc;n khỏe mạnh, giảm cảm gi&aacute;c mệt mỏi, uể oải, thiếu sức sống. Hương vị thơm ngon, chua ngọt dễ ăn, gi&uacute;p k&iacute;ch th&iacute;ch vị gi&aacute;c v&agrave; hỗ trợ hệ ti&ecirc;u ho&aacute; hoạt động hiệu quả.</p>
      
                <p>Ph&acirc;n phối bởi: C&ocirc;ng ty TNHH thương mại tổng hợp Bắc Nam ễn Đức Cảnh, Phường T&acirc;n Mai, Quận Ho&agrave;ng Mai, Th&agrave;nh phố H&agrave; Nội</p>
      
                <p>M&aacute;ch nhỏ: Ngo&agrave;i sửa dụng ăn vặt trực tiếp , bạn cũng c&oacute; thể mix c&ugrave;ng 1 hộp sữa chua nho nhỏ v&agrave;o bữa phụ, cực kỳ ngon v&agrave; chất lượng lu&ocirc;n ạ.</p>
      
                <p>Bạn n&ecirc;n sử dụng khoảng 50g tr&aacute;i c&acirc;y sấy dẻo mỗi ng&agrave;y l&agrave; cung cấp đủ dinh dưỡng, năng lượng v&agrave; c&oacute; hiệu quả nhất bạn nh&eacute;!</p>', 'description_short' => '<p>Mix từ 5 loại tr&aacute;i c&acirc;y tươi ngon nhập khẩu: Nho Mỹ, Xo&agrave;i, Nam Việt Quất Canada, Kiwi New Zealand, D&acirc;u t&acirc;y Th&aacute;i, hoa quả sấy dẻo vừa phải đảm bảo độ mọng v&agrave; thơm nguy&ecirc;n chất...</p>
      
                <p>H&ograve;a quyện vị chua ngọt thanh nhẹ tự nhi&ecirc;n v&agrave; m&ugrave;i thơm từ tr&aacute;i c&acirc;y ch&iacute;n.</p>', 'quantity' => '90', 'view' => '5', 'manufacture_date' => NULL, 'expiry_date' => '2025-06-07', 'status' => '0', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-19 17:40:52', 'deleted_at' => NULL),
            array('id' => '15', 'supplier_id' => NULL, 'sku' => NULL, 'name' => '500G Chuối Sấy Dẻo Đặc Sản Đà Lạt, đồ ăn vặt hoa quả sấy, Mứt Chuối Sấy Dẻo, Ô mai - Mứt tết', 'slug' => '500g-chuoi-say-deo-dac-san-da-lat-do-an-vat-hoa-qua-say-mut-chuoi-say-deo-o-mai-mut-tet', 'img' => 'products/1733203543_674e965789c6e.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>Lợi &iacute;ch của 1kg chuối sấy dẻo kh&ocirc;ng đường:</p>
      
                <p>- Hỗ trợ người bị rối loạn ti&ecirc;u h&oacute;a, t&aacute;o b&oacute;n: Chất xơ trong chuối sấy gi&uacute;p nhuận tr&agrave;ng, giảm t&aacute;o b&oacute;n. Đặc biệt, chất pectin được t&igrave;m thấy trong 1kg chuối sấy dẻo hỗ trợ l&agrave;m giảm rối loạn đường ruột g&acirc;y ti&ecirc;u chảy.</p>
      
                <p>- Người dễ bị căng thẳng, đang stress: Chất kali gi&uacute;p tr&iacute; n&atilde;o hoạt động linh hoạt hơn, thư gi&atilde;n tinh thần, giảm t&igrave;nh trạng căng thẳng g&acirc;y stress</p>
      
                <p>- Người hay bị tụt đường huyết: Chất sắt c&oacute; trong chuối sấy dẻo kh&ocirc;ng đường gi&uacute;p cơ thể tr&aacute;nh được nguy cơ thiếu m&aacute;u do thiếu sắt. Người muốn tăng c&acirc;n: Sử dụng chuối sấy 1kg sau mỗi bữa ăn c&oacute; t&aacute;c dụng t&iacute;ch cực l&ecirc;n hệ ti&ecirc;u h&oacute;a. Gi&uacute;p ăn ngon hơn, ti&ecirc;u h&oacute;a thức ăn tốt hơn, hấp thụ dinh dưỡng tốt hơn n&ecirc;n gi&uacute;p tăng c&acirc;n tự nhi&ecirc;n c&oacute; kiểm so&aacute;t. 1kg chuối sấy dẻo l&agrave; m&oacute;n ăn vặt cho mọi người - mọi nh&agrave; - mọi l&uacute;c - mọi nơi - Du lịch với bạn b&egrave; h&atilde;y mang theo v&agrave;i t&uacute;i tr&aacute;i c&acirc;y sấy</p>
      
                <p>- Sử dụng 1kg chuối sấy dẻo khi đi d&atilde; ngoại cũng l&agrave; một &yacute; kiến hay cho sự tiện dụng, hấp dẫn</p>
      
                <p>- Sử dụng tr&aacute;i c&acirc;y sấy v&agrave;o bữa lỡ khi đi l&agrave;m gi&uacute;p bạn nh&acirc;m nhi. Bụng đ&oacute;i l&agrave;m việc sẽ kh&ocirc;ng t&aacute;c dụng, bạn sẽ bảo đảm c&oacute; th&ecirc;m dinh dưỡng, qua cơn bụng trống. - M&oacute;n ăn tr&aacute;ng miệng sau bữa ch&iacute;nh - Nh&acirc;m nhi chuối sấy 1kg khi ngồi t&aacute;n gẫu với bạn b&egrave; - Vừa xem phim m&agrave; nh&acirc;m nhi tr&aacute;i c&acirc;y sấy,best!</p>
      
                <p>- Sử dụng chuối sứ sấy dẻo như một m&oacute;n qu&agrave; Th&ocirc;ng tin sản phẩm 1kg chuối sấy dẻo</p>
      
                <p>- Xuất xứ: Việt Nam</p>
      
                <p>- K&iacute;ch cỡ: dạng nguy&ecirc;n tr&aacute;i</p>
      
                <p>- Th&agrave;nh phần: Chuối 100% tự nhi&ecirc;n Khối lượng tịnh: 300g - 500g /t&uacute;i zip</p>
      
                <p>HSD chuối sấy 1kg: 6 th&aacute;ng ​Bảo quản nơi tho&aacute;ng m&aacute;t (25-35 độ C). Giữ k&iacute;n miệng túi khi kh&ocirc;ng sử dụng để chuối sấy 1kg lu&ocirc;n được thơm ngon tránh gió d&acirc;̃n đ&ecirc;́n m&ecirc;̀m sản phẩm. Đ&oacute;ng k&iacute;n bịch sau khi d&ugrave;ng.</p>', 'description_short' => '<p>&nbsp;</p>
      
                <p>Chuối dẻo si&ecirc;u phẩm KH&Ocirc;NG CH&Aacute;T nh&eacute; cả nh&agrave; iu của Kemmm :))) thơm, dẻo, ngọt nhẹ nh&agrave;ng thanh tho&aacute;tttt</p>
      
                <p>Chuối sấy dẻo Trong quả chuối chứa rất nhiều vi chất dinh dưỡng bảo vệ hệ miễn dịch v&agrave; ngăn ngừa hiệu quả c&aacute;c bệnh m&atilde;n t&iacute;nh. Bởi vậy, 1-2 quả chuối tươi mỗi ng&agrave;y gi&uacute;p c&oacute; một thể trạng b&igrave;nh thường v&agrave; sức khỏe ổn định. Tương đương với 50g chuối sứ sấy dẻo để chăm s&oacute;c v&agrave; bảo vệ tốt nhất cho sức khỏe của ch&iacute;nh m&igrave;nh.</p>', 'quantity' => NULL, 'view' => '4', 'manufacture_date' => '2025-01-07', 'expiry_date' => '2025-04-19', 'status' => '1', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-19 15:43:56', 'deleted_at' => NULL),
            array('id' => '16', 'supplier_id' => '13', 'sku' => 'SP213470', 'name' => 'Trà đông trùng 7 vị thảo mộc ( Hộp 30 Tặng kèm Túi Lọc Hoặc Chai T,Tinh) Đẹp da, dễ ngủ, thanh lọc', 'slug' => 'tra-dong-trung-7-vi-thao-moc-hop-30-tang-kem-tui-loc-hoac-chai-ttinh-dep-da-de-ngu-thanh-loc', 'img' => 'products/1733551826_6753e6d2c8ba1.jpg', 'price_regular' => '199000', 'price_sale' => '135000', 'description' => '<p><strong>Tr&agrave; Đ&ocirc;ng Tr&ugrave;ng 7 Vị Thảo Mộc</strong> l&agrave; sự kết hợp tinh tế giữa đ&ocirc;ng tr&ugrave;ng hạ thảo v&agrave; 7 loại thảo mộc qu&yacute;, mang lại hương vị thanh m&aacute;t, tự nhi&ecirc;n v&agrave; lợi &iacute;ch tuyệt vời cho sức khỏe. Với hộp 30 g&oacute;i tiện dụng, sản phẩm kh&ocirc;ng chỉ gi&uacute;p thanh lọc cơ thể, hỗ trợ giấc ngủ ngon m&agrave; c&ograve;n cải thiện sắc da, mang đến vẻ đẹp tự nhi&ecirc;n từ b&ecirc;n trong.</p>
      
                <p><img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lvowp6sw62u2fc" /></p>
      
                <p>Mỗi hộp tr&agrave; đi k&egrave;m t&uacute;i lọc tiện lợi hoặc chai tinh chất, gi&uacute;p bạn dễ d&agrave;ng pha chế v&agrave; tận hưởng mọi l&uacute;c mọi nơi. Đ&acirc;y l&agrave; lựa chọn ho&agrave;n hảo để chăm s&oacute;c sức khỏe, đặc biệt ph&ugrave; hợp cho những ai y&ecirc;u th&iacute;ch lối sống l&agrave;nh mạnh. Tr&agrave; Đ&ocirc;ng Tr&ugrave;ng 7 Vị Thảo Mộc - người bạn đồng h&agrave;nh l&yacute; tưởng cho cơ thể khỏe</p>
      
                <p><img src="https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-m1if0u07j9zn9f" /></p>', 'description_short' => '<p>T&Aacute;C DỤNG</p>
      
                <p>- Tr&agrave; hỗ trợ dưỡng nhan L&agrave;m đẹp da, gi&uacute;p da mềm mại s&aacute;ng mịn</p>
      
                <p>- Tr&agrave; thanh nhiệt, hỗ trợ thải độc cho gan</p>
      
                <p>- Ngăn ngừa l&atilde;o h&oacute;a, điều h&ograve;a huyết &aacute;p, dưỡng nhan</p>
      
                <p>- Bổ kh&iacute; huyết - Giảm stress, c&acirc;n bằng t&acirc;m l&yacute;</p>
      
                <p>- Tr&agrave; thảo mộc gi&uacute;p giải độc- An thần, gi&uacute;p ngủ ngon v&agrave; s&acirc;u giấc</p>
      
                <p>- Eo thon, d&aacute;ng đẹp, giảm mỡ to&agrave;n th&acirc;n.</p>', 'quantity' => '41', 'view' => '3', 'manufacture_date' => NULL, 'expiry_date' => '2026-02-07', 'status' => '0', 'created_at' => '2024-12-07 13:10:26', 'updated_at' => '2024-12-19 16:04:55', 'deleted_at' => NULL),
            array('id' => '17', 'supplier_id' => '13', 'sku' => 'SP716243', 'name' => 'Trà Thảo Mộc, Sơn Mộc Trà 2 Gói 500gr', 'slug' => 'tra-thao-moc-son-moc-tra-2-goi-500gr', 'img' => 'products/1733552350_6753e8ded51b1.jpg', 'price_regular' => '360000', 'price_sale' => '132000', 'description' => '<p><strong>Tr&agrave; Thảo Mộc Sơn Mộc Tr&agrave;</strong> l&agrave; sự kết hợp từ những thảo mộc thi&ecirc;n nhi&ecirc;n được chọn lọc kỹ lưỡng, mang đến hương vị thanh khiết v&agrave; dịu nhẹ. Với 2 g&oacute;i, mỗi g&oacute;i 500gr, sản phẩm kh&ocirc;ng chỉ đ&aacute;p ứng nhu cầu sử dụng h&agrave;ng ng&agrave;y m&agrave; c&ograve;n l&agrave; m&oacute;n qu&agrave; sức khỏe &yacute; nghĩa d&agrave;nh tặng người th&acirc;n v&agrave; bạn b&egrave;.</p>
      
                <p>Tr&agrave; gi&uacute;p thanh lọc cơ thể, hỗ trợ thư gi&atilde;n, cải thiện giấc ngủ v&agrave; tăng cường sức khỏe tự nhi&ecirc;n. Với hương thơm dễ chịu, từng t&aacute;ch tr&agrave; mang lại cảm gi&aacute;c b&igrave;nh y&ecirc;n, gần gũi với thi&ecirc;n nhi&ecirc;n. <strong>Sơn Mộc Tr&agrave;</strong> l&agrave; lựa chọn ho&agrave;n hảo cho những ai y&ecirc;u th&iacute;ch phong c&aacute;ch sống khỏe mạnh v&agrave; bền vững.</p>', 'description_short' => '<p>C&Ocirc;NG DỤNG SƠN MỘC TR&Agrave;</p>
      
                <p>+ Thanh lọc cơ thể, m&aacute;t gan, giải độc rượu nhanh, giữ d&aacute;ng đẹp da</p>
      
                <p>+ Hỗ trợ cải thiện giấc ngủ, gi&uacute;p an thần ngủ ngon.</p>
      
                <p>+ Gi&uacute;p ổn định điều ho&agrave; huyết &aacute;p, giảm vi&ecirc;m dạ d&agrave;y.</p>
      
                <p>+ Tốt cho người tim mạch, tiểu đường, mỡ m&aacute;u v&agrave; huyết &aacute;p cao.</p>
      
                <p>+ Tăng sức đề kh&aacute;ng, ho vi&ecirc;m họng do thời tiết thay đổi.</p>', 'quantity' => '44', 'view' => '3', 'manufacture_date' => NULL, 'expiry_date' => '2026-02-19', 'status' => '0', 'created_at' => '2024-12-07 13:17:40', 'updated_at' => '2024-12-19 16:20:41', 'deleted_at' => NULL),
            array('id' => '18', 'supplier_id' => NULL, 'sku' => NULL, 'name' => 'Bánh Đồng Tiền Mix Hạt Dinh Dưỡng 250gr', 'slug' => 'banh-dong-tien-mix-hat-dinh-duong-250gr', 'img' => 'products/1734592816_6763c93047afe.png', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>B&aacute;nh Đồng Tiền Mix Hạt Dinh Dưỡng 250gr tương trợ Giảm C&acirc;n, Ăn Keto, Ăn Healthy</p>
      
            <p><img src="https://p16-oec-va.ibyteimg.com/tos-maliva-i-o3syd03w52-us/3b955a8adf75457985176707a3dba289~tplv-o3syd03w52-origin-jpeg.jpeg?from=522366036" style="height:800px; width:800px" /></p>
      
            <p>Được mix với đế b&aacute;nh l&agrave;m từ bột mỳ nguy&ecirc;n c&aacute;m phối hợp với độ ngậy, thơm, b&ugrave;i của Hạt Điều. chất ngọt thanh của nho v&agrave; gi&ograve;n, b&eacute;o của hạnh nh&acirc;n n&oacute;i l&ecirc;n một m&ugrave;i vị vừa gi&ograve;n vừa ngon m&agrave; kh&ocirc;ng hề lo bị ng&aacute;n ạ. Nofa k&iacute;nh mời bạn sử dụng nh&eacute; 💝<br />
            &nbsp;</p>
      
            <p>Th&ocirc;ng Tin Bổ Sung</p>
      
            <p>&ndash; Bảo quản: Để nơi kh&ocirc; r&aacute;o, nếu chưa d&ugrave;ng hết vui l&ograve;ng nắp k&iacute;n v&agrave; cất ở ngăn lạnh tủ lạnh</p>
      
            <p>&ndash; Hạn sử dụng: 6 Th&aacute;ng ( Sử dụng trong 20 ng&agrave;y từ khi mở nắp sản phẩm trải nghiệm hương vị tốt nhất)</p>
      
            <p>&ndash; Trọng Lượng: 250Gr, 350Gr, 450Gr</p>
      
            <p>&nbsp;</p>
      
            <p>CAM KẾT Happifoody &ndash; HẠT DINH DƯỠNG CAO CẤP</p>
      
            <p>Ch&uacute;ng t&ocirc;i lu&ocirc;n &yacute; định trưng b&agrave;y cho qu&yacute; kh&aacute;ch những vật phẩm v&agrave; phục vụ tốt nhất</p>
      
            <p>&ndash; 100% ngũ cốc l&agrave;m kh&ocirc; đều được chọn lựa v&agrave; tốt về chất lượng tốt với dung lượng dưỡng chất tối ưu.</p>
      
            <p>&ndash; vật phẩm c&oacute; vỏ hộp g&oacute;i gọn đẹp th&iacute;ch hợp l&agrave;m qu&agrave; tặng biếu, tặng.</p>
      
            <p>&ndash; h&agrave;ng ngũ tham vấn vi&ecirc;n chuẩn bị vấn đ&aacute;p mọi vướng mắc quan hệ tới sản phẩm.</p>
      
            <p>&ndash; Được y&ecirc;u&nbsp; đổi mới nếu vật phẩm lỗi, hư, hỏng, kh&ocirc;ng nguy&ecirc;n chất lượng.</p>', 'description_short' => '<p>TH&Ocirc;NG TIN SẢN PHẨM</p>
      
            <p>🔖 Th&agrave;nh phần: Hạt điều, Nho Mix, Hạnh Nh&acirc;n, Nh&acirc;n B&iacute;, Vừng, Bột m&igrave;, Bơ thực vật, Trứng g&agrave;, Muối, Mật m&iacute;a</p>
      
            <p>🔖 c&ocirc;ng dụng ch&iacute;nh:</p>
      
            <p>&ndash; thay đổi nguồn t&iacute;ch điện cho chuyển động trong ng&agrave;y</p>
      
            <p>&ndash; L&agrave; qu&agrave; vặt thật ngon v&agrave; gi&agrave;u dinh dưỡng, tốt nhất cho b&agrave; mẹ ăn &iacute;t l&agrave;nh mạnh</p>
      
            <p>&ndash; tương trợ sụt c&acirc;n rất hiệu quả</p>
      
            <p>&nbsp;</p>', 'quantity' => NULL, 'view' => '2', 'manufacture_date' => NULL, 'expiry_date' => NULL, 'status' => '1', 'created_at' => '2024-12-19 14:20:16', 'updated_at' => '2024-12-19 15:44:06', 'deleted_at' => NULL),
            array('id' => '19', 'supplier_id' => '12', 'sku' => 'SP852705', 'name' => 'Hạt dẻ mật ong/ Hạt dẻ tách vỏ tẩm mật ong ( Gói 100g)', 'slug' => 'hat-de-mat-ong-hat-de-tach-vo-tam-mat-ong-goi-100g', 'img' => 'products/1734594165_6763ce75794d4.png', 'price_regular' => '40000', 'price_sale' => '35000', 'description' => '<p>🌰Hạt dẻ mật ong, sản phẩm của tỉnh Quảng T&acirc;y, được chọn lọc từ những tr&aacute;i hạt dẻ tươi ngon nhất, được b&oacute;c vỏ v&agrave; nướng c&ugrave;ng mật ong, hương vị thơm ngon ngay từ hạt đầu ti&ecirc;n, để lại cảm gi&aacute;c b&ugrave;i ngậy kh&ocirc;ng thể qu&ecirc;n, đặc biệt kh&ocirc;ng qu&aacute; ngọt l&agrave;m bị ngấy khi ăn. C&oacute; thể nh&acirc;m nhi k&egrave;m tr&agrave; xanh hoặc tr&agrave; sữa th&igrave; qu&aacute; tuyệt ạ.</p>
      
            <p>Sản phẩm được đ&oacute;ng g&oacute;i bằng giấy bạc v&agrave; h&uacute;t ch&acirc;n kh&ocirc;ng cẩn thận n&ecirc;n c&oacute; thể bảo quản trong 10 th&aacute;ng.</p>
      
            <p>G&oacute;i 100gr / 1 g&oacute;i</p>
      
            <p>1 th&ugrave;ng 100 g&oacute;i</p>
      
            <p>HSD: 10 th&aacute;ng kể từ ng&agrave;y sản xuất, ng&agrave;y sản xuất in tr&ecirc;n bao b&igrave;</p>
      
            <p>Xuất xứ: Trung quốc</p>
      
            <p>HDSD: Ăn trực tiếp, sử dụng ngay sau khi mở t&uacute;i</p>
      
            <p>Bảo quản ở nhiệt độ thường, tr&aacute;nh &aacute;nh nắng chiếu trực tiếp v&agrave; nơi ẩm ướt</p>
      
            <p><img src="https://happifoody.com/wp-content/uploads/2024/06/hat-de-tam-mat-ong-4.png" /></p>
      
            <p>**Cam kết từ Happifoody:</p>
      
            <p>&ndash; Sản phẩm đ&atilde; được kiểm duyệt v&agrave; đảm bảo An to&agrave;n vệ sinh thực phẩm.</p>
      
            <p>&nbsp;&ndash; Cam kết h&agrave;ng đ&uacute;ng ch&iacute;nh h&atilde;ng, nếu ph&aacute;t hiện giả đền gấp đ&ocirc;i đơn h&agrave;ng.</p>
      
            <p>&nbsp;&ndash; Nhận được h&agrave;ng, qu&yacute; kh&aacute;ch vui l&ograve;ng kiểm tra đơn h&agrave;ng. Qu&yacute; kh&aacute;ch chỉ được đổi trả sản phẩm nếu b&ecirc;n shop giao sai sản phẩm. Kh&ocirc;ng nhận đổi trả nếu b&aacute;nh chỉ bị bẹp, dẹp về ngoại quan, đ&acirc;y l&agrave; vấn đề kh&aacute;ch quan do b&ecirc;n vận chuyển n&ecirc;n b&ecirc;n shop kh&ocirc;ng giải quyết.</p>
      
            <p><img src="https://happifoody.com/wp-content/uploads/2024/06/hat-de-tam-mat-ong-3.png" /></p>
      
            <p>*** Lưu &yacute; với kh&aacute;ch h&agrave;ng mua h&agrave;ng:</p>
      
            <p>&ndash; Tất cả c&aacute;c đơn b&aacute;o thiếu h&agrave;ng shop sẽ giải quyết gửi b&ugrave; h&agrave;ng cho kh&aacute;ch với điều kiện:</p>
      
            <p>+&nbsp; Kh&aacute;ch phải cung cấp video mở kiện cho shop (G&oacute;i h&agrave;ng đc b&oacute;c trong t&igrave;nh trạng c&ograve;n nguy&ecirc;n vẹn)</p>
      
            <p>+&nbsp; Kh&aacute;ch nhận h&agrave;ng, kiểm tra đủ h&agrave;ng rồi thanh to&aacute;n (Y&ecirc;u cầu shiper gọi điện x&aacute;c nhận đồng kiểm, cung cấp video đồng kiểm cho shop)</p>
      
            <p>***) Tất cả c&aacute;c trường hợp b&aacute;o thiếu h&agrave;ng ko c&oacute; video b&oacute;c h&agrave;ng shop sẽ kh&ocirc;ng giải quyết gửi b&ugrave; h&agrave;ng. Th&ocirc;ng b&aacute;o n&agrave;y được &aacute;p dụng đối với tất cả c&aacute;c đơn h&agrave;ng</p>
      
            <p>Xin ch&acirc;n th&agrave;nh cảm ơn sự t&iacute;n nhiệm v&agrave; ủng hộ của Qu&yacute; kh&aacute;ch h&agrave;ng!</p>', 'description_short' => '<p>🌰Hạt dẻ mật ong, sản phẩm của tỉnh Quảng T&acirc;y, được chọn lọc từ những tr&aacute;i hạt dẻ tươi ngon nhất, được b&oacute;c vỏ v&agrave; nướng c&ugrave;ng mật ong, hương vị thơm ngon ngay từ hạt đầu ti&ecirc;n, để lại cảm gi&aacute;c b&ugrave;i ngậy kh&ocirc;ng thể qu&ecirc;n, đặc biệt kh&ocirc;ng qu&aacute; ngọt l&agrave;m bị ngấy khi ăn. C&oacute; thể nh&acirc;m nhi k&egrave;m tr&agrave; xanh hoặc tr&agrave; sữa th&igrave; qu&aacute; tuyệt ạ.</p>
      
            <p>Sản phẩm được đ&oacute;ng g&oacute;i bằng giấy bạc v&agrave; h&uacute;t ch&acirc;n kh&ocirc;ng cẩn thận n&ecirc;n c&oacute; thể bảo quản trong 10 th&aacute;ng.</p>
      
            <p>G&oacute;i 100gr / 1 g&oacute;i</p>
      
            <p>1 th&ugrave;ng 100 g&oacute;i</p>
      
            <p>HSD: 10 th&aacute;ng kể từ ng&agrave;y sản xuất, ng&agrave;y sản xuất in tr&ecirc;n bao b&igrave;</p>
      
            <p>Xuất xứ: Trung quốc</p>
      
            <p>HDSD: Ăn trực tiếp, sử dụng ngay sau khi mở t&uacute;i</p>
      
            <p>Bảo quản ở nhiệt độ thường, tr&aacute;nh &aacute;nh nắng chiếu trực tiếp v&agrave; nơi ẩm ướt</p>
      
            <p>**Cam kết từ Happifoody:</p>
      
            <p>&ndash; Sản phẩm đ&atilde; được kiểm duyệt v&agrave; đảm bảo An to&agrave;n vệ sinh thực phẩm.</p>
      
            <p>&nbsp;&ndash; Cam kết h&agrave;ng đ&uacute;ng ch&iacute;nh h&atilde;ng, nếu ph&aacute;t hiện giả đền gấp đ&ocirc;i đơn h&agrave;ng.</p>
      
            <p>&nbsp;&ndash; Nhận được h&agrave;ng, qu&yacute; kh&aacute;ch vui l&ograve;ng kiểm tra đơn h&agrave;ng. Qu&yacute; kh&aacute;ch chỉ được đổi trả sản phẩm nếu b&ecirc;n shop giao sai sản phẩm. Kh&ocirc;ng nhận đổi trả nếu b&aacute;nh chỉ bị bẹp, dẹp về ngoại quan, đ&acirc;y l&agrave; vấn đề kh&aacute;ch quan do b&ecirc;n vận chuyển n&ecirc;n b&ecirc;n shop kh&ocirc;ng giải quyết.</p>
      
            <p>*** Lưu &yacute; với kh&aacute;ch h&agrave;ng mua h&agrave;ng:</p>
      
            <p>&ndash; Tất cả c&aacute;c đơn b&aacute;o thiếu h&agrave;ng shop sẽ giải quyết gửi b&ugrave; h&agrave;ng cho kh&aacute;ch với điều kiện:</p>
      
            <p>+&nbsp; Kh&aacute;ch phải cung cấp video mở kiện cho shop (G&oacute;i h&agrave;ng đc b&oacute;c trong t&igrave;nh trạng c&ograve;n nguy&ecirc;n vẹn)</p>
      
            <p>+&nbsp; Kh&aacute;ch nhận h&agrave;ng, kiểm tra đủ h&agrave;ng rồi thanh to&aacute;n (Y&ecirc;u cầu shiper gọi điện x&aacute;c nhận đồng kiểm, cung cấp video đồng kiểm cho shop)</p>
      
            <p>***) Tất cả c&aacute;c trường hợp b&aacute;o thiếu h&agrave;ng ko c&oacute; video b&oacute;c h&agrave;ng shop sẽ kh&ocirc;ng giải quyết gửi b&ugrave; h&agrave;ng. Th&ocirc;ng b&aacute;o n&agrave;y được &aacute;p dụng đối với tất cả c&aacute;c đơn h&agrave;ng</p>
      
            <p>Xin ch&acirc;n th&agrave;nh cảm ơn sự t&iacute;n nhiệm v&agrave; ủng hộ của Qu&yacute; kh&aacute;ch h&agrave;ng!</p>', 'quantity' => '56', 'view' => '0', 'manufacture_date' => '2024-12-11', 'expiry_date' => '2025-09-27', 'status' => '0', 'created_at' => '2024-12-19 14:42:45', 'updated_at' => '2024-12-19 14:42:45', 'deleted_at' => NULL),
            array('id' => '20', 'supplier_id' => '15', 'sku' => 'SP194831', 'name' => 'Bánh tráng gạo lứt Happifoody', 'slug' => 'banh-trang-gao-lut-happifoody', 'img' => 'products/1734594604_6763d02ca12dd.png', 'price_regular' => '299000', 'price_sale' => '199000', 'description' => '<h2>Đặc Điểm Nổi Bật</h2>
      
            <ul>
                <li>
                <p>Ưu điểm vượt trội của b&aacute;nh tr&aacute;ng hữu cơ Hoa Sữa;</p>
                </li>
                <li>
                <p>Th&agrave;nh phần nguy&ecirc;n liệu hữu cơ kh&ocirc;ng sử dụng phụ gia, chất bảo quản h&oacute;a học độc hại, an to&agrave;n tuyệt đối cho sức khỏe người ti&ecirc;u d&ugrave;ng.</p>
                </li>
                <li>
                <p>B&aacute;nh tr&aacute;ng dai ngon tự nhi&ecirc;n gi&uacute;p cung cấp h&agrave;m lượng tinh bột, protein v&agrave; chất xơ đ&aacute;ng kể</p>
                </li>
                <li>
                <p>&nbsp;Sản xuất theo c&ocirc;ng nghệ hiện đại, quy tr&igrave;nh sản xuất kh&eacute;p k&iacute;n, gi&aacute;m s&aacute;t nghi&ecirc;m ngặt</p>
                </li>
                <li>
                <p>Sử dụng trong c&aacute;c m&oacute;n cuốn ăn k&egrave;m với c&aacute;c loại rau, thịt c&aacute;, cuốn b&aacute;nh đa nem, l&agrave;m b&aacute;nh tr&aacute;ng trộn, b&aacute;nh tr&aacute;ng nướng&hellip; tuỳ th&iacute;ch</p>
                </li>
                <li>
                <p>Ph&ugrave; hợp với mọi đối tượng, đặc biệt l&agrave; những người ăn eat clean, ăn ki&ecirc;ng, ăn chay, giảm b&eacute;o v&agrave; thực dưỡng&hellip;</p>
                </li>
            </ul>
      
            <h2>Hướng Dẫn Sử Dụng</h2>
      
            <ul>
                <li>
                <p>D&ugrave;ng để cuốn ăn k&egrave;m với c&aacute;c loại rau hoặc thịt c&aacute;</p>
                </li>
                <li>
                <p>D&ugrave;ng cuốn b&aacute;nh đa nem: Trải b&aacute;nh tr&aacute;ng ra, d&ugrave;ng miếng vải ướt, b&ocirc;i đều v&agrave;o mặt tr&ecirc;n, trải phần nh&acirc;n l&ecirc;n rồi cuốn lại, chi&ecirc;n gi&ograve;n v&agrave; thưởng thức</p>
                </li>
            </ul>
      
            <h2>Ch&iacute;nh S&aacute;ch Đổi Sản Phẩm</h2>
      
            <ul>
                <li>Li&ecirc;n hệ ngay khi c&oacute; vấn đề: Nếu sản phẩm c&oacute; bất kỳ vấn đề g&igrave; khi nhận h&agrave;ng, vui l&ograve;ng</li>
            </ul>
      
            <p>li&ecirc;n hệ ngay với shop để được hỗ trợ kịp thời.</p>
      
            <ul>
                <li>Điều kiện đổi h&agrave;ng: Shop sẽ nhận lại h&agrave;ng v&agrave; đổi sản phẩm kh&aacute;c trong c&aacute;c trường hợp sau:
                <ul>
                    <li>H&agrave;ng bị lỗi do nh&agrave; sản xuất.</li>
                    <li>Shop giao nhầm mẫu, m&agrave;u, loại so với đơn đặt của kh&aacute;ch.</li>
                </ul>
                </li>
                <li>Thời gian đổi: Shop chỉ nhận đổi trong thời gian kh&ocirc;ng qu&aacute; 3 ng&agrave;y kể từ ng&agrave;y kh&aacute;ch nhận h&agrave;ng.</li>
                <li>Y&ecirc;u cầu về h&agrave;ng đổi: H&agrave;ng đổi phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, kh&ocirc;ng bị bẩn hoặc hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</li>
            </ul>
      
            <h2>Bảo Quản</h2>
      
            <ul>
                <li>Bảo quản nơi kh&ocirc; r&aacute;o: Để sản phẩm ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>
                <li>D&ugrave;ng liền: Sản phẩm c&oacute; thể ăn liền m&agrave; kh&ocirc;ng cần qua sơ chế.</li>
            </ul>', 'description_short' => '<h2>M&ocirc; Tả Sản Phẩm</h2>
      
            <p>Do giữ lại được c&aacute;c dưỡng chất ở lớp vỏ hạt gạo, gạo lứt cung cấp nhiều chất xơ, protein, chất chống oxy ho&aacute;, vitamin (B1, B2, B3, B6, E), chất kho&aacute;ng (sắt, kẽm, đồng, selen, canxi, magi&ecirc;, kali), v&agrave; c&aacute;c tinh dầu tự nhi&ecirc;n c&oacute; lợi.</p>', 'quantity' => '63', 'view' => '3', 'manufacture_date' => '2024-12-05', 'expiry_date' => '2025-06-15', 'status' => '0', 'created_at' => '2024-12-19 14:50:04', 'updated_at' => '2024-12-19 17:30:17', 'deleted_at' => NULL),
            array('id' => '21', 'supplier_id' => '17', 'sku' => 'SP876206', 'name' => 'TRÀ COZY TÚI LỌC HƯƠNG BẠC HÀ', 'slug' => 'tra-cozy-tui-loc-huong-bac-ha', 'img' => 'products/1734595349_6763d3152256a.png', 'price_regular' => '45000', 'price_sale' => '35000', 'description' => '<p>T&uacute;i lọc nhỏ gọn, tiện lợi L&agrave;m từ tr&agrave; v&agrave; hương hoa quả vị dịu ngọt Tăng cường giải nhiệt cho cơ thể Tr&agrave; cozy t&uacute;i lọc l&agrave; sự kết hợp h&agrave;i ho&agrave; giữa vị đậm của tr&agrave; đen với hương hoa quả tự nhi&ecirc;n. Sản phẩm mang lại cho bạn cảm gi&aacute;c sảng kho&aacute;i, m&aacute;t dịu. Tr&agrave; Cozy được đ&oacute;ng dạng t&uacute;i lọc tiện lợi. Bạn sẽ kh&ocirc;ng tốn qu&aacute; nhiều thời gian cho việc pha chế, chỉ cần nh&uacute;ng t&uacute;i tr&agrave; v&agrave;o nước s&ocirc;i, chờ từ 4 &ndash; 5 ph&uacute;t l&agrave; bạn c&oacute; thể thưởng thức ngay một ly tr&agrave; thơm ngon, bổ dưỡng mỗi ng&agrave;y. H&Atilde;NG SẢN XUẤT : C&Ocirc;NG TY COZY -VIỆT NAM HẠN SỬ DỤNG : 2 năm kể từ nsx</p>', 'description_short' => '<p><strong>Thương hiệu:&nbsp;</strong><a href="https://shopee.vn/search?brands=1127801">Cozy</a></p>
      
            <p><strong>Dạng đồ uống</strong></p>
      
            <p>Tr&agrave; t&uacute;i lọc &amp; l&aacute; tr&agrave;</p>
      
            <p><strong>Xuất xứ</strong></p>
      
            <p>Việt Nam</p>
      
            <p><strong>Hạn sử dụng</strong></p>
      
            <p>24 th&aacute;ng</p>', 'quantity' => '89', 'view' => '3', 'manufacture_date' => '2024-12-03', 'expiry_date' => '2026-12-03', 'status' => '0', 'created_at' => '2024-12-19 15:02:29', 'updated_at' => '2024-12-19 17:41:48', 'deleted_at' => NULL),
            array('id' => '22', 'supplier_id' => '15', 'sku' => 'SP269250', 'name' => 'Sữa Gạo Hàn Quốc - 500ml', 'slug' => 'sua-gao-han-quoc-500ml', 'img' => 'products/1734595800_6763d4d8ba3d2.png', 'price_regular' => '24000', 'price_sale' => '17500', 'description' => '<p>Sữa gạo H&agrave;n Quốc l&agrave; một loại thức uống truyền thống được l&agrave;m từ c&aacute;c nguy&ecirc;n liệu tự nhi&ecirc;n như gạo trắng, gạo lứt v&agrave; nước. Đ&acirc;y l&agrave; sản phẩm rất phổ biến tại H&agrave;n Quốc v&agrave; nhiều quốc gia kh&aacute;c, đặc biệt l&agrave; Việt Nam. Sữa gạo kh&ocirc;ng chỉ c&oacute; vị thơm ngon, dịu nhẹ m&agrave; c&ograve;n mang lại nhiều lợi &iacute;ch cho sức khỏe, gi&uacute;p bổ sung dưỡng chất m&agrave; kh&ocirc;ng g&acirc;y tăng c&acirc;n.</p>
      
            <p>Loại sữa n&agrave;y thường được l&agrave;m từ gạo rang kết hợp với sữa tươi, tạo n&ecirc;n hương vị đặc trưng, ngọt dịu v&agrave; dễ uống. Người H&agrave;n Quốc tin rằng uống sữa gạo kh&ocirc;ng chỉ gi&uacute;p thanh lọc cơ thể, m&agrave; c&ograve;n l&agrave; b&iacute; quyết l&agrave;m đẹp của nhiều phụ nữ nhờ khả năng l&agrave;m s&aacute;ng da v&agrave; giảm nếp nhăn.</p>
      
            <ul>
                <li><strong>Th&agrave;nh phần:</strong>&nbsp;Gạo, nước, đường hoặc muối (t&ugrave;y khẩu vị), đ&ocirc;i khi kết hợp với sữa tươi.</li>
                <li><strong>Phổ biến:</strong>&nbsp;Sữa gạo H&agrave;n Quốc c&oacute; mặt tại nhiều si&ecirc;u thị v&agrave; cửa h&agrave;ng trực tuyến với c&aacute;c thương hiệu như Woongjin, Sahmyook v&agrave; OKF.</li>
                <li><strong>Đặc điểm:</strong>&nbsp;H&agrave;m lượng calo thấp, kh&ocirc;ng chứa cholesterol v&agrave; &iacute;t chất b&eacute;o, ph&ugrave; hợp cho người ăn ki&ecirc;ng v&agrave; người b&eacute;o ph&igrave;.</li>
            </ul>
      
            <p>Sữa gạo H&agrave;n Quốc kh&ocirc;ng chỉ l&agrave; một thức uống giải kh&aacute;t, m&agrave; c&ograve;n l&agrave; một sản phẩm chăm s&oacute;c sức khỏe được ưa chuộng nhờ v&agrave;o khả năng tăng cường đề kh&aacute;ng, hỗ trợ ti&ecirc;u h&oacute;a v&agrave; cải thiện giấc ngủ. Đ&acirc;y l&agrave; l&yacute; do m&agrave; sản phẩm n&agrave;y ng&agrave;y c&agrave;ng được nhiều người ti&ecirc;u d&ugrave;ng lựa chọn v&agrave; trở th&agrave;nh một phần trong chế độ ăn uống h&agrave;ng ng&agrave;y của nhiều gia đ&igrave;nh.</p>
      
            <p><img alt="1. Tổng quan về sữa gạo Hàn Quốc" src="https://suachobeyeu.vn/application/upload/products/nuoc-gao-han-quoc-sahmyook-chai-500ml-a2.jpg" style="height:760px; width:760px" /></p>', 'description_short' => '<p>Sữa gạo H&agrave;n Quốc l&agrave; một thức uống gi&agrave;u dinh dưỡng, mang đến nhiều lợi &iacute;ch tuyệt vời cho sức khỏe. Dưới đ&acirc;y l&agrave; một số lợi &iacute;ch ch&iacute;nh:</p>
      
            <ul>
                <li><strong>Cung cấp dinh dưỡng</strong>: Sữa gạo H&agrave;n Quốc chứa nhiều vitamin v&agrave; kho&aacute;ng chất, bao gồm vitamin A, B, C, canxi, v&agrave; sắt. Những dưỡng chất n&agrave;y hỗ trợ hệ miễn dịch, gi&uacute;p cơ thể khỏe mạnh.</li>
                <li><strong>Gi&uacute;p ti&ecirc;u h&oacute;a tốt hơn</strong>: Th&agrave;nh phần gạo lứt v&agrave; khoai lang trong sữa gạo hỗ trợ hệ ti&ecirc;u h&oacute;a, gi&uacute;p cải thiện t&igrave;nh trạng kh&oacute; ti&ecirc;u v&agrave; tăng cường hấp thu dưỡng chất.</li>
                <li><strong>Tốt cho tim mạch</strong>: C&aacute;c chất chống oxy h&oacute;a v&agrave; dưỡng chất c&oacute; trong gạo gi&uacute;p giảm cholesterol xấu, tăng cường sức khỏe tim mạch v&agrave; ngăn ngừa c&aacute;c bệnh li&ecirc;n quan.</li>
                <li><strong>Giảm căng thẳng v&agrave; hỗ trợ giấc ngủ</strong>: Uống sữa gạo c&oacute; thể gi&uacute;p an thần, giảm stress v&agrave; hỗ trợ giấc ngủ tốt hơn, nhờ c&aacute;c axit amin c&oacute; trong gạo nguy&ecirc;n chất.</li>
                <li><strong>Th&iacute;ch hợp cho người ăn ki&ecirc;ng</strong>: Sữa gạo H&agrave;n Quốc thường c&oacute; h&agrave;m lượng calo thấp, ph&ugrave; hợp với những người muốn giảm c&acirc;n hoặc duy tr&igrave; c&acirc;n nặng hợp l&yacute; m&agrave; vẫn đảm bảo cung cấp đủ dinh dưỡng cho cơ thể.</li>
            </ul>
      
            <p>Với những lợi &iacute;ch sức khỏe vượt trội, sữa gạo H&agrave;n Quốc kh&ocirc;ng chỉ l&agrave; một thức uống giải kh&aacute;t m&agrave; c&ograve;n l&agrave; một lựa chọn l&yacute; tưởng để bồi bổ sức khỏe mỗi ng&agrave;y.</p>', 'quantity' => '47', 'view' => '5', 'manufacture_date' => '2024-12-12', 'expiry_date' => '2025-06-05', 'status' => '0', 'created_at' => '2024-12-19 15:10:00', 'updated_at' => '2024-12-20 01:06:40', 'deleted_at' => NULL),
            array('id' => '23', 'supplier_id' => '13', 'sku' => 'SP688241', 'name' => 'Combo 3 hộp trà táo xanh giảm cân chính hãng an toàn hiệu quả thơm ngon dễ uống 45 gói', 'slug' => 'combo-3-hop-tra-tao-xanh-giam-can-chinh-hang-an-toan-hieu-qua-thom-ngon-de-uong-45-goi', 'img' => 'products/1734596111_6763d60fefcfe.jpg', 'price_regular' => '189000', 'price_sale' => '168000', 'description' => '<p><img alt="Trà táo xanh tốt cho sức khỏe của mọi người" src="https://down-vn.img.susercontent.com/file/vn-11134208-7r98o-lsz9y8kcdjno10" style="height:750px; width:750px" /></p>
      
            <p>C&Aacute;CH SỬ DỤNG TR&Agrave; GIẢM C&Acirc;N T&Aacute;O XANH:</p>
      
            <p>&ndash; Pha 1 g&oacute;i tr&agrave; t&aacute;o thảo mộc với 100-150ml nước s&ocirc;i, khuấy đều.</p>
      
            <p>&ndash; Sử dụng ng&agrave;y 2 g&oacute;i v&agrave;o buổi s&aacute;ng v&agrave; tối trước khi ăn 30p.</p>
      
            <p>QUY C&Aacute;CH Đ&Oacute;NG G&Oacute;I HỘP TR&Agrave; GIẢM C&Acirc;N T&Aacute;O XANH: Hộp 15 g&oacute;i</p>', 'description_short' => '<p>C&Ocirc;NG DỤNG TR&Agrave; T&Aacute;O XANH GIẢM C&Acirc;N:</p>
      
            <p>&ndash; Giảm mỡ m&aacute;u t&iacute;ch tụ trong cơ thể.</p>
      
            <p>&ndash; Đốt ch&aacute;y chất b&eacute;o gi&uacute;p giảm c&acirc;n hiệu quả, v&oacute;c d&aacute;ng săn chắc.</p>
      
            <p>&ndash; Tạo cảm gi&aacute;c no l&acirc;u, giảm sự th&egrave;m ăn v&agrave; kiểm so&aacute;t cơn đ&oacute;i hiệu quả.</p>
      
            <p>&ndash; Hỗ trợ chống l&atilde;o h&oacute;a, l&agrave;m đẹp da.</p>', 'quantity' => '62', 'view' => '4', 'manufacture_date' => '2024-12-18', 'expiry_date' => '2026-12-19', 'status' => '0', 'created_at' => '2024-12-19 15:15:11', 'updated_at' => '2024-12-19 17:15:57', 'deleted_at' => NULL),
            array('id' => '24', 'supplier_id' => '16', 'sku' => 'SP222648', 'name' => 'Trà Gạo Lứt Happifoody', 'slug' => 'tra-gao-lut-happifoody', 'img' => 'products/1734596460_6763d76c7d207.png', 'price_regular' => '200000', 'price_sale' => '150000', 'description' => '<h2>Đặc Điểm Nổi Bật</h2>
      
            <ul>
                <li>Tr&agrave; gạo lứt đặc biệt tốt cho mọi lứa tuổi, từ trẻ em đến người gi&agrave;, người đang hồi phục sức khỏe hay người muốn duy tr&igrave; thể trạng tốt. Gạo lứt gi&agrave;u chất xơ, gi&uacute;p hỗ trợ ti&ecirc;u h&oacute;a, ổn định đường huyết, v&agrave; giảm nguy cơ mắc c&aacute;c bệnh tim mạch.</li>
                <li>Theo nghi&ecirc;n cứu, uống tr&agrave; gạo lứt thường xuy&ecirc;n c&oacute; thể gi&uacute;p cơ thể giải độc, tăng cường sức đề kh&aacute;ng v&agrave; cung cấp nhiều dưỡng chất thiết yếu. Đặc biệt, gạo lứt rất gi&agrave;u Magie: Một t&aacute;ch tr&agrave; gạo lứt c&oacute; thể cung cấp một lượng đ&aacute;ng kể Magie cần thiết cho một ng&agrave;y, ngo&agrave;i ra c&ograve;n cung cấp Canxi, Sắt&hellip; gi&uacute;p ph&ograve;ng chống lo&atilde;ng xương, tho&aacute;i h&oacute;a khớp, gi&uacute;p xương chắc khỏe v&agrave; cải thiện t&igrave;nh trạng thiếu m&aacute;u.</li>
            </ul>
      
            <h2>Hướng Dẫn Sử Dụng</h2>
      
            <ul>
                <li>Tr&agrave; gạo lứt c&oacute; thể được chuẩn bị một c&aacute;ch đơn giản nhưng vẫn giữ nguy&ecirc;n gi&aacute; trị dinh dưỡng v&agrave; hương vị đặc trưng. Để pha tr&agrave;, gạo lứt cần được rang ch&iacute;n trước khi ng&acirc;m trong nước s&ocirc;i khoảng 10-15 ph&uacute;t. Tỉ lệ gạo v&agrave; nước c&oacute; thể điều chỉnh theo sở th&iacute;ch c&aacute; nh&acirc;n (thường l&agrave; 1:10).</li>
                <li>Ngo&agrave;i việc uống n&oacute;ng, tr&agrave; gạo lứt cũng c&oacute; thể được uống lạnh để giải nhiệt v&agrave;o những ng&agrave;y h&egrave; n&oacute;ng bức. Tr&agrave; c&oacute; thể kết hợp với mật ong, gừng hoặc chanh để tăng hương vị v&agrave; gi&aacute; trị dinh dưỡng.</li>
                <li>Tr&agrave; gạo lứt cũng c&oacute; thể sử dụng l&agrave;m nước nền cho c&aacute;c loại nước uống kh&aacute;c như sữa gạo lứt, nước tr&aacute;i c&acirc;y gạo lứt hoặc th&ecirc;m v&agrave;o c&aacute;c m&oacute;n ăn như ch&aacute;o gạo lứt, s&uacute;p gạo lứt để tăng phần phong ph&uacute; cho thực đơn h&agrave;ng ng&agrave;y.</li>
            </ul>
      
            <h2>Ch&iacute;nh S&aacute;ch Đổi Sản Phẩm</h2>
      
            <ul>
                <li>Li&ecirc;n hệ ngay khi c&oacute; vấn đề: Nếu sản phẩm c&oacute; bất kỳ vấn đề g&igrave; khi nhận h&agrave;ng, vui l&ograve;ng</li>
            </ul>
      
            <p>li&ecirc;n hệ ngay với shop để được hỗ trợ kịp thời.</p>
      
            <ul>
                <li>Điều kiện đổi h&agrave;ng: Shop sẽ nhận lại h&agrave;ng v&agrave; đổi sản phẩm kh&aacute;c trong c&aacute;c trường hợp sau:
                <ul>
                    <li>H&agrave;ng bị lỗi do nh&agrave; sản xuất.</li>
                    <li>Shop giao nhầm mẫu, m&agrave;u, loại so với đơn đặt của kh&aacute;ch.</li>
                </ul>
                </li>
                <li>Thời gian đổi: Shop chỉ nhận đổi trong thời gian kh&ocirc;ng qu&aacute; 3 ng&agrave;y kể từ ng&agrave;y kh&aacute;ch nhận h&agrave;ng.</li>
                <li>Y&ecirc;u cầu về h&agrave;ng đổi: H&agrave;ng đổi phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, kh&ocirc;ng bị bẩn hoặc hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</li>
            </ul>
      
            <h2>Bảo Quản</h2>
      
            <ul>
                <li>Bảo quản nơi kh&ocirc; r&aacute;o: Để sản phẩm ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>
                <li>D&ugrave;ng liền: Sản phẩm c&oacute; thể ăn liền m&agrave; kh&ocirc;ng cần qua sơ chế.</li>
            </ul>
      
            <p><img alt="Tra-gao-lut-1" src="https://happifoody.com/wp-content/uploads/2024/06/Tra-gao-lut-1.png" style="height:600px; width:600px" /></p>
      
            <h2><strong>Happifoody CAM KẾT:</strong></h2>
      
            <ul>
                <li>Cam kết 3 kh&ocirc;ng: Kh&ocirc;ng đường &ndash; Kh&ocirc;ng chất b&eacute;o xấu &ndash; Kh&ocirc;ng chất bảo quản</li>
                <li>Nguy&ecirc;n liệu nhập khẩu xuất xứ r&otilde; r&agrave;ng</li>
                <li>Hạn sử dụng: 6 Th&aacute;ng kể từ ng&agrave;y sản xuất</li>
                <li>Ng&agrave;y sản xuất: In tr&ecirc;n bao b&igrave;</li>
                <li>BẢO H&Agrave;NH, ĐỔI TRẢ SẢN PHẨM:</li>
                <li>HO&Agrave;N TIỀN V&Agrave; MIỄN PH&Iacute; đổi trả 30 ng&agrave;y trong c&aacute;c trường hợp:</li>
                <li>Sản phẩm thực tế kh&ocirc;ng giống như ảnh &amp; m&ocirc; tả</li>
                <li>H&agrave;ng bị lỗi, mốc, hỏng kh&ocirc;ng thể sử dụng hoặc ảnh hưởng tới chất lượng</li>
            </ul>', 'description_short' => '<h2>M&ocirc; Tả Sản Phẩm</h2>
      
            <p>Tr&agrave; gạo lứt l&agrave; một thức uống độc đ&aacute;o v&agrave; gi&agrave;u gi&aacute; trị dinh dưỡng từ gạo lứt &ndash; loại gạo giữ nguy&ecirc;n lớp c&aacute;m, chứa nhiều vitamin v&agrave; kho&aacute;ng chất. Tr&agrave; gạo lứt kh&ocirc;ng chỉ mang đến hương vị thơm ngon m&agrave; c&ograve;n mang lại nhiều lợi &iacute;ch cho sức khỏe. B&agrave;i viết n&agrave;y sẽ cung cấp th&ocirc;ng tin chi tiết về tr&agrave; gạo lứt, từ lịch sử, c&aacute;ch chế biến, lợi &iacute;ch sức khỏe đến c&aacute;ch sử dụng h&agrave;ng ng&agrave;y.</p>', 'quantity' => '46', 'view' => '2', 'manufacture_date' => '2024-12-19', 'expiry_date' => '2026-02-19', 'status' => '0', 'created_at' => '2024-12-19 15:21:00', 'updated_at' => '2024-12-19 17:42:03', 'deleted_at' => NULL),
            array('id' => '25', 'supplier_id' => NULL, 'sku' => NULL, 'name' => 'Thanh Ngũ Cốc TRÁI CÂY Dinh Dưỡng Gạo Lứt Rong Biển', 'slug' => 'thanh-ngu-coc-trai-cay-dinh-duong-gao-lut-rong-bien', 'img' => 'products/1734596748_6763d88c7c6ec.png', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p><strong>LƯU &Yacute;</strong>: NẾU BẠN NHẬN ĐƯỢC H&Agrave;NG M&Agrave; B&Aacute;NH BỊ MỀM TH&Igrave; BỎ V&Agrave;O TỦ LẠNH ĐỂ B&Aacute;NH CỨNG LẠI NHA. DO B&Ecirc;N TRONG B&Aacute;NH ĐƯỢC TRỘN VỚI SỐT MẬT ONG N&Ecirc;N GẶP THỜI TIẾT N&Oacute;NG RẤT DỄ BỊ MỀM. XIN CẢM ƠN.</p>
      
            <p>&nbsp;</p>
      
            <p>Thanh Ngũ Cốc Dinh Dưỡng Gạo Lứt Rong Biển Tr&aacute;i C&acirc;y</p>
      
            <p>Vị ngọt từ mật dừa nước với chỉ số đường huyết thấp</p>
      
            <p>Bổ sung protein thực vật</p>
      
            <p>Gym&nbsp;&ndash; Yoga&nbsp;&ndash; Weight Loss</p>
      
            <p>&nbsp;</p>
      
            <p>&nbsp;</p>
      
            <p><img src="https://p16-oec-va.ibyteimg.com/tos-maliva-i-o3syd03w52-us/869daf2fdbf04212ab55042d598e265b~tplv-o3syd03w52-origin-jpeg.jpeg?" style="height:1024px; width:1024px" /></p>
      
            <p>&nbsp;</p>
      
            <p>Nguy&ecirc;n liệu: mật dừa nước, cốm gạo lứt, hạt sen sấy, rong biển, m&egrave; đen, mạch nha.</p>
      
            <p>Hướng dẫn sử dụng:</p>
      
            <p>D&ugrave;ng trực tiếp.</p>
      
            <p>Ph&ugrave; hợp với người ăn ki&ecirc;ng, giảm c&acirc;n, chơi thể thao.</p>
      
            <p>Sử dụng ngay sau khi mở t&uacute;i để đảm bảo chất lượng tốt nhất.</p>
      
            <p>Hướng dẫn bảo quản: Bảo quản nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp</p>
      
            <p>Hạn sử dụng: 6 th&aacute;ng kể từ ng&agrave;y sản xuất</p>', 'description_short' => '<p>TH&Ocirc;NG TIN DINH DƯỠNG</p>
      
            <p>&ndash;&nbsp;Gi&aacute; trị dinh dưỡng trung b&igrave;nh&nbsp;tr&ecirc;n mỗi thanh: 25g</p>
      
            <p>&ndash; Năng lượng: 120&nbsp;Kcal</p>
      
            <p>&ndash; Đạm tổng: 4.28g</p>
      
            <p>&ndash; B&eacute;o tổng: 5.13g (%DV*: 6.50%)</p>
      
            <p>&ndash; Carbonhydrate: 14.18g (%DV*: 5.25%)</p>
      
            <p>&ndash; Xơ ti&ecirc;u h&oacute;a: 1.9g</p>', 'quantity' => '0', 'view' => '3', 'manufacture_date' => NULL, 'expiry_date' => NULL, 'status' => '1', 'created_at' => '2024-12-19 15:25:48', 'updated_at' => '2024-12-19 17:07:29', 'deleted_at' => NULL),
            array('id' => '27', 'supplier_id' => '12', 'sku' => 'SP515353', 'name' => 'Bánh Quy Hạnh Nhân', 'slug' => 'banh-quy-hanh-nhan', 'img' => 'products/1734603953_6763f4b12b361.jpeg', 'price_regular' => '150000', 'price_sale' => '120000', 'description' => '<p>🍪 B&aacute;nh Quy Bơ Sữa Mix Vị Đặc Biệt LSS &ndash; Hương Vị Thơm Ngon Kh&oacute; Cưỡng 😋 Kh&aacute;m ph&aacute; hương vị độc đ&aacute;o của B&aacute;nh Quy Mix Vị Đặc Biệt! Đ&acirc;y l&agrave; sự lựa chọn l&yacute; tưởng cho những ai y&ecirc;u th&iacute;ch sự mới lạ v&agrave; đẹp mắt trong từng chiếc b&aacute;nh. Với hương vị socola quyến rũ, b&aacute;nh quy n&agrave;y chắc chắn sẽ l&agrave;m m&ecirc; mẩn cả người lớn lẫn trẻ nhỏ. Đặc Điểm Nổi Bật: L&yacute; Do N&ecirc;n Chọn B&aacute;nh Quy Mix Vị: Chất Lượng Đảm Bảo: Nguy&ecirc;n liệu tự nhi&ecirc;n, an to&agrave;n cho sức khỏe. Gi&aacute; Cả Hợp L&yacute;: Vừa ngon, vừa rẻ, ph&ugrave; hợp với mọi nh&agrave;. Hương Vị C&acirc;n Bằng: B&aacute;nh quy kh&ocirc;ng qu&aacute; ngọt, ph&ugrave; hợp để thưởng thức mỗi ng&agrave;y. Thiết Kế Xinh Xắn: Từng chiếc b&aacute;nh nhỏ xinh, tinh tế trong thiết kế, th&iacute;ch hợp để tiếp đ&atilde;i kh&aacute;ch trong c&aacute;c dịp đặc biệt. Trải Nghiệm Mới Mẻ: B&aacute;nh quy mix vị mang đến sự kết hợp hương vị đặc biệt, tạo n&ecirc;n một trải nghiệm th&uacute; vị cho người thưởng thức. Hướng Dẫn Sử Dụng: Bảo Quản: Giữ b&aacute;nh ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t. D&ugrave;ng Để: Biếu tặng, ăn vặt, hoặc d&ugrave;ng trong c&aacute;c dịp lễ. Đặt h&agrave;ng ngay h&ocirc;m nay để nhận những chiếc b&aacute;nh quy mix vị tuyệt vời n&agrave;y! #banhquy #banhngon #thucpham #anvat #monngonmoingay #banhquymix #socola #banhdeptrai #monngonle_tet #amthuc Vietnam</p>', 'description_short' => '<p>Th&agrave;nh phần:&nbsp;Bột mỳ, trứng g&agrave;, đường, hạnh nh&acirc;n cắt l&aacute;t (14%), bơ, sữa bột, chất tạo xốp (E500ii, E450i, E341i), muối, hương vani tổng hợp.</p>', 'quantity' => '49', 'view' => '1', 'manufacture_date' => '2024-12-19', 'expiry_date' => NULL, 'status' => '0', 'created_at' => '2024-12-19 17:25:53', 'updated_at' => '2024-12-19 17:41:31', 'deleted_at' => NULL),
            array('id' => '28', 'supplier_id' => NULL, 'sku' => NULL, 'name' => 'Cookies Hạnh Nhân Nguyên Cám 3 VỊ Choco - Matcha - Salty Cheese Hebekery', 'slug' => 'cookies-hanh-nhan-nguyen-cam-3-vi-choco-matcha-salty-cheese-hebekery', 'img' => 'products/1734630073_67645ab969360.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>🍪 COOKIES HẠNH NH&Acirc;N NGUY&Ecirc;N C&Aacute;M CHOCO CHIPS 3 VỊ DARK CHOCO - MANGO MATCHA - CRANBERRY SALTY CHEESE - B&iacute; Quyết Healthy cho c&aacute;c chị em, c&aacute;c Mom nh&agrave; m&igrave;nh Phi&ecirc;n bản Cookies mới của nh&agrave; Hebekery c&ograve;n cho ra mắt tận 3 Hương Vị Si&ecirc;u Cuốn cực chiều l&ograve;ng c&aacute;c Mom nh&agrave; m&igrave;nh đang thai ngh&eacute;n cũng như th&egrave;m ngọt 🍫 DARK CHOCO v&agrave; CHOCO CHIP 🍵 PURE MATCHA v&agrave; XO&Agrave;I SẤY DẺO 🧀 SALTY CHEESE v&agrave; NAM VIỆT QUẤT 🍪 Cookies nh&agrave; HeBekery gi&uacute;p qu&aacute; tr&igrave;nh ăn uống của c&aacute;c mẹ bầu, mẹ sau sinh trở n&ecirc;n &quot;nh&agrave;n t&ecirc;nh&quot; v&igrave; được l&agrave;m từ bột m&igrave; nguy&ecirc;n c&aacute;m gi&agrave;u dưỡng chất c&ugrave;ng bột hạnh nh&acirc;n tự nhi&ecirc;n: - Carb Chậm từ bột m&igrave; nguy&ecirc;n c&aacute;m l&acirc;u c&ugrave;ng Chất Xơ sẽ gi&uacute;p no l&acirc;u v&agrave; đẩy l&ugrave;i cơn đ&oacute;i, một nguy&ecirc;n liệu trợ thủ đắc lực cho c&aacute;c Mom đang trong giai đoạn ốm ngh&eacute;n của thai kỳ - Protein thực vật từ bột hạnh nh&acirc;n tự nhi&ecirc;n gi&uacute;p cung cấp những chất dinh dưỡng thiết yếu cho mẹ v&agrave; b&eacute; như acid folic, sắt, canxi, c&aacute;c nh&oacute;m vitamin A v&agrave; B,... Ngo&agrave;i ra, rất nhiều c&ocirc;ng dụng tuyệt vời từ ca cao cho c&aacute;c chị em nh&agrave; m&igrave;nh c&oacute; thể kể đến như: 🍫 Gi&uacute;p chăm d&aacute;ng được hiệu quả nhờ th&uacute;c đẩy trao đổi chất 🍫 Cải thiện căng thẳng v&agrave; gi&uacute;p tỉnh t&aacute;o 🍫 Gi&uacute;p da th&ecirc;m khỏe đẹp v&agrave; tươi trẻ 🍫 Cải thiện v&agrave; tăng cường tr&iacute; nhớ 🍫 Giảm đau bụng trong c&aacute;c ng&agrave;y 🍓🍓🍓 C&Aacute;CH SỬ DỤNG - Chị em c&oacute; thể d&ugrave;ng trực tiếp hoặc ăn c&ugrave;ng sữa tươi để trải nghiệm độ ngon tăng gấp bội nhen!!! HẠN SỬ DỤNG - 4 th&aacute;ng kể từ ng&agrave;y sản xuất. Demee cực k&igrave; ấn tượng với COOKIES HẠNH NH&Acirc;N NGUY&Ecirc;N C&Aacute;M của HeBekery v&igrave; đ&acirc;y l&agrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng sử dụng đường tinh luyện m&agrave; sử dụng nguy&ecirc;n liệu từ tự nhi&ecirc;n l&agrave; mật thốt nốt để tạo vị ngọt thanh ở hậu vị cho b&aacute;nh. Kh&ocirc;ng những thế, HeBekery c&ograve;n l&agrave; một thương hiệu với: - Nguy&ecirc;n liệu c&oacute; nguồn gốc, xuất xứ r&otilde; r&agrave;ng. - B&aacute;nh lu&ocirc;n được nướng mới v&agrave; ra l&ograve; mỗi ng&agrave;y - Đạt chứng nhận chuẩn quy tr&igrave;nh sản xuất HACCP - Đạt chứng nhận ATVSTP ti&ecirc;u chuẩn ISO:22000 Chị em h&atilde;y lu&ocirc;n y&ecirc;n t&acirc;m v&igrave; c&aacute;c phẩm từ Demee - ch&uacute;ng m&igrave;nh: 🤝 Lu&ocirc;n t&igrave;m hiểu v&agrave; lựa chọn rất kĩ để giới thiệu với chị em v&agrave; c&aacute;c mẹ chỉ những sản phẩm chất lượng nhất. 🤝 Sẵn s&agrave;ng lắng nghe v&agrave; giải đ&aacute;p tất cả thắc mắc ,kh&oacute; khăn của chị em v&agrave; c&aacute;c mẹ để c&oacute; thể lựa chọn sản phẩm ph&ugrave; hợp. 🤝 Tất cả sản phẩm đều c&oacute; giấy tờ kiểm định v&agrave; chứng nhận r&otilde; r&agrave;ng n&ecirc;n c&aacute;c mẹ v&agrave; chị em c&oacute; thể ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m ạ. Demee - Để Mẹ Lo 💗</p>
      
      <p>&nbsp;</p>', 'description_short' => '<p>Thương hiệu<a href="https://shopee.vn/search?brands=2828045" target="_blank">HEBEKERY</a></p>
      
      <p>Loại b&aacute;nh quy</p>
      
      <p>B&aacute;nh quy s&ocirc; c&ocirc; la</p>
      
      <p>Trọng lượng</p>
      
      <p>250g</p>
      
      <p>Hương vị</p>
      
      <p>Chocolate, Hạnh Nh&acirc;n</p>
      
      <p>Kiểu đ&oacute;ng g&oacute;i</p>
      
      <p>G&oacute;i k&eacute;p</p>
      
      <p>Xuất xứ</p>
      
      <p>Việt Nam</p>
      
      <p>K&iacute;ch ứng</p>
      
      <p>Kh&ocirc;ng</p>
      
      <p>Giảm c&acirc;n đặc biệt</p>
      
      <p>Kh&ocirc;ng caffeine, Kh&ocirc;ng gluten, Tốt cho sức khỏe, Kh&ocirc;ng đường, Kh&ocirc;ng Trans Fat</p>
      
      <p>Hạn sử dụng</p>
      
      <p>4 th&aacute;ng</p>
      
      <p>Th&agrave;nh phần</p>
      
      <p>Cacao Trinitario v&agrave; Bột Nguy&ecirc;n C&aacute;m</p>
      
      <p>K&iacute;ch Cỡ G&oacute;i</p>
      
      <p>1Box</p>
      
      <p>T&ecirc;n tổ chức chịu tr&aacute;ch nhiệm sản xuất</p>
      
      <p>C&ocirc;ng Ty TNHH Thực Phẩm V&igrave; Sự Sống Vina</p>', 'quantity' => '0', 'view' => '0', 'manufacture_date' => NULL, 'expiry_date' => NULL, 'status' => '1', 'created_at' => '2024-12-20 00:41:13', 'updated_at' => '2024-12-20 00:41:13', 'deleted_at' => NULL),
            array('id' => '29', 'supplier_id' => '15', 'sku' => 'SP844451', 'name' => 'Trà Kombucha BẢN F&B Healthy Dùng Đường Không Calo Ăn Kiêng Bản Cà Phê', 'slug' => 'tra-kombucha-ban-fb-healthy-dung-duong-khong-calo-an-kieng-ban-ca-phe', 'img' => 'products/1734630563_67645ca373fe8.jpg', 'price_regular' => '100000', 'price_sale' => '80000', 'description' => '<p>LỢI &Iacute;CH TUYỆT VỜI CỦA TR&Agrave; KOMBUCHA</p>
      
      <p>&nbsp;</p>
      
      <p>✓ Cải thiện hệ ti&ecirc;u h&oacute;a: C&acirc;n bằng hệ vi sinh đường ruột, giảm t&igrave;nh trạng t&aacute;o b&oacute;n, đầy hơi, kh&oacute; ti&ecirc;u.</p>
      
      <p>✓ Tăng cường hệ miễn dịch: Bảo vệ cơ thể khỏi vi khuẩn, virus, tăng cường sức đề kh&aacute;ng.</p>
      
      <p>✓ Chống oxy h&oacute;a mạnh mẽ: Bảo vệ tế b&agrave;o khỏi tổn thương, l&agrave;m chậm qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a.</p>
      
      <p>✓ Cải thiện l&agrave;n da: Gi&uacute;p da s&aacute;ng mịn, giảm mụn, giảm vi&ecirc;m, tăng độ ẩm.</p>
      
      <p>✓ Hỗ trợ giảm c&acirc;n: Tăng cường trao đổi chất, giảm cảm gi&aacute;c th&egrave;m ăn.</p>
      
      <p>✓ Ổn định đường huyết: Gi&uacute;p kiểm so&aacute;t lượng đường trong m&aacute;u, đặc biệt tốt cho người tiểu đường.</p>
      
      <p>✓ Bảo vệ tim mạch: Giảm cholesterol xấu, ổn định huyết &aacute;p, giảm nguy cơ mắc bệnh tim mạch.</p>
      
      <p>✓ Thanh lọc cơ thể: Loại bỏ độc tố, tăng cường chức năng gan thận.</p>
      
      <p>✓ Cung cấp năng lượng: Gi&uacute;p cơ thể tr&agrave;n đầy năng lượng, giảm mệt mỏi.</p>
      
      <p>✓ Cải thiện t&acirc;m trạng: Gi&uacute;p giảm căng thẳng, lo &acirc;u, cải thiện t&acirc;m trạng.</p>
      
      <p>&nbsp;</p>
      
      <p>✿ Hương Chanh: Vị chua thanh m&aacute;t của chanh kết hợp h&agrave;i h&ograve;a với vị ngọt dịu của tr&agrave; Kombucha, tạo n&ecirc;n một thức uống giải nhiệt tuyệt vời. Gi&uacute;p thanh lọc cơ thể, tăng cường hệ miễn dịch v&agrave; hỗ trợ ti&ecirc;u h&oacute;a.</p>
      
      <p>✿ Hương Đ&agrave;o: Hương thơm ngọt ng&agrave;o của đ&agrave;o tươi h&ograve;a quyện c&ugrave;ng vị chua nhẹ của tr&agrave;, mang đến cảm gi&aacute;c thư gi&atilde;n v&agrave; sảng kho&aacute;i. Cung cấp vitamin C, gi&uacute;p tăng cường sức đề kh&aacute;ng v&agrave; l&agrave;m đẹp da.</p>
      
      <p>✿ Hương T&aacute;o: Vị ngọt thanh m&aacute;t của t&aacute;o kết hợp với vị chua dịu của tr&agrave;, tạo n&ecirc;n một thức uống thanh lịch v&agrave; tinh tế. Hỗ trợ ti&ecirc;u h&oacute;a, giảm cảm gi&aacute;c th&egrave;m ăn v&agrave; gi&uacute;p giảm c&acirc;n hiệu quả.</p>
      
      <p>✿ Hương Lựu: Vị chua ngọt đặc trưng của lựu c&ugrave;ng với hương thơm quyến rũ, mang đến một trải nghiệm vị gi&aacute;c độc đ&aacute;o. Chứa nhiều chất chống oxy h&oacute;a, gi&uacute;p bảo vệ tế b&agrave;o v&agrave; l&agrave;m chậm qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a.</p>
      
      <p>✿ Hương Việt Quất: Vị chua ngọt đậm đ&agrave; của việt quất kết hợp với vị tr&agrave; truyền thống, tạo n&ecirc;n một thức uống thanh m&aacute;t v&agrave; sảng kho&aacute;i. Cải thiện thị lực, tăng cường tr&iacute; nhớ v&agrave; bảo vệ tim mạch.</p>
      
      <p>&nbsp;</p>
      
      <p>Khối lượng hộp: 40g</p>
      
      <p>Xuất xứ: Việt Nam</p>
      
      <p>Trong mỗi hộp tr&agrave; được tặng th&ecirc;m 1 b&igrave;nh đựng nước 450ml v&ocirc; c&ugrave;ng tiện lợi</p>
      
      <p>Hương vị: Chanh. Đ&agrave;o, T&aacute;o, Lựu, Việt Quất</p>
      
      <p>HSD: 1 năm kể từ NSX</p>
      
      <p>NSX: xem tr&ecirc;n bao b&igrave;</p>
      
      <p>&nbsp;</p>
      
      <p>HƯỚNG DẪN SỬ DỤNG</p>
      
      <p>▪️ Uống lạnh : 150ml nước đ&aacute; + 1 g&oacute;i Kombucha lắc đều hoặc đợi tr&agrave; tan hết rồi uống.</p>
      
      <p>▪️ Uống Nhạt: 250ml ~500ml + 1 g&oacute;i Kombucha lắc đều hoặc đợi tr&agrave; tan hết rồi uống.</p>
      
      <p>&nbsp;</p>
      
      <p>Cam kết khi mua h&agrave;ng tại BẢN F&amp;B</p>
      
      <p>- Cam kết sản phẩm 100% l&agrave; sản phẩm ch&iacute;nh h&atilde;ng, đảm bảo chất lượng v&agrave; dịch vụ tốt nhất, quy c&aacute;ch đ&oacute;ng g&oacute;i, chủng loại, đ&uacute;ng theo ti&ecirc;u chuẩn nh&agrave; sản xuất.</p>
      
      <p>- Đổi trả 1-1 nếu ph&aacute;t hiện lỗi do nh&agrave; sản xuất</p>
      
      <p>- Gi&aacute; cả: Ưu đ&atilde;i khi mua số lượng lớn</p>
      
      <p>- Chứng nhận: Chứng nhận vệ sinh an to&agrave;n thực phẩm</p>
      
      <p>&nbsp;</p>
      
      <p>Cốc thủy tinh d&ugrave;ng để đựng nước, pha tr&agrave; dung t&iacute;ch 450ml</p>
      
      <p>Đ&acirc;y l&agrave; phần qu&agrave; tặng k&egrave;m cho bạn khi mua h&agrave;ng tại Shop</p>', 'description_short' => '<p>Thương hiệu<a href="https://shopee.vn/search?brands=4485945" target="_blank">BẢN F&amp;B</a></p>
      
      <p>Xuất xứ</p>
      
      <p>Việt Nam</p>
      
      <p>Hạn sử dụng</p>
      
      <p>12 th&aacute;ng</p>
      
      <p>Giảm c&acirc;n đặc biệt</p>
      
      <p>Tốt cho sức khỏe</p>
      
      <p>Hương vị</p>
      
      <p>T&aacute;o, Việt quất, Đ&agrave;o, Chanh, Lựu</p>
      
      <p>T&ecirc;n tổ chức chịu tr&aacute;ch nhiệm sản xuất</p>
      
      <p>CONG TY CO PHAN BAN CA PHE</p>', 'quantity' => '5', 'view' => '0', 'manufacture_date' => '2024-12-20', 'expiry_date' => '2025-02-21', 'status' => '0', 'created_at' => '2024-12-20 00:49:23', 'updated_at' => '2024-12-20 00:49:23', 'deleted_at' => NULL),
            array('id' => '30', 'supplier_id' => '13', 'sku' => 'SP360741', 'name' => 'GRANOLA 14 SIÊU HẠT KETO-EAT-GYM GIẢM CÂN HEALTHY', 'slug' => 'granola-14-sieu-hat-keto-eat-gym-giam-can-healthy', 'img' => 'products/1734630826_67645daae54be.jpg', 'price_regular' => '130000', 'price_sale' => '110000', 'description' => '<p>Sản phẩm: Granola 12 SI&Ecirc;U HẠT QUẢ Được mix từ 12 loại Hạt &amp; Quả nhập khẩu nguy&ecirc;n vị, nướng c&ugrave;ng yến mạch &Uacute;c &amp; mật ong hoa nh&atilde;n, đem đến vị thơm ngon, gi&ograve;n rụm, đặc biệt với 4 hương vị: hương vị mật ong nguy&ecirc;n bản, hương vị gạo lứt mic hạt, hương vị socola, hương vị matcha tr&agrave; xanh, đa dạng hương vị &amp; đ&aacute;p ứng được khẩu vị của từng bạn, rất đ&aacute;ng để d&ugrave;ng thử ạ 🍓 Th&agrave;nh phần:✨GRANOLA ✅Th&agrave;nh phần: gồm 12 c&aacute;c loại ngũ cốc v&agrave; hạt dinh dưỡng được sấy mật ong v&agrave;ng,ngon,gi&ograve;n,thơm: 1- Hạt Macca 2- Hạnh hạnh nh&acirc;n 3- Hạnh nh&acirc;n l&aacute;t 4- Hạt sen gi&ograve;n 5- Hạt điều loại 1 6- Hạt b&iacute; xanh 7- Nam việt quất sấy dẻo 8- L&yacute; chua đen sấy dẻo 9- Nho xanh, v&agrave;ng , đỏ đen sấy dẻo 10- Yến mạch 11- Mật ong 🍯 12-Hạt &oacute;c ch&oacute; 13 d&acirc;u t&acirc;y 14 gạo lứt ✅Nếu bạn kh&ocirc;ng th&iacute;ch granola Yến mạch th&igrave; h&atilde;y thử ngay granola gạo lức nh&eacute;...! l&acirc;u l&acirc;u mới c&oacute; m&oacute;n hỗ trợ giảm c&acirc;n m&agrave; cực kỳ ngon miệng như thế n&agrave;y ạ! 🍒 Sử dụng Sử dụng Granola h&agrave;ng ng&agrave;y v&agrave;o bữa s&aacute;ng &amp; bữa phụ, mỗi bữa chỉ với 2 muỗng granola tương đương 30g ~ 100 calo vừa gi&uacute;p bạn c&oacute; những bữa ăn ngon miệng, gi&agrave;u dd v&agrave; đặc biệt hơn l&agrave; gi&uacute;p săn chắc, mịn m&agrave;ng l&agrave;n da v&agrave; hỗ trợ giảm c&acirc;n, tăng cơ giảm mỡ rất hiệu quả 👌Tip: Ngo&agrave;i sử dụng trực tiếp, bạn c&oacute; thể mix c&ugrave;ng sữa chua kh&ocirc;ng đường, sữa tươi &amp; hoa quả, hương vị đa dạng v&agrave; rất ngon đ&oacute; ạ😊 🌺 Th&ocirc;ng tin bổ sung 🍍Bảo quản: Để nơi kh&ocirc; r&aacute;o, nếu chưa d&ugrave;ng hết vui l&ograve;ng nắp k&iacute;n v&agrave; cất ở ngăn lạnh tủ lạnh Hạn sử dụng: 6 Th&aacute;ng ( Sử dụng trong 20 ng&agrave;y từ khi mở nắp sản phẩm trải nghiệm hương vị tốt nhất) 🍍Trọng Lượng: 500gam</p>', 'description_short' => '<p>Danh Mục</p>
      
      <p><a href="https://shopee.vn/">Shopee</a><img alt="icon arrow right" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/966fbe37fe1c72e3f2dd.svg" /><a href="https://shopee.vn/B%C3%A1ch-H%C3%B3a-Online-cat.11036525">B&aacute;ch H&oacute;a Online</a><img alt="icon arrow right" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/966fbe37fe1c72e3f2dd.svg" /><a href="https://shopee.vn/Ng%C5%A9-c%E1%BB%91c-m%E1%BB%A9t-cat.11036525.11036570">Ngũ cốc &amp; mứt</a><img alt="icon arrow right" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/966fbe37fe1c72e3f2dd.svg" /><a href="https://shopee.vn/Ng%C5%A9-c%E1%BB%91c-cat.11036525.11036570.11036573">Ngũ cốc</a></p>
      
      <p>Số lượng h&agrave;ng khuyến m&atilde;i</p>
      
      <p>600</p>
      
      <p>Số sản phẩm c&ograve;n lại</p>
      
      <p>14391</p>
      
      <p>Xuất xứ</p>
      
      <p>Việt Nam</p>
      
      <p>Hạn sử dụng</p>
      
      <p>6 th&aacute;ng</p>
      
      <p>Trọng lượng</p>
      
      <p>500g</p>
      
      <p>Giảm c&acirc;n đặc biệt</p>
      
      <p>Kh&ocirc;ng caffeine, Kh&ocirc;ng cholesterol, Tốt cho sức khỏe, Kh&ocirc;ng lactose, Kh&ocirc;ng đường</p>
      
      <p>Ng&agrave;y hết hạn</p>
      
      <p>29-12-2025</p>
      
      <p>Địa chỉ tổ chức chịu tr&aacute;ch nhiệm sản xuất</p>
      
      <p>Ql7a, x&oacute;m 3, diễn th&agrave;nh, diễn Ch&acirc;u, Nghệ An</p>
      
      <p>T&ecirc;n tổ chức chịu tr&aacute;ch nhiệm sản xuất</p>
      
      <p>C&ocirc;ng ty cổ phần An An Agri</p>
      
      <p>K&iacute;ch Cỡ G&oacute;i</p>
      
      <p>500G/GR</p>
      
      <p>Th&agrave;nh phần</p>
      
      <p>12 loại hạt</p>
      
      <p>Số lượng</p>
      
      <p>5000</p>
      
      <p>Gửi từ</p>
      
      <p>TP. Hồ Ch&iacute; Minh</p>', 'quantity' => '5', 'view' => '1', 'manufacture_date' => '2024-12-21', 'expiry_date' => NULL, 'status' => '0', 'created_at' => '2024-12-20 00:53:46', 'updated_at' => '2024-12-20 01:06:27', 'deleted_at' => NULL)
        );


        /* `doan_totnghiep_2024`.`provinces` */
        $provinces = array(
            array('code' => '01', 'name' => 'Hà Nội', 'name_en' => 'Ha Noi', 'full_name' => 'Thành phố Hà Nội', 'full_name_en' => 'Ha Noi City', 'code_name' => 'ha_noi', 'administrative_unit_id' => '1', 'administrative_region_id' => '3'),
            array('code' => '02', 'name' => 'Hà Giang', 'name_en' => 'Ha Giang', 'full_name' => 'Tỉnh Hà Giang', 'full_name_en' => 'Ha Giang Province', 'code_name' => 'ha_giang', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '04', 'name' => 'Cao Bằng', 'name_en' => 'Cao Bang', 'full_name' => 'Tỉnh Cao Bằng', 'full_name_en' => 'Cao Bang Province', 'code_name' => 'cao_bang', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '06', 'name' => 'Bắc Kạn', 'name_en' => 'Bac Kan', 'full_name' => 'Tỉnh Bắc Kạn', 'full_name_en' => 'Bac Kan Province', 'code_name' => 'bac_kan', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '08', 'name' => 'Tuyên Quang', 'name_en' => 'Tuyen Quang', 'full_name' => 'Tỉnh Tuyên Quang', 'full_name_en' => 'Tuyen Quang Province', 'code_name' => 'tuyen_quang', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '10', 'name' => 'Lào Cai', 'name_en' => 'Lao Cai', 'full_name' => 'Tỉnh Lào Cai', 'full_name_en' => 'Lao Cai Province', 'code_name' => 'lao_cai', 'administrative_unit_id' => '2', 'administrative_region_id' => '2'),
            array('code' => '11', 'name' => 'Điện Biên', 'name_en' => 'Dien Bien', 'full_name' => 'Tỉnh Điện Biên', 'full_name_en' => 'Dien Bien Province', 'code_name' => 'dien_bien', 'administrative_unit_id' => '2', 'administrative_region_id' => '2'),
            array('code' => '12', 'name' => 'Lai Châu', 'name_en' => 'Lai Chau', 'full_name' => 'Tỉnh Lai Châu', 'full_name_en' => 'Lai Chau Province', 'code_name' => 'lai_chau', 'administrative_unit_id' => '2', 'administrative_region_id' => '2'),
            array('code' => '14', 'name' => 'Sơn La', 'name_en' => 'Son La', 'full_name' => 'Tỉnh Sơn La', 'full_name_en' => 'Son La Province', 'code_name' => 'son_la', 'administrative_unit_id' => '2', 'administrative_region_id' => '2'),
            array('code' => '15', 'name' => 'Yên Bái', 'name_en' => 'Yen Bai', 'full_name' => 'Tỉnh Yên Bái', 'full_name_en' => 'Yen Bai Province', 'code_name' => 'yen_bai', 'administrative_unit_id' => '2', 'administrative_region_id' => '2'),
            array('code' => '17', 'name' => 'Hoà Bình', 'name_en' => 'Hoa Binh', 'full_name' => 'Tỉnh Hoà Bình', 'full_name_en' => 'Hoa Binh Province', 'code_name' => 'hoa_binh', 'administrative_unit_id' => '2', 'administrative_region_id' => '2'),
            array('code' => '19', 'name' => 'Thái Nguyên', 'name_en' => 'Thai Nguyen', 'full_name' => 'Tỉnh Thái Nguyên', 'full_name_en' => 'Thai Nguyen Province', 'code_name' => 'thai_nguyen', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '20', 'name' => 'Lạng Sơn', 'name_en' => 'Lang Son', 'full_name' => 'Tỉnh Lạng Sơn', 'full_name_en' => 'Lang Son Province', 'code_name' => 'lang_son', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '22', 'name' => 'Quảng Ninh', 'name_en' => 'Quang Ninh', 'full_name' => 'Tỉnh Quảng Ninh', 'full_name_en' => 'Quang Ninh Province', 'code_name' => 'quang_ninh', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '24', 'name' => 'Bắc Giang', 'name_en' => 'Bac Giang', 'full_name' => 'Tỉnh Bắc Giang', 'full_name_en' => 'Bac Giang Province', 'code_name' => 'bac_giang', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '25', 'name' => 'Phú Thọ', 'name_en' => 'Phu Tho', 'full_name' => 'Tỉnh Phú Thọ', 'full_name_en' => 'Phu Tho Province', 'code_name' => 'phu_tho', 'administrative_unit_id' => '2', 'administrative_region_id' => '1'),
            array('code' => '26', 'name' => 'Vĩnh Phúc', 'name_en' => 'Vinh Phuc', 'full_name' => 'Tỉnh Vĩnh Phúc', 'full_name_en' => 'Vinh Phuc Province', 'code_name' => 'vinh_phuc', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '27', 'name' => 'Bắc Ninh', 'name_en' => 'Bac Ninh', 'full_name' => 'Tỉnh Bắc Ninh', 'full_name_en' => 'Bac Ninh Province', 'code_name' => 'bac_ninh', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '30', 'name' => 'Hải Dương', 'name_en' => 'Hai Duong', 'full_name' => 'Tỉnh Hải Dương', 'full_name_en' => 'Hai Duong Province', 'code_name' => 'hai_duong', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '31', 'name' => 'Hải Phòng', 'name_en' => 'Hai Phong', 'full_name' => 'Thành phố Hải Phòng', 'full_name_en' => 'Hai Phong City', 'code_name' => 'hai_phong', 'administrative_unit_id' => '1', 'administrative_region_id' => '3'),
            array('code' => '33', 'name' => 'Hưng Yên', 'name_en' => 'Hung Yen', 'full_name' => 'Tỉnh Hưng Yên', 'full_name_en' => 'Hung Yen Province', 'code_name' => 'hung_yen', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '34', 'name' => 'Thái Bình', 'name_en' => 'Thai Binh', 'full_name' => 'Tỉnh Thái Bình', 'full_name_en' => 'Thai Binh Province', 'code_name' => 'thai_binh', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '35', 'name' => 'Hà Nam', 'name_en' => 'Ha Nam', 'full_name' => 'Tỉnh Hà Nam', 'full_name_en' => 'Ha Nam Province', 'code_name' => 'ha_nam', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '36', 'name' => 'Nam Định', 'name_en' => 'Nam Dinh', 'full_name' => 'Tỉnh Nam Định', 'full_name_en' => 'Nam Dinh Province', 'code_name' => 'nam_dinh', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '37', 'name' => 'Ninh Bình', 'name_en' => 'Ninh Binh', 'full_name' => 'Tỉnh Ninh Bình', 'full_name_en' => 'Ninh Binh Province', 'code_name' => 'ninh_binh', 'administrative_unit_id' => '2', 'administrative_region_id' => '3'),
            array('code' => '38', 'name' => 'Thanh Hóa', 'name_en' => 'Thanh Hoa', 'full_name' => 'Tỉnh Thanh Hóa', 'full_name_en' => 'Thanh Hoa Province', 'code_name' => 'thanh_hoa', 'administrative_unit_id' => '2', 'administrative_region_id' => '4'),
            array('code' => '40', 'name' => 'Nghệ An', 'name_en' => 'Nghe An', 'full_name' => 'Tỉnh Nghệ An', 'full_name_en' => 'Nghe An Province', 'code_name' => 'nghe_an', 'administrative_unit_id' => '2', 'administrative_region_id' => '4'),
            array('code' => '42', 'name' => 'Hà Tĩnh', 'name_en' => 'Ha Tinh', 'full_name' => 'Tỉnh Hà Tĩnh', 'full_name_en' => 'Ha Tinh Province', 'code_name' => 'ha_tinh', 'administrative_unit_id' => '2', 'administrative_region_id' => '4'),
            array('code' => '44', 'name' => 'Quảng Bình', 'name_en' => 'Quang Binh', 'full_name' => 'Tỉnh Quảng Bình', 'full_name_en' => 'Quang Binh Province', 'code_name' => 'quang_binh', 'administrative_unit_id' => '2', 'administrative_region_id' => '4'),
            array('code' => '45', 'name' => 'Quảng Trị', 'name_en' => 'Quang Tri', 'full_name' => 'Tỉnh Quảng Trị', 'full_name_en' => 'Quang Tri Province', 'code_name' => 'quang_tri', 'administrative_unit_id' => '2', 'administrative_region_id' => '4'),
            array('code' => '46', 'name' => 'Thừa Thiên Huế', 'name_en' => 'Thua Thien Hue', 'full_name' => 'Tỉnh Thừa Thiên Huế', 'full_name_en' => 'Thua Thien Hue Province', 'code_name' => 'thua_thien_hue', 'administrative_unit_id' => '2', 'administrative_region_id' => '4'),
            array('code' => '48', 'name' => 'Đà Nẵng', 'name_en' => 'Da Nang', 'full_name' => 'Thành phố Đà Nẵng', 'full_name_en' => 'Da Nang City', 'code_name' => 'da_nang', 'administrative_unit_id' => '1', 'administrative_region_id' => '5'),
            array('code' => '49', 'name' => 'Quảng Nam', 'name_en' => 'Quang Nam', 'full_name' => 'Tỉnh Quảng Nam', 'full_name_en' => 'Quang Nam Province', 'code_name' => 'quang_nam', 'administrative_unit_id' => '2', 'administrative_region_id' => '5'),
            array('code' => '51', 'name' => 'Quảng Ngãi', 'name_en' => 'Quang Ngai', 'full_name' => 'Tỉnh Quảng Ngãi', 'full_name_en' => 'Quang Ngai Province', 'code_name' => 'quang_ngai', 'administrative_unit_id' => '2', 'administrative_region_id' => '5'),
            array('code' => '52', 'name' => 'Bình Định', 'name_en' => 'Binh Dinh', 'full_name' => 'Tỉnh Bình Định', 'full_name_en' => 'Binh Dinh Province', 'code_name' => 'binh_dinh', 'administrative_unit_id' => '2', 'administrative_region_id' => '5'),
            array('code' => '54', 'name' => 'Phú Yên', 'name_en' => 'Phu Yen', 'full_name' => 'Tỉnh Phú Yên', 'full_name_en' => 'Phu Yen Province', 'code_name' => 'phu_yen', 'administrative_unit_id' => '2', 'administrative_region_id' => '5'),
            array('code' => '56', 'name' => 'Khánh Hòa', 'name_en' => 'Khanh Hoa', 'full_name' => 'Tỉnh Khánh Hòa', 'full_name_en' => 'Khanh Hoa Province', 'code_name' => 'khanh_hoa', 'administrative_unit_id' => '2', 'administrative_region_id' => '5'),
            array('code' => '58', 'name' => 'Ninh Thuận', 'name_en' => 'Ninh Thuan', 'full_name' => 'Tỉnh Ninh Thuận', 'full_name_en' => 'Ninh Thuan Province', 'code_name' => 'ninh_thuan', 'administrative_unit_id' => '2', 'administrative_region_id' => '5'),
            array('code' => '60', 'name' => 'Bình Thuận', 'name_en' => 'Binh Thuan', 'full_name' => 'Tỉnh Bình Thuận', 'full_name_en' => 'Binh Thuan Province', 'code_name' => 'binh_thuan', 'administrative_unit_id' => '2', 'administrative_region_id' => '5'),
            array('code' => '62', 'name' => 'Kon Tum', 'name_en' => 'Kon Tum', 'full_name' => 'Tỉnh Kon Tum', 'full_name_en' => 'Kon Tum Province', 'code_name' => 'kon_tum', 'administrative_unit_id' => '2', 'administrative_region_id' => '6'),
            array('code' => '64', 'name' => 'Gia Lai', 'name_en' => 'Gia Lai', 'full_name' => 'Tỉnh Gia Lai', 'full_name_en' => 'Gia Lai Province', 'code_name' => 'gia_lai', 'administrative_unit_id' => '2', 'administrative_region_id' => '6'),
            array('code' => '66', 'name' => 'Đắk Lắk', 'name_en' => 'Dak Lak', 'full_name' => 'Tỉnh Đắk Lắk', 'full_name_en' => 'Dak Lak Province', 'code_name' => 'dak_lak', 'administrative_unit_id' => '2', 'administrative_region_id' => '6'),
            array('code' => '67', 'name' => 'Đắk Nông', 'name_en' => 'Dak Nong', 'full_name' => 'Tỉnh Đắk Nông', 'full_name_en' => 'Dak Nong Province', 'code_name' => 'dak_nong', 'administrative_unit_id' => '2', 'administrative_region_id' => '6'),
            array('code' => '68', 'name' => 'Lâm Đồng', 'name_en' => 'Lam Dong', 'full_name' => 'Tỉnh Lâm Đồng', 'full_name_en' => 'Lam Dong Province', 'code_name' => 'lam_dong', 'administrative_unit_id' => '2', 'administrative_region_id' => '6'),
            array('code' => '70', 'name' => 'Bình Phước', 'name_en' => 'Binh Phuoc', 'full_name' => 'Tỉnh Bình Phước', 'full_name_en' => 'Binh Phuoc Province', 'code_name' => 'binh_phuoc', 'administrative_unit_id' => '2', 'administrative_region_id' => '7'),
            array('code' => '72', 'name' => 'Tây Ninh', 'name_en' => 'Tay Ninh', 'full_name' => 'Tỉnh Tây Ninh', 'full_name_en' => 'Tay Ninh Province', 'code_name' => 'tay_ninh', 'administrative_unit_id' => '2', 'administrative_region_id' => '7'),
            array('code' => '74', 'name' => 'Bình Dương', 'name_en' => 'Binh Duong', 'full_name' => 'Tỉnh Bình Dương', 'full_name_en' => 'Binh Duong Province', 'code_name' => 'binh_duong', 'administrative_unit_id' => '2', 'administrative_region_id' => '7'),
            array('code' => '75', 'name' => 'Đồng Nai', 'name_en' => 'Dong Nai', 'full_name' => 'Tỉnh Đồng Nai', 'full_name_en' => 'Dong Nai Province', 'code_name' => 'dong_nai', 'administrative_unit_id' => '2', 'administrative_region_id' => '7'),
            array('code' => '77', 'name' => 'Bà Rịa - Vũng Tàu', 'name_en' => 'Ba Ria - Vung Tau', 'full_name' => 'Tỉnh Bà Rịa - Vũng Tàu', 'full_name_en' => 'Ba Ria - Vung Tau Province', 'code_name' => 'ba_ria_vung_tau', 'administrative_unit_id' => '2', 'administrative_region_id' => '7'),
            array('code' => '79', 'name' => 'Hồ Chí Minh', 'name_en' => 'Ho Chi Minh', 'full_name' => 'Thành phố Hồ Chí Minh', 'full_name_en' => 'Ho Chi Minh City', 'code_name' => 'ho_chi_minh', 'administrative_unit_id' => '1', 'administrative_region_id' => '7'),
            array('code' => '80', 'name' => 'Long An', 'name_en' => 'Long An', 'full_name' => 'Tỉnh Long An', 'full_name_en' => 'Long An Province', 'code_name' => 'long_an', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '82', 'name' => 'Tiền Giang', 'name_en' => 'Tien Giang', 'full_name' => 'Tỉnh Tiền Giang', 'full_name_en' => 'Tien Giang Province', 'code_name' => 'tien_giang', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '83', 'name' => 'Bến Tre', 'name_en' => 'Ben Tre', 'full_name' => 'Tỉnh Bến Tre', 'full_name_en' => 'Ben Tre Province', 'code_name' => 'ben_tre', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '84', 'name' => 'Trà Vinh', 'name_en' => 'Tra Vinh', 'full_name' => 'Tỉnh Trà Vinh', 'full_name_en' => 'Tra Vinh Province', 'code_name' => 'tra_vinh', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '86', 'name' => 'Vĩnh Long', 'name_en' => 'Vinh Long', 'full_name' => 'Tỉnh Vĩnh Long', 'full_name_en' => 'Vinh Long Province', 'code_name' => 'vinh_long', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '87', 'name' => 'Đồng Tháp', 'name_en' => 'Dong Thap', 'full_name' => 'Tỉnh Đồng Tháp', 'full_name_en' => 'Dong Thap Province', 'code_name' => 'dong_thap', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '89', 'name' => 'An Giang', 'name_en' => 'An Giang', 'full_name' => 'Tỉnh An Giang', 'full_name_en' => 'An Giang Province', 'code_name' => 'an_giang', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '91', 'name' => 'Kiên Giang', 'name_en' => 'Kien Giang', 'full_name' => 'Tỉnh Kiên Giang', 'full_name_en' => 'Kien Giang Province', 'code_name' => 'kien_giang', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '92', 'name' => 'Cần Thơ', 'name_en' => 'Can Tho', 'full_name' => 'Thành phố Cần Thơ', 'full_name_en' => 'Can Tho City', 'code_name' => 'can_tho', 'administrative_unit_id' => '1', 'administrative_region_id' => '8'),
            array('code' => '93', 'name' => 'Hậu Giang', 'name_en' => 'Hau Giang', 'full_name' => 'Tỉnh Hậu Giang', 'full_name_en' => 'Hau Giang Province', 'code_name' => 'hau_giang', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '94', 'name' => 'Sóc Trăng', 'name_en' => 'Soc Trang', 'full_name' => 'Tỉnh Sóc Trăng', 'full_name_en' => 'Soc Trang Province', 'code_name' => 'soc_trang', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '95', 'name' => 'Bạc Liêu', 'name_en' => 'Bac Lieu', 'full_name' => 'Tỉnh Bạc Liêu', 'full_name_en' => 'Bac Lieu Province', 'code_name' => 'bac_lieu', 'administrative_unit_id' => '2', 'administrative_region_id' => '8'),
            array('code' => '96', 'name' => 'Cà Mau', 'name_en' => 'Ca Mau', 'full_name' => 'Tỉnh Cà Mau', 'full_name_en' => 'Ca Mau Province', 'code_name' => 'ca_mau', 'administrative_unit_id' => '2', 'administrative_region_id' => '8')
        );

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
