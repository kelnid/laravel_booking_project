<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CountryController extends Controller implements ShouldQueue
{
    public function index()
    {
        $countries = Country::all();

        return view('admin.countries.index', ['countries' => $countries]);
    }

    public function indexCountries()
    {
        $countries = Country::all();

        return view('user.countries.index', ['countries' => $countries]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $countries = Country::where('name', 'LIKE', "%{$search}%")->orderBy('name')->get();

        return view('user.countries.index', compact('countries'));
    }

    public function create()
    {
        $countries = Country::all();

        return view('admin.countries.create', ['countries' => $countries]);
    }

    public function store(CountryRequest $request)
    {
        $data = $request->except('_token');

        $data['image'] = $request->file('image')->store('images');

        Country::create($data);

        return redirect()->route('admin.countries.index');
    }

    public function edit($id)
    {
        $country = Country::find($id);

        return view('admin.countries.edit', ['country' => $country]);
    }

    public function update(CountryRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }
        $country = Country::find($id);
        $country->update($data);

        return redirect()->route('admin.countries.index', ['country' => $id]);
    }

    public function destroy($id)
    {
        $country = Country::find($id);

        $country->delete();

        return redirect()->route('admin.countries.index');
    }
}
