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
            'day' => '14',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Sick Leave",
            'day' => '21',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Metanity Leave",
            'day' => '90',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Petarnity Leave",
            'day' => '14',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Earned Leave",
            'day' => '10',
        ]);
        DB::table('leave_types')->insert([
            'type' => "Other Leave",
            'day' => '14',
        ]);
    }
}
