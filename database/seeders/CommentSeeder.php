<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Comment::create([
                "id" => $i,
                "product_id" => mt_rand(1, 20),
                "user_id" => mt_rand(1, 5),
                "content" => fake()->text(),
                "img" => "https://via.placeholder.com/300x200",
            ]);
        }
    }
}
