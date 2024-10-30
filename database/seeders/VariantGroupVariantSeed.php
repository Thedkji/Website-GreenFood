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
        for ($i = 1; $i <= 10; $i++) {
            $variantGroup = VariantGroup::find($i);

            if ($variantGroup) {
                $variantId = mt_rand(1, 5);

                // Kiểm tra nếu variant có parent_id khác null
                $variant = Variant::find($variantId);

                if ($variant && !is_null($variant->parent_id)) {
                    $variantGroup->variants()->attach($variantId);
                }
            }
        }
    }
}
