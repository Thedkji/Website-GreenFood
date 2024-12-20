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
            array('category_id' => '2','product_id' => '1'),
            array('category_id' => '4','product_id' => '1'),
            array('category_id' => '2','product_id' => '4'),
            array('category_id' => '4','product_id' => '4'),
            array('category_id' => '2','product_id' => '5'),
            array('category_id' => '4','product_id' => '5'),
            array('category_id' => '2','product_id' => '6'),
            array('category_id' => '4','product_id' => '6'),
            array('category_id' => '2','product_id' => '8'),
            array('category_id' => '3','product_id' => '8'),
            array('category_id' => '5','product_id' => '9'),
            array('category_id' => '7','product_id' => '9'),
            array('category_id' => '5','product_id' => '10'),
            array('category_id' => '6','product_id' => '10'),
            array('category_id' => '7','product_id' => '10'),
            array('category_id' => '2','product_id' => '13'),
            array('category_id' => '3','product_id' => '13'),
            array('category_id' => '8','product_id' => '14'),
            array('category_id' => '9','product_id' => '14'),
            array('category_id' => '8','product_id' => '15'),
            array('category_id' => '9','product_id' => '15'),
            array('category_id' => '8','product_id' => '16'),
            array('category_id' => '10','product_id' => '16'),
            array('category_id' => '8','product_id' => '17'),
            array('category_id' => '10','product_id' => '17'),
            array('category_id' => '2','product_id' => '18'),
            array('category_id' => '4','product_id' => '18'),
            array('category_id' => '5','product_id' => '19'),
            array('category_id' => '2','product_id' => '20'),
            array('category_id' => '12','product_id' => '20'),
            array('category_id' => '8','product_id' => '21'),
            array('category_id' => '10','product_id' => '21'),
            array('category_id' => '13','product_id' => '21'),
            array('category_id' => '15','product_id' => '21'),
            array('category_id' => '13','product_id' => '22'),
            array('category_id' => '14','product_id' => '22'),
            array('category_id' => '8','product_id' => '23'),
            array('category_id' => '10','product_id' => '23'),
            array('category_id' => '13','product_id' => '23'),
            array('category_id' => '15','product_id' => '23'),
            array('category_id' => '8','product_id' => '24'),
            array('category_id' => '10','product_id' => '24'),
            array('category_id' => '2','product_id' => '25'),
            array('category_id' => '4','product_id' => '25'),
            array('category_id' => '2','product_id' => '27'),
            array('category_id' => '4','product_id' => '27'),
            array('category_id' => '2','product_id' => '28'),
            array('category_id' => '4','product_id' => '28'),
            array('category_id' => '13','product_id' => '29'),
            array('category_id' => '14','product_id' => '29'),
            array('category_id' => '11','product_id' => '30')
          );

        foreach ($category_product as $item) {
            Category::find($item['category_id'])->products()->attach($item['product_id']);
        }
    }
}
