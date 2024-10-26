<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            OrderDetail::create([
                "id" => $i,
                "order_id" => mt_rand(1, 10),
                "product_sku" => "SP" . mt_rand(0, 1000),
                "product_name" => "Sản phẩm $i",
                "product_img" => "https://via.placeholder.com/300x200",
                "product_price" => $i * 300000,
                "product_quantity" => mt_rand(1, 999),
                "coupon_name" => "Coupon $i",
                "coupon_quantity" => mt_rand(1, 5),
                "coupon_price" => $i * 10000,
            ]);
        }
    }
}
