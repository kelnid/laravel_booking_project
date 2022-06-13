@extends('user.layouts.main')

@section('title', 'Отель')

@section('content')
    <div class="card mb-3 mt-5" style="width: 1295px; height: auto; margin: 0 auto;">
        <img src="{{ asset("storage/$hotel->image") }}" class="img-fluid"
             alt="{{ $hotel->name }}">
        <div class="card-body">
            <h5 class="card-title"> {{ $hotel->name }}</h5>
            <h5 class="card-title">{{ $hotel->address }}</h5>
            <p class="card-text">{{ $hotel->description }}</p>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($hotel->rooms as $room)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $room->hotel->name }}</h6>
                            <p class="card-text">Площадь: {{ $room->area }} м²</p>
                            <p class="card-text">Price: {{ $room->price }} UAH</p>
                            <a href="{{ route('user.rooms.show', ['room' => $room->id]) }}"
                               class="card-link">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
