<?php

namespace Database\Seeders;

use App\Models\Variant;
use App\Models\VariantGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantGroupVariantSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variant_group_variant = array(
            array('variant_group_id' => '23','variant_id' => '2'),
            array('variant_group_id' => '26','variant_id' => '2'),
            array('variant_group_id' => '15','variant_id' => '3'),
            array('variant_group_id' => '24','variant_id' => '3'),
            array('variant_group_id' => '3','variant_id' => '4'),
            array('variant_group_id' => '10','variant_id' => '4'),
            array('variant_group_id' => '16','variant_id' => '4'),
            array('variant_group_id' => '17','variant_id' => '4'),
            array('variant_group_id' => '21','variant_id' => '4'),
            array('variant_group_id' => '27','variant_id' => '4'),
            array('variant_group_id' => '11','variant_id' => '9'),
            array('variant_group_id' => '18','variant_id' => '9'),
            array('variant_group_id' => '22','variant_id' => '9'),
            array('variant_group_id' => '4','variant_id' => '10'),
            array('variant_group_id' => '12','variant_id' => '17'),
            array('variant_group_id' => '13','variant_id' => '18'),
            array('variant_group_id' => '14','variant_id' => '19'),
            array('variant_group_id' => '19','variant_id' => '20'),
            array('variant_group_id' => '20','variant_id' => '21'),
            array('variant_group_id' => '25','variant_id' => '22')
          );
        foreach ($variant_group_variant as $item) {
            // Tìm VariantGroup với variant_group_id
            $variantGroup = VariantGroup::find($item['variant_group_id']);

            if ($variantGroup) {
                // Nếu VariantGroup tồn tại, tiếp tục gắn kết (attach)
                $variantGroup->variants()->attach($item['variant_id']);
            }
        }
    }
}
