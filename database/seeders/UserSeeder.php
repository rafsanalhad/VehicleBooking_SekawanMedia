<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert sample users into the 'users' table
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('adminpassword'),
                'role' => 'admin',
                'department_id' => 1,
            ],
            [
                'name' => 'Approver User',
                'email' => 'approver@example.com',
                'password' => Hash::make('approverpassword'),
                'role' => 'approver',
                'department_id' => 2,
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('userpassword'),
                'role' => 'user',
                'department_id' => 3,
            ],
        ]);
    }
}
