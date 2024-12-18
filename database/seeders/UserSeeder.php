<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Guid\Guid;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert sample users into the 'users' table
        DB::table('users')->insert([
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'department_id' => 1,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Rizki Syaputra',
                'email' => 'rizki@gmail.com',
                'password' => Hash::make('rizki'),
                'role' => 'approver',
                'department_id' => 1,
                'status' => 'active',
            ],

            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Dani Putra',
                'email' => 'dani@gmail.com',
                'password' => Hash::make('dani'),
                'role' => 'approver',
                'department_id' => 2,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Supardi',
                'email' => 'supardi@gmail.com',
                'password' => Hash::make('supardi'),
                'role' => 'user',
                'department_id' => 3,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Suyatno',
                'email' => 'suyatno@gmail.com',
                'password' => Hash::make('suyatno'),
                'role' => 'user',
                'department_id' => 1,
                'status' => 'active',
            ],
            
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Sudarmo',
                'email' => 'sudarmo@gmail.com',
                'password' => Hash::make('sudarmo'),
                'role' => 'user',
                'department_id' => 1,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Sudarmin',
                'email' => 'sudarmin@gmail.com',
                'password' => Hash::make('sudarmin'),
                'role' => 'user',
                'department_id' => 2,
                'status' => 'active',
            ],

        ]);
    }
}
