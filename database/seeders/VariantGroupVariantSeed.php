<?php

namespace Database\Seeders;

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
            $variantGroups = VariantGroup::find($i);

            $variantGroups->variants()->attach(mt_rand(1, 5));
        }
    }
}
