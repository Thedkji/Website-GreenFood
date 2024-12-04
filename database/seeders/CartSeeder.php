<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product; // Import Product model
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Import Str class for string manipulation

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = array(
            array('id' => '21', 'product_id' => '2', 'user_id' => '1', 'sku' => 'SPBT800530', 'quantity' => '3', 'created_at' => '2024-12-03 11:40:58', 'updated_at' => '2024-12-03 11:40:58'),
            array('id' => '22', 'product_id' => '9', 'user_id' => '1', 'sku' => 'SPBT945718', 'quantity' => '3', 'created_at' => '2024-12-03 11:41:06', 'updated_at' => '2024-12-03 11:41:06'),
            array('id' => '23', 'product_id' => '8', 'user_id' => '1', 'sku' => 'SP160564', 'quantity' => '2', 'created_at' => '2024-12-03 11:41:15', 'updated_at' => '2024-12-03 11:41:15'),
            array('id' => '28', 'product_id' => '15', 'user_id' => '2', 'sku' => 'SPBT660996', 'quantity' => '1', 'created_at' => '2024-12-04 13:54:54', 'updated_at' => '2024-12-04 13:54:54'),
            array('id' => '29', 'product_id' => '15', 'user_id' => '2', 'sku' => 'SPBT814589', 'quantity' => '1', 'created_at' => '2024-12-04 13:54:58', 'updated_at' => '2024-12-04 13:54:58')
        );

        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}
