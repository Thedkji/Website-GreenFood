<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = array(
            array('id' => '1', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e6ed7.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-11-22 04:44:28', 'deleted_at' => '2024-11-22 04:44:28'),
            array('id' => '2', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e7c05.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-11-22 04:44:28', 'deleted_at' => '2024-11-22 04:44:28'),
            array('id' => '3', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e8534.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-11-22 04:44:28', 'deleted_at' => '2024-11-22 04:44:28'),
            array('id' => '4', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e8e75.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-11-22 04:44:28', 'deleted_at' => '2024-11-22 04:44:28'),
            array('id' => '5', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c46551.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => '2024-11-22 10:20:03'),
            array('id' => '6', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c473db.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => '2024-11-22 10:20:03'),
            array('id' => '7', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c48086.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => '2024-11-22 10:20:03'),
            array('id' => '8', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c498ec.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => '2024-11-22 10:20:03'),
            array('id' => '9', 'product_id' => '2', 'path' => 'galleries/1732251134_67400dfe079fb.jpg', 'created_at' => '2024-11-22 04:52:14', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => '2024-11-22 10:17:55'),
            array('id' => '10', 'product_id' => '2', 'path' => 'galleries/1732251134_67400dfe08e93.jpg', 'created_at' => '2024-11-22 04:52:14', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => '2024-11-22 10:17:55'),
            array('id' => '11', 'product_id' => '2', 'path' => 'galleries/1732251134_67400dfe0990d.jpg', 'created_at' => '2024-11-22 04:52:14', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => '2024-11-22 10:17:55'),
            array('id' => '12', 'product_id' => '3', 'path' => 'galleries/1732269174_6740547612f9b.jpg', 'created_at' => '2024-11-22 09:52:54', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => '2024-11-22 10:21:45'),
            array('id' => '13', 'product_id' => '3', 'path' => 'galleries/1732269174_6740547614d0d.jpg', 'created_at' => '2024-11-22 09:52:54', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => '2024-11-22 10:21:45'),
            array('id' => '14', 'product_id' => '3', 'path' => 'galleries/1732269174_674054761574f.jpeg', 'created_at' => '2024-11-22 09:52:54', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => '2024-11-22 10:21:45'),
            array('id' => '15', 'product_id' => '3', 'path' => 'galleries/1732269174_6740547615fd3.jpeg', 'created_at' => '2024-11-22 09:52:54', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => '2024-11-22 10:21:45'),
            array('id' => '16', 'product_id' => '3', 'path' => 'galleries/1732269174_67405476167c8.jpeg', 'created_at' => '2024-11-22 09:52:54', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => '2024-11-22 10:21:45'),
            array('id' => '17', 'product_id' => '2', 'path' => 'galleries/1732270675_67405a5325cdc.jpg', 'created_at' => '2024-11-22 10:17:55', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => NULL),
            array('id' => '18', 'product_id' => '2', 'path' => 'galleries/1732270675_67405a5326b00.jpg', 'created_at' => '2024-11-22 10:17:55', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => NULL),
            array('id' => '19', 'product_id' => '2', 'path' => 'galleries/1732270675_67405a5327d06.jpg', 'created_at' => '2024-11-22 10:17:55', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => NULL),
            array('id' => '20', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39e4e2.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '21', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39ef99.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '22', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39fa3f.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '23', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad3a026c.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '24', 'product_id' => '3', 'path' => 'galleries/1732270905_67405b39954e3.jpg', 'created_at' => '2024-11-22 10:21:45', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '25', 'product_id' => '3', 'path' => 'galleries/1732270905_67405b3996124.jpg', 'created_at' => '2024-11-22 10:21:45', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '26', 'product_id' => '3', 'path' => 'galleries/1732270905_67405b3996dd5.jpeg', 'created_at' => '2024-11-22 10:21:45', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '27', 'product_id' => '3', 'path' => 'galleries/1732270905_67405b3997c93.jpeg', 'created_at' => '2024-11-22 10:21:45', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '28', 'product_id' => '3', 'path' => 'galleries/1732270905_67405b39987b4.jpeg', 'created_at' => '2024-11-22 10:21:45', 'updated_at' => '2024-11-22 10:21:45', 'deleted_at' => NULL),
            array('id' => '29', 'product_id' => '4', 'path' => 'galleries/1732271480_67405d785dff3.jpg', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-11-22 10:31:20', 'deleted_at' => NULL),
            array('id' => '30', 'product_id' => '4', 'path' => 'galleries/1732271480_67405d7860fc1.jpg', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-11-22 10:31:20', 'deleted_at' => NULL),
            array('id' => '31', 'product_id' => '4', 'path' => 'galleries/1732271480_67405d7862217.jpg', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-11-22 10:31:20', 'deleted_at' => NULL),
            array('id' => '32', 'product_id' => '5', 'path' => 'galleries/1732272143_6740600f4b0e6.jpg', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '33', 'product_id' => '5', 'path' => 'galleries/1732272143_6740600f4c568.jpg', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '34', 'product_id' => '5', 'path' => 'galleries/1732272143_6740600f4d048.jpg', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '35', 'product_id' => '6', 'path' => 'galleries/1732272524_6740618cf1e7a.jpg', 'created_at' => '2024-11-22 10:48:44', 'updated_at' => '2024-11-22 10:48:44', 'deleted_at' => NULL),
            array('id' => '36', 'product_id' => '6', 'path' => 'galleries/1732272524_6740618cf311b.jpg', 'created_at' => '2024-11-22 10:48:44', 'updated_at' => '2024-11-22 10:48:44', 'deleted_at' => NULL),
            array('id' => '37', 'product_id' => '6', 'path' => 'galleries/1732272524_6740618cf3df3.jpg', 'created_at' => '2024-11-22 10:48:45', 'updated_at' => '2024-11-22 10:48:45', 'deleted_at' => NULL),
            array('id' => '38', 'product_id' => '6', 'path' => 'galleries/1732272525_6740618d00945.jpg', 'created_at' => '2024-11-22 10:48:45', 'updated_at' => '2024-11-22 10:48:45', 'deleted_at' => NULL)
        );

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
