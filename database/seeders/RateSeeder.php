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
        $rates = array(
            array('id' => '1','comment_id' => '10','star' => '3','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '2','comment_id' => '5','star' => '4','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '3','comment_id' => '9','star' => '1','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '4','comment_id' => '7','star' => '1','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '5','comment_id' => '3','star' => '5','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '6','comment_id' => '1','star' => '4','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '7','comment_id' => '2','star' => '1','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '8','comment_id' => '17','star' => '1','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '9','comment_id' => '15','star' => '2','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '10','comment_id' => '11','star' => '4','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '11','comment_id' => '8','star' => '3','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '12','comment_id' => '13','star' => '3','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '13','comment_id' => '4','star' => '3','created_at' => '2024-12-19 13:19:51','updated_at' => '2024-12-19 13:19:51','deleted_at' => NULL),
            array('id' => '14','comment_id' => '6','star' => '2','created_at' => '2024-12-19 13:19:52','updated_at' => '2024-12-19 13:19:52','deleted_at' => NULL),
            array('id' => '15','comment_id' => '12','star' => '3','created_at' => '2024-12-19 13:19:52','updated_at' => '2024-12-19 13:19:52','deleted_at' => NULL),
            array('id' => '16','comment_id' => '16','star' => '2','created_at' => '2024-12-19 13:19:52','updated_at' => '2024-12-19 13:19:52','deleted_at' => NULL),
            array('id' => '17','comment_id' => '14','star' => '2','created_at' => '2024-12-19 13:19:52','updated_at' => '2024-12-19 13:19:52','deleted_at' => NULL),
            array('id' => '18','comment_id' => '18','star' => '4','created_at' => '2024-12-19 15:41:39','updated_at' => '2024-12-19 15:41:39','deleted_at' => NULL),
            array('id' => '19','comment_id' => '19','star' => '5','created_at' => '2024-12-19 15:43:10','updated_at' => '2024-12-19 15:43:10','deleted_at' => NULL),
            array('id' => '20','comment_id' => '20','star' => '4','created_at' => '2024-12-19 15:56:16','updated_at' => '2024-12-19 15:56:16','deleted_at' => NULL),
            array('id' => '21','comment_id' => '21','star' => '3','created_at' => '2024-12-19 15:56:41','updated_at' => '2024-12-19 15:56:41','deleted_at' => NULL),
            array('id' => '22','comment_id' => '22','star' => '4','created_at' => '2024-12-19 15:57:17','updated_at' => '2024-12-19 15:57:17','deleted_at' => NULL),
            array('id' => '23','comment_id' => '23','star' => '5','created_at' => '2024-12-19 16:01:54','updated_at' => '2024-12-19 16:01:54','deleted_at' => NULL),
            array('id' => '24','comment_id' => '24','star' => '4','created_at' => '2024-12-19 16:06:32','updated_at' => '2024-12-19 16:06:32','deleted_at' => NULL),
            array('id' => '25','comment_id' => '25','star' => '4','created_at' => '2024-12-19 16:07:02','updated_at' => '2024-12-19 16:07:02','deleted_at' => NULL),
            array('id' => '26','comment_id' => '26','star' => '5','created_at' => '2024-12-19 16:07:31','updated_at' => '2024-12-19 16:07:31','deleted_at' => NULL),
            array('id' => '27','comment_id' => '27','star' => '5','created_at' => '2024-12-19 16:07:51','updated_at' => '2024-12-19 16:07:51','deleted_at' => NULL),
            array('id' => '28','comment_id' => '28','star' => '5','created_at' => '2024-12-19 16:15:07','updated_at' => '2024-12-19 16:15:07','deleted_at' => NULL),
            array('id' => '29','comment_id' => '29','star' => '4','created_at' => '2024-12-19 16:15:43','updated_at' => '2024-12-19 16:15:43','deleted_at' => NULL),
            array('id' => '30','comment_id' => '30','star' => '5','created_at' => '2024-12-19 16:16:20','updated_at' => '2024-12-19 16:16:20','deleted_at' => NULL)
          );

          foreach ($rates as $rate) {
            Rate::create($rate);
        }
    }
}
