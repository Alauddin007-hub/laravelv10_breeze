<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepertmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'name' => "HR Department",
        ]);
        DB::table('departments')->insert([
            'name' => "IT Department",
        ]);
        DB::table('departments')->insert([
            'name' => "Management Department",
        ]);
    }
}
