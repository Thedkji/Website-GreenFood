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
      array('id' => '1','name' => 'Giam5k-All','discount_type' => '1','coupon_amount' => '5000','minimum_spend' => '100000','maximum_spend' => '1000000','description' => '<p>Giảm 5K cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1.000.000đ</p>','quantity' => '94','start_date' => '2024-11-25 00:00:00','expiration_date' => '2030-12-24 00:00:00','type' => '0','status' => '0','created_at' => '2024-11-24 07:43:35','updated_at' => '2024-12-19 17:32:38','deleted_at' => NULL),
      array('id' => '2','name' => 'Giam5%-DMCHA','discount_type' => '0','coupon_amount' => '5','minimum_spend' => '100000','maximum_spend' => '1000000','description' => '<p>Giảm 5%&nbsp;cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1.000.000đ v&agrave; c&oacute; danh mục cha l&agrave; G&oacute;i ăn healthy</p>','quantity' => '100','start_date' => '2024-11-25 00:00:00','expiration_date' => '2030-12-24 00:00:00','type' => '1','status' => '0','created_at' => '2024-11-24 07:45:16','updated_at' => '2024-11-24 08:16:04','deleted_at' => NULL),
      array('id' => '3','name' => 'Giam5%-DMCHA-DMCON','discount_type' => '0','coupon_amount' => '5','minimum_spend' => '150000','maximum_spend' => '1000000','description' => '<p>Giảm 5K cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1.000.000đ v&agrave; thuộc danh mục Hạt / Granola / C&aacute;c loại hạt</p>','quantity' => '98','start_date' => '2024-11-24 00:00:00','expiration_date' => '2030-12-24 00:00:00','type' => '1','status' => '0','created_at' => '2024-11-24 07:47:42','updated_at' => '2024-12-07 13:50:22','deleted_at' => NULL),
      array('id' => '4','name' => 'Giam5k-SP','discount_type' => '1','coupon_amount' => '5000','minimum_spend' => '100000','maximum_spend' => '1000000','description' => '<p>Giảm 5K cho to&agrave;n bộ theo đơn h&agrave;ng c&oacute; gi&aacute; trị từ 100.000đ&nbsp;đến 1000.000đ v&agrave; thuộc sản phẩm</p>
              
                                            <p>&nbsp;</p>
              
                                            <p>B&aacute;nh Biscotti Ăn Ki&ecirc;ng Nguy&ecirc;n C&aacute;m Kh&ocirc;ng Đường 250g</p>','quantity' => '100','start_date' => '2024-11-25 00:00:00','expiration_date' => '2030-12-24 00:00:00','type' => '1','status' => '0','created_at' => '2024-11-24 07:51:05','updated_at' => '2024-11-24 08:16:46','deleted_at' => NULL),
      array('id' => '5','name' => 'Giam5%-All','discount_type' => '0','coupon_amount' => '5','minimum_spend' => '100000','maximum_spend' => '1000000','description' => NULL,'quantity' => '97','start_date' => '2024-11-10 00:00:00','expiration_date' => '2030-11-24 00:00:00','type' => '0','status' => '0','created_at' => '2024-11-24 08:32:53','updated_at' => '2024-12-19 17:31:32','deleted_at' => NULL),
      array('id' => '6','name' => 'Giam5%-SP','discount_type' => '0','coupon_amount' => '5','minimum_spend' => '100000','maximum_spend' => '1000000','description' => NULL,'quantity' => '97','start_date' => '2024-11-24 00:00:00','expiration_date' => '2030-06-24 00:00:00','type' => '1','status' => '0','created_at' => '2024-11-24 08:33:59','updated_at' => '2024-11-24 08:50:10','deleted_at' => NULL),
      array('id' => '7','name' => 'Giam50k','discount_type' => '1','coupon_amount' => '50000','minimum_spend' => '100000','maximum_spend' => '1000000','description' => '<p>M&atilde; giảm 50K cho kh&aacute;ch h&agrave;ng mới khi tổng đơn h&agrave;ng mua tr&ecirc;n 100K&nbsp;</p>','quantity' => '999','start_date' => '2024-12-18 00:00:00','expiration_date' => '2030-12-31 00:00:00','type' => '0','status' => '2','created_at' => '2024-12-19 17:54:53','updated_at' => '2024-12-19 17:54:53','deleted_at' => NULL),
      array('id' => '9','name' => 'giảm 10%','discount_type' => '0','coupon_amount' => '10','minimum_spend' => '300000','maximum_spend' => '1000000','description' => '<p>ngon xinh y&ecirc;u</p>','quantity' => '13','start_date' => '2024-12-20 00:00:00','expiration_date' => '2025-01-05 00:00:00','type' => '0','status' => '0','created_at' => '2024-12-20 00:55:58','updated_at' => '2024-12-20 00:55:58','deleted_at' => NULL),
      array('id' => '10','name' => 'Giảm 10k','discount_type' => '1','coupon_amount' => '10000','minimum_spend' => '100000','maximum_spend' => '400000','description' => '<p>chi &acirc;n kh&aacute;ch h&agrave;ng&nbsp;</p>','quantity' => '6','start_date' => '2024-12-30 00:00:00','expiration_date' => '2025-01-26 00:00:00','type' => '1','status' => '0','created_at' => '2024-12-20 00:58:42','updated_at' => '2024-12-20 00:58:42','deleted_at' => NULL),
      array('id' => '11','name' => 'Mã giảm 50K','discount_type' => '1','coupon_amount' => '50000','minimum_spend' => '100000','maximum_spend' => '500000','description' => '<p>giảm 50k cho đơn từ 100k</p>','quantity' => '17','start_date' => '2024-12-21 00:00:00','expiration_date' => '2025-02-14 00:00:00','type' => '0','status' => '2','created_at' => '2024-12-20 01:21:19','updated_at' => '2024-12-20 01:21:19','deleted_at' => NULL)
    );


    foreach ($coupons as $item) {
      Coupon::updateOrCreate(['id' => $item['id']], $item);
    }
  }
}
