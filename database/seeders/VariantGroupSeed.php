<?php

namespace Database\Seeders;

use App\Models\VariantDetail;
use App\Models\VariantGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $sku = "SP" . mt_rand(0, 1000);

            // Kiểm tra xem SKU đã tồn tại trong cơ sở dữ liệu chưa
            while (VariantGroup::where('sku', $sku)->exists()) {
                $sku = "SP" . mt_rand(0, 1000); // Tạo lại SKU nếu đã tồn tại
            }
            
            VariantGroup::create([
                "id" => $i,
                "product_id" => mt_rand(1, 20),
                "sku" => $sku,
                "img" => "https://via.placeholder.com/300x200",
                "price_regular" => mt_rand(100000, 500000),
                "price_sale" => mt_rand(90000, 400000),
                "quantity" => mt_rand(1, 100),
            ]);
        }
    }
}
