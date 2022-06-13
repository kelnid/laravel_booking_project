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
//        $countryIds = DB::table('countries')->pluck('id')->toArray();
//
//        for ($i = 0; $i <= 4; $i++) {
//            DB::table('hotels')->insert([
//                'name' => Str::random(10),
//                'address' => Str::random(10),
//                'description' => Str::random(30),
//                'country_id' => $countryIds[array_rand($countryIds)],
//                'created_at' => Carbon::parse(),
//            ]);
//        }
        DB::table('hotels')->insert([
            ['name' => 'Спа-Готель Потоки Хауз',
                'address' => 'Вулиця рiчна 19А, Каменные Потоки, 39625, Украина',
                'description' =>
                    'Спа-отель «Потоки Хауз» с баром и рестораном расположен в поселке Каменные Потоки.
                К услугам гостей фитнес-центр, общий лаундж, круглосуточная стойка регистрации и бесплатный Wi-Fi.
                Осуществляется доставка еды и напитков в номер. Желающие могут забронировать семейные номера.
                В каждом номере установлен кондиционер, шкаф для одежды, сейф и телевизор с плоским экраном.
                В числе удобств собственная ванная комната с душем. Кроме того, номера укомплектованы мини-баром.
                По утрам в спа-отеле «Потоки Хауз» сервируют завтрак «шведский стол».
                На территории работает оздоровительный центр с гидромассажной ванной. Гости могут поиграть в бильярд.
                Кременчуг находится в 13 км от спа-отеля «Потоки Хауз, а Светловодск — в 24 км.
                Парам особенно нравится расположение — они оценили проживание в этом районе для поездки вдвоем на 8,8.',
                'country_id' => 1,
                'image' => 'images/MaTGIBayF96OkTRwdBM3UKD0QN6RLm0RyzPAtMzw.jpg',
                'created_at' => Carbon::parse(),]
        ]);
    }
}
