<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $sku = "SP" . mt_rand(0, 1000);

            // Kiểm tra xem SKU đã tồn tại trong cơ sở dữ liệu chưa
            while (Product::where('sku', $sku)->exists()) {
                $sku = "SP" . mt_rand(0, 1000); // Tạo lại SKU nếu đã tồn tại
            }

            $name = "Sản phẩm $i";
            $status = mt_rand(0, 1); // Tạo status ngẫu nhiên

            // Nếu status = 0, giữ nguyên các giá trị; ngược lại = 1 thì set một số trường là null
            $productData = [
                "id" => $i,
                "sku" => $status == 0 ? $sku : null,
                "name" => $name,
                "slug" => Str::slug($name),
                "img" => $status == 0 ? "https://via.placeholder.com/300x200" : null,
                "price_regular" => $status == 0 ? $i * 300000 : null,
                "price_sale" => $status == 0 ? $i * 250000 : null,
                "description" => fake()->text(),
                "description_short" => fake()->text(100),
                "quantity" => $status == 0 ? mt_rand(1, 100) : null,
                "status" => $status,
            ];

            Product::create($productData);
        }
    }
}
