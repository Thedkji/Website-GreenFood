<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Category::create([
                "id" => $i,
                "name" => "Danh mục $i",
                "parent_id" => mt_rand(1, 5),
            ]);
        }
    }
}
