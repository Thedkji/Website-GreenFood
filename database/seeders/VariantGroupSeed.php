<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\VariantGroup;
use Illuminate\Database\Seeder;

class VariantGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variant_group = array(
            array('id' => '1', 'product_id' => '1', 'sku' => 'SPBT487887', 'img' => NULL, 'price_regular' => '110000', 'price_sale' => '75000', 'quantity' => '1', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-03 11:50:23', 'deleted_at' => NULL),
            array('id' => '2', 'product_id' => '1', 'sku' => 'SPBT250693', 'img' => NULL, 'price_regular' => '150000', 'price_sale' => '99000', 'quantity' => '53', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-03 11:50:23', 'deleted_at' => NULL),
            array('id' => '3', 'product_id' => '2', 'sku' => 'SPBT800530', 'img' => 'product_variants/1732270675_67405a532b8a6.jpg', 'price_regular' => '180000', 'price_sale' => '149000', 'quantity' => '32', 'created_at' => '2024-11-22 05:34:37', 'updated_at' => '2024-12-03 11:40:42', 'deleted_at' => NULL),
            array('id' => '4', 'product_id' => '2', 'sku' => 'SPBT490156', 'img' => 'product_variants/1732270675_67405a532c841.jpg', 'price_regular' => '150000', 'price_sale' => '110000', 'quantity' => '17', 'created_at' => '2024-11-22 05:34:37', 'updated_at' => '2024-12-03 11:39:44', 'deleted_at' => NULL),
            array('id' => '10', 'product_id' => '5', 'sku' => 'SPBT491526', 'img' => NULL, 'price_regular' => '160000', 'price_sale' => '139000', 'quantity' => '30', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '11', 'product_id' => '5', 'sku' => 'SPBT276579', 'img' => NULL, 'price_regular' => '90000', 'price_sale' => '75000', 'quantity' => '40', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '12', 'product_id' => '6', 'sku' => 'SPBT168707', 'img' => NULL, 'price_regular' => '120000', 'price_sale' => '105000', 'quantity' => '60', 'created_at' => '2024-11-22 10:54:46', 'updated_at' => '2024-11-22 10:54:46', 'deleted_at' => NULL),
            array('id' => '13', 'product_id' => '6', 'sku' => 'SPBT235883', 'img' => NULL, 'price_regular' => '30000', 'price_sale' => '20000', 'quantity' => '78', 'created_at' => '2024-11-22 10:54:46', 'updated_at' => '2024-11-22 11:39:26', 'deleted_at' => NULL),
            array('id' => '14', 'product_id' => '6', 'sku' => 'SPBT971176', 'img' => NULL, 'price_regular' => '240000', 'price_sale' => '198000', 'quantity' => '40', 'created_at' => '2024-11-22 10:54:46', 'updated_at' => '2024-11-22 10:54:46', 'deleted_at' => NULL),
            array('id' => '15', 'product_id' => '9', 'sku' => 'SPBT511985', 'img' => NULL, 'price_regular' => '135000', 'price_sale' => '122000', 'quantity' => '27', 'created_at' => '2024-11-26 11:13:57', 'updated_at' => '2024-12-03 11:51:33', 'deleted_at' => NULL),
            array('id' => '16', 'product_id' => '9', 'sku' => 'SPBT945718', 'img' => NULL, 'price_regular' => '150000', 'price_sale' => '135000', 'quantity' => '50', 'created_at' => '2024-11-26 11:13:57', 'updated_at' => '2024-11-26 11:13:57', 'deleted_at' => NULL),
            array('id' => '17', 'product_id' => '10', 'sku' => 'SPBT140683', 'img' => 'product_variants/1732620293_6745b0054f9f4.jpg', 'price_regular' => '200000', 'price_sale' => '150000', 'quantity' => '30', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-11-26 11:24:53', 'deleted_at' => NULL),
            array('id' => '18', 'product_id' => '10', 'sku' => 'SPBT729498', 'img' => NULL, 'price_regular' => '125000', 'price_sale' => '109000', 'quantity' => '28', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-12-03 11:51:33', 'deleted_at' => NULL),
            array('id' => '19', 'product_id' => '13', 'sku' => 'SPBT351721', 'img' => NULL, 'price_regular' => '55000', 'price_sale' => '45000', 'quantity' => '50', 'created_at' => '2024-12-03 12:05:03', 'updated_at' => '2024-12-03 12:05:03', 'deleted_at' => NULL),
            array('id' => '20', 'product_id' => '13', 'sku' => 'SPBT527106', 'img' => NULL, 'price_regular' => '130000', 'price_sale' => '90000', 'quantity' => '50', 'created_at' => '2024-12-03 12:05:03', 'updated_at' => '2024-12-03 12:05:03', 'deleted_at' => NULL),
            array('id' => '21', 'product_id' => '15', 'sku' => 'SPBT814589', 'img' => NULL, 'price_regular' => '50000', 'price_sale' => '34900', 'quantity' => '100', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL),
            array('id' => '22', 'product_id' => '15', 'sku' => 'SPBT660996', 'img' => NULL, 'price_regular' => '35000', 'price_sale' => '19900', 'quantity' => '100', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL)
        );

        foreach ($variant_group as $item) {
            VariantGroup::create($item);
        }
    }
}
