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
            array('id' => '10', 'user_id' => '1', 'name' => 'Trần Văn A', 'province' => '201', 'district' => '1493', 'ward' => '1A0704', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '125125', 'phone' => '0969992038', 'total' => '991000.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '0', 'created_at' => '2024-12-03 11:39:44', 'updated_at' => '2024-12-03 11:39:44', 'deleted_at' => NULL),
            array('id' => '11', 'user_id' => '1', 'name' => 'Nguyễn Thị B', 'province' => '201', 'district' => '1484', 'ward' => '1A0110', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'email' => 'nmquang2303@gmail.com', 'deliveryFee' => '125125', 'phone' => '0969992038', 'total' => '715000.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '0', 'created_at' => '2024-12-03 11:40:09', 'updated_at' => '2024-12-03 11:40:09', 'deleted_at' => NULL),
            array('id' => '12', 'user_id' => '2', 'name' => 'Nguyễn Thị B', 'province' => '221', 'district' => '3265', 'ward' => '160708', 'address' => 'Hải Lựu, Sông Lô, Vĩnh Phúc', 'email' => 'phuongpato3007@gmail.com', 'deliveryFee' => '125125', 'phone' => '0896164619', 'total' => '389900.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '0', 'created_at' => '2024-12-03 11:50:23', 'updated_at' => '2024-12-03 11:50:23', 'deleted_at' => NULL),
            array('id' => '13', 'user_id' => '2', 'name' => 'Nguyễn Thị B', 'province' => '221', 'district' => '3265', 'ward' => '160708', 'address' => 'Hải Lựu, Sông Lô, Vĩnh Phúc', 'email' => 'phuongpato3007@gmail.com', 'deliveryFee' => '125125', 'phone' => '0896164619', 'total' => '620500.00', 'note' => NULL, 'cancel_reson' => NULL, 'status' => '0', 'created_at' => '2024-12-03 11:51:10', 'updated_at' => '2024-12-03 11:51:10', 'deleted_at' => NULL)
        );

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
