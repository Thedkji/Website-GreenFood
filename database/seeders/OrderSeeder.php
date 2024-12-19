<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = array(
            array('id' => '14','user_id' => '1','order_code' => 'ORD-64B8E7D9A2F1','name' => 'Nguyễn Minh Quang','province' => '201','district' => '1484','ward' => '1A0110','address' => 'Khương Trung, Thanh Xuân, Hà Nội','email' => 'nmquang2303@gmail.com','deliveryFee' => '21000','phone' => '0969992038','total' => '151000.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '0','created_at' => '2024-12-07 13:39:45','updated_at' => '2024-12-07 13:39:45','deleted_at' => NULL),
            array('id' => '15','user_id' => '1','order_code' => 'ORD-64B8E7D9A2K1','name' => 'Nguyễn Minh Quang','province' => '201','district' => '1484','ward' => '1A0110','address' => 'Khương Trung, Thanh Xuân, Hà Nội','email' => 'nmquang2303@gmail.com','deliveryFee' => '21000','phone' => '0969992038','total' => '790500.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '1','created_at' => '2024-12-07 13:40:13','updated_at' => '2024-12-07 13:40:13','deleted_at' => NULL),
            array('id' => '16','user_id' => '1','order_code' => 'ORD-64B8E7DG82F1','name' => 'Nguyễn Minh Quang','province' => '201','district' => '1484','ward' => '1A0110','address' => 'Khương Trung, Thanh Xuân, Hà Nội','email' => 'nmquang2303@gmail.com','deliveryFee' => '21000','phone' => '0969992038','total' => '959000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-07 13:42:11','updated_at' => '2024-12-07 13:42:11','deleted_at' => NULL),
            array('id' => '17','user_id' => '1','order_code' => 'ORD-64B8E7NSA2F1','name' => 'Nguyễn Minh Quang','province' => '201','district' => '1484','ward' => '1A0110','address' => 'Khương Trung, Thanh Xuân, Hà Nội','email' => 'nmquang2303@gmail.com','deliveryFee' => '21000','phone' => '0969992038','total' => '125700.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '1','created_at' => '2024-12-07 13:43:49','updated_at' => '2024-12-07 13:43:49','deleted_at' => NULL),
            array('id' => '18','user_id' => '1','order_code' => 'ORD-64B8E7DFF2F1','name' => 'Nguyễn Minh Quang','province' => '201','district' => '1493','ward' => '1A0704','address' => 'Khương Trung, Thanh Xuân, Hà Nội','email' => 'nmquang2303@gmail.com','deliveryFee' => '21000','phone' => '0969992038','total' => '369460.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-07 13:50:22','updated_at' => '2024-12-07 13:50:22','deleted_at' => NULL),
            array('id' => '19','user_id' => '1','order_code' => 'ORD-64B8E7GST2F1','name' => 'Nguyễn Minh Quang','province' => '201','district' => '1493','ward' => '1A0704','address' => 'Khương Trung, Thanh Xuân, Hà Nội','email' => 'nmquang2303@gmail.com','deliveryFee' => '26060','phone' => '0969992038','total' => '1038060.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-07 13:50:52','updated_at' => '2024-12-07 13:50:52','deleted_at' => NULL),
            array('id' => '20','user_id' => '3','order_code' => 'ORD-6763DB2533612','name' => 'Nguyễn Văn Tú','province' => '268','district' => '1828','ward' => '220510','address' => 'Tân Lập, Yên Mỹ, Hưng Yên','email' => 'anhtu2651@gmail.com','deliveryFee' => '36500','phone' => '0975571234','total' => '168500.00','note' => NULL,'cancel_reson' => NULL,'status' => '2','payment_method' => '0','created_at' => '2024-12-19 15:36:53','updated_at' => '2024-12-19 15:39:48','deleted_at' => NULL),
            array('id' => '21','user_id' => '3','order_code' => 'ORD-6763DB372378A','name' => 'Nguyễn Văn Tú','province' => '268','district' => '1828','ward' => '220510','address' => 'Tân Lập, Yên Mỹ, Hưng Yên','email' => 'anhtu2651@gmail.com','deliveryFee' => '36500','phone' => '0975571234','total' => '631500.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '0','created_at' => '2024-12-19 15:37:11','updated_at' => '2024-12-19 15:37:11','deleted_at' => NULL),
            array('id' => '22','user_id' => '3','order_code' => 'ORD-6763DB5300229','name' => 'Nguyễn Văn Tú','province' => '268','district' => '1828','ward' => '220510','address' => 'Tân Lập, Yên Mỹ, Hưng Yên','email' => 'anhtu2651@gmail.com','deliveryFee' => '44420','phone' => '0975571234','total' => '1628420.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 15:37:39','updated_at' => '2024-12-19 15:39:21','deleted_at' => NULL),
            array('id' => '23','user_id' => '3','order_code' => 'ORD-6763DB9343115','name' => 'Nguyễn Văn Tú','province' => '268','district' => '1828','ward' => '220510','address' => 'Tân Lập, Yên Mỹ, Hưng Yên','email' => 'anhtu2651@gmail.com','deliveryFee' => '36500','phone' => '0975571234','total' => '711500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 15:38:43','updated_at' => '2024-12-19 15:39:36','deleted_at' => NULL),
            array('id' => '24','user_id' => '3','order_code' => 'ORD-6763DBA72445A','name' => 'Nguyễn Văn Tú','province' => '268','district' => '1828','ward' => '220510','address' => 'Tân Lập, Yên Mỹ, Hưng Yên','email' => 'anhtu2651@gmail.com','deliveryFee' => '36500','phone' => '0975571234','total' => '711500.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '0','created_at' => '2024-12-19 15:39:03','updated_at' => '2024-12-19 15:39:03','deleted_at' => NULL),
            array('id' => '25','user_id' => '4','order_code' => 'ORD-6763DDE86FD5C','name' => 'Hoàng Lý Hải','province' => '268','district' => '2194','ward' => '220703','address' => 'Đông Lai, Tân Lạc, Hoà Bình','email' => 'haihl125@gmail.com','deliveryFee' => '36500','phone' => '0981263457','total' => '96200.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 15:48:40','updated_at' => '2024-12-19 15:54:47','deleted_at' => NULL),
            array('id' => '26','user_id' => '4','order_code' => 'ORD-6763DE27F19DA','name' => 'Hoàng Lý Hải','province' => '267','district' => '2157','ward' => '230906','address' => 'Đông Lai, Tân Lạc, Hoà Bình','email' => 'haihl125@gmail.com','deliveryFee' => '36500','phone' => '0981263457','total' => '576500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 15:49:43','updated_at' => '2024-12-19 15:54:06','deleted_at' => NULL),
            array('id' => '27','user_id' => '5','order_code' => 'ORD-6763DEB9428A1','name' => 'Đặng Trung Kiên','province' => '253','district' => '1926','ward' => '600604','address' => 'Phú Lai, Yên Thủy, Hoà Bình','email' => 'dangtrungkien08@gmail.com','deliveryFee' => '44000','phone' => '0913543561','total' => '194000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 15:52:09','updated_at' => '2024-12-19 15:54:20','deleted_at' => NULL),
            array('id' => '28','user_id' => '4','order_code' => 'ORD-6763DEE483FDF','name' => 'Hoàng Lý Hải','province' => '264','district' => '1989','ward' => '70313','address' => 'Đông Lai, Tân Lạc, Hoà Bình','email' => 'haihl125@gmail.com','deliveryFee' => '43220','phone' => '0981263457','total' => '1387220.00','note' => NULL,'cancel_reson' => NULL,'status' => '2','payment_method' => '0','created_at' => '2024-12-19 15:52:52','updated_at' => '2024-12-19 16:14:33','deleted_at' => NULL),
            array('id' => '29','user_id' => '4','order_code' => 'ORD-6763DEF4DAC8F','name' => 'Hoàng Lý Hải','province' => '264','district' => '1989','ward' => '70313','address' => 'Đông Lai, Tân Lạc, Hoà Bình','email' => 'haihl125@gmail.com','deliveryFee' => '36500','phone' => '0981263457','total' => '434500.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '0','created_at' => '2024-12-19 15:53:08','updated_at' => '2024-12-19 15:53:08','deleted_at' => NULL),
            array('id' => '30','user_id' => '4','order_code' => 'ORD-6763DF04C67AF','name' => 'Hoàng Lý Hải','province' => '264','district' => '1989','ward' => '70313','address' => 'Đông Lai, Tân Lạc, Hoà Bình','email' => 'haihl125@gmail.com','deliveryFee' => '36500','phone' => '0981263457','total' => '106500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 15:53:24','updated_at' => '2024-12-19 15:53:48','deleted_at' => NULL),
            array('id' => '31','user_id' => '5','order_code' => 'ORD-6763E1196EB0C','name' => 'Đặng Trung Kiên','province' => '263','district' => '2044','ward' => '130609','address' => 'Phú Lai, Yên Thủy, Hoà Bình','email' => 'dangtrungkien08@gmail.com','deliveryFee' => '36500','phone' => '0913543561','total' => '546500.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '0','created_at' => '2024-12-19 16:02:17','updated_at' => '2024-12-19 16:02:17','deleted_at' => NULL),
            array('id' => '32','user_id' => '5','order_code' => 'ORD-6763E1A7A889A','name' => 'Đặng Trung Kiên','province' => '263','district' => '2044','ward' => '130609','address' => 'Phú Lai, Yên Thủy, Hoà Bình','email' => 'dangtrungkien08@gmail.com','deliveryFee' => '43840','phone' => '0913543561','total' => '1511840.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:04:39','updated_at' => '2024-12-19 16:05:57','deleted_at' => NULL),
            array('id' => '33','user_id' => '5','order_code' => 'ORD-6763E1B7C31BA','name' => 'Đặng Trung Kiên','province' => '263','district' => '2044','ward' => '130609','address' => 'Phú Lai, Yên Thủy, Hoà Bình','email' => 'dangtrungkien08@gmail.com','deliveryFee' => '36500','phone' => '0913543561','total' => '441500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:04:55','updated_at' => '2024-12-19 16:05:30','deleted_at' => NULL),
            array('id' => '34','user_id' => '5','order_code' => 'ORD-6763E1C1BF794','name' => 'Đặng Trung Kiên','province' => '263','district' => '2044','ward' => '130609','address' => 'Phú Lai, Yên Thủy, Hoà Bình','email' => 'dangtrungkien08@gmail.com','deliveryFee' => '36500','phone' => '0913543561','total' => '720200.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:05:05','updated_at' => '2024-12-19 16:05:45','deleted_at' => NULL),
            array('id' => '35','user_id' => '6','order_code' => 'ORD-6763E2937D45A','name' => 'Lê Thành Công','province' => '246','district' => '3246','ward' => '60712','address' => 'Quang Thành, Nguyên Bình, Cao Bằng','email' => 'lecong19@gmail.com','deliveryFee' => '36500','phone' => '0934672134','total' => '300500.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '0','created_at' => '2024-12-19 16:08:35','updated_at' => '2024-12-19 16:08:35','deleted_at' => NULL),
            array('id' => '36','user_id' => '6','order_code' => 'ORD-6763E2C0ADBAF','name' => 'Lê Thành Công','province' => '246','district' => '3246','ward' => '60712','address' => 'Quang Thành, Nguyên Bình, Cao Bằng','email' => 'lecong19@gmail.com','deliveryFee' => '36500','phone' => '0934672134','total' => '492300.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:09:20','updated_at' => '2024-12-19 16:13:53','deleted_at' => NULL),
            array('id' => '37','user_id' => '6','order_code' => 'ORD-6763E30248593','name' => 'Lê Thành Công','province' => '246','district' => '3246','ward' => '60712','address' => 'Quang Thành, Nguyên Bình, Cao Bằng','email' => 'lecong19@gmail.com','deliveryFee' => '36500','phone' => '0934672134','total' => '141500.00','note' => NULL,'cancel_reson' => NULL,'status' => '2','payment_method' => '0','created_at' => '2024-12-19 16:10:26','updated_at' => '2024-12-19 16:14:16','deleted_at' => NULL),
            array('id' => '38','user_id' => '6','order_code' => 'ORD-6763E32069444','name' => 'Lê Thành Công','province' => '246','district' => '3246','ward' => '60712','address' => 'Quang Thành, Nguyên Bình, Cao Bằng','email' => 'lecong19@gmail.com','deliveryFee' => '36500','phone' => '0934672134','total' => '631500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:10:56','updated_at' => '2024-12-19 16:13:37','deleted_at' => NULL),
            array('id' => '39','user_id' => '6','order_code' => 'ORD-6763E361E54BF','name' => 'Lê Thành Công','province' => '246','district' => '3246','ward' => '60712','address' => 'Quang Thành, Nguyên Bình, Cao Bằng','email' => 'lecong19@gmail.com','deliveryFee' => '42380','phone' => '0934672134','total' => '1218380.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:12:01','updated_at' => '2024-12-19 16:12:23','deleted_at' => NULL),
            array('id' => '40','user_id' => '7','order_code' => 'ORD-6763E4E5235AB','name' => 'Trịnh Đình Thi','province' => '265','district' => '1978','ward' => '620505','address' => 'Ma Thì Hồ, Mường Chà, Điện Biên','email' => 'dinhthi52@gmail.com','deliveryFee' => '36500','phone' => '0972345423','total' => '106500.00','note' => NULL,'cancel_reson' => NULL,'status' => '0','payment_method' => '0','created_at' => '2024-12-19 16:18:29','updated_at' => '2024-12-19 16:18:29','deleted_at' => NULL),
            array('id' => '41','user_id' => '7','order_code' => 'ORD-6763E4F17E457','name' => 'Trịnh Đình Thi','province' => '265','district' => '1978','ward' => '620505','address' => 'Ma Thì Hồ, Mường Chà, Điện Biên','email' => 'dinhthi52@gmail.com','deliveryFee' => '36500','phone' => '0972345423','total' => '832500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:18:41','updated_at' => '2024-12-19 16:22:05','deleted_at' => NULL),
            array('id' => '42','user_id' => '7','order_code' => 'ORD-6763E511BB048','name' => 'Trịnh Đình Thi','province' => '265','district' => '1978','ward' => '620505','address' => 'Ma Thì Hồ, Mường Chà, Điện Biên','email' => 'dinhthi52@gmail.com','deliveryFee' => '36500','phone' => '0972345423','total' => '486500.00','note' => NULL,'cancel_reson' => NULL,'status' => '2','payment_method' => '0','created_at' => '2024-12-19 16:19:13','updated_at' => '2024-12-19 16:21:54','deleted_at' => NULL),
            array('id' => '43','user_id' => '7','order_code' => 'ORD-6763E5202A3B8','name' => 'Trịnh Đình Thi','province' => '265','district' => '1978','ward' => '620505','address' => 'Ma Thì Hồ, Mường Chà, Điện Biên','email' => 'dinhthi52@gmail.com','deliveryFee' => '36500','phone' => '0972345423','total' => '211500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 16:19:28','updated_at' => '2024-12-19 16:21:45','deleted_at' => NULL),
            array('id' => '44','user_id' => '7','order_code' => 'ORD-6763E56986D81','name' => 'Trịnh Đình Thi','province' => '265','district' => '1978','ward' => '620505','address' => 'Ma Thì Hồ, Mường Chà, Điện Biên','email' => 'dinhthi52@gmail.com','deliveryFee' => '36500','phone' => '0972345423','total' => '432500.00','note' => NULL,'cancel_reson' => NULL,'status' => '3','payment_method' => '0','created_at' => '2024-12-19 16:20:41','updated_at' => '2024-12-19 16:21:34','deleted_at' => NULL),
            array('id' => '45','user_id' => '13','order_code' => 'ORD-6763F5522B48E','name' => 'Lê Trung Kiên','province' => '252','district' => '1901','ward' => '610509','address' => 'Tân Hưng Đông, Cái Nước, Cà Mau','email' => 'kienltph38042@fpt.edu.vn','deliveryFee' => '44000','phone' => '0369765437','total' => '272000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 17:28:34','updated_at' => '2024-12-19 17:35:53','deleted_at' => NULL),
            array('id' => '46','user_id' => '13','order_code' => 'ORD-6763F595E7713','name' => 'Lê Trung Kiên','province' => '252','district' => '1901','ward' => '610509','address' => 'Tân Hưng Đông, Cái Nước, Cà Mau','email' => 'kienltph38042@fpt.edu.vn','deliveryFee' => '44000','phone' => '0369765437','total' => '636000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '1','created_at' => '2024-12-19 17:29:41','updated_at' => '2024-12-19 17:35:38','deleted_at' => NULL),
            array('id' => '47','user_id' => '13','order_code' => 'ORD-6763F60486606','name' => 'Lê Trung Kiên','province' => '248','district' => '1763','ward' => '180909','address' => 'thon 4','email' => 'kienltph38042@fpt.edu.vn','deliveryFee' => '31501','phone' => '0803797332','total' => '183501.00','note' => NULL,'cancel_reson' => 'hết hàng','status' => '5','payment_method' => '0','created_at' => '2024-12-19 17:31:32','updated_at' => '2024-12-19 17:34:55','deleted_at' => NULL),
            array('id' => '48','user_id' => '13','order_code' => 'ORD-6763F62D3F6E5','name' => 'Lê Trung Kiên','province' => '252','district' => '1901','ward' => '610503','address' => 'Tân Hưng Đông, Cái Nước, Cà Mau','email' => 'kienltph38042@fpt.edu.vn','deliveryFee' => '44000','phone' => '0369765437','total' => '194000.00','note' => NULL,'cancel_reson' => NULL,'status' => '4','payment_method' => '0','created_at' => '2024-12-19 17:32:13','updated_at' => '2024-12-19 17:34:20','deleted_at' => NULL),
            array('id' => '49','user_id' => '13','order_code' => 'ORD-6763F64642A68','name' => 'Lê Trung Kiên','province' => '252','district' => '2038','ward' => '610407','address' => 'Tân Hưng','email' => 'kienltph38042@fpt.edu.vn','deliveryFee' => '44000','phone' => '0369765437','total' => '189000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 17:32:38','updated_at' => '2024-12-19 17:34:04','deleted_at' => NULL),
            array('id' => '50','user_id' => '10','order_code' => 'ORD-6763F85B82D54','name' => 'Tiết Ngọc Mai','province' => '202','district' => '1463','ward' => '21804','address' => 'Hiệp Phú, Thủ Đức, Hồ Chí Minh','email' => 'ngocmai234@gmail.com','deliveryFee' => '34000','phone' => '0265764451','total' => '274000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 17:41:31','updated_at' => '2024-12-19 17:46:31','deleted_at' => NULL),
            array('id' => '51','user_id' => '10','order_code' => 'ORD-6763F86CCC994','name' => 'Tiết Ngọc Mai','province' => '202','district' => '1463','ward' => '21803','address' => 'Hiệp Phú, Thủ Đức, Hồ Chí Minh','email' => 'ngocmai234@gmail.com','deliveryFee' => '34000','phone' => '0265764451','total' => '69000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 17:41:48','updated_at' => '2024-12-19 17:43:53','deleted_at' => NULL),
            array('id' => '52','user_id' => '10','order_code' => 'ORD-6763F87B5FACF','name' => 'Tiết Ngọc Mai','province' => '202','district' => '1463','ward' => '21804','address' => 'Hiệp Phú, Thủ Đức, Hồ Chí Minh','email' => 'ngocmai234@gmail.com','deliveryFee' => '34000','phone' => '0265764451','total' => '634000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 17:42:03','updated_at' => '2024-12-19 17:43:41','deleted_at' => NULL),
            array('id' => '53','user_id' => '10','order_code' => 'ORD-6763F899649DF','name' => 'Tiết Ngọc Mai','province' => '202','district' => '1463','ward' => '21805','address' => 'Hiệp Phú, Thủ Đức, Hồ Chí Minh','email' => 'ngocmai234@gmail.com','deliveryFee' => '34000','phone' => '0265764451','total' => '51500.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 17:42:33','updated_at' => '2024-12-19 17:43:25','deleted_at' => NULL),
            array('id' => '54','user_id' => '10','order_code' => 'ORD-6763F8AE8957B','name' => 'Tiết Ngọc Mai','province' => '202','district' => '2090','ward' => '22405','address' => 'Hiệp Phú, Thủ Đức, Hồ Chí Minh','email' => 'ngocmai234@gmail.com','deliveryFee' => '44000','phone' => '0265764451','total' => '129000.00','note' => NULL,'cancel_reson' => NULL,'status' => '6','payment_method' => '0','created_at' => '2024-12-19 17:42:54','updated_at' => '2024-12-19 17:43:10','deleted_at' => NULL)
          );

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
