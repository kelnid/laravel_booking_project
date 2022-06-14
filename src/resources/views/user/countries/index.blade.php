@extends('user.layouts.main')

@section('title', 'Официальный сайт')

@section('content')
    @if(count($countries))
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Добро пожаловать!</h1>
                    <p class="lead text-muted">Хороший отель залог хорошего путешествия.
                        Выберите страну и забронируйте жилье с бесплатной отменой прямо сейчас!
                    </p>
                </div>
            </div>
            <form method="get" action=" {{ route('user.countries.search') }}">
                <div class="container">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-8">
                            <div class="search">
                                <i class="fa fa-search"></i>
                                <input type="text" class="form-control" placeholder="search" id="search" name="search">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($countries as $country)
                        <div class="col">
                            <a href="{{ route('user.hotels.index', ['country' => $country->id]) }}">
                                <div class="card shadow-sm">
                                    <div style="position: relative; text-align: center; color: black; font-size: larger">
                                        <img src="{{ asset("storage/$country->image") }}" class="img-fluid rounded-start"
                                             alt="{{ $country->name }} " >
                                        <div class="top-left" style="position: absolute; top: 8px; left: 16px;">{{ $country->name }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Добро пожаловать!</h1>
                    <p class="lead text-muted">Хороший отель залог хорошего путешествия.
                        Выберите страну и забронируйте жилье с бесплатной отменой прямо сейчас!
                    </p>
                </div>
            </div>
            <form method="get" action=" {{ route('user.countries.search') }}">
                <div class="container">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-8">
                            <div class="search">
                                <i class="fa fa-search"></i>
                                <input type="text" class="form-control" placeholder="search" id="search" name="search">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <p>записей не найдено</p>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($countries as $country)
                        <div class="col">
                            <div class="card shadow-sm">
                                <div style="position: relative; text-align: center; color: black; font-size: larger">
                                    <img src="{{ asset("storage/$country->image") }}" class="img-fluid rounded-start"
                                         alt="{{ $country->name }} " style="width: 420px; height: 237px">
                                    <div class="top-left"
                                         style="position: absolute; top: 8px; left: 16px;">{{ $country->name }}</div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('user.hotels.index', ['country' => $country->id]) }}"
                                               class="btn btn-sm btn-outline-secondary stretched-link">view</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection

