<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\RoomUser;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function indexRooms($hotelId = null)
    {
        if ($hotelId) {
            $rooms = Room::where('hotel_id', $hotelId)->get();
        } else {
            $rooms = Room::all();
        }

        return view('user.rooms.index', ['rooms' => $rooms]);
    }

    public function create($id = null)
    {
        $hotel = Hotel::find($id);

        return view('admin.rooms.create', ['hotel' => $hotel]);
    }

    public function store(RoomRequest $request)
    {
        Room::create([
            'name' => $request->name,
            'bed' => $request->bed,
            'area' => $request->area,
            'price' => $request->price,
            'hotel_id' => $request->hotel,
        ]);

        return redirect()->route('admin.hotels.index');
    }

    public function show($id)
    {
        $room = Room::find($id);

        return view('admin.rooms.show', ['room' => $room]);
    }

    public function showRoom($id)
    {
        $room = Room::find($id);

        $dates = RoomUser::whereRoomId($room->id)->get(['settlement_date', 'release_date']);
//        dd($dates);
        $datesRange = [];

        foreach ($dates as $date) {
            $period = CarbonPeriod::create($date->settlement_date, $date->release_date);

            foreach ($period as $per) {
                $datesRange[] = $per->format('j-n-Y');
            }
        }
//        dd($datesRange);
        return view('user.rooms.show', ['room' => $room, 'range' => $datesRange]);
    }

    public function edit($id)
    {
        $room = Room::find($id);

        return view('admin.rooms.edit', ['room' => $room]);
    }

    public function update(RoomRequest $request, $id)
    {
        $data = $request->except('_token', '_method');

        $room = Room::find($id);

        $room->update($data);

        return redirect()->route('admin.rooms.show', ['room' => $id]);
    }

    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete();

        return redirect()->route('admin.hotels.index');
    }
}
