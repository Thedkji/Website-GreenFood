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
        $faker = Factory::create();
        $suppliers = [];

        for ($i = 1; $i <= 10; $i++) {
            $suppliers[] = [
                'id' => $i,
                'name' => $faker->company,
                'email' => $faker->companyEmail,
                'phone' => '0123456789',
                'address' => $faker->address,
                'created_at' => $faker->dateTimeBetween('-2 months', '-1 week')->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeBetween('-1 week', 'now')->format('Y-m-d H:i:s'),
            ];
        }

        // In ra dữ liệu (hoặc sử dụng trong template)
        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
