<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index($hotelId = null)
    {
        if ($hotelId) {
            $rooms = Room::where('hotel_id', $hotelId)->get();
        } else {
            $rooms = Room::all();
        }

        return view('rooms.index', ['rooms' => $rooms]);
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show($id)
    {
        $room = Room::find($id);

        return view('rooms.show', ['room' => $room]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
