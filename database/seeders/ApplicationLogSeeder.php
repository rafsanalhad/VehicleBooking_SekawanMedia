<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationLogSeeder extends Seeder
{
    public function run()
    {
        DB::table('application_logs')->insert([
            ['user_id' => 1, 'action' => 'login', 'description' => 'User logged in', 'ip_address' => '192.168.1.1'],
            ['user_id' => 2, 'action' => 'booking_created', 'description' => 'Booking for vehicle created', 'ip_address' => '192.168.1.2'],
        ]);
    }
}
