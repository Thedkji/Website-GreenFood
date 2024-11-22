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
        $data = [
            ["id" => 1, "name" => "Trọng lượng", "parent_id" => null],
            ["id" => 2, "name" => "200gram", "parent_id" => 1],
            ["id" => 3, "name" => "350gram", "parent_id" => 1],
            ["id" => 4, "name" => "500gram", "parent_id" => 1],
            ["id" => 5, "name" => "Size", "parent_id" => null],
            ["id" => 6, "name" => "Bé", "parent_id" => 5],
            ["id" => 7, "name" => "Vừa", "parent_id" => 5],
            ["id" => 8, "name" => "To", "parent_id" => 5],
            // Thêm các danh mục còn lại theo cấu trúc tương tự
        ];

        foreach ($data as $variant) {
            $variants = Variant::create($variant);
        }
    }
}
