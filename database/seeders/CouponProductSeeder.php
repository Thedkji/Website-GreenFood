<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupon_product = array(
            array('coupon_id' => '4','product_id' => '5'),
            array('coupon_id' => '4','product_id' => '6'),
            array('coupon_id' => '4','product_id' => '9'),
            array('coupon_id' => '10','product_id' => '16'),
            array('coupon_id' => '10','product_id' => '17')
          );

        foreach ($coupon_product as $item) {
            Coupon::find($item['coupon_id'])->products()->attach($item['product_id']);
        }
    }
}
