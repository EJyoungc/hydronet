<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HydrophonicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        // Define hydroponic types data
        $hydroponicTypes = [
            ['name' => 'Deep Water Culture (DWC)'],
            ['name' => 'Nutrient Film Technique (NFT)'],
            ['name' => 'Ebb and Flow (Flood and Drain)'],
            ['name' => 'Wicking System'],
            ['name' => 'Aeroponics'],
            ['name' => 'Vertical Hydroponics'],
            ['name' => 'Drip System'],
            // Add more types as needed
        ];

        // Insert data into the hydroponic_types table
        foreach ($hydroponicTypes as $type) {
            Type::create($type);
        }
    }
}
