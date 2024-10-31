<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Variant;
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

        // Tạo các danh mục với parent_id ban đầu là null
        for ($i = 1; $i <= 10; $i++) {
            // Chỉ định null cho trường parent_id cho bản ghi đầu tiên và thứ hai
            $parentId = ($i === 1 || $i === 2) ? null : null;

            $category = Category::create([
                "id" => $i,
                "name" => "danh mục $i",
                "parent_id" => $parentId,
            ]);

            // Thêm danh mục vào mảng
            $categories[] = $category;
        }

        // Mảng để chứa các ID của danh mục có parent_id là null
        $availableParents = [1, 2]; // ID 1 và 2 có parent_id là null

        // Gán parent_id cho các danh mục còn lại
        for ($i = 3; $i <= 10; $i++) {
            // Chọn ngẫu nhiên một parent_id từ mảng $availableParents
            $randomParentId = $availableParents[array_rand($availableParents)];

            // Cập nhật parent_id cho danh mục
            $categoryToUpdate = Category::find($i);
            $categoryToUpdate->parent_id = $randomParentId;
            $categoryToUpdate->save();
        }
    }
}
