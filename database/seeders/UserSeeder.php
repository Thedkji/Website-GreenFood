<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mảng họ
        $last_names = [
            "Nguyễn",
            "Trần",
            "Lê",
            "Phạm",
            "Hoàng",
            "Vũ",
            "Đặng",
            "Bùi",
            "Đỗ",
            "Ngô"
        ];

        // Mảng tên đệm
        $middle_names = [
            "Văn",
            "Thị",
            "Quốc",
            "Gia",
            "Minh",
            "Xuân",
            "Hải",
            "Phương",
            "Thanh",
            "Bảo"
        ];

        // Mảng tên
        $first_names = [
            "An",
            "Bình",
            "Cường",
            "Dung",
            "Hùng",
            "Lan",
            "Mai",
            "Nhung",
            "Quang",
            "Trang"
        ];

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
            '059' // Gmobile
        ];

        for ($i = 1; $i <= 10; $i++) {
            $random_numbers = '';
            for ($j = 1; $j <= 7; $j++) {
                $random_numbers .= mt_rand(0, 9);
            }

            // Lấy giá trị ngẫu nhiên từ district và ward
            $random_district = Arr::random($district);
            $random_ward = Arr::random($ward);

            User::create([
                "id" => $i,
                "name" => Arr::random($last_names) . " " . Arr::random($middle_names) . " " . Arr::random($first_names),
                "avatar" => "https://via.placeholder.com/300x200",
                "user_name" => "admin$i",
                "password" => bcrypt(12345678),
                "email" => "email$i@gmail.com",
                "phone" => Arr::random($vietnam_phone_prefixes) . $random_numbers,
                "province" => "Hà Nội",
                "district" => $random_district,
                "ward" => $random_ward,
                // Gán địa chỉ từ giá trị random của district và ward
                "address" => "Hà Nội, " . $random_district . ", " . $random_ward,
                "email_verified_at" => fake()->dateTime(),
                "remember_token" => fake()->dateTime(),
                "role" => 0,
            ]);
        }
    }
}
