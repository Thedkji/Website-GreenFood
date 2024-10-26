<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $pro = Product::find($i);

            // Gán giá trị variant và variant_group_id cho bảng trung gian
            $variantId = mt_rand(1, 5);
            $variantGroupId = mt_rand(1, 10);

            // Chèn cả variant_id và variant_group_id vào bảng trung gian
            $pro->variants()->attach($variantId, ['variant_group_id' => $variantGroupId]);
        }
    }
}
