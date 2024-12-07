<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy tất cả comment_id có sẵn, ví dụ lấy từ bảng comments
        $commentIds = \App\Models\Comment::pluck('id')->toArray();

        // Xáo trộn các comment_id để random
        shuffle($commentIds);

        // Gán comment_id vào từng Rate mà không bị trùng
        for ($i = 1; $i <= 17; $i++) {
            Rate::create([
                "id" => $i,
                "comment_id" => $commentIds[$i - 1],  // Lấy comment_id đã được xáo trộn
                "star" => mt_rand(1, 5),
            ]);
        }
    }
}
