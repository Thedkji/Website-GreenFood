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
            Coupon::create([
                "id" => $i,
                "name" => "GIAM $i",
                "coupon_amount" => "$i",
                "minimum_spend" => mt_rand(1, 5),
                "maximum_spend" => mt_rand(5, 10),
                "description" => null,
                "quantity" => $i,
                "expiration_date" => fake()->dateTime(),
                "start_date" => fake()->dateTime(),
                "type" => mt_rand(0, 1),
                "status" => mt_rand(0, 3),
            ]);
        }
    }
}
