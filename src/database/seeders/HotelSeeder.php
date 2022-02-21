<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countryIds = DB::table('countries')->pluck('id')->toArray();

        for ($i = 0; $i <= 4; $i++) {
            DB::table('hotels')->insert([
                'name' => Str::random(10),
                'address' => Str::random(10),
                'description' => Str::random(30),
                'country_id' => $countryIds[array_rand($countryIds)],
                'created_at' => Carbon::parse(),
            ]);
        }
    }
}
