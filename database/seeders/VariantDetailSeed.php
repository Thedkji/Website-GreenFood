<?php

namespace Database\Seeders;

use App\Models\VariantDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantDetailSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            VariantDetail::create([
                "id" => $i,
                "variant_id" => mt_rand(1, 5),
                "price" => $i * 270000,
                "value" => "$i kg",
            ]);
        }
    }
}
