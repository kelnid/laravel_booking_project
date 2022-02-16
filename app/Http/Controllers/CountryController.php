<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('countries.index', ['countries' => $countries]);
    }

    public function create()
    {
        $countries = Country::all();

        return view('countries.create', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        Country::create($data);

        return redirect()->route('countries.index');
    }

    public function show($id)
    {

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
