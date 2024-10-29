<?php

namespace Database\Seeders;

use App\Models\Variant;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            // Chỉ định null cho trường parent_id của bản ghi đầu tiên và thứ hai
            $parentId = ($i === 1 || $i === 2) ? null : mt_rand(1, 10);

            Variant::create([
                "id" => $i,
                "name" => "Biến thể $i",
                "parent_id" => $parentId,
            ]);
        }
    }
}
