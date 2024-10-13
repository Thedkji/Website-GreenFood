<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $district = [
            "Thanh Xuân",
            "Bắc Từ Liêm",
            "Ba Đình",
            "Cầu Giấy",
            "Nam Từ Liêm"
        ];

        $ward = [
            "Khương Trung",
            "Phương Canh",
            "Kim Mã",
            "Dịch Vọng",
            "Cầu Diễn"
        ];

                
        $vietnam_phone_prefixes = [
            '032', '033', '034', '035', '036', '037', '038', '039', // Viettel
            '070', '079', '077', '076', '078',                     // Mobifone
            '083', '084', '085', '081', '082',                     // Vinaphone
            '056', '058',                                           // Vietnamobile
            '059'                                                  // Gmobile
        ];
        $random_numbers = '';

        for ($i=1; $i < 7; $i++) { 
            $random_numbers .= mt_rand(0, 9); 
        }

        for ($i = 1; $i <= 5; $i++) {
            Order::create([
                "id" => $i,
                "user_id" => mt_rand(1, 5),
                "address" => fake()->address(),
                "province" => "Hà Nội",
                "district" => Arr::random($district),
                "ward" => Arr::random($ward),
                "email" => "email$i@gmail.com",
                "phone" => Arr::random($vietnam_phone_prefixes) . $random_numbers,
                "total" => $i * 1000000,
                "note" => null,
                "cancel_reson" => null,
                "status" => mt_rand(0, 5),
            ]);
        }
    }
}
