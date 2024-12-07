<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Rate::create([
                "id" => $i,
                "comment_id" => mt_rand(1, 10),
                "star" => mt_rand(1, 5),
            ]);
        }
    }
}
