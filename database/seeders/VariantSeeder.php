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
        // Mảng để lưu trữ các biến thể đã tạo
        $variants = [];

        // Tạo các biến thể với parent_id ban đầu là null
        for ($i = 1; $i <= 10; $i++) {
            // Chỉ định null cho trường parent_id cho bản ghi đầu tiên và thứ hai
            $parentId = ($i === 1 || $i === 2) ? null : null;

            $variant = Variant::create([
                "id" => $i,
                "name" => "Biến thể $i",
                "parent_id" => $parentId,
            ]);

            // Thêm biến thể vào mảng
            $variants[] = $variant;
        }

        // Mảng để chứa các ID của biến thể có parent_id là null
        $availableParents = [1, 2]; // ID 1 và 2 có parent_id là null

        // Gán parent_id cho các biến thể còn lại
        for ($i = 3; $i <= 10; $i++) {
            // Chọn ngẫu nhiên một parent_id từ mảng $availableParents
            $randomParentId = $availableParents[array_rand($availableParents)];

            // Cập nhật parent_id cho biến thể
            $variantToUpdate = Variant::find($i);
            $variantToUpdate->parent_id = $randomParentId;
            $variantToUpdate->save();
        }
    }
}
