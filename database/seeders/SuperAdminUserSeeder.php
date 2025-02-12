<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Mahmoud Alhabiby',
            'email' => 'mustafa3pdine@gmail.com',
            'password' => Hash::make('12345678'),
            'password' => 'super',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
