<?php

namespace Database\Seeders;

use App\Models\Variant;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $variants = array(
      array('id' => '1', 'name' => 'Khối lượng', 'parent_id' => NULL, 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 10:50:14', 'deleted_at' => NULL),
      array('id' => '2', 'name' => '200gram', 'parent_id' => '1', 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 04:18:16', 'deleted_at' => NULL),
      array('id' => '3', 'name' => '350gram', 'parent_id' => '1', 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 04:18:16', 'deleted_at' => NULL),
      array('id' => '4', 'name' => '500gram', 'parent_id' => '1', 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 04:18:16', 'deleted_at' => NULL),
      array('id' => '5', 'name' => 'Size', 'parent_id' => NULL, 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 04:18:16', 'deleted_at' => NULL),
      array('id' => '6', 'name' => 'Bé', 'parent_id' => '5', 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 04:18:16', 'deleted_at' => NULL),
      array('id' => '7', 'name' => 'Vừa', 'parent_id' => '5', 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 04:18:16', 'deleted_at' => NULL),
      array('id' => '8', 'name' => 'To', 'parent_id' => '5', 'created_at' => '2024-11-22 04:18:16', 'updated_at' => '2024-11-22 04:18:16', 'deleted_at' => NULL),
      array('id' => '9', 'name' => '250gram', 'parent_id' => '1', 'created_at' => '2024-11-22 04:41:41', 'updated_at' => '2024-11-22 04:41:41', 'deleted_at' => NULL),
      array('id' => '10', 'name' => '300gram', 'parent_id' => '1', 'created_at' => '2024-11-22 04:52:28', 'updated_at' => '2024-11-22 04:52:28', 'deleted_at' => NULL),
      array('id' => '11', 'name' => 'Hương vị', 'parent_id' => NULL, 'created_at' => '2024-11-22 09:53:11', 'updated_at' => '2024-11-22 09:53:11', 'deleted_at' => NULL),
      array('id' => '12', 'name' => 'Chocolate', 'parent_id' => '11', 'created_at' => '2024-11-22 09:53:25', 'updated_at' => '2024-11-22 09:53:25', 'deleted_at' => NULL),
      array('id' => '13', 'name' => 'Matcha', 'parent_id' => '11', 'created_at' => '2024-11-22 09:53:35', 'updated_at' => '2024-11-22 09:53:35', 'deleted_at' => NULL),
      array('id' => '14', 'name' => 'Mix 3 Vị', 'parent_id' => '11', 'created_at' => '2024-11-22 09:54:09', 'updated_at' => '2024-11-22 09:54:09', 'deleted_at' => NULL),
      array('id' => '15', 'name' => 'Truyền thống', 'parent_id' => '11', 'created_at' => '2024-11-22 09:54:18', 'updated_at' => '2024-11-22 09:54:18', 'deleted_at' => NULL),
      array('id' => '16', 'name' => 'Trọng Lượng', 'parent_id' => NULL, 'created_at' => '2024-11-22 10:50:29', 'updated_at' => '2024-11-22 10:50:29', 'deleted_at' => NULL),
      array('id' => '17', 'name' => '1 hộp', 'parent_id' => '16', 'created_at' => '2024-11-22 10:50:46', 'updated_at' => '2024-11-22 10:50:46', 'deleted_at' => NULL),
      array('id' => '18', 'name' => '1 chiếc(ăn thử)', 'parent_id' => '16', 'created_at' => '2024-11-22 10:51:05', 'updated_at' => '2024-11-22 10:51:05', 'deleted_at' => NULL),
      array('id' => '19', 'name' => '2 hộp', 'parent_id' => '16', 'created_at' => '2024-11-22 10:51:13', 'updated_at' => '2024-11-22 10:51:13', 'deleted_at' => NULL),
      array('id' => '20', 'name' => '160gram', 'parent_id' => '1', 'created_at' => '2024-12-03 12:03:35', 'updated_at' => '2024-12-03 12:03:35', 'deleted_at' => NULL),
      array('id' => '21', 'name' => '330gram', 'parent_id' => '1', 'created_at' => '2024-12-03 12:03:42', 'updated_at' => '2024-12-03 12:03:42', 'deleted_at' => NULL),
      array('id' => '22', 'name' => '450gram', 'parent_id' => '1', 'created_at' => '2024-12-19 14:09:57', 'updated_at' => '2024-12-19 14:09:57', 'deleted_at' => NULL)
    );

    foreach ($variants as $variant) {
      Variant::create($variant);
    }
  }
}
