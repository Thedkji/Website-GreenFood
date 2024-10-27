<?php

namespace Database\Seeders;

use App\Models\Depot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Depot::create([
                "id" => $i,
                "supplier_id" => mt_rand(1, 10),
                "product_id" => mt_rand(1, 20),
                "variant_group_id" => mt_rand(1, 10),
                "stock" => $i * 2,
                "expiration_date" => fake()->dateTime(),
                "status" => mt_rand(0, 1),
            ]);
        }
    }
}
