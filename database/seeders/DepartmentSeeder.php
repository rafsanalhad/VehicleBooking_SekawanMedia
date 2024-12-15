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
            ['name' => 'Operations', 'location' => 'Building D'],
            ['name' => 'Production', 'location' => 'Building E'],
            ['name' => 'Quality Control', 'location' => 'Building F'],
            ['name' => 'Supply Chain', 'location' => 'Building G'],
            ['name' => 'Marketing', 'location' => 'Building H'],
            ['name' => 'Sales', 'location' => 'Building I'],
            ['name' => 'Maintenance', 'location' => 'Building J'],
            ['name' => 'Legal', 'location' => 'Building K'],
            ['name' => 'R&D', 'location' => 'Building L'],
            ['name' => 'Health and Safety', 'location' => 'Building M'],
            ['name' => 'Environmental', 'location' => 'Building N'],
            ['name' => 'Logistics', 'location' => 'Building O'],
            ['name' => 'Admin', 'location' => 'Building P'],
            ['name' => 'Customer Service', 'location' => 'Building Q'],
            ['name' => 'Procurement', 'location' => 'Building R'],
            ['name' => 'Corporate Affairs', 'location' => 'Building S'],
        ]);
    }
}
