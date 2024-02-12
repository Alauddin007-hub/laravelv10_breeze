<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_types')->insert([
            'type' => "Admin",
        ]);
        DB::table('role_types')->insert([
            'type' => "Editor",
        ]);
    }
}
