<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\Rating;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function create($id = null)
    {
        $country = Country::find($id);

        return view('admin.hotels.create', ['country' => $country]);
    }

    public function store(HotelRequest $request)
    {
        $data = $request->except('_token');

        $data['image'] = $request->file('image')->store('images');

        Hotel::create($data);

        return redirect()->route('admin.countries.index');
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);

        $markers = $hotel->location;

        return view('admin.hotels.show', ['hotel' => $hotel], ['markers' => $markers]);
    }

    public function showHotel($id, $hotelId = null)
    {
        if ($hotelId) {
            $votes = Rating::where('hotel_id', $hotelId)->get();
        } else {
            $votes = Rating::all();
        }
        $hotel = Hotel::find($id);

        $markers = $hotel->location;

        return view('user.hotels.show', ['hotel' => $hotel,'markers' => $markers, 'users' => $votes]);
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
