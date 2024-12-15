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
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'department_id' => 1,
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password123'),
                'role' => 'approver',
                'department_id' => 2,
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Michael Johnson',
                'email' => 'michaeljohnson@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 3,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Emily Davis',
                'email' => 'emilydavis@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 1,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'David Williams',
                'email' => 'davidwilliams@example.com',
                'password' => Hash::make('password123'),
                'role' => 'approver',
                'department_id' => 2,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Sophia Brown',
                'email' => 'sophiabrown@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'department_id' => 3,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Daniel Miller',
                'email' => 'danielmiller@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 1,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Olivia Wilson',
                'email' => 'oliviawilson@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 2,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'William Moore',
                'email' => 'williammoore@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'department_id' => 3,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Isabella Taylor',
                'email' => 'isabellataylor@example.com',
                'password' => Hash::make('password123'),
                'role' => 'approver',
                'department_id' => 1,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'James Anderson',
                'email' => 'jamesanderson@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 2,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Charlotte Thomas',
                'email' => 'charlottethomas@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'department_id' => 3,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Lucas Martinez',
                'email' => 'lucasmartinez@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 1,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Amelia Garcia',
                'email' => 'ameliagarcia@example.com',
                'password' => Hash::make('password123'),
                'role' => 'approver',
                'department_id' => 2,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Alexander Rodriguez',
                'email' => 'alexanderrodriguez@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 3,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Mia Lewis',
                'email' => 'mialewis@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'department_id' => 1,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Ethan Lee',
                'email' => 'ethanlee@example.com',
                'password' => Hash::make('password123'),
                'role' => 'approver',
                'department_id' => 2,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Ella Harris',
                'email' => 'ellaharris@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 3,
                'status' => 'active',
            ],
            [
                'id' => Guid::uuid4()->toString(),
                'name' => 'Aiden Clark',
                'email' => 'aidenclark@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'department_id' => 1,
                'status' => 'active',
            ],
        ]);
    }
}
