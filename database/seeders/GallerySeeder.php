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
            array('id' => '1', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e6ed7.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '2', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e7c05.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '3', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e8534.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '4', 'product_id' => '1', 'path' => 'galleries/1732249682_67400852e8e75.jpg', 'created_at' => '2024-11-22 04:28:02', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '5', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c46551.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '6', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c473db.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '7', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c48086.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '8', 'product_id' => '1', 'path' => 'galleries/1732250668_67400c2c498ec.jpg', 'created_at' => '2024-11-22 04:44:28', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '20', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39e4e2.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '21', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39ef99.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '22', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad39fa3f.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
            array('id' => '23', 'product_id' => '1', 'path' => 'galleries/1732270803_67405ad3a026c.jpg', 'created_at' => '2024-11-22 10:20:03', 'updated_at' => '2024-12-19 17:12:53', 'deleted_at' => NULL),
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
            array('id' => '51', 'product_id' => '13', 'path' => 'galleries/1733202143_674e90df69431.jpg', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-19 13:24:57', 'deleted_at' => '2024-12-19 13:24:57'),
            array('id' => '52', 'product_id' => '13', 'path' => 'galleries/1733202143_674e90df69ffc.jpg', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-19 13:24:57', 'deleted_at' => '2024-12-19 13:24:57'),
            array('id' => '53', 'product_id' => '13', 'path' => 'galleries/1733202143_674e90df6ac41.jpg', 'created_at' => '2024-12-03 12:02:23', 'updated_at' => '2024-12-19 13:24:57', 'deleted_at' => '2024-12-19 13:24:57'),
            array('id' => '54', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e222d32.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '55', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e2237c9.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '56', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e224176.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '57', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e224bb1.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '58', 'product_id' => '14', 'path' => 'galleries/1733202914_674e93e225ab8.jpg', 'created_at' => '2024-12-03 12:15:14', 'updated_at' => '2024-12-03 12:15:14', 'deleted_at' => NULL),
            array('id' => '59', 'product_id' => '15', 'path' => 'galleries/1733203543_674e96578e27d.jpg', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL),
            array('id' => '60', 'product_id' => '15', 'path' => 'galleries/1733203543_674e96578ed51.jpg', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL),
            array('id' => '61', 'product_id' => '15', 'path' => 'galleries/1733203543_674e96578f4e8.jpg', 'created_at' => '2024-12-03 12:25:43', 'updated_at' => '2024-12-03 12:25:43', 'deleted_at' => NULL),
            array('id' => '62', 'product_id' => '16', 'path' => 'galleries/1733551826_6753e6d2cb1cd.jpg', 'created_at' => '2024-12-07 13:10:26', 'updated_at' => '2024-12-07 13:10:26', 'deleted_at' => NULL),
            array('id' => '63', 'product_id' => '16', 'path' => 'galleries/1733551826_6753e6d2cbc1c.jpg', 'created_at' => '2024-12-07 13:10:26', 'updated_at' => '2024-12-07 13:10:26', 'deleted_at' => NULL),
            array('id' => '64', 'product_id' => '16', 'path' => 'galleries/1733551826_6753e6d2cca39.jpg', 'created_at' => '2024-12-07 13:10:26', 'updated_at' => '2024-12-07 13:10:26', 'deleted_at' => NULL),
            array('id' => '65', 'product_id' => '17', 'path' => 'galleries/1733552350_6753e8ded73f8.jpg', 'created_at' => '2024-12-07 13:19:10', 'updated_at' => '2024-12-07 13:19:10', 'deleted_at' => NULL),
            array('id' => '66', 'product_id' => '17', 'path' => 'galleries/1733552350_6753e8ded7d2f.jpg', 'created_at' => '2024-12-07 13:19:10', 'updated_at' => '2024-12-07 13:19:10', 'deleted_at' => NULL),
            array('id' => '67', 'product_id' => '17', 'path' => 'galleries/1733552350_6753e8ded8442.jpg', 'created_at' => '2024-12-07 13:19:10', 'updated_at' => '2024-12-07 13:19:10', 'deleted_at' => NULL),
            array('id' => '68', 'product_id' => '17', 'path' => 'galleries/1733552350_6753e8ded90c8.jpg', 'created_at' => '2024-12-07 13:19:10', 'updated_at' => '2024-12-07 13:19:10', 'deleted_at' => NULL),
            array('id' => '69', 'product_id' => '13', 'path' => 'galleries/1734589497_6763bc39c59c4.jpg', 'created_at' => '2024-12-19 13:24:57', 'updated_at' => '2024-12-19 13:27:04', 'deleted_at' => '2024-12-19 13:27:04'),
            array('id' => '70', 'product_id' => '13', 'path' => 'galleries/1734589497_6763bc39c606a.jpg', 'created_at' => '2024-12-19 13:24:57', 'updated_at' => '2024-12-19 13:27:04', 'deleted_at' => '2024-12-19 13:27:04'),
            array('id' => '71', 'product_id' => '13', 'path' => 'galleries/1734589624_6763bcb8ee95d.jpg', 'created_at' => '2024-12-19 13:27:04', 'updated_at' => '2024-12-19 13:27:04', 'deleted_at' => NULL),
            array('id' => '72', 'product_id' => '13', 'path' => 'galleries/1734589624_6763bcb8f0789.jpg', 'created_at' => '2024-12-19 13:27:04', 'updated_at' => '2024-12-19 13:27:04', 'deleted_at' => NULL),
            array('id' => '73', 'product_id' => '13', 'path' => 'galleries/1734589624_6763bcb8f0f48.jpg', 'created_at' => '2024-12-19 13:27:04', 'updated_at' => '2024-12-19 13:27:04', 'deleted_at' => NULL),
            array('id' => '74', 'product_id' => '13', 'path' => 'galleries/1734589624_6763bcb8f2004.jpg', 'created_at' => '2024-12-19 13:27:04', 'updated_at' => '2024-12-19 13:27:04', 'deleted_at' => NULL),
            array('id' => '75', 'product_id' => '18', 'path' => 'galleries/1734592816_6763c93050e56.png', 'created_at' => '2024-12-19 14:20:16', 'updated_at' => '2024-12-19 14:20:16', 'deleted_at' => NULL),
            array('id' => '76', 'product_id' => '18', 'path' => 'galleries/1734592816_6763c93052367.png', 'created_at' => '2024-12-19 14:20:16', 'updated_at' => '2024-12-19 14:20:16', 'deleted_at' => NULL),
            array('id' => '77', 'product_id' => '18', 'path' => 'galleries/1734592816_6763c930533f2.png', 'created_at' => '2024-12-19 14:20:16', 'updated_at' => '2024-12-19 14:20:16', 'deleted_at' => NULL),
            array('id' => '78', 'product_id' => '19', 'path' => 'galleries/1734594165_6763ce757de52.png', 'created_at' => '2024-12-19 14:42:45', 'updated_at' => '2024-12-19 14:42:45', 'deleted_at' => NULL),
            array('id' => '79', 'product_id' => '19', 'path' => 'galleries/1734594165_6763ce757f276.png', 'created_at' => '2024-12-19 14:42:45', 'updated_at' => '2024-12-19 14:42:45', 'deleted_at' => NULL),
            array('id' => '80', 'product_id' => '19', 'path' => 'galleries/1734594165_6763ce7580361.png', 'created_at' => '2024-12-19 14:42:45', 'updated_at' => '2024-12-19 14:42:45', 'deleted_at' => NULL),
            array('id' => '81', 'product_id' => '21', 'path' => 'galleries/1734595349_6763d31524cde.png', 'created_at' => '2024-12-19 15:02:29', 'updated_at' => '2024-12-19 15:02:29', 'deleted_at' => NULL),
            array('id' => '82', 'product_id' => '22', 'path' => 'galleries/1734595800_6763d4d8c3b9d.jpg', 'created_at' => '2024-12-19 15:10:00', 'updated_at' => '2024-12-19 15:10:00', 'deleted_at' => NULL),
            array('id' => '83', 'product_id' => '23', 'path' => 'galleries/1734596111_6763d60ff1c36.jpg', 'created_at' => '2024-12-19 15:15:11', 'updated_at' => '2024-12-19 15:15:11', 'deleted_at' => NULL),
            array('id' => '84', 'product_id' => '24', 'path' => 'galleries/1734596460_6763d76c7fa62.png', 'created_at' => '2024-12-19 15:21:00', 'updated_at' => '2024-12-19 15:21:00', 'deleted_at' => NULL),
            array('id' => '85', 'product_id' => '25', 'path' => 'galleries/1734596748_6763d88c811ac.png', 'created_at' => '2024-12-19 15:25:48', 'updated_at' => '2024-12-19 15:25:48', 'deleted_at' => NULL),
            array('id' => '86', 'product_id' => '25', 'path' => 'galleries/1734596748_6763d88c81a22.png', 'created_at' => '2024-12-19 15:25:48', 'updated_at' => '2024-12-19 15:25:48', 'deleted_at' => NULL),
            array('id' => '87', 'product_id' => '25', 'path' => 'galleries/1734596748_6763d88c82195.png', 'created_at' => '2024-12-19 15:25:48', 'updated_at' => '2024-12-19 15:25:48', 'deleted_at' => NULL),
            array('id' => '90', 'product_id' => '27', 'path' => 'galleries/1734603953_6763f4b12e7e9.jpg', 'created_at' => '2024-12-19 17:25:53', 'updated_at' => '2024-12-19 17:25:53', 'deleted_at' => NULL),
            array('id' => '91', 'product_id' => '27', 'path' => 'galleries/1734603953_6763f4b12f9b1.jpeg', 'created_at' => '2024-12-19 17:25:53', 'updated_at' => '2024-12-19 17:25:53', 'deleted_at' => NULL),
            array('id' => '92', 'product_id' => '28', 'path' => 'galleries/1734630073_67645ab992f4d.jpg', 'created_at' => '2024-12-20 00:41:13', 'updated_at' => '2024-12-20 00:41:13', 'deleted_at' => NULL),
            array('id' => '93', 'product_id' => '28', 'path' => 'galleries/1734630073_67645ab994763.jpg', 'created_at' => '2024-12-20 00:41:13', 'updated_at' => '2024-12-20 00:41:13', 'deleted_at' => NULL),
            array('id' => '94', 'product_id' => '28', 'path' => 'galleries/1734630073_67645ab9962ec.jpg', 'created_at' => '2024-12-20 00:41:13', 'updated_at' => '2024-12-20 00:41:13', 'deleted_at' => NULL),
            array('id' => '95', 'product_id' => '28', 'path' => 'galleries/1734630073_67645ab9979fa.jpg', 'created_at' => '2024-12-20 00:41:13', 'updated_at' => '2024-12-20 00:41:13', 'deleted_at' => NULL),
            array('id' => '96', 'product_id' => '29', 'path' => 'galleries/1734630563_67645ca37b2ad.jpeg', 'created_at' => '2024-12-20 00:49:23', 'updated_at' => '2024-12-20 00:49:23', 'deleted_at' => NULL),
            array('id' => '97', 'product_id' => '29', 'path' => 'galleries/1734630563_67645ca37d364.jpg', 'created_at' => '2024-12-20 00:49:23', 'updated_at' => '2024-12-20 00:49:23', 'deleted_at' => NULL),
            array('id' => '98', 'product_id' => '29', 'path' => 'galleries/1734630563_67645ca37ecf7.jpg', 'created_at' => '2024-12-20 00:49:23', 'updated_at' => '2024-12-20 00:49:23', 'deleted_at' => NULL),
            array('id' => '99', 'product_id' => '30', 'path' => 'galleries/1734630826_67645daaeb45b.jpg', 'created_at' => '2024-12-20 00:53:46', 'updated_at' => '2024-12-20 00:53:46', 'deleted_at' => NULL),
            array('id' => '100', 'product_id' => '30', 'path' => 'galleries/1734630826_67645daaedbeb.jpg', 'created_at' => '2024-12-20 00:53:46', 'updated_at' => '2024-12-20 00:53:46', 'deleted_at' => NULL),
            array('id' => '101', 'product_id' => '30', 'path' => 'galleries/1734630826_67645daaef4ba.jpg', 'created_at' => '2024-12-20 00:53:46', 'updated_at' => '2024-12-20 00:53:46', 'deleted_at' => NULL),
            array('id' => '102', 'product_id' => '30', 'path' => 'galleries/1734630826_67645daaf1910.jpg', 'created_at' => '2024-12-20 00:53:46', 'updated_at' => '2024-12-20 00:53:46', 'deleted_at' => NULL),
            array('id' => '103', 'product_id' => '30', 'path' => 'galleries/1734630827_67645dab0086b.jpg', 'created_at' => '2024-12-20 00:53:47', 'updated_at' => '2024-12-20 00:53:47', 'deleted_at' => NULL),
            array('id' => '104', 'product_id' => '30', 'path' => 'galleries/1734630827_67645dab02a3a.jpg', 'created_at' => '2024-12-20 00:53:47', 'updated_at' => '2024-12-20 00:53:47', 'deleted_at' => NULL),
            array('id' => '105', 'product_id' => '30', 'path' => 'galleries/1734630827_67645dab04b20.jpg', 'created_at' => '2024-12-20 00:53:47', 'updated_at' => '2024-12-20 00:53:47', 'deleted_at' => NULL)
        );

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
