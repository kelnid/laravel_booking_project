@extends('user.layouts.main')

@section('title', 'Список отелей')

@section('content')
    <div class="container grid mt-5">
        @foreach($hotels as $hotel)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset("storage/$hotel->image") }}" class="img-fluid rounded-start"
                             alt="{{ $hotel->name }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <h5 class="card-title">{{ $hotel->address }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $hotel->country->name }}</h6>
                            <a href="{{ route('user.hotels.show', ['hotel' => $hotel->id]) }}" class="card-link">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
