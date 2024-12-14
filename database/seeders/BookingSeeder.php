<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bookings')->insert([
            ['user_id' => 1, 'vehicle_id' => 1, 'driver_id' => 1, 'start_datetime' => now(), 'end_datetime' => now()->addHours(2), 'purpose' => 'Business', 'status' => 'approved'],
            ['user_id' => 2, 'vehicle_id' => 2, 'driver_id' => 2, 'start_datetime' => now(), 'end_datetime' => now()->addHours(3), 'purpose' => 'Cargo transport', 'status' => 'pending'],
        ]);
    }
}
