<?php

namespace Database\Seeders;

use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Variant::create([
                "id" => $i,
                "name" => "Biến thể $i",
                "parent_id" => mt_rand(1, 10),
            ]);
        }
    }
}
