<?php

namespace Database\Seeders;

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
        
        $vietnam_phone_prefixes = [
            '032', '033', '034', '035', '036', '037', '038', '039', // Viettel
            '070', '079', '077', '076', '078',                     // Mobifone
            '083', '084', '085', '081', '082',                     // Vinaphone
            '056', '058',                                           // Vietnamobile
            '059'                                                  // Gmobile
        ];
        $random_numbers = '';

        for ($i=1; $i < 7; $i++) { 
            $random_numbers .= mt_rand(0, 9); 
        }

        for ($i = 1; $i <= 10; $i++) {
            Supplier::create([
                "id" => $i,
                "name" => "Nhà cung cấp $i",
                "email" => "email$i@gmail.com",
                "phone" => Arr::random($vietnam_phone_prefixes) . $random_numbers,
                "address" => fake()->address(),
            ]);
        }
    }
}
