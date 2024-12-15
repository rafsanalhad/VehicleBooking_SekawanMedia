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
            ['type' => 'passenger', 'plate_number' => 'DEF456', 'model' => 'Honda CR-V', 'year' => 2021, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 10.0],
            ['type' => 'cargo', 'plate_number' => 'LMN234', 'model' => 'Isuzu ELF', 'year' => 2019, 'ownership_type' => 'company', 'status' => 'in_use', 'fuel_consumption' => 15.5],
            ['type' => 'passenger', 'plate_number' => 'GHI567', 'model' => 'Nissan X-Trail', 'year' => 2020, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 11.2],
            ['type' => 'cargo', 'plate_number' => 'JKL890', 'model' => 'Mitsubishi Fuso', 'year' => 2017, 'ownership_type' => 'rental', 'status' => 'in_use', 'fuel_consumption' => 18.0],
            ['type' => 'passenger', 'plate_number' => 'MNO678', 'model' => 'Toyota Fortuner', 'year' => 2022, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 13.0],
            ['type' => 'cargo', 'plate_number' => 'PQR123', 'model' => 'Mercedes-Benz Actros', 'year' => 2020, 'ownership_type' => 'company', 'status' => 'in_use', 'fuel_consumption' => 22.5],
            ['type' => 'passenger', 'plate_number' => 'STU456', 'model' => 'Mazda CX-5', 'year' => 2021, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 9.5],
            ['type' => 'cargo', 'plate_number' => 'VWX789', 'model' => 'Volvo FH16', 'year' => 2019, 'ownership_type' => 'rental', 'status' => 'in_use', 'fuel_consumption' => 25.0],
            ['type' => 'passenger', 'plate_number' => 'YZA012', 'model' => 'Ford Escape', 'year' => 2020, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 12.0],
            ['type' => 'cargo', 'plate_number' => 'BCD345', 'model' => 'Hino Ranger', 'year' => 2018, 'ownership_type' => 'company', 'status' => 'in_use', 'fuel_consumption' => 17.5],
            ['type' => 'passenger', 'plate_number' => 'EFG678', 'model' => 'Kia Sportage', 'year' => 2021, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 10.5],
            ['type' => 'cargo', 'plate_number' => 'HIJ901', 'model' => 'Freightliner Cascadia', 'year' => 2020, 'ownership_type' => 'rental', 'status' => 'in_use', 'fuel_consumption' => 24.0],
            ['type' => 'passenger', 'plate_number' => 'KLM234', 'model' => 'Subaru Outback', 'year' => 2022, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 11.8],
            ['type' => 'cargo', 'plate_number' => 'NOP567', 'model' => 'Kenworth T680', 'year' => 2017, 'ownership_type' => 'company', 'status' => 'in_use', 'fuel_consumption' => 26.0],
            ['type' => 'passenger', 'plate_number' => 'QRS890', 'model' => 'Chevrolet Traverse', 'year' => 2021, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 13.5],
            ['type' => 'cargo', 'plate_number' => 'TUV123', 'model' => 'Peterbilt 579', 'year' => 2018, 'ownership_type' => 'rental', 'status' => 'in_use', 'fuel_consumption' => 23.0],
            ['type' => 'passenger', 'plate_number' => 'WXY456', 'model' => 'BMW X5', 'year' => 2020, 'ownership_type' => 'company', 'status' => 'available', 'fuel_consumption' => 12.8],
        ]);
    }
}
