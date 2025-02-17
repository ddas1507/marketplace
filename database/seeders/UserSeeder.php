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
                'email' => 'ddas1507@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('admin123')
            ],
            [
                'name' => 'Diones Vendor',
                'username' => 'dionesvendor',
                'email' => 'vendor@vendor.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('vendor123')
            ],
            [
                'name' => 'Diones User',
                'username' => 'dionesuser',
                'email' => 'user@user.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('user123')
            ]
        ]);
    }
}
