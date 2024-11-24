<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_product = array(
            array('category_id' => '2', 'product_id' => '1'),
            array('category_id' => '4', 'product_id' => '1'),
            array('category_id' => '5', 'product_id' => '2'),
            array('category_id' => '6', 'product_id' => '2'),
            array('category_id' => '2', 'product_id' => '3'),
            array('category_id' => '4', 'product_id' => '3'),
            array('category_id' => '2', 'product_id' => '4'),
            array('category_id' => '4', 'product_id' => '4'),
            array('category_id' => '2', 'product_id' => '5'),
            array('category_id' => '4', 'product_id' => '5'),
            array('category_id' => '2', 'product_id' => '6'),
            array('category_id' => '4', 'product_id' => '6')
        );

        foreach ($category_product as $item) {
            Category::find($item['category_id'])->products()->attach($item['product_id']);
        }
    }
}
