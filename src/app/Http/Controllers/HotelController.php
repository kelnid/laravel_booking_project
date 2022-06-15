<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index($countryId = null, $hotelId = null)
    {
        if ($countryId) {
            $hotels = Hotel::where('country_id', $countryId)->get();
        } else {
            $hotels = Hotel::all();
        }

        if ($hotelId) {
            $rooms = Room::where('hotel_id', $hotelId)->get();
        } else {
            $rooms = Room::all();
        }

        return view('admin.hotels.index', ['hotels' => $hotels, 'rooms' => $rooms]);
    }

    public function indexHotel($countryId = null)
    {
        if ($countryId) {
            $hotels = Hotel::where('country_id', $countryId)->get();
        } else {
            $hotels = Hotel::all();
        }
        return view('user.hotels.index', ['hotels' => $hotels]);
    }

    public function create()
    {
        $countries = Country::all();

        return view('admin.hotels.create', ['countries' => $countries]);
    }

    public function store(HotelRequest $request)
    {
        $data = $request->except('_token');

        $data['image'] = $request->file('image')->store('images');

        Hotel::create($data);

        return redirect()->route('admin.countries.index');
    }

    public function show($id, $hotelId = null)
    {
        $hotel = Hotel::find($id);

        if ($hotelId) {
            $rooms = Room::where('hotel_id', $hotelId)->get();
        } else {
            $rooms = Room::all();
        }
        return view('admin.hotels.show', ['hotel' => $hotel], ['rooms' => $rooms]);
    }

    public function showHotel($id)
    {
        $hotel = Hotel::find($id);

        return view('user.hotels.show', ['hotel' => $hotel]);
    }

    public function edit($id)
    {
        $hotel = Hotel::find($id);
        $countries = Country::all();

        return view('admin.hotels.edit', ['hotel' => $hotel, 'countries' => $countries]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }
        $hotel = Hotel::find($id);
        $hotel->update($data);

        return redirect()->route('admin.hotels.show', ['hotel' => $id]);
    }

    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect()->route('admin.countries.index');
    }
}
