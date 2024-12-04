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
      array('id' => '1', 'sku' => NULL, 'name' => 'Cookies Hạnh Nhân Nguyên Cám Choco', 'slug' => 'cookies-hanh-nhan-nguyen-cam-choco', 'img' => 'products/1732270803_67405ad39b6d3.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<h2><strong>B&Aacute;NH COOKIE HẠNH NH&Acirc;N NGUY&Ecirc;N C&Aacute;M 3 VỊ HEALTHY - ĂN NGON KH&Ocirc;NG LO VỀ D&Aacute;NG</strong></h2>
                
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
                
                <p>&nbsp;Hương Vị Si&ecirc;u Cuốn cực chiều l&ograve;ng c&aacute;c Mom nh&agrave; m&igrave;nh đang thai ngh&eacute;n cũng như th&egrave;m ngọt 🍫 DARK CHOCO&nbsp;</p>', 'quantity' => NULL, 'view' => '22', 'status' => '1', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-03 16:31:43', 'deleted_at' => NULL),
      array('id' => '2', 'sku' => NULL, 'name' => 'Granola Ngũ Cốc Siêu Hạt Ăn Kiêng Healthy Vigonuts', 'slug' => 'granola-ngu-coc-sieu-hat-an-kieng-healthy-vigonuts', 'img' => 'products/1732270675_67405a532279c.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p><strong>Granola ngũ cốc si&ecirc;u hạt ăn ki&ecirc;ng Healthy Vigonuts</strong>&nbsp;l&agrave; một m&oacute;n ăn quen thuộc của người Mỹ v&agrave;o mỗi buổi s&aacute;ng, l&agrave; hỗn hợp chứa nhiều th&agrave;nh phần hạt, tr&aacute;i c&acirc;y kh&ocirc;, yến mạch,&hellip;Đ&acirc;y đều được xem l&agrave; những thực phẩm thuần chay, ph&ugrave; hợp với những người ăn ki&ecirc;ng, giảm c&acirc;n, cung cấp đầy đủ năng lượng cho cơ thể. H&atilde;y c&ugrave;ng t&igrave;m hiểu về những đặc điểm nổi bật v&agrave; c&aacute;ch sử dụng sản phẩm n&agrave;y.</p>
                
                <p><img alt="" src="https://vigonuts.com.vn/wp-content/uploads/2022/11/ngu-coc-dinh-duong-granola-sieu-hat-500gr-1-2.jpg" style="height:1000px; width:1000px" /></p>
                
                <h3>ĐẶC ĐIỂM SẢN PHẨM</h3>
                
                <p>&ndash; Granola ngũ cốc si&ecirc;u hạt ăn ki&ecirc;ng Healthy Vigonuts tốt cho mọi lứa tuổi đặc biệt l&agrave; trẻ nhỏ biếng ăn, người đang muốn giảm c&acirc;n, phụ nữ sau khi sinh v&agrave; cho con b&uacute;, người gi&agrave; nhằm bổ sung năng lượng, chất xơ v&agrave; vitamin.</p>
                
                <p>&ndash; C&aacute;c loại hạt trong ngũ cốc granola đ&atilde; được rang, sấy ch&iacute;n do đ&oacute; c&oacute; thể sử dụng trực tiếp như 1 loại snack tại nh&agrave;, văn ph&ograve;ng, hoặc mang đi du lịch. Sản phẩm đ&oacute;ng hộp c&oacute; nắp n&ecirc;n rất tiện v&agrave; sạch sẽ, dễ d&agrave;ng bảo quản sau khi khui nắp sử dụng sản phẩm.</p>
                
                <p>&ndash; Sản phẩm c&oacute; thể kết hợp với sữa chua đem lại cảm gi&aacute;c lạ miệng, gi&uacute;p đẹp da v&agrave; hỗ trợ t&iacute;ch cực cho sức đề kh&aacute;ng của cơ thể ăn xế hoặc bữa giữa giờ.</p>
                
                <p>&ndash; Hạt ngũ cốc ngũ cốc si&ecirc;u hạt ăn ki&ecirc;ng Healthy Vigonuts được đ&oacute;ng trong hộp nhựa 500gr tiện lợi để bạn c&oacute; thể mang theo b&ecirc;n m&igrave;nh trong những chuyến đi d&atilde; ngooại.</p>
                
                <p>Granola ngũ cốc của Vigonuts l&agrave; sự kết hợp ho&agrave;n hảo giữa c&aacute;c loại hạt đ&atilde; được rang, sấy ch&iacute;n c&ugrave;ng với c&aacute;c loại tr&aacute;i c&acirc;y kh&ocirc; v&agrave; yến mạch. Điểm đặc biệt của sản phẩm l&agrave; kh&ocirc;ng chứa đường, kh&ocirc;ng chất bảo quản, ph&ugrave; hợp cho những người muốn duy tr&igrave; chế độ ăn l&agrave;nh mạnh.</p>
                
                <p>Với th&agrave;nh phần gi&agrave;u dinh dưỡng, Granola ngũ cốc Vigonuts cung cấp đầy đủ năng lượng cho cơ thể, gi&uacute;p bổ sung chất xơ v&agrave; vitamin cần thiết. Đồng thời, sản phẩm rất tiện lợi để mang theo trong những chuyến đi hoặc sử dụng l&agrave;m snack tại nh&agrave;, văn ph&ograve;ng.</p>
                
                <p><img alt="" src="https://vigonuts.com.vn/wp-content/uploads/2022/11/ngu-coc-dinh-duong-granola-sieu-hat-500gr.jpg" style="height:1000px; width:1000px" /></p>
                
                <h3>C&aacute;ch Sử Dụng</h3>
                
                <p>Granola ngũ cốc si&ecirc;u hạt ăn ki&ecirc;ng Healthy Vigonuts c&oacute; thể được sử dụng theo nhiều c&aacute;ch kh&aacute;c nhau:</p>
                
                <p>&ndash; Trực Tiếp: Sản phẩm đ&atilde; được rang, sấy ch&iacute;n n&ecirc;n bạn c&oacute; thể sử dụng trực tiếp như một loại snack ngon v&agrave; bổ dưỡng.</p>
                
                <p>&ndash; Kết Hợp Với Sữa Chua: H&ograve;a quyện hương vị của granola c&ugrave;ng sữa chua sẽ tạo ra một bữa ăn s&aacute;ng l&yacute; tưởng, gi&uacute;p da đẹp v&agrave; tăng cường sức kh&aacute;ng.</p>
                
                <p>&ndash; Ăn K&egrave;m Frappuccino: Th&ecirc;m một &iacute;t granola v&agrave;o ly frappuccino y&ecirc;u th&iacute;ch để tạo lớp vị gi&ograve;n ngon cho thức uống.</p>
                
                <h2>Hướng dẫn sử dụng v&agrave; bảo quản</h2>
                
                <p>&ndash; D&ugrave;ng ngay sau khi mở bao b&igrave;, kh&ocirc;ng cần chế biến.</p>
                
                <p>&ndash; Th&iacute;ch hợp l&agrave;m qu&agrave; tặng cho người th&acirc;n v&agrave; bạn b&egrave;.</p>
                
                <p>&ndash; Bảo quản k&iacute;n sau khi mở g&oacute;i để giữ hương vị tốt nhất.</p>
                
                <p>&ndash; Để sản phẩm ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp.</p>
                
                <p><strong>LƯU &Yacute;</strong></p>
                
                <p>&ndash; Kh&ocirc;ng sử dụng sản phẩm nếu c&oacute; biến đổi về m&agrave;u sắc hoặc m&ugrave;i vị.</p>
                
                <p>&ndash; Ngưng sử dụng nếu c&oacute; dấu hiệu dị ứng với bất kỳ th&agrave;nh phần n&agrave;o của sản phẩm.</p>
                
                <p><strong>Granola Ngũ Cốc Si&ecirc;u Hạt Ăn Ki&ecirc;ng Healthy Vigonuts 500g</strong>&nbsp;l&agrave; lựa chọn ho&agrave;n hảo cho những người muốn t&igrave;m kiếm một sản phẩm dinh dưỡng, tiện lợi v&agrave; ngon miệng. H&atilde;y kh&aacute;m ph&aacute; v&agrave; trải nghiệm ngay sản phẩm n&agrave;y để cảm nhận sự hấp dẫn từ những hạt ngũ cốc thơm ngon của Vigonuts!</p>', 'description_short' => '<p>Thương hiệu: Vigonuts</p>
                
                <p>Xuất xứ: Việt Nam</p>
                
                <p>Th&agrave;nh phần: Hạt điều, hạt maca, hạt hạnh nh&acirc;n, &oacute;c ch&oacute; Harley ,xo&agrave;i Th&aacute;i sấy dẻo, b&iacute; xanh Ấn Độ, yến mạch, gạo lứt, mật ong&hellip;</p>
                
                <p>Hạn sử dụng: 6 th&aacute;ng kể từ ng&agrave;y sản xuất</p>
                
                <p>Ng&agrave;y sản xuất: In tr&ecirc;n bao b&igrave; sản phẩm</p>', 'quantity' => NULL, 'view' => '40', 'status' => '1', 'created_at' => '2024-11-22 04:52:14', 'updated_at' => '2024-12-03 10:51:18', 'deleted_at' => NULL),
      array('id' => '4', 'sku' => 'SP157866', 'name' => 'Bánh Ngói Hạnh Nhân Ăn Kiêng Siêu Hạt Keto Hộp Tiện Lợi 160g', 'slug' => 'banh-ngoi-hanh-nhan-an-kieng-sieu-hat-keto-hop-tien-loi-160g', 'img' => 'products/1732271495_67405d87071b9.jpg', 'price_regular' => '149000', 'price_sale' => '129000', 'description' => '<h1><strong>B&Aacute;NH NG&Oacute;I HẠNH NH&Acirc;N SI&Ecirc;U HẠT ĂN KI&Ecirc;NG CHUẨN KETO HEBEKERY BY HEBE</strong></h1>
                
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
                
                <p>&nbsp;</p>', 'quantity' => '44', 'view' => '4', 'status' => '0', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-12-03 11:39:44', 'deleted_at' => NULL),
      array('id' => '5', 'sku' => NULL, 'name' => 'Bánh Thuyền Siêu Hạt Dinh Dưỡng', 'slug' => 'banh-thuyen-sieu-hat-dinh-duong', 'img' => 'products/1732272143_6740600f45158.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p><strong>B&aacute;nh thuyền mix si&ecirc;u hạt dinh dưỡng</strong>&nbsp;l&agrave; một sản phẩm v&ocirc; c&ugrave;ng hấp dẫn của thương hiệu Vigonuts. Với nguồn nguy&ecirc;n liệu chất lượng cao v&agrave; quy tr&igrave;nh sản xuất kh&eacute;p k&iacute;n, sản phẩm đ&atilde; chinh phục h&agrave;ng ng&agrave;n người ti&ecirc;u d&ugrave;ng kh&ocirc;ng chỉ bởi vị ngon m&agrave; c&ograve;n bởi gi&aacute; trị dinh dưỡng.</p>
                
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
                
                <p>Ng&agrave;y sản xuất: In tr&ecirc;n bao b&igrave; sản phẩm</p>', 'quantity' => '0', 'view' => '0', 'status' => '1', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
      array('id' => '6', 'sku' => NULL, 'name' => 'Thanh Hạt Muối Hồng Dinh Dưỡng 114Kcal', 'slug' => 'thanh-hat-muoi-hong-dinh-duong-114kcal', 'img' => 'products/1732273116_674063dc44e64.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>THANH NĂNG LƯỢNG SI&Ecirc;U HẠT MUỐI HỒNG by HEBEKERY - Nguồn năng lượng #healthy v&agrave; tiện lợi d&agrave;nh cho c&aacute;c c&ocirc; N&agrave;ng c&ocirc;ng sở!</p>
                
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
                
                <p>✅&nbsp;Chứa&nbsp;chất b&eacute;o tốt, kh&ocirc;ng chứa chất bảo quản</p>', 'quantity' => NULL, 'view' => '11', 'status' => '1', 'created_at' => '2024-11-22 10:48:44', 'updated_at' => '2024-11-27 17:29:25', 'deleted_at' => NULL),
      array('id' => '8', 'sku' => 'SP160564', 'name' => 'Bánh Mì Đen Nguyên Cám, Healthy, Eatclean 250g', 'slug' => 'banh-mi-den-nguyen-cam-healthy-eatclean-250g', 'img' => 'products/1732618355_6745a87311c26.jpg', 'price_regular' => '153000', 'price_sale' => '135000', 'description' => '<p><strong>B&aacute;nh M&igrave; Đen Nguy&ecirc;n C&aacute;m - Healthy, Eatclean (Nướng mỗi ng&agrave;y)</strong><br />
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
      
      <p>🥪 Hạn sử dụng của b&aacute;nh m&igrave; đen : 6 ng&agrave;y ở nơi kh&ocirc; ráo thoáng mát / 10 ng&agrave;y tủ m&aacute;t / 30 ng&agrave;y tủ đ&ocirc;ng</p>', 'quantity' => '40', 'view' => '3', 'status' => '0', 'created_at' => '2024-11-26 10:52:35', 'updated_at' => '2024-12-03 11:41:11', 'deleted_at' => NULL),
      array('id' => '9', 'sku' => NULL, 'name' => 'HẠT ĐIỀU RANG MUỐI NGUYÊN LỤA BÌNH PHƯỚC', 'slug' => 'hat-dieu-rang-muoi-nguyen-lua-binh-phuoc', 'img' => 'products/1732619637_6745ad755da75.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>✅Hạt điều rang muối Mẹ r&ocirc; cam kết b&aacute;n h&agrave;ng uy t&iacute;n, chuẩn size (k&iacute;ch thước hạt), hạt mới rang gi&ograve;n, dễ tr&oacute;c lụa, đ&oacute;ng g&oacute;i cẩn thận để mang đến cho kh&aacute;ch h&agrave;ng sự h&agrave;i l&ograve;ng</p>
      
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
      
      <p>T&ecirc;n tổ chức chịu tr&aacute;ch nhiệm sản xuất: Hộ Kinh Doanh Thực Phẩm Sạch Mẹ R&ocirc;</p>', 'quantity' => NULL, 'view' => '5', 'status' => '1', 'created_at' => '2024-11-26 11:13:57', 'updated_at' => '2024-12-03 11:41:01', 'deleted_at' => NULL),
      array('id' => '10', 'sku' => NULL, 'name' => 'Nhân hạt óc chó tách vỏ ANNUT, hạt ngũ cốc dinh dưỡng, ăn kiêng, giảm cân', 'slug' => 'nhan-hat-oc-cho-tach-vo-annut-hat-ngu-coc-dinh-duong-an-kieng-giam-can', 'img' => 'products/1732620293_6745b0054c579.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>Hạt &oacute;c ch&oacute; t&aacute;ch vỏ ANNUT nh&acirc;n &oacute;c ch&oacute; v&agrave;ng Chile hạt ngũ cốc dinh dưỡng cho b&agrave; bầu,b&eacute;</p>
      
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
      
      <p>Địa chỉ tổ chức chịu tr&aacute;ch nhiệm sản xuất C&Ocirc;NG TY TNHH TM DV N&Ocirc;NG SẢN TRUNG HƯNG</p>', 'quantity' => NULL, 'view' => '3', 'status' => '1', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-12-03 11:49:48', 'deleted_at' => NULL),
      array('id' => '13', 'sku' => NULL, 'name' => 'Bánh mì đen hoa cúc - Không đường - Thơm mềm - Nhiều chất Xơ', 'slug' => 'banh-mi-den-hoa-cuc-khong-duong-thom-mem-nhieu-chat-xo', 'img' => 'products/1733202143_674e90df660cc.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p><strong>B&aacute;nh m&igrave; đen hoa c&uacute;c - Kh&ocirc;ng đường - Thơm mềm - Nhiều chất xơ</strong></p>
      
      <p>B&aacute;nh m&igrave; đen hoa c&uacute;c l&agrave; lựa chọn ho&agrave;n hảo cho những ai y&ecirc;u th&iacute;ch hương vị tự nhi&ecirc;n v&agrave; quan t&acirc;m đến sức khỏe. Với th&agrave;nh phần kh&ocirc;ng đường, b&aacute;nh m&igrave; mang đến sự lựa chọn l&agrave;nh mạnh cho người ăn ki&ecirc;ng hoặc cần kiểm so&aacute;t đường huyết. B&aacute;nh thơm nhẹ m&ugrave;i hoa c&uacute;c, kết hợp với kết cấu mềm mịn, dễ ăn, ph&ugrave; hợp với mọi lứa tuổi. Đặc biệt, b&aacute;nh gi&agrave;u chất xơ, hỗ trợ tốt cho hệ ti&ecirc;u h&oacute;a v&agrave; mang lại cảm gi&aacute;c no l&acirc;u.</p>
      
      <p><img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lmf1bzmvhja7cf" /></p>
      
      <p>Thưởng thức b&aacute;nh m&igrave; đen hoa c&uacute;c như một bữa s&aacute;ng nhanh gọn hoặc bữa nhẹ đầy dinh dưỡng!</p>', 'description_short' => '<p>😝 B&aacute;nh m&igrave; đen hoa c&uacute;c - Thơm dịu d&agrave;ng Ngon ngỡ ng&agrave;ng m&agrave; kh&ocirc;ng tăng k&iacute;</p>
      
      <p>😍 😎 CỰC PHẨM B&aacute;nh m&igrave; đen Hoa c&uacute;c nh&agrave; Snap với th&agrave;nh phần từ bột l&uacute;a mạch đen, bột ngũ cốc, tinh hoa cam Ph&aacute;p - Chuẩn Healthy c&acirc;n mọi bữa ăn, chỉ 148 calories/100gr</p>
      
      <p>🥰 Thơm mềm, hương dịu nhẹ - B&aacute;nh m&igrave; đen Hoa c&uacute;c với gi&aacute; chỉ từ 45k/chiếc</p>', 'quantity' => NULL, 'view' => '2', 'status' => '1', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-03 16:32:03', 'deleted_at' => NULL),
      array('id' => '14', 'sku' => 'SP152217', 'name' => 'Trái Cây Sấy Dẻo Không Đường 500g Mix 5 loại Dâu Tây, Kiwi, Nam Việt Quất, Xoài, Nho nhập khẩu, Hoa quả sấy dẻo', 'slug' => 'trai-cay-say-deo-khong-duong-500g-mix-5-loai-dau-tay-kiwi-nam-viet-quat-xoai-nho-nhap-khau-hoa-qua-say-deo', 'img' => 'products/1733202914_674e93e21ffc4.jpg', 'price_regular' => '209000', 'price_sale' => '113950', 'description' => '<p>TH&Ocirc;NG TIN SẢN PHẨM _ Đối tượng sử dụng: Người lớn v&agrave; trẻ em từ 18 th&aacute;ng tuổi. Phụ nữ trong thời gian mang thai v&agrave; cho con b&uacute;. Người đang theo c&aacute;c chế độ ăn ki&ecirc;ng v&agrave; c&aacute;c chế độ ăn l&agrave;nh mạnh, người ăn chay, ăn healthy, keto, eatclean/ eat clean, das, lowcarb/ low carb v&agrave; nocarb/no carb _ Th&agrave;nh phần dinh dưỡng: Vitamin B, C, E, D, K, B15, Mangan, Kali, Natri, Magie, Canxi, Folate, Protein, Chất xơ, Chất chống Oxy h&oacute;a. _ Gi&aacute; trị dinh dưỡng: 5.6g chất xơ, 2.3g Protein, 0.74g chất b&eacute;o tổng hợp, năng lượng 654Kcal, canxi 85mg _ Hướng dẫn sử dụng: D&ugrave;ng ngay kh&ocirc;ng qua chế biến. _ Bảo quản: Nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh &aacute;nh nắng trực tiếp. _ Hạn sử dụng: 6 Th&aacute;ng (sử dụng trong 30 ng&agrave;y từ khi mở nắp sản phẩm trải nghiệm hương vị tốt nhất) _</p>
      
      <p>C&aacute;c loại tr&aacute;i c&acirc;y sấy đều kh&ocirc;ng sử dụng đường trong suốt qu&aacute; tr&igrave;nh sản xuất. Mỗi loại tr&aacute;i c&acirc;y đều chứa rất nhiều vitamin v&agrave; kho&aacute;ng chất, gi&uacute;p củng cố hệ thống miễn dịch để cơ thể lu&ocirc;n khỏe mạnh, giảm cảm gi&aacute;c mệt mỏi, uể oải, thiếu sức sống. Hương vị thơm ngon, chua ngọt dễ ăn, gi&uacute;p k&iacute;ch th&iacute;ch vị gi&aacute;c v&agrave; hỗ trợ hệ ti&ecirc;u ho&aacute; hoạt động hiệu quả.</p>
      
      <p>Ph&acirc;n phối bởi: C&ocirc;ng ty TNHH thương mại tổng hợp Bắc Nam ễn Đức Cảnh, Phường T&acirc;n Mai, Quận Ho&agrave;ng Mai, Th&agrave;nh phố H&agrave; Nội</p>
      
      <p>M&aacute;ch nhỏ: Ngo&agrave;i sửa dụng ăn vặt trực tiếp , bạn cũng c&oacute; thể mix c&ugrave;ng 1 hộp sữa chua nho nhỏ v&agrave;o bữa phụ, cực kỳ ngon v&agrave; chất lượng lu&ocirc;n ạ.</p>
      
      <p>Bạn n&ecirc;n sử dụng khoảng 50g tr&aacute;i c&acirc;y sấy dẻo mỗi ng&agrave;y l&agrave; cung cấp đủ dinh dưỡng, năng lượng v&agrave; c&oacute; hiệu quả nhất bạn nh&eacute;!</p>', 'description_short' => '<p>Mix từ 5 loại tr&aacute;i c&acirc;y tươi ngon nhập khẩu: Nho Mỹ, Xo&agrave;i, Nam Việt Quất Canada, Kiwi New Zealand, D&acirc;u t&acirc;y Th&aacute;i, hoa quả sấy dẻo vừa phải đảm bảo độ mọng v&agrave; thơm nguy&ecirc;n chất...</p>
      
      <p>H&ograve;a quyện vị chua ngọt thanh nhẹ tự nhi&ecirc;n v&agrave; m&ugrave;i thơm từ tr&aacute;i c&acirc;y ch&iacute;n.</p>', 'quantity' => '100', 'view' => '2', 'status' => '0', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 23:14:42', 'deleted_at' => NULL),
      array('id' => '15', 'sku' => NULL, 'name' => '500G Chuối Sấy Dẻo Đặc Sản Đà Lạt, đồ ăn vặt hoa quả sấy, Mứt Chuối Sấy Dẻo, Ô mai - Mứt tết', 'slug' => '500g-chuoi-say-deo-dac-san-da-lat-do-an-vat-hoa-qua-say-mut-chuoi-say-deo-o-mai-mut-tet', 'img' => 'products/1733203543_674e965789c6e.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>Lợi &iacute;ch của 1kg chuối sấy dẻo kh&ocirc;ng đường:</p>
      
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
      
      <p>Chuối sấy dẻo Trong quả chuối chứa rất nhiều vi chất dinh dưỡng bảo vệ hệ miễn dịch v&agrave; ngăn ngừa hiệu quả c&aacute;c bệnh m&atilde;n t&iacute;nh. Bởi vậy, 1-2 quả chuối tươi mỗi ng&agrave;y gi&uacute;p c&oacute; một thể trạng b&igrave;nh thường v&agrave; sức khỏe ổn định. Tương đương với 50g chuối sứ sấy dẻo để chăm s&oacute;c v&agrave; bảo vệ tốt nhất cho sức khỏe của ch&iacute;nh m&igrave;nh.</p>', 'quantity' => '0', 'view' => '3', 'status' => '1', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-04 13:54:51', 'deleted_at' => NULL)
    );

    foreach ($products as $product) {
      Product::create($product);
    }
  }
}
