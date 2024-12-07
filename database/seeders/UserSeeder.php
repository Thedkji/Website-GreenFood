<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = array(
            array('id' => '1', 'name' => 'Nguyễn Minh Quang', 'avatar' => 'users/avatars/1733200594_img_1_1732338759979.jpg', 'user_name' => 'admin1', 'password' => '$2y$10$iHFZjl7haPHoorbu7veDTOd4sDScU35sLZhpkmxL4h/0m1.5A0znO', 'email' => 'nmquang2303@gmail.com', 'phone' => '0969992038', 'province' => 'Hà Nội', 'district' => 'Ba Đình', 'ward' => 'Phúc Xá', 'address' => 'Khương Trung, Thanh Xuân, Hà Nội', 'role' => '0', 'email_verified_at' => '2024-11-24 07:14:33', 'remember_token' => 'OJcbCysg6g5N9EAogn7grfVCM11zIRvqrSfdOG09ATjTdPlZbSerupIG11K1', 'created_at' => '2024-11-24 07:14:22', 'updated_at' => '2024-12-03 11:36:34', 'deleted_at' => NULL),
            array('id' => '2', 'name' => 'La Thị Phương', 'avatar' => 'users/avatars/1732433979_img_3_1732339350402.jpg', 'user_name' => 'admin2', 'password' => '$2y$10$03KzNUqeFVyqIQAaFELgdem7uKtK2WUdbgfsNY8fHGtusyWYPdv46', 'email' => 'phuongpato3007@gmail.com', 'phone' => '0896164619', 'province' => 'Vĩnh Phúc', 'district' => 'Sông Lô', 'ward' => 'Hải Lựu', 'address' => 'Hải Lựu, Sông Lô, Vĩnh Phúc', 'role' => '0', 'email_verified_at' => '2024-11-26 21:51:48', 'remember_token' => 'kix09frjYsBpeWAOPdhxTYAt980TiY6LY0FalJMEOYOMPXPS8ZmQOKy0Avft', 'created_at' => '2024-11-24 07:39:39', 'updated_at' => '2024-11-24 07:39:39', 'deleted_at' => NULL),
            array('id' => '4', 'name' => 'Trần Đình Cường', 'avatar' => NULL, 'user_name' => 'admin3', 'password' => '$2y$10$fl3pX2l.64n5rpIg0.cCQuPlLDPZeflor7jMqsCiUPfiQxCoOy5ia', 'email' => 'cuongtdph32393@fpt.edu.vn', 'phone' => '0904901309', 'province' => 'Hà Nội', 'district' => 'Cầu Giấy', 'ward' => 'Dịch Vọng Hậu', 'address' => 'Dịch Vọng Hậu, Cầu Giấy, Hà Nội', 'role' => '0', 'email_verified_at' => '2024-11-26 10:35:44', 'remember_token' => NULL, 'created_at' => '2024-11-26 03:31:51', 'updated_at' => '2024-11-26 03:31:51', 'deleted_at' => NULL),
            array('id' => '5', 'name' => 'Nguyễn Văn Tú', 'avatar' => NULL, 'user_name' => 'admin4', 'password' => '$2y$10$SJX0edyZzhErAyn5VS2o5ulkiWBJjxm8Z.c1rcgh3kSGC119oCzT2', 'email' => 'xitrumgaming53@gmail.com', 'phone' => '0975573837', 'province' => 'Hưng Yên', 'district' => 'Kim Động', 'ward' => 'Toàn Thắng', 'address' => 'Toàn Thắng, Kim Động, Hưng Yên', 'role' => '0', 'email_verified_at' => '2024-11-21 10:35:52', 'remember_token' => NULL, 'created_at' => '2024-11-26 03:33:20', 'updated_at' => '2024-11-26 03:33:20', 'deleted_at' => NULL),
            array('id' => '6', 'name' => 'Đặng Xuân Mạnh', 'avatar' => NULL, 'user_name' => 'admin5', 'password' => '$2y$10$mcKi68iUfnNDa4i79hBqROA.Vz5LVeuBSly/cpf/vNiF9k7gjrf9C', 'email' => 'manhdxph35470@fpt.edu.vn', 'phone' => '0355126328', 'province' => 'Hà Nam', 'district' => 'Phủ Lý', 'ward' => 'Quang Trung', 'address' => 'Quang Trung, Phủ Lý, Hà Nam', 'role' => '0', 'email_verified_at' => '2024-11-01 10:35:55', 'remember_token' => NULL, 'created_at' => '2024-11-26 03:34:25', 'updated_at' => '2024-11-26 03:34:25', 'deleted_at' => NULL),
            array('id' => '7', 'name' => 'Nguyễn Thảo Vy', 'avatar' => NULL, 'user_name' => 'admin6', 'password' => '$2y$10$XaRKLcawo4Nx6R9LLHtYguORuCBNoIyrlh1c0h6AG..M81/E1h.aC', 'email' => 'vyntph33212@fpt.edu.vn', 'phone' => '0372109856', 'province' => 'Ninh Bình', 'district' => 'Kim Sơn', 'ward' => 'Như Hòa', 'address' => 'Như Hòa, Kim Sơn, Ninh Bình', 'role' => '0', 'email_verified_at' => '2024-11-09 10:35:57', 'remember_token' => NULL, 'created_at' => '2024-11-26 03:35:22', 'updated_at' => '2024-12-03 11:39:04', 'deleted_at' => NULL),
            array('id' => '8', 'name' => 'Lê Trung Kiên', 'avatar' => NULL, 'user_name' => 'admin7', 'password' => '$2y$10$BlqB6JpSWUzj/kTUzeHE2OxMwbg1SoOrPt1tu8XbCE10IzWL6/fou', 'email' => 'kienltph38042@fpt.edu.vn', 'phone' => '0369765437', 'province' => 'Thanh Hóa', 'district' => 'Sầm Sơn', 'ward' => 'Trường Sơn', 'address' => 'Trường Sơn, Sầm Sơn, Thanh Hóa', 'role' => '0', 'email_verified_at' => '2024-11-26 10:37:03', 'remember_token' => NULL, 'created_at' => '2024-11-26 03:36:55', 'updated_at' => '2024-11-26 03:36:55', 'deleted_at' => NULL),
            array('id' => '9', 'name' => 'Nguyễn Văn A', 'avatar' => NULL, 'user_name' => 'admin8', 'password' => '$2y$10$XYZ123456789ABCDEFGHIJKLMNOPQRSTUVWX', 'email' => 'nguyenvana@fpt.edu.vn', 'phone' => '0123456789', 'province' => 'Hà Nội', 'district' => 'Cầu Giấy', 'ward' => 'Dịch Vọng', 'address' => 'Dịch Vọng, Cầu Giấy, Hà Nội', 'role' => '1', 'email_verified_at' => '2024-11-27 12:00:00', 'remember_token' => NULL, 'created_at' => '2024-11-27 12:00:00', 'updated_at' => '2024-11-27 12:00:00', 'deleted_at' => NULL),
        );

        foreach ($users as $user) {
            User::Create($user);
        }
    }
}
