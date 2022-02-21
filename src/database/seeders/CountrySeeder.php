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
            ['name' => 'Украина'],
            ['name' => 'Италия'],
            ['name' => 'Германия'],
            ['name' => 'Дания'],
        ]);
    }
}
