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
        DB::table('rooms')->insert([
            ['name' => 'Стандартный двухместный номер', 'bed' => '1 большая двуспальная кровать', 'area' => '26', 'price' => '2000','hotel_id' => 1],
            ['name' => 'Улучшенный двухместный номер с 2 отдельными кроватями', 'bed' => '2 односпальные кровати', 'area' => '42', 'price' => '2000','hotel_id' => 1],
            ['name' => 'Суперлюкс', 'bed' => '1 диван-кровать и 1 большая двуспальная кровать', 'area' => '65', 'price' => '2000','hotel_id' => 1],
            ['name' => 'Представительский люкс', 'bed' => 'Спальня 1: 1 диван-кровать  и 1 большая двуспальная кровать  Гостиная: 1 диван-кровать', 'area' => '80', 'price' => '2000','hotel_id' => 1],
        ]);
    }
}
