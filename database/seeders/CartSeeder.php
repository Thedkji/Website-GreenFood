<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product; // Import Product model
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Import Str class for string manipulation

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy tất cả sản phẩm có SKU không rỗng
        $productsWithSku = Product::whereNotNull('sku')->where('sku', '!=', '')->get();

        // Nếu không có sản phẩm nào có SKU
        if ($productsWithSku->isEmpty()) {
            return; // Kết thúc hàm nếu không có sản phẩm hợp lệ
        }

        // Lưu trữ SKU đã tồn tại
        $existingSkus = Cart::pluck('sku')->toArray();

        // Lặp để tạo ra 10 cart
        for ($i = 1; $i <= 10; $i++) {
            // Lấy một sản phẩm ngẫu nhiên từ danh sách đã lọc
            $product = $productsWithSku->random();

            // Tạo SKU ngẫu nhiên theo định dạng "SP" + số ngẫu nhiên từ 0 đến 1000
            $sku = "SP" . mt_rand(0, 1000);

            // Kiểm tra xem SKU đã tồn tại trong cơ sở dữ liệu chưa
            while (in_array($sku, $existingSkus) || Cart::where('sku', $sku)->exists()) {
                $sku = "SP" . mt_rand(0, 1000); // Tạo lại SKU nếu đã tồn tại
            }

            // Tạo một cart mới
            Cart::create([
                "product_id" => $product->id,
                "user_id" => mt_rand(1, 10), // Lấy user_id ngẫu nhiên
                "sku" => $sku, // Sử dụng SKU đã kiểm tra
                "quantity" => mt_rand(1, 20), // Số lượng ngẫu nhiên
            ]);

            // Thêm SKU mới vào danh sách đã tồn tại
            $existingSkus[] = $sku; // Cập nhật danh sách SKU đã tồn tại
        }
    }
}
