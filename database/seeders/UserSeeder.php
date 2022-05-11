<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => 'abcd',
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'agent',
            'email' => 'agent@agent.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => 'abcd',
            'role' => 'agent',
        ]);

        DB::table('users')->insert([
            'name' => 'chief',
            'email' => 'chief@chief.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => 'abcd',
            'role' => 'chief-agent',
        ]);
    }
}
