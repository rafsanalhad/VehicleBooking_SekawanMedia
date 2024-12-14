<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles')->insert([
            ['type' => 'passenger', 'plate_number' => 'ABC123', 'model' => 'Toyota Avanza', 'year' => 2020, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 12.5],
            ['type' => 'cargo', 'plate_number' => 'XYZ789', 'model' => 'Hino 500', 'year' => 2018, 'ownership_type' => 'rental', 'status' => 'in_use', 'fuel_consumption' => 20.0],
        ]);
    }
}
