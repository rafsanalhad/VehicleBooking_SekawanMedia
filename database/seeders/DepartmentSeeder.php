<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'HR', 'location' => 'Building A'],
            ['name' => 'Finance', 'location' => 'Building B'],
            ['name' => 'IT', 'location' => 'Building C'],
        ]);
    }
}
