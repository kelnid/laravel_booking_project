@extends('user.layouts.main')

@section('title', 'Отель')

@section('content')
    <h1 class="title">Отель - {{ $hotel->name }}</h1>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $hotel->country->name }}</h6>
                        <p class="card-text">{{ $hotel->description }}</p>
                        <a href="{{ route('user.rooms.index', ['hotel' => $hotel->id]) }}" class="card-link">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
