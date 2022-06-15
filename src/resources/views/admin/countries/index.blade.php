@extends('admin.layouts.main')

@section('title', 'Главная')

@section('content')
    @guest
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Добро пожаловать!</h1>
                    <p class="lead text-muted">Хороший отель залог хорошего путешествия.
                        Выберите страну и забронируйте жилье с бесплатной отменой прямо сейчас!
                    </p>
                    <p>
                        <a class="btn btn-primary my-2" href="{{ route('admin.countries.create') }}">Добавить страну</a>
                    </p>
                </div>
            </div>
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
                                            <a href="{{ route('admin.hotels.index', ['country' => $country->id]) }}"
                                               class="btn btn-sm btn-outline-secondary stretched-link">view</a>
                                            <a href="{{ route('admin.countries.edit', ['country' => $country->id]) }}"
                                               class="btn btn-sm btn-outline-secondary">edit</a>
                                            <a href="{{ route('admin.hotels.create') }}"
                                               class="btn btn-sm btn-outline-secondary">add hotel</a>
                                        </div>
                                        <a data-bs-toggle="modal" class="btn btn-sm btn-outline-danger" data-bs-target="#deleteCountryModal_{{$country->id}}"
                                           data-action="{{ route('admin.countries.destroy', $country->id) }}">Delete</a>
                                    </div>
                                    <div class="modal fade" id="deleteCountryModal_{{$country->id}}"
                                         data-backdrop="static" tabindex="-1" role="dialog"
                                         aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title" id="deleteUserModalLabel">Действительно хотите удалить?</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form
                                                    action="{{ route('admin.countries.destroy', ['country' => $country->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <p>
                        <a class="btn btn-primary my-2" href="{{ route('admin.countries.create') }}">Добавить страну</a>
                    </p>
                </div>
            </div>
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
                                            <a href="{{ route('admin.hotels.index', ['country' => $country->id]) }}"
                                               class="btn btn-sm btn-outline-secondary stretched-link">view</a>
                                            <a href="{{ route('admin.countries.edit', ['country' => $country->id]) }}"
                                               class="btn btn-sm btn-outline-secondary">edit</a>
                                            <a href="{{ route('admin.hotels.create') }}"
                                               class="btn btn-sm btn-outline-secondary">add hotel</a>
                                        </div>
                                        <a data-bs-toggle="modal" class="btn btn-sm btn-outline-danger" data-bs-target="#deleteCountryModal_{{$country->id}}"
                                           data-action="{{ route('admin.countries.destroy', $country->id) }}">Delete</a>
                                    </div>
                                    <div class="modal fade" id="deleteCountryModal_{{$country->id}}"
                                         data-backdrop="static" tabindex="-1" role="dialog"
                                         aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title" id="deleteUserModalLabel">Действительно хотите удалить?</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form
                                                    action="{{ route('admin.countries.destroy', ['country' => $country->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endguest
@endsection
