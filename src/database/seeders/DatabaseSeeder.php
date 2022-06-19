<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           CountrySeeder::class,
           HotelSeeder::class,
           RoomSeeder::class,
           RoleSeeder::class,
           UserSeeder::class,
           RoomImageSeeder::class,
           LocationSeeder::class
       ]);
    }
}
