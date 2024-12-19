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
            array('id' => '28','product_id' => '15','user_id' => '2','sku' => 'SPBT660996','quantity' => '1','created_at' => '2024-12-04 13:54:54','updated_at' => '2024-12-04 13:54:54'),
            array('id' => '29','product_id' => '15','user_id' => '2','sku' => 'SPBT814589','quantity' => '1','created_at' => '2024-12-04 13:54:58','updated_at' => '2024-12-04 13:54:58'),
            array('id' => '42','product_id' => '5','user_id' => '1','sku' => 'SPBT276579','quantity' => '1','created_at' => '2024-12-07 13:51:02','updated_at' => '2024-12-07 13:51:02'),
            array('id' => '43','product_id' => '5','user_id' => '1','sku' => 'SPBT491526','quantity' => '3','created_at' => '2024-12-07 13:51:07','updated_at' => '2024-12-07 13:51:07'),
            array('id' => '45','product_id' => '6','user_id' => '1','sku' => 'SPBT235883','quantity' => '3','created_at' => '2024-12-07 13:51:17','updated_at' => '2024-12-07 13:51:17'),
            array('id' => '50','product_id' => '23','user_id' => '13','sku' => 'SP688241','quantity' => '1','created_at' => '2024-12-19 17:27:49','updated_at' => '2024-12-19 17:27:49')
          );
          

        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}
