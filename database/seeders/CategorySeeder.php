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
        $categories = array(
            array('id' => '2', 'name' => 'BÁNH ĂN HEALTHY', 'parent_id' => NULL, 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:18:11'),
            array('id' => '3', 'name' => 'BÁNH MỲ', 'parent_id' => '2', 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:18:11'),
            array('id' => '4', 'name' => 'BÁNH COOKIE', 'parent_id' => '2', 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:18:11'),
            array('id' => '5', 'name' => 'HẠT', 'parent_id' => NULL, 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:41:07'),
            array('id' => '6', 'name' => 'GRANOLA', 'parent_id' => '5', 'created_at' => '2024-11-22 04:41:08', 'updated_at' => '2024-11-22 04:41:08'),
            array('id' => '7', 'name' => 'CÁC LOẠI HẠT', 'parent_id' => '5', 'created_at' => '2024-11-22 04:41:08', 'updated_at' => '2024-11-22 04:41:08'),
            array('id' => '8', 'name' => 'THỰC PHẨM SẤY KHÔ', 'parent_id' => NULL, 'created_at' => '2024-11-27 11:19:04', 'updated_at' => '2024-11-27 11:20:36'),
            array('id' => '9', 'name' => 'HOA QUẢ SẤY', 'parent_id' => '8', 'created_at' => '2024-11-27 11:21:17', 'updated_at' => '2024-11-27 11:21:17'),
            array('id' => '10', 'name' => 'TRÀ', 'parent_id' => '8', 'created_at' => '2024-11-27 11:21:48', 'updated_at' => '2024-11-27 11:21:55')
        );

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
