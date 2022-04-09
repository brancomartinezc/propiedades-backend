<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'type' => 'house',
            'address' => 'addr 123',
            'area' => '200',
            'price' => '500000',
            'sale_rent' => 'sale',
            'beds' => '3',
            'rooms' => '6',
            'baths' => '2',
            'description' => 'descr',
            'city_id' => '2',
            'agent_id' => '1',
        ]);

        DB::table('properties')->insert([
            'type' => 'apartment',
            'address' => 'addr 987',
            'area' => '300',
            'price' => '1000000',
            'sale_rent' => 'rent',
            'beds' => '4',
            'rooms' => '7',
            'baths' => '3',
            'description' => 'descr',
            'city_id' => '1',
            'agent_id' => '2',
        ]);
    }
}
