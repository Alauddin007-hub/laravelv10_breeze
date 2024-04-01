<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leave_types')->insert([
            'type' => "Casual Leave",
            'days' => '14',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Sick Leave",
            'days' => '21',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Metanity Leave",
            'days' => '90',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Petarnity Leave",
            'days' => '14',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Earned Leave",
            'days' => '10',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Other Leave",
            'days' => '14',
        ]);
    }
}
