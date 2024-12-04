<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
            VariantSeeder::class,
            VariantGroupSeed::class,
            GallerySeeder::class,
            CouponSeeder::class,
            UserSeeder::class,
            CartSeeder::class,
            // CommentSeeder::class,
            // RateSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,

            CategoryProductSeeder::class,
            CouponCategorySeeder::class,


            // CouponProductSeeder::class,
            VariantGroupVariantSeed::class,
        ]);
    }
}
