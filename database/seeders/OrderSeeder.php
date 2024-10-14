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
            '032',
            '033',
            '034',
            '035',
            '036',
            '037',
            '038',
            '039', // Viettel
            '070',
            '079',
            '077',
            '076',
            '078', // Mobifone
            '083',
            '084',
            '085',
            '081',
            '082', // Vinaphone
            '056',
            '058', // Vietnamobile
            '059'  // Gmobile
        ];

        for ($i = 1; $i <= 10; $i++) {
            $random_numbers = '';
            for ($j = 1; $j <= 7; $j++) {
                $random_numbers .= mt_rand(0, 9);
            }

            // Lấy giá trị ngẫu nhiên từ district và ward
            $random_district = Arr::random($district);
            $random_ward = Arr::random($ward);

            Order::create([
                "id" => $i,
                "user_id" => mt_rand(1, 10),
                "province" => "Hà Nội",
                "district" => $random_district,
                "ward" => $random_ward,
                // Gán địa chỉ từ giá trị random của district và ward
                "address" => "Hà Nội, " . $random_district . ", " . $random_ward,
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
