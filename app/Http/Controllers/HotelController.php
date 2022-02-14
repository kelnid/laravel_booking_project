<?php

namespace App\Http\Controllers;

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
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
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
