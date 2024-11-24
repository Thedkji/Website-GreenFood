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
            array('id' => '1', 'product_id' => '1', 'sku' => 'SPBT487887', 'img' => NULL, 'price_regular' => '110000', 'price_sale' => '75000', 'quantity' => '2', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-11-22 11:19:42', 'deleted_at' => NULL),
            array('id' => '2', 'product_id' => '1', 'sku' => 'SPBT250693', 'img' => NULL, 'price_regular' => '150000', 'price_sale' => '99000', 'quantity' => '60', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-11-22 04:28:02', 'deleted_at' => NULL),
            array('id' => '3', 'product_id' => '2', 'sku' => 'SPBT800530', 'img' => 'product_variants/1732270675_67405a532b8a6.jpg', 'price_regular' => '180000', 'price_sale' => '149000', 'quantity' => '34', 'created_at' => '2024-11-22 05:34:37', 'updated_at' => '2024-11-22 11:19:43', 'deleted_at' => NULL),
            array('id' => '4', 'product_id' => '2', 'sku' => 'SPBT490156', 'img' => 'product_variants/1732270675_67405a532c841.jpg', 'price_regular' => '150000', 'price_sale' => '110000', 'quantity' => '20', 'created_at' => '2024-11-22 05:34:37', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => NULL),
            array('id' => '5', 'product_id' => '3', 'sku' => 'SPBT358936', 'img' => NULL, 'price_regular' => '555', 'price_sale' => '22', 'quantity' => '10', 'created_at' => '2024-11-22 09:57:30', 'updated_at' => '2024-11-22 10:01:21', 'deleted_at' => '2024-11-22 10:01:21'),
            array('id' => '6', 'product_id' => '3', 'sku' => 'SPBT888712', 'img' => 'product_variants/1732270905_67405b399b4b0.jpeg', 'price_regular' => '110000', 'price_sale' => '99000', 'quantity' => '28', 'created_at' => '2024-11-22 09:57:30', 'updated_at' => '2024-11-22 11:39:26', 'deleted_at' => NULL),
            array('id' => '7', 'product_id' => '3', 'sku' => 'SPBT479595', 'img' => 'product_variants/1732270905_67405b399c285.jpeg', 'price_regular' => '110000', 'price_sale' => '99000', 'quantity' => '20', 'created_at' => '2024-11-22 09:57:30', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '8', 'product_id' => '3', 'sku' => 'SPBT677039', 'img' => 'product_variants/1732270905_67405b399d074.jpg', 'price_regular' => '120000', 'price_sale' => '110000', 'quantity' => '30', 'created_at' => '2024-11-22 09:57:30', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '9', 'product_id' => '3', 'sku' => 'SPBT816540', 'img' => 'product_variants/1732270905_67405b399ddb8.jpeg', 'price_regular' => '100000', 'price_sale' => '89000', 'quantity' => '30', 'created_at' => '2024-11-22 09:57:30', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '10', 'product_id' => '5', 'sku' => 'SPBT491526', 'img' => NULL, 'price_regular' => '160000', 'price_sale' => '139000', 'quantity' => '30', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '11', 'product_id' => '5', 'sku' => 'SPBT276579', 'img' => NULL, 'price_regular' => '90000', 'price_sale' => '75000', 'quantity' => '40', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '12', 'product_id' => '6', 'sku' => 'SPBT168707', 'img' => NULL, 'price_regular' => '120000', 'price_sale' => '105000', 'quantity' => '60', 'created_at' => '2024-11-22 10:54:46', 'updated_at' => '2024-11-22 10:54:46', 'deleted_at' => NULL),
            array('id' => '13', 'product_id' => '6', 'sku' => 'SPBT235883', 'img' => NULL, 'price_regular' => '30000', 'price_sale' => '20000', 'quantity' => '78', 'created_at' => '2024-11-22 10:54:46', 'updated_at' => '2024-11-22 11:39:26', 'deleted_at' => NULL),
            array('id' => '14', 'product_id' => '6', 'sku' => 'SPBT971176', 'img' => NULL, 'price_regular' => '240000', 'price_sale' => '198000', 'quantity' => '40', 'created_at' => '2024-11-22 10:54:46', 'updated_at' => '2024-11-22 10:54:46', 'deleted_at' => NULL)
        );

        foreach ($variant_group as $item) {
            VariantGroup::create($item);
        }
    }
}
