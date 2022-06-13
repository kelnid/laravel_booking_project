<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['name' => 'Украина', 'image' => 'images/viNSOHRFTCV7ZQwyAGQWsqzoZA9wrBOgk9T0YZ2S.jpg'],
            ['name' => 'Италия', 'image' => 'images/GaWqjLFTdzzgvxh5FPSgSnZCitD12J8QGOErFITN.jpg'],
            ['name' => 'Британия', 'image' => 'images/psYZFg0msC0i5Rz2S1goKJk7qgRiWFrDhCykAH9O.jpg'],
            ['name' => 'Турция', 'image' => 'images/OW3PshCL2Sx1YuEAknCZBgQM4Uw30q8mP8DvpUQL.jpg'],
            ['name' => 'Нидерланды', 'image' => 'images/6NDDtIX6LYku50c7UYqSaLaHw5HBHWmB9SrUwSEC.jpg'],
            ['name' => 'Германия', 'image' => 'images/XnfhxhcLXQI4VNaleqt5MvEwGYdT9DDZHVE7V20J.jpg'],
        ]);
    }
}
