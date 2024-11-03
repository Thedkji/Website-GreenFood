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
        // Mảng để lưu trữ các danh mục đã tạo
        $categories = [];

        // Tạo hai danh mục đầu tiên với parent_id là null
        for ($i = 1; $i <= 2; $i++) {
            $category = Category::create([
                "id" => $i,
                "name" => "danh mục $i",
                "parent_id" => null, // Đảm bảo parent_id là null cho 2 danh mục đầu tiên
            ]);

            // Thêm danh mục vào mảng
            $categories[] = $category;
        }

        // Lưu các ID của danh mục có parent_id là null
        $availableParents = [1, 2]; // ID 1 và 2 có parent_id là null

        // Tạo các danh mục còn lại từ 3 đến 10 với parent_id ngẫu nhiên từ danh mục cha
        for ($i = 3; $i <= 10; $i++) {
            // Chọn ngẫu nhiên một parent_id từ mảng $availableParents
            $randomParentId = $availableParents[array_rand($availableParents)];

            // Tạo danh mục mới với parent_id là ngẫu nhiên
            $category = Category::create([
                "id" => $i,
                "name" => "danh mục $i",
                "parent_id" => $randomParentId,
            ]);

            // Thêm danh mục vào mảng
            $categories[] = $category;
        }
    }
}
