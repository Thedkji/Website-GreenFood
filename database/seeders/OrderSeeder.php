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
            array('id' => '14', 'user_id' => '1', 'order_code' => 'ORD-64B8E7D9A2F1', 'name' => 'Nguyễn Minh Quang', 'province' => '201', 'district' => '1484', 'ward' => '1A0110', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '21000', 'phone' => '0969992038', 'total' => '151000.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '0', 'payment_method' => '0', 'created_at' => '2024-12-07 13:39:45', 'updated_at' => '2024-12-07 13:39:45', 'deleted_at' => NULL),
            array('id' => '15', 'user_id' => '1', 'order_code' => 'ORD-64B8E7D9A2K1', 'name' => 'Nguyễn Minh Quang', 'province' => '201', 'district' => '1484', 'ward' => '1A0110', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '21000', 'phone' => '0969992038', 'total' => '790500.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '0', 'payment_method' => '1', 'created_at' => '2024-12-07 13:40:13', 'updated_at' => '2024-12-07 13:40:13', 'deleted_at' => NULL),
            array('id' => '16', 'user_id' => '1', 'order_code' => 'ORD-64B8E7DG82F1', 'name' => 'Nguyễn Minh Quang', 'province' => '201', 'district' => '1484', 'ward' => '1A0110', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '21000', 'phone' => '0969992038', 'total' => '959000.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '6', 'payment_method' => '0', 'created_at' => '2024-12-07 13:42:11', 'updated_at' => '2024-12-07 13:42:11', 'deleted_at' => NULL),
            array('id' => '17', 'user_id' => '1', 'order_code' => 'ORD-64B8E7NSA2F1', 'name' => 'Nguyễn Minh Quang', 'province' => '201', 'district' => '1484', 'ward' => '1A0110', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '21000', 'phone' => '0969992038', 'total' => '125700.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '6', 'payment_method' => '1', 'created_at' => '2024-12-07 13:43:49', 'updated_at' => '2024-12-07 13:43:49', 'deleted_at' => NULL),
            array('id' => '18', 'user_id' => '1', 'order_code' => 'ORD-64B8E7DFF2F1', 'name' => 'Nguyễn Minh Quang', 'province' => '201', 'district' => '1493', 'ward' => '1A0704', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '21000', 'phone' => '0969992038', 'total' => '369460.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '6', 'payment_method' => '0', 'created_at' => '2024-12-07 13:50:22', 'updated_at' => '2024-12-07 13:50:22', 'deleted_at' => NULL),
            array('id' => '19', 'user_id' => '1', 'order_code' => 'ORD-64B8E7GST2F1', 'name' => 'Nguyễn Minh Quang', 'province' => '201', 'district' => '1493', 'ward' => '1A0704', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '26060', 'phone' => '0969992038', 'total' => '1038060.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '6', 'payment_method' => '0', 'created_at' => '2024-12-07 13:50:52', 'updated_at' => '2024-12-07 13:50:52', 'deleted_at' => NULL)
        );

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
