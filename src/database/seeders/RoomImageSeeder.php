<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_images')->insert([
            ['room_id' => '1', 'image' => 'images/M4wkm1rIPLSIfWcHSzbAb66wZitF73mcRkMyh0wE.jpg'],
            ['room_id' => '1', 'image' => 'images/zpddLcbX3U6M4QSaVhjjPVdwScvv9dQIjbt7UEF1.jpg'],
            ['room_id' => '1', 'image' => 'images/CQqHwpb9TJXZQvKi2UL2VGS2nDcMac3HJIs0Ovaf.jpg'],
            ['room_id' => '1', 'image' => 'images/rdz5rCAirBfD0KARkWf9PsSRMmuVJrzGsWvcPf9d.jpg'],
            ['room_id' => '1', 'image' => 'images/hYls0s4sOO74Rb30P7W1lHcvuy31PwRYGbe0gRBK.jpg'],
            ['room_id' => '2', 'image' => 'images/M4wkm1rIPLSIfWcHSzbAb66wZitF73mcRkMyh0wE.jpg'],
            ['room_id' => '2', 'image' => 'images/zpddLcbX3U6M4QSaVhjjPVdwScvv9dQIjbt7UEF1.jpg'],
            ['room_id' => '2', 'image' => 'images/CQqHwpb9TJXZQvKi2UL2VGS2nDcMac3HJIs0Ovaf.jpg'],
            ['room_id' => '2', 'image' => 'images/rdz5rCAirBfD0KARkWf9PsSRMmuVJrzGsWvcPf9d.jpg'],
            ['room_id' => '2', 'image' => 'images/hYls0s4sOO74Rb30P7W1lHcvuy31PwRYGbe0gRBK.jpg'],
        ]);
    }
}
