<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                "id" => $i,
                "name" => "Sản phẩm $i",
                "img" => "https://via.placeholder.com/300x200",
                "price_regular" => $i * 300000,
                "price_sale" => $i * 250000,
                "description" => fake()->text(),
                "slug" => fake()->slug(),
            ]);
        }
    }
}
