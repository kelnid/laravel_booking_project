<?php

namespace App\Services;

use App\Http\Requests\CountryRequest;
use App\Repository\CountryRepository;

class CountryService
{
    private $repository;

    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(CountryRequest $request)
    {
        $this->saveCountryImage($request->file('image'));
        $this->repository->store($request);
    }

    public function saveCountryImage($file)
    {
        return $file->store('images');
    }
}
