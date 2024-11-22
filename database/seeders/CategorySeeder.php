<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["id" => 1, "name" => "GÓI ĂN HEALTHY", "parent_id" => null],
            ["id" => 2, "name" => "BÁNH ĂN HEALTHY", "parent_id" => null],
            ["id" => 3, "name" => "BÁNH MỲ", "parent_id" => 2],
            ["id" => 4, "name" => "BÁNH COOKIE", "parent_id" => 2],
            ["id" => 5, "name" => "NGŨ CỐC GRANOLA", "parent_id" => null],
            // Thêm các danh mục còn lại
        ];

        foreach ($data as $category) {
            $categories = Category::create($category);
        }
    }
}
