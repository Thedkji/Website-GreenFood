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
        $coupons = array(
            array('id' => '1', 'name' => 'Giam5k-All', 'discount_type' => '1', 'coupon_amount' => '5000', 'minimum_spend' => '100000', 'maximum_spend' => '1000000', 'description' => '<p>Giảm 5K cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1.000.000đ</p>', 'quantity' => '96', 'start_date' => '2024-11-25 00:00:00', 'expiration_date' => '2030-12-24 00:00:00', 'type' => '0', 'status' => '0', 'created_at' => '2024-11-24 07:43:35', 'updated_at' => '2024-12-07 13:39:45', 'deleted_at' => NULL),
            array('id' => '2', 'name' => 'Giam5%-DMCHA', 'discount_type' => '0', 'coupon_amount' => '5', 'minimum_spend' => '100000', 'maximum_spend' => '1000000', 'description' => '<p>Giảm 5%&nbsp;cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1.000.000đ v&agrave; c&oacute; danh mục cha l&agrave; G&oacute;i ăn healthy</p>', 'quantity' => '100', 'start_date' => '2024-11-25 00:00:00', 'expiration_date' => '2030-12-24 00:00:00', 'type' => '1', 'status' => '0', 'created_at' => '2024-11-24 07:45:16', 'updated_at' => '2024-11-24 08:16:04', 'deleted_at' => NULL),
            array('id' => '3', 'name' => 'Giam5%-DMCHA-DMCON', 'discount_type' => '0', 'coupon_amount' => '5', 'minimum_spend' => '150000', 'maximum_spend' => '1000000', 'description' => '<p>Giảm 5K cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1.000.000đ v&agrave; thuộc danh mục Hạt / Granola / C&aacute;c loại hạt</p>', 'quantity' => '98', 'start_date' => '2024-11-24 00:00:00', 'expiration_date' => '2030-12-24 00:00:00', 'type' => '1', 'status' => '0', 'created_at' => '2024-11-24 07:47:42', 'updated_at' => '2024-12-07 13:50:22', 'deleted_at' => NULL),
            array('id' => '4', 'name' => 'Giam5k-SP', 'discount_type' => '1', 'coupon_amount' => '5000', 'minimum_spend' => '100000', 'maximum_spend' => '1000000', 'description' => '<p>Giảm 5K cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1000.000đ v&agrave; thuộc sản phẩm</p>
                    
                    <p>&nbsp;</p>
                    
                    <p>B&aacute;nh Biscotti Ăn Ki&ecirc;ng Nguy&ecirc;n C&aacute;m Kh&ocirc;ng Đường 250g</p>', 'quantity' => '100', 'start_date' => '2024-11-25 00:00:00', 'expiration_date' => '2030-12-24 00:00:00', 'type' => '1', 'status' => '0', 'created_at' => '2024-11-24 07:51:05', 'updated_at' => '2024-11-24 08:16:46', 'deleted_at' => NULL),
            array('id' => '5', 'name' => 'Giam5%-All', 'discount_type' => '0', 'coupon_amount' => '5', 'minimum_spend' => '100000', 'maximum_spend' => '1000000', 'description' => NULL, 'quantity' => '99', 'start_date' => '2024-11-10 00:00:00', 'expiration_date' => '2030-11-24 00:00:00', 'type' => '0', 'status' => '0', 'created_at' => '2024-11-24 08:32:53', 'updated_at' => '2024-12-03 11:50:23', 'deleted_at' => NULL),
            array('id' => '6', 'name' => 'Giam5%-SP', 'discount_type' => '0', 'coupon_amount' => '5', 'minimum_spend' => '100000', 'maximum_spend' => '1000000', 'description' => NULL, 'quantity' => '97', 'start_date' => '2024-11-24 00:00:00', 'expiration_date' => '2030-06-24 00:00:00', 'type' => '1', 'status' => '0', 'created_at' => '2024-11-24 08:33:59', 'updated_at' => '2024-11-24 08:50:10', 'deleted_at' => NULL)
        );

        foreach ($coupons as $item) {
            Coupon::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
