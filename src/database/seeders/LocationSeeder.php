<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            ['city' => 'Кременчуг', 'lat' => '49.002783554757606', 'lng' => '33.560317300514114', 'hotel_id'=>'1'],
            ['city' => 'Кременчуг', 'lat' => '48.99906220875773', 'lng' => '33.550889902847885', 'hotel_id'=>'2'],
        ]);
    }
}
