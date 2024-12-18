<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $healthy_food_comments = [
            "Hạt rất giòn và tươi, ăn không ngán chút nào.",
            "Ngũ cốc thơm ngon, không quá ngọt, rất tốt cho sức khỏe.",
            "Bữa sáng với yến mạch và hạt chia thật sự bổ dưỡng.",
            "Đồ ăn healthy mà vị vẫn rất ngon, tuyệt vời!",
            "Sản phẩm này giúp tôi cảm thấy no lâu mà không bị tăng cân.",
            "Hạt óc chó thơm, bùi, rất tốt cho tim mạch.",
            "Mình đã ăn thử các loại hạt mix, rất hợp khẩu vị!",
            "Ngũ cốc ăn liền này rất tiện lợi cho những bữa sáng bận rộn.",
            "Hạnh nhân không quá cứng, dễ ăn và nhiều dưỡng chất.",
            "Sữa hạt điều không béo, vị rất thanh, phù hợp cho người ăn kiêng.",
            "Món salad trộn hạt chia này vừa mát, vừa ngon, lại bổ dưỡng.",
            "Hạt lanh giúp tôi tiêu hóa tốt hơn, sẽ mua thêm lần nữa!",
            "Yến mạch hữu cơ rất tốt, chế biến nhanh và giữ được vị nguyên chất.",
            "Món sinh tố mix hạt rất ngon, mát và lành mạnh.",
            "Snack hạt dinh dưỡng này thật sự là lựa chọn hoàn hảo cho những ai muốn giảm cân.",
            "Hỗn hợp hạt điều và macca thật sự chất lượng, rất giòn và ngon.",
            "Ngũ cốc nguyên cám ăn sáng này giúp tôi có đủ năng lượng cho cả ngày.",
            "Sản phẩm không chỉ ngon mà còn không chứa đường hóa học, rất an toàn.",
            "Hạt hướng dương lành mạnh, nhai giòn giòn vui miệng!",
            "Ăn đồ healthy giúp tôi có nhiều năng lượng hơn mà vẫn giữ dáng."
        ];

        $product_id = Product::pluck("id")->toArray();
        $user_id = User::pluck("id")->toArray();

        for ($i = 1; $i <= 17; $i++) {
            Comment::create([
                "id" => $i,
                "product_id" => Arr::random($product_id),
                "parent_user_id" => null,
                "user_id" => Arr::random($user_id),
                "content" => Arr::random($healthy_food_comments),
                "img" => "",
            ]);
        }
    }
}
