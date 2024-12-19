<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = array(
            array('id' => '11','name' => 'ANNUT','email' => 'ANNUT23@gmail.com','phone' => '0896523478','address' => 'Số 24 ngõ 902 Kim Giang, Thanh Liệt, Thanh Trì, Hà Nội','created_at' => '2024-12-07 13:21:02','updated_at' => '2024-12-07 13:21:02','deleted_at' => NULL),
            array('id' => '12','name' => 'Vigonuts','email' => 'CTVigonuts@gmail.com','phone' => '0859867524','address' => '985 QL 1A Ấp 2, X. Xuân Hưng, H. Xuân Lộc, T. Đồng Nai, Việt Nam','created_at' => '2024-12-07 13:22:49','updated_at' => '2024-12-07 13:22:49','deleted_at' => NULL),
            array('id' => '13','name' => 'TeaOnlien','email' => 'TeaonlineVN@gmail.com','phone' => '0563254123','address' => 'Số 85 Đường Láng, Quận Đống Đa, Hà Nội','created_at' => '2024-12-07 13:24:59','updated_at' => '2024-12-07 13:24:59','deleted_at' => NULL),
            array('id' => '14','name' => 'Tiệm của thùy','email' => 'thuynguyenonline@gmail.com','phone' => '0569845265','address' => 'Số 10 Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội','created_at' => '2024-12-07 13:25:57','updated_at' => '2024-12-07 13:25:57','deleted_at' => NULL),
            array('id' => '15','name' => 'SnapFood','email' => 'snapfood34@gmail.com','phone' => '0256987412','address' => 'Số 35 Nguyễn Văn Cừ, Quận Long Biên, Hà Nội','created_at' => '2024-12-07 13:26:37','updated_at' => '2024-12-07 13:26:37','deleted_at' => NULL),
            array('id' => '16','name' => 'Happi Foody','email' => 'happifoody@gmail.com','phone' => '0254534675','address' => 'Tòa nhà FPT Polytechnic., Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam','created_at' => '2024-12-19 14:47:06','updated_at' => '2024-12-19 14:47:06','deleted_at' => NULL),
            array('id' => '17','name' => 'COZY','email' => 'cozy543@gmail.com','phone' => '0256546759','address' => 'Tòa nhà FPT Polytechnic., Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam','created_at' => '2024-12-19 14:59:27','updated_at' => '2024-12-19 14:59:27','deleted_at' => NULL)
          );
        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
