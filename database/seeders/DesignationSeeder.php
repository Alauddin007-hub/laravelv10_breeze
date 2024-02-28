<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designations')->insert([
            'name' => "HR Amin",
            'department_id' => "1",
        ]);
        DB::table('designations')->insert([
            'name' => "Senior Developer",
            'department_id' => "2",
        ]);
        DB::table('designations')->insert([
            'name' => "Managing Director",
            'department_id' => "3",
        ]);
    }
}
