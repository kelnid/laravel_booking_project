<?php

namespace App\Repository;

use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryRepository
{
    private function query()
    {
        return Country::query();
    }

    public function store(CountryRequest $request)
    {
        $data = $request->except('_token');

        $data['image'] = $request->file('image')->store('images');

        $country = $this->query()->create($data);

        return $country;
    }

}
