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
        $comments = array(
            array('id' => '1', 'product_id' => '16', 'user_id' => '2', 'parent_user_id' => NULL, 'content' => 'Sản phẩm không chỉ ngon mà còn không chứa đường hóa học, rất an toàn.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '2', 'product_id' => '16', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Mình đã ăn thử các loại hạt mix, rất hợp khẩu vị!', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '3', 'product_id' => '16', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Ngũ cốc nguyên cám ăn sáng này giúp tôi có đủ năng lượng cho cả ngày.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '4', 'product_id' => '6', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Món sinh tố mix hạt rất ngon, mát và lành mạnh.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '5', 'product_id' => '5', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Ăn đồ healthy giúp tôi có nhiều năng lượng hơn mà vẫn giữ dáng.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '7', 'product_id' => '5', 'user_id' => '2', 'parent_user_id' => NULL, 'content' => 'Món salad trộn hạt chia này vừa mát, vừa ngon, lại bổ dưỡng.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '8', 'product_id' => '9', 'user_id' => '2', 'parent_user_id' => NULL, 'content' => 'Hỗn hợp hạt điều và macca thật sự chất lượng, rất giòn và ngon.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '9', 'product_id' => '14', 'user_id' => '2', 'parent_user_id' => NULL, 'content' => 'Bữa sáng với yến mạch và hạt chia thật sự bổ dưỡng.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '10', 'product_id' => '4', 'user_id' => '2', 'parent_user_id' => NULL, 'content' => 'Mình đã ăn thử các loại hạt mix, rất hợp khẩu vị!', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '11', 'product_id' => '10', 'user_id' => '2', 'parent_user_id' => NULL, 'content' => 'Hạnh nhân không quá cứng, dễ ăn và nhiều dưỡng chất.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '12', 'product_id' => '8', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Ngũ cốc nguyên cám ăn sáng này giúp tôi có đủ năng lượng cho cả ngày.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '13', 'product_id' => '4', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Mình đã ăn thử các loại hạt mix, rất hợp khẩu vị!', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '14', 'product_id' => '13', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Sản phẩm này giúp tôi cảm thấy no lâu mà không bị tăng cân.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '15', 'product_id' => '17', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Hạnh nhân không quá cứng, dễ ăn và nhiều dưỡng chất.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '16', 'product_id' => '17', 'user_id' => '1', 'parent_user_id' => NULL, 'content' => 'Món sinh tố mix hạt rất ngon, mát và lành mạnh.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '17', 'product_id' => '5', 'user_id' => '2', 'parent_user_id' => NULL, 'content' => 'Hỗn hợp hạt điều và macca thật sự chất lượng, rất giòn và ngon.', 'img' => '', 'created_at' => '2024-12-19 13:19:51', 'updated_at' => '2024-12-19 13:19:51', 'deleted_at' => NULL),
            array('id' => '18', 'product_id' => '8', 'user_id' => '3', 'parent_user_id' => NULL, 'content' => 'Bánh ngon nhưng có chút khô', 'img' => NULL, 'created_at' => '2024-12-19 15:41:39', 'updated_at' => '2024-12-19 15:41:39', 'deleted_at' => NULL),
            array('id' => '19', 'product_id' => '6', 'user_id' => '3', 'parent_user_id' => NULL, 'content' => 'Quá ngon', 'img' => NULL, 'created_at' => '2024-12-19 15:43:10', 'updated_at' => '2024-12-19 15:43:10', 'deleted_at' => NULL),
            array('id' => '20', 'product_id' => '22', 'user_id' => '4', 'parent_user_id' => NULL, 'content' => 'Uống ngon', 'img' => NULL, 'created_at' => '2024-12-19 15:56:16', 'updated_at' => '2024-12-19 15:56:16', 'deleted_at' => NULL),
            array('id' => '21', 'product_id' => '18', 'user_id' => '4', 'parent_user_id' => NULL, 'content' => 'Bánh hơi khô', 'img' => NULL, 'created_at' => '2024-12-19 15:56:41', 'updated_at' => '2024-12-19 15:56:41', 'deleted_at' => NULL),
            array('id' => '22', 'product_id' => '15', 'user_id' => '4', 'parent_user_id' => NULL, 'content' => 'Ăn khá giòn', 'img' => NULL, 'created_at' => '2024-12-19 15:57:17', 'updated_at' => '2024-12-19 15:57:17', 'deleted_at' => NULL),
            array('id' => '23', 'product_id' => '24', 'user_id' => '5', 'parent_user_id' => NULL, 'content' => 'Trà ngon', 'img' => NULL, 'created_at' => '2024-12-19 16:01:54', 'updated_at' => '2024-12-19 16:01:54', 'deleted_at' => NULL),
            array('id' => '24', 'product_id' => '16', 'user_id' => '5', 'parent_user_id' => NULL, 'content' => 'Uống khá ngon', 'img' => NULL, 'created_at' => '2024-12-19 16:06:32', 'updated_at' => '2024-12-19 16:06:32', 'deleted_at' => NULL),
            array('id' => '25', 'product_id' => '14', 'user_id' => '5', 'parent_user_id' => NULL, 'content' => 'Hoa quả hơi khô', 'img' => NULL, 'created_at' => '2024-12-19 16:07:02', 'updated_at' => '2024-12-19 16:07:02', 'deleted_at' => NULL),
            array('id' => '26', 'product_id' => '23', 'user_id' => '5', 'parent_user_id' => NULL, 'content' => 'Trà uống khá thanh', 'img' => NULL, 'created_at' => '2024-12-19 16:07:31', 'updated_at' => '2024-12-19 16:07:31', 'deleted_at' => NULL),
            array('id' => '27', 'product_id' => '20', 'user_id' => '5', 'parent_user_id' => NULL, 'content' => 'Bánh ngon  và giòn', 'img' => NULL, 'created_at' => '2024-12-19 16:07:51', 'updated_at' => '2024-12-19 16:07:51', 'deleted_at' => NULL),
            array('id' => '28', 'product_id' => '23', 'user_id' => '6', 'parent_user_id' => NULL, 'content' => 'Trà ngon', 'img' => NULL, 'created_at' => '2024-12-19 16:15:07', 'updated_at' => '2024-12-19 16:15:07', 'deleted_at' => NULL),
            array('id' => '29', 'product_id' => '25', 'user_id' => '6', 'parent_user_id' => NULL, 'content' => 'Bánh không được quá xốp', 'img' => NULL, 'created_at' => '2024-12-19 16:15:43', 'updated_at' => '2024-12-19 16:15:43', 'deleted_at' => NULL),
            array('id' => '30', 'product_id' => '14', 'user_id' => '6', 'parent_user_id' => NULL, 'content' => 'Trái cây dẻo và ngon', 'img' => NULL, 'created_at' => '2024-12-19 16:16:20', 'updated_at' => '2024-12-19 16:16:20', 'deleted_at' => NULL),
            array('id' => '31', 'product_id' => '24', 'user_id' => '13', 'parent_user_id' => NULL, 'content' => 'sản phẩm quá ok', 'img' => NULL, 'created_at' => '2024-12-19 17:37:35', 'updated_at' => '2024-12-19 17:37:35', 'deleted_at' => NULL),
            array('id' => '32', 'product_id' => '20', 'user_id' => '13', 'parent_user_id' => NULL, 'content' => 'quá tuyệt', 'img' => NULL, 'created_at' => '2024-12-19 17:38:13', 'updated_at' => '2024-12-19 17:38:13', 'deleted_at' => NULL),
            array('id' => '33', 'product_id' => '27', 'user_id' => '13', 'parent_user_id' => NULL, 'content' => 'đúng như mô tả', 'img' => NULL, 'created_at' => '2024-12-19 17:38:52', 'updated_at' => '2024-12-19 17:38:52', 'deleted_at' => NULL),
            array('id' => '34', 'product_id' => '25', 'user_id' => '10', 'parent_user_id' => NULL, 'content' => 'tuyệt', 'img' => NULL, 'created_at' => '2024-12-19 17:46:57', 'updated_at' => '2024-12-19 17:46:57', 'deleted_at' => NULL),
            array('id' => '35', 'product_id' => '22', 'user_id' => '10', 'parent_user_id' => NULL, 'content' => 'quá ok', 'img' => NULL, 'created_at' => '2024-12-19 17:47:18', 'updated_at' => '2024-12-19 17:47:18', 'deleted_at' => NULL),
            array('id' => '36', 'product_id' => '24', 'user_id' => '10', 'parent_user_id' => NULL, 'content' => 'ok', 'img' => NULL, 'created_at' => '2024-12-19 17:47:31', 'updated_at' => '2024-12-19 17:47:31', 'deleted_at' => NULL),
            array('id' => '37', 'product_id' => '21', 'user_id' => '10', 'parent_user_id' => NULL, 'content' => 'đúng theo mô tả', 'img' => NULL, 'created_at' => '2024-12-19 17:47:52', 'updated_at' => '2024-12-19 17:47:52', 'deleted_at' => NULL),
            array('id' => '38', 'product_id' => '27', 'user_id' => '10', 'parent_user_id' => NULL, 'content' => 'ok', 'img' => NULL, 'created_at' => '2024-12-19 17:48:07', 'updated_at' => '2024-12-19 17:48:07', 'deleted_at' => NULL)
        );


        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
