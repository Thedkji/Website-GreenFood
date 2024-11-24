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
          
          <p>&nbsp;Hương Vị Si&ecirc;u Cuốn cực chiều l&ograve;ng c&aacute;c Mom nh&agrave; m&igrave;nh đang thai ngh&eacute;n cũng như th&egrave;m ngọt 🍫 DARK CHOCO&nbsp;</p>', 'quantity' => NULL, 'view' => '19', 'status' => '1', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-11-22 11:15:08', 'deleted_at' => NULL),
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
          
          <p>Ng&agrave;y sản xuất: In tr&ecirc;n bao b&igrave; sản phẩm</p>', 'quantity' => NULL, 'view' => '37', 'status' => '1', 'created_at' => '2024-11-22 04:52:14', 'updated_at' => '2024-11-22 11:14:56', 'deleted_at' => NULL),
            array('id' => '3', 'sku' => NULL, 'name' => 'Bánh Biscotti Ăn Kiêng Nguyên Cám Không Đường 250g', 'slug' => 'banh-biscotti-an-kieng-nguyen-cam-khong-duong-250g', 'img' => 'products/1732273285_67406485bf201.jpg', 'price_regular' => NULL, 'price_sale' => NULL, 'description' => '<p>B&aacute;nh Biscotti Ăn Ki&ecirc;ng- Nguy&ecirc;n C&aacute;m Kh&ocirc;ng Đường 250g</p>
          
          <p>🌿 Th&agrave;nh Phần: Bột nguy&ecirc;n c&aacute;m ( kh&ocirc;ng tẩy), mật ong nguy&ecirc;n chất, trứng g&agrave;, c&aacute;c loại hạt ( hạnh nh&acirc;n, điều, b&iacute; xanh, nho)</p>
          
          <p>🌿 Hướng dẫn sử dụng: D&ugrave;ng trực tiếp 2-3 miếng trước c&aacute;c buổi tập, d&ugrave;ng cho bữa ăn phụ thay Snack th&ocirc;ng thường, d&ugrave;ng ăn s&aacute;ng ăn vặt, kh&ocirc;ng n&ecirc;n d&ugrave;ng qu&aacute; nhiều một lần để tr&aacute;nh kh&oacute; ti&ecirc;u.</p>
          
          <p>🌿 C&ocirc;ng dụng: tinh bột trong bột nguy&ecirc;n c&aacute;m chuyển ho&aacute; chậm gi&uacute;p n&oacute; l&acirc;u, ức chế cơn th&egrave;m ăn, gi&uacute;p giảm c&acirc;n nhưng kh&ocirc;ng mất sức. 🌿B&aacute;nh l&agrave;m từ bột nguy&ecirc;n c&aacute;m, kh&ocirc;ng bơ sữa, đường k&iacute;nh n&ecirc;n c&oacute; thể cứng hơn so với b&aacute;nh th&ocirc;ng thường. đ&acirc;y l&agrave; sản phẩm ăn ki&ecirc;ng n&ecirc;n kh&aacute;ch đừng so s&aacute;nh với b&aacute;nh thường nha.</p>
          
          <p>🌿Đ&acirc;y l&agrave; m&oacute;n ăn vặt si&ecirc;u tiện lợi, si&ecirc;u ngon m&agrave; c&ograve;n kh&ocirc;ng lo b&eacute;o. Với những bạn eatclean, giảm c&acirc;n, hay những healthy lifestyle th&igrave; m&oacute;n b&aacute;nh n&agrave;y chắc chắn kh&ocirc;ng l&agrave;m bạn thất vọng.</p>
          
          <p><img alt="Dscf9332" src="https://thefittuna.com/wp-content/uploads/2022/07/DSCF9332.jpeg" /></p>
          
          <p>HSD: 2 th&aacute;ng kể từ ng&agrave;y sản xuất in tr&ecirc;n bao b&igrave;.</p>
          
          <p>Nutrition fact trong 100g Calo~ 343 calo</p>
          
          <p>SẢN PHẨM NH&Agrave; TUNA CAM KẾT:</p>
          
          <p>🌿 KH&Ocirc;NG ĐƯỜNG TRẮNG</p>
          
          <p>🌿 KH&Ocirc;NG CHẤT BẢO QUẢN, PHẨM M&Agrave;U</p>
          
          <p>🌿TH&Agrave;NH PHẦN TỪ NHI&Ecirc;N</p>
          
          <p>🌿 XUẤT XỨ NGUY&Ecirc;N LIỆU R&Otilde; R&Agrave;NG</p>
          
          <p>🌿 C&Oacute; GIẤY CN ĐỦ ĐIỀU KIỆN VSATTP</p>
          
          <p>⚠️ Kh&aacute;ch lưu &yacute; gi&uacute;p shop: v&igrave; số lượng đơn h&agrave;ng nhiều n&ecirc;n shop check bằng m&aacute;y v&agrave; đi theo bill chứ kh&ocirc;ng đi theo note của kh&aacute;ch được, mong kh&aacute;ch th&ocirc;ng cảm ạ. Nếu kh&aacute;ch cần gấp c&oacute; thể gọi cho shop nh&eacute; ❤️</p>
          
          <p>⚠️ B&aacute;nh c&oacute; thể bị bể vỡ trong qu&aacute; tr&igrave;nh vận chuyển đi xa. Kh&aacute;ch ở c&aacute;c tỉnh vui l&ograve;ng c&acirc;n nhắc trước khi đặt h&agrave;ng ạ. Shop Cảm ơn❤️</p>
          
          <p>⚠️ ĐƯỜNG TRONG NUTRITION L&Agrave; TỪ MẬT ONG V&Agrave; HẠT TR&Aacute;I. SẢN PHẨM HO&Agrave;N TO&Agrave;N NGỌT TỰ NHI&Ecirc;N. KH&Ocirc;NG ĐƯỜNG TRẮNG. PH&Aacute;T HIỆN ĐƯỜNG TRẮNG ĐỀN GẤP 100 .</p>', 'description_short' => '<ul>
              <li>Th&agrave;nh Phần Tự Nhi&ecirc;n</li>
              <li>Kh&ocirc;ng đường tinh luyện</li>
              <li>Kh&ocirc;ng ho&aacute; chất, phẩm m&agrave;u</li>
              <li>Kh&ocirc;ng chất bảo quản.</li>
              <li>Nguy&ecirc;n Liệu nguồn gốc xuất xứ r&otilde; r&agrave;ng</li>
          </ul>', 'quantity' => NULL, 'view' => '80', 'status' => '1', 'created_at' => '2024-11-22 09:52:54', 'updated_at' => '2024-11-22 11:27:22', 'deleted_at' => NULL),
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
          
          <p>&nbsp;</p>', 'quantity' => '49', 'view' => '2', 'status' => '0', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-11-22 11:35:39', 'deleted_at' => NULL),
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
          
          <p>✅&nbsp;Chứa&nbsp;chất b&eacute;o tốt, kh&ocirc;ng chứa chất bảo quản</p>', 'quantity' => NULL, 'view' => '10', 'status' => '1', 'created_at' => '2024-11-22 10:48:44', 'updated_at' => '2024-11-22 11:26:48', 'deleted_at' => NULL)
        );

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
