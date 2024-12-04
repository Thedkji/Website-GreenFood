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
            array('id' => '17', 'product_id' => '2', 'path' => 'galleries/1732270675_67405a5325cdc.jpg', 'created_at' => '2024-11-22 10:17:55', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => NULL),
            array('id' => '18', 'product_id' => '2', 'path' => 'galleries/1732270675_67405a5326b00.jpg', 'created_at' => '2024-11-22 10:17:55', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => NULL),
            array('id' => '19', 'product_id' => '2', 'path' => 'galleries/1732270675_67405a5327d06.jpg', 'created_at' => '2024-11-22 10:17:55', 'updated_at' => '2024-11-22 10:17:55', 'deleted_at' => NULL),
            array('id' => '20', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39e4e2.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '21', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39ef99.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '22', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39fa3f.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '23', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad3a026c.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-11-22 10:20:03', 'deleted_at' => NULL),
            array('id' => '29', 'product_id' => '4', 'path' => 'galleries/1732271480_67405d785dff3.jpg', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-11-22 10:31:20', 'deleted_at' => NULL),
            array('id' => '30', 'product_id' => '4', 'path' => 'galleries/1732271480_67405d7860fc1.jpg', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-11-22 10:31:20', 'deleted_at' => NULL),
            array('id' => '31', 'product_id' => '4', 'path' => 'galleries/1732271480_67405d7862217.jpg', 'created_at' => '2024-11-22 10:31:20', 'updated_at' => '2024-11-22 10:31:20', 'deleted_at' => NULL),
            array('id' => '32', 'product_id' => '5', 'path' => 'galleries/1732272143_6740600f4b0e6.jpg', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '33', 'product_id' => '5', 'path' => 'galleries/1732272143_6740600f4c568.jpg', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '34', 'product_id' => '5', 'path' => 'galleries/1732272143_6740600f4d048.jpg', 'created_at' => '2024-11-22 10:42:23', 'updated_at' => '2024-11-22 10:42:23', 'deleted_at' => NULL),
            array('id' => '35', 'product_id' => '6', 'path' => 'galleries/1732272524_6740618cf1e7a.jpg', 'created_at' => '2024-11-22 10:48:44', 'updated_at' => '2024-11-22 10:48:44', 'deleted_at' => NULL),
            array('id' => '36', 'product_id' => '6', 'path' => 'galleries/1732272524_6740618cf311b.jpg', 'created_at' => '2024-11-22 10:48:44', 'updated_at' => '2024-11-22 10:48:44', 'deleted_at' => NULL),
            array('id' => '37', 'product_id' => '6', 'path' => 'galleries/1732272524_6740618cf3df3.jpg', 'created_at' => '2024-11-22 10:48:45', 'updated_at' => '2024-11-22 10:48:45', 'deleted_at' => NULL),
            array('id' => '38', 'product_id' => '6', 'path' => 'galleries/1732272525_6740618d00945.jpg', 'created_at' => '2024-11-22 10:48:45', 'updated_at' => '2024-11-22 10:48:45', 'deleted_at' => NULL),
            array('id' => '39', 'product_id' => '8', 'path' => 'galleries/1732618355_6745a8731891f.jpg', 'created_at' => '2024-11-26 10:52:35', 'updated_at' => '2024-11-26 10:52:35', 'deleted_at' => NULL),
            array('id' => '40', 'product_id' => '8', 'path' => 'galleries/1732618355_6745a8731950a.jpg', 'created_at' => '2024-11-26 10:52:35', 'updated_at' => '2024-11-26 10:52:35', 'deleted_at' => NULL),
            array('id' => '41', 'product_id' => '8', 'path' => 'galleries/1732618355_6745a87319d95.jpg', 'created_at' => '2024-11-26 10:52:35', 'updated_at' => '2024-11-26 10:52:35', 'deleted_at' => NULL),
            array('id' => '42', 'product_id' => '8', 'path' => 'galleries/1732618355_6745a8731a7a6.jpg', 'created_at' => '2024-11-26 10:52:35', 'updated_at' => '2024-11-26 10:52:35', 'deleted_at' => NULL),
            array('id' => '43', 'product_id' => '8', 'path' => 'galleries/1732618355_6745a8731b805.jpg', 'created_at' => '2024-11-26 10:52:35', 'updated_at' => '2024-11-26 10:52:35', 'deleted_at' => NULL),
            array('id' => '44', 'product_id' => '9', 'path' => 'galleries/1732619637_6745ad7562a09.jpg', 'created_at' => '2024-11-26 11:13:57', 'updated_at' => '2024-11-26 11:13:57', 'deleted_at' => NULL),
            array('id' => '45', 'product_id' => '9', 'path' => 'galleries/1732619637_6745ad7563d70.jpg', 'created_at' => '2024-11-26 11:13:57', 'updated_at' => '2024-11-26 11:13:57', 'deleted_at' => NULL),
            array('id' => '46', 'product_id' => '9', 'path' => 'galleries/1732619637_6745ad7564a15.jpg', 'created_at' => '2024-11-26 11:13:57', 'updated_at' => '2024-11-26 11:13:57', 'deleted_at' => NULL),
            array('id' => '47', 'product_id' => '10', 'path' => 'galleries/1732620293_6745b00552734.jpg', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-11-26 11:24:53', 'deleted_at' => NULL),
            array('id' => '48', 'product_id' => '10', 'path' => 'galleries/1732620293_6745b00553194.jpg', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-11-26 11:24:53', 'deleted_at' => NULL),
            array('id' => '49', 'product_id' => '10', 'path' => 'galleries/1732620293_6745b00553b1a.jpg', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-11-26 11:24:53', 'deleted_at' => NULL),
            array('id' => '50', 'product_id' => '10', 'path' => 'galleries/1732620293_6745b00554531.jpg', 'created_at' => '2024-11-26 11:24:53', 'updated_at' => '2024-11-26 11:24:53', 'deleted_at' => NULL),
            array('id' => '51', 'product_id' => '13', 'path' => 'galleries/1733202143_674e90df69431.jpg', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-03 12:02:23', 'deleted_at' => NULL),
            array('id' => '52', 'product_id' => '13', 'path' => 'galleries/1733202143_674e90df69ffc.jpg', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-03 12:02:23', 'deleted_at' => NULL),
            array('id' => '53', 'product_id' => '13', 'path' => 'galleries/1733202143_674e90df6ac41.jpg', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-03 12:02:23', 'deleted_at' => NULL),
            array('id' => '54', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e222d32.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '55', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e2237c9.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '56', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e224176.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '57', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e224bb1.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '58', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e225ab8.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '59', 'product_id' => '15', 'path' => 'galleries/1733203543_674e96578e27d.jpg', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL),
            array('id' => '60', 'product_id' => '15', 'path' => 'galleries/1733203543_674e96578ed51.jpg', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL),
            array('id' => '61', 'product_id' => '15', 'path' => 'galleries/1733203543_674e96578f4e8.jpg', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL)
        );

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
