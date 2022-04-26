<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'New York',
            'state' => 'New York',
            'country' => 'United States of America',
            'country_code' => 'US'
        ]);

        DB::table('cities')->insert([
            'name' => 'Los Angeles',
            'state' => 'California',
            'country' => 'United States of America',
            'country_code' => 'US'
        ]);

        DB::table('cities')->insert([
            'name' => 'Toronto',
            'state' => 'Ontario',
            'country' => 'Canada',
            'country_code' => 'CA',
        ]);
    }
}
