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
            array('id' => '24', 'order_id' => '14', 'product_sku' => 'SP213470', 'product_name' => 'Trà đông trùng 7 vị thảo mộc ( Hộp 30 Tặng kèm Túi Lọc Hoặc Chai T,Tinh) Đẹp da, dễ ngủ, thanh lọc', 'product_img' => 'products/1733551826_6753e6d2c8ba1.jpg', 'product_price' => '135000', 'product_quantity' => '1', 'coupon_name' => 'Giam5k-All', 'coupon_price' => '5000', 'created_at' => '2024-12-07 13:39:45', 'updated_at' => '2024-12-07 13:39:45', 'deleted_at' => NULL),
            array('id' => '25', 'order_id' => '15', 'product_sku' => 'SPBT945718', 'product_name' => 'HẠT ĐIỀU RANG MUỐI NGUYÊN LỤA BÌNH PHƯỚC', 'product_img' => 'products/1732619637_6745ad755da75.jpg', 'product_price' => '135000', 'product_quantity' => '3', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:40:46', 'updated_at' => '2024-12-07 13:40:46', 'deleted_at' => NULL),
            array('id' => '26', 'order_id' => '15', 'product_sku' => 'SP160564', 'product_name' => 'Bánh Mì Đen Nguyên Cám, Healthy, Eatclean 250g', 'product_img' => 'products/1732618355_6745a87311c26.jpg', 'product_price' => '135000', 'product_quantity' => '3', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:40:46', 'updated_at' => '2024-12-07 13:40:46', 'deleted_at' => NULL),
            array('id' => '27', 'order_id' => '16', 'product_sku' => 'SPBT511985', 'product_name' => 'HẠT ĐIỀU RANG MUỐI NGUYÊN LỤA BÌNH PHƯỚC', 'product_img' => 'products/1732619637_6745ad755da75.jpg', 'product_price' => '122000', 'product_quantity' => '4', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:42:11', 'updated_at' => '2024-12-07 13:42:11', 'deleted_at' => NULL),
            array('id' => '28', 'order_id' => '16', 'product_sku' => 'SPBT140683', 'product_name' => 'Nhân hạt óc chó tách vỏ ANNUT, hạt ngũ cốc dinh dưỡng, ăn kiêng, giảm cân', 'product_img' => 'product_variants/1732620293_6745b0054f9f4.jpg', 'product_price' => '150000', 'product_quantity' => '3', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:42:11', 'updated_at' => '2024-12-07 13:42:11', 'deleted_at' => NULL),
            array('id' => '29', 'order_id' => '17', 'product_sku' => 'SPBT814589', 'product_name' => '500G Chuối Sấy Dẻo Đặc Sản Đà Lạt, đồ ăn vặt hoa quả sấy, Mứt Chuối Sấy Dẻo, Ô mai - Mứt tết', 'product_img' => 'products/1733203543_674e965789c6e.jpg', 'product_price' => '34900', 'product_quantity' => '3', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:43:49', 'updated_at' => '2024-12-07 13:43:49', 'deleted_at' => NULL),
            array('id' => '30', 'order_id' => '18', 'product_sku' => 'SPBT729498', 'product_name' => 'Nhân hạt óc chó tách vỏ ANNUT, hạt ngũ cốc dinh dưỡng, ăn kiêng, giảm cân', 'product_img' => 'products/1732620293_6745b0054c579.jpg', 'product_price' => '109000', 'product_quantity' => '3', 'coupon_name' => 'Giam5%-DMCHA-DMCON', 'coupon_price' => '18340', 'created_at' => '2024-12-07 13:50:22', 'updated_at' => '2024-12-07 13:50:22', 'deleted_at' => NULL),
            array('id' => '31', 'order_id' => '18', 'product_sku' => 'SPBT660996', 'product_name' => '500G Chuối Sấy Dẻo Đặc Sản Đà Lạt, đồ ăn vặt hoa quả sấy, Mứt Chuối Sấy Dẻo, Ô mai - Mứt tết', 'product_img' => 'products/1733203543_674e965789c6e.jpg', 'product_price' => '19900', 'product_quantity' => '2', 'coupon_name' => 'Giam5%-DMCHA-DMCON', 'coupon_price' => '18340', 'created_at' => '2024-12-07 13:50:22', 'updated_at' => '2024-12-07 13:50:22', 'deleted_at' => NULL),
            array('id' => '32', 'order_id' => '19', 'product_sku' => 'SP157866', 'product_name' => 'Bánh Ngói Hạnh Nhân Ăn Kiêng Siêu Hạt Keto Hộp Tiện Lợi 160g', 'product_img' => 'products/1732271495_67405d87071b9.jpg', 'product_price' => '129000', 'product_quantity' => '3', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:50:52', 'updated_at' => '2024-12-07 13:50:52', 'deleted_at' => NULL),
            array('id' => '33', 'order_id' => '19', 'product_sku' => 'SPBT490156', 'product_name' => 'Granola Ngũ Cốc Siêu Hạt Ăn Kiêng Healthy Vigonuts', 'product_img' => 'product_variants/1732270675_67405a532c841.jpg', 'product_price' => '110000', 'product_quantity' => '2', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:50:52', 'updated_at' => '2024-12-07 13:50:52', 'deleted_at' => NULL),
            array('id' => '34', 'order_id' => '19', 'product_sku' => 'SP160564', 'product_name' => 'Bánh Mì Đen Nguyên Cám, Healthy, Eatclean 250g', 'product_img' => 'products/1732618355_6745a87311c26.jpg', 'product_price' => '135000', 'product_quantity' => '3', 'coupon_name' => NULL, 'coupon_price' => NULL, 'created_at' => '2024-12-07 13:50:52', 'updated_at' => '2024-12-07 13:50:52', 'deleted_at' => NULL)
        );

        foreach ($order_detail as $order) {
            OrderDetail::create($order);
        }
    }
}
