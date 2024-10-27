<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\VariantGroup;
use Illuminate\Database\Seeder;

class VariantGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách ID sản phẩm có `status = 1`
        $activeProductIds = Product::where('status', 1)->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            $sku = "SP" . mt_rand(0, 1000);

            // Kiểm tra xem SKU đã tồn tại trong cơ sở dữ liệu chưa
            while (VariantGroup::where('sku', $sku)->exists()) {
                $sku = "SP" . mt_rand(0, 1000); // Tạo lại SKU nếu đã tồn tại
            }

            // Lấy ngẫu nhiên một `product_id` từ danh sách ID sản phẩm có `status = 1`
            $productId = $activeProductIds[array_rand($activeProductIds)];

            VariantGroup::create([
                "id" => $i,
                "product_id" => $productId,
                "sku" => $sku,
                "img" => "https://via.placeholder.com/300x200",
                "price_regular" => mt_rand(100000, 500000),
                "price_sale" => mt_rand(90000, 400000),
                "quantity" => mt_rand(1, 100),
            ]);
        }
    }
}
