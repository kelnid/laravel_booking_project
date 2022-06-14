@extends('user.layouts.main')

@section('title', 'Список отелей')

@section('content')
    <div class="container" style="padding-top: 150px">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($hotels as $hotel)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset("storage/$hotel->image") }}" class="card-img-top" alt="{{ $hotel->name }}" style="max-width: 450px; max-height: 217px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <h5 class="card-title">{{ $hotel->address }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $hotel->country->name }}</h6>
                        <a href="{{ route('user.hotels.show', ['hotel' => $hotel->id]) }}" class="card-link">Подробнее</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
