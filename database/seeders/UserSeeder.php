<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "John Doe",
            'role_types_id' => '1',
            'email' => "admin@admin.com",
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Md Alauddin",
            'role_types_id' => '2',
            'email' => "alauddin@admin.com",
            'password' => Hash::make('password'),
        ]);
    }
}
