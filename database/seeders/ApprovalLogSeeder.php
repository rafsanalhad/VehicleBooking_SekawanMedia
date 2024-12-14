<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprovalLogSeeder extends Seeder
{
    public function run()
    {
        DB::table('approval_logs')->insert([
            ['booking_id' => 1, 'approver_id' => 1, 'approval_level' => 1, 'status' => 'approved', 'comments' => 'Approved by manager'],
            ['booking_id' => 2, 'approver_id' => 2, 'approval_level' => 2, 'status' => 'pending', 'comments' => 'Waiting for final approval'],
        ]);
    }
}
