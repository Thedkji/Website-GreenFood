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
            ProductSeeder::class,
            VariantSeeder::class,
            VariantDetailSeed::class,
            GallerySeeder::class,
            SupplierSeeder::class,
            DepotSeeder::class,
            CouponSeeder::class,
            UserSeed::class,
            CartSeeder::class,
            CommentSeeder::class,
            RateSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,

            CategoryProductSeeder::class,
            CouponCategorySeeder::class,

            CouponUserSeeder::class,

            CouponProductSeeder::class,
            ProductVariantDetailSeeder::class,
        ]);
    }
}
