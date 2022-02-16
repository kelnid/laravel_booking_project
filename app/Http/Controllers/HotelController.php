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
        return view('hotels.index', ['hotels' => $hotels]);
    }

    public function create()
    {
        $countries = Country::all();

        return view('hotels.create', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        Hotel::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'country_id' => $request->country,
        ]);

        return redirect()->route('hotels.index');
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);

        return view('hotels.show', ['hotel' => $hotel]);
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
