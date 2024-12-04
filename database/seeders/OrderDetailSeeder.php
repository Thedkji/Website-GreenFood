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
        $order_detail = array(
            array('id' => '16', 'order_id' => '10', 'product_sku' => 'SPBT490156', 'product_name' => 'Granola Ngũ Cốc Siêu Hạt Ăn Kiêng Healthy Vigonuts', 'product_img' => 'product_variants/1732270675_67405a532c841.jpg', 'product_price' => '110000', 'product_quantity' => '3', 'coupon_name' => 'Giam5k-All', 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:39:44', 'updated_at' => '2024-12-03 11:39:44', 'deleted_at' => NULL),
            array('id' => '17', 'order_id' => '10', 'product_sku' => 'SP157866', 'product_name' => 'Bánh Ngói Hạnh Nhân Ăn Kiêng Siêu Hạt Keto Hộp Tiện Lợi 160g', 'product_img' => 'products/1732271495_67405d87071b9.jpg', 'product_price' => '129000', 'product_quantity' => '5', 'coupon_name' => 'Giam5k-All', 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:39:44', 'updated_at' => '2024-12-03 11:39:44', 'deleted_at' => NULL),
            array('id' => '18', 'order_id' => '11', 'product_sku' => 'SPBT800530', 'product_name' => 'Granola Ngũ Cốc Siêu Hạt Ăn Kiêng Healthy Vigonuts', 'product_img' => 'product_variants/1732270675_67405a532b8a6.jpg', 'product_price' => '149000', 'product_quantity' => '2', 'coupon_name' => NULL, 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:40:42', 'updated_at' => '2024-12-03 11:40:42', 'deleted_at' => NULL),
            array('id' => '19', 'order_id' => '11', 'product_sku' => 'SPBT250693', 'product_name' => 'Cookies Hạnh Nhân Nguyên Cám Choco', 'product_img' => 'products/1732270803_67405ad39b6d3.jpg', 'product_price' => '99000', 'product_quantity' => '4', 'coupon_name' => NULL, 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:40:42', 'updated_at' => '2024-12-03 11:40:42', 'deleted_at' => NULL),
            array('id' => '20', 'order_id' => '12', 'product_sku' => 'SPBT487887', 'product_name' => 'Cookies Hạnh Nhân Nguyên Cám Choco', 'product_img' => 'products/1732270803_67405ad39b6d3.jpg', 'product_price' => '75000', 'product_quantity' => '1', 'coupon_name' => 'Giam5%-All', 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:50:23', 'updated_at' => '2024-12-03 11:50:23', 'deleted_at' => NULL),
            array('id' => '21', 'order_id' => '12', 'product_sku' => 'SPBT250693', 'product_name' => 'Cookies Hạnh Nhân Nguyên Cám Choco', 'product_img' => 'products/1732270803_67405ad39b6d3.jpg', 'product_price' => '99000', 'product_quantity' => '3', 'coupon_name' => 'Giam5%-All', 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:50:23', 'updated_at' => '2024-12-03 11:50:23', 'deleted_at' => NULL),
            array('id' => '22', 'order_id' => '13', 'product_sku' => 'SPBT511985', 'product_name' => 'HẠT ĐIỀU RANG MUỐI NGUYÊN LỤA BÌNH PHƯỚC', 'product_img' => 'products/1732619637_6745ad755da75.jpg', 'product_price' => '122000', 'product_quantity' => '3', 'coupon_name' => NULL, 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:51:33', 'updated_at' => '2024-12-03 11:51:33', 'deleted_at' => NULL),
            array('id' => '23', 'order_id' => '13', 'product_sku' => 'SPBT729498', 'product_name' => 'Nhân hạt óc chó tách vỏ ANNUT, hạt ngũ cốc dinh dưỡng, ăn kiêng, giảm cân', 'product_img' => 'products/1732620293_6745b0054c579.jpg', 'product_price' => '109000', 'product_quantity' => '2', 'coupon_name' => NULL, 'coupon_quantity' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-03 11:51:33', 'updated_at' => '2024-12-03 11:51:33', 'deleted_at' => NULL)
        );

        foreach ($order_detail as $order) {
            OrderDetail::create($order);
        }
    }
}
