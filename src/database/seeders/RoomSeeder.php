<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('rooms')->insert([
//            ['name' => 'Одноместный', 'bed' => 'Одноместная', 'area' => '12'],
//            ['name' => 'Люкс', 'bed' => 'Одноместная', 'area' => '13'],
//            ['name' => 'Гипер-люкс', 'bed' => 'Одноместная', 'area' => '14'],
//            ['name' => 'Супер-люкс', 'bed' => 'Одноместная', 'area' => '15'],
//        ]);
        $hotelIds = DB::table('hotels')->pluck('id')->toArray();

        for ($i = 0; $i <= 10; $i++) {
            DB::table('rooms')->insert([
                'name' => Str::random(10),
                'bed' => Str::random(10),
                'area' => '12',
                'hotel_id' => $hotelIds[array_rand($hotelIds)],
                'created_at' => Carbon::parse(),
            ]);
        }
    }
}
