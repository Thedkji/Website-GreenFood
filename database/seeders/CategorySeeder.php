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
            array('id' => '1', 'name' => 'GÓI ĂN HEALTHY', 'parent_id' => NULL, 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:18:11'),
            array('id' => '2', 'name' => 'BÁNH ĂN HEALTHY', 'parent_id' => NULL, 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:18:11'),
            array('id' => '3', 'name' => 'BÁNH MỲ', 'parent_id' => '2', 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:18:11'),
            array('id' => '4', 'name' => 'BÁNH COOKIE', 'parent_id' => '2', 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:18:11'),
            array('id' => '5', 'name' => 'HẠT', 'parent_id' => NULL, 'created_at' => '2024-11-22 04:18:11', 'updated_at' => '2024-11-22 04:41:07'),
            array('id' => '6', 'name' => 'GRANOLA', 'parent_id' => '5', 'created_at' => '2024-11-22 04:41:08', 'updated_at' => '2024-11-22 04:41:08'),
            array('id' => '7', 'name' => 'CÁC LOẠI HẠT', 'parent_id' => '5', 'created_at' => '2024-11-22 04:41:08', 'updated_at' => '2024-11-22 04:41:08')
        );

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
