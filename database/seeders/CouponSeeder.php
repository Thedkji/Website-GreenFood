<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $startDate = fake()->dateTimeBetween('-1 month', 'now'); // Ngày bắt đầu trong quá khứ hoặc hiện tại
            $expirationDate = fake()->dateTimeBetween($startDate, '+1 month'); // Ngày hết hạn sau ngày bắt đầu

            Coupon::create([
                "id" => $i,
                "name" => "GIAM$i%",
                "coupon_amount" => "$i",
                "minimum_spend" => mt_rand(1, 5),
                "maximum_spend" => mt_rand(5, 10),
                "description" => null,
                "quantity" => $i,
                "expiration_date" => $expirationDate, // Ngày hết hạn sau start_date
                "start_date" => $startDate, // Ngày bắt đầu
                "type" => mt_rand(0, 1),
                "status" => mt_rand(0, 3),
            ]);
        }
    }
}
