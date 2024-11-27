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
        $users = array(
            array('id' => '0', 'name' => 'Khách', 'avatar' => NULL, 'user_name' => NULL, 'password' => '', 'email' => NULL, 'phone' => '', 'province' => NULL, 'district' => NULL, 'ward' => NULL, 'address' => NULL, 'role' => '1', 'email_verified_at' => NULL, 'remember_token' => NULL, 'created_at' => NULL, 'updated_at' => NULL, 'deleted_at' => NULL),
            array('id' => '1', 'name' => 'Nguyễn Minh Quang', 'avatar' => 'users/avatars/1732433282_img_1_1732338759979.jpg', 'user_name' => 'admin1', 'password' => '$2y$10$iHFZjl7haPHoorbu7veDTOd4sDScU35sLZhpkmxL4h/0m1.5A0znO', 'email' => 'nmquang2303@gmail.com', 'phone' => '0969992038', 'province' => 'Hà Nội', 'district' => 'Thanh Xuân', 'ward' => 'Khương Trung', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'role' => '0', 'email_verified_at' => '2024-11-24 07:14:33', 'remember_token' => '8LZncq7zMZjuGhm7FJrcFzKgeeMzQRuf5lKABAgdMVf7D8ZOkPW2eRXPsayk', 'created_at' => '2024-11-24 07:14:22', 'updated_at' => '2024-11-24 07:28:02', 'deleted_at' => NULL),
            array('id' => '2', 'name' => 'La Thị Phương', 'avatar' => 'users/avatars/1732433979_img_3_1732339350402.jpg', 'user_name' => 'admin2', 'password' => '$2y$10$03KzNUqeFVyqIQAaFELgdem7uKtK2WUdbgfsNY8fHGtusyWYPdv46', 'email' => 'phuongpato3007@gmail.com', 'phone' => '0896164619', 'province' => 'Vĩnh Phúc', 'district' => 'Sông Lô', 'ward' => 'Hải Lựu', 'address' => 'Hải Lựu, Sông Lô, Vĩnh Phúc', 'role' => '0', 'email_verified_at' => '2024-11-26 21:51:48', 'remember_token' => NULL, 'created_at' => '2024-11-24 07:39:39', 'updated_at' => '2024-11-24 07:39:39', 'deleted_at' => NULL)
        );
    }
}
