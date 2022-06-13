<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
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

    public function create()
    {
        $hotels = Hotel::all();

        return view('admin.rooms.create', ['hotels' => $hotels]);
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
        $bookings = Booking::all();
        $users = User::all();

        return view('admin.rooms.show', ['room' => $room, 'bookings' => $bookings, 'users' => $users]);
    }

    public function showRoom($id)
    {
        $room = Room::find($id);

        return view('user.rooms.show', ['room' => $room]);
    }

    public function edit($id)
    {
        $room = Room::find($id);

        return view('admin.rooms.edit', ['room' => $room]);
    }

    public function update(Request $request, $id)
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

        return redirect()->route('admin.countries.index');
    }
}
