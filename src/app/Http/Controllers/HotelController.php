<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index($countryId = null)
    {
        if ($countryId) {
            $hotels = Hotel::where('country_id', $countryId)->get();
        } else {
            $hotels = Hotel::all();
        }
        return view('admin.hotels.index', ['hotels' => $hotels]);
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

    public function store(Request $request)
    {
        Hotel::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'country_id' => $request->country,
        ]);

        return redirect()->route('admin.countries.index');
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);

        return view('admin.hotels.show', ['hotel' => $hotel]);
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
