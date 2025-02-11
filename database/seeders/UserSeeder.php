<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Diones Admin',
                'username' => 'dionesadmin',
                'email' => 'dionesadmin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('diones123**')
            ],
            [
                'name' => 'Elaine Vendor',
                'username' => 'elainevendor',
                'email' => 'elaine@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('elaine123**')
            ],
            [
                'name' => 'Nicole User',
                'username' => 'nicoleuser',
                'email' => 'nicole@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('nicole123**')
            ]
        ]);
    }
}
