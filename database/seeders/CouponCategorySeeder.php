<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupon_category = array(
            array('coupon_id' => '3', 'category_id' => '5'),
            array('coupon_id' => '3', 'category_id' => '6'),
            array('coupon_id' => '3', 'category_id' => '7')
        );

        foreach ($coupon_category as $item) {
            Coupon::find($item['coupon_id'])->categories()->attach($item['category_id']);
        }
    }
}
