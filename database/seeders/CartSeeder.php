<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Cart::create([
                "id" => $i,
                "product_id" => mt_rand(1, 20),
                "user_id" => mt_rand(1, 10),
                "quantity" => mt_rand(1, 20)
            ]);
        }
    }
}
