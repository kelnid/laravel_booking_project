@extends('admin.layouts.main')

@section('title', 'Список отелей')

@section('content')
    <div class="container" style="padding-top: 150px">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($hotels as $hotel)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset("storage/$hotel->image") }}" class="card-img-top" alt="{{ $hotel->name }}" style="max-width: 450px; max-height: 217px">
                        <div class="card-body">
                            <p class="card-title">{{ $hotel->name }}</p>
                            <p class="card-title">{{ $hotel->address }}</p>
                            <p class="card-subtitle mb-2 text-muted">{{ $hotel->country->name }}</p>
                            <a href="{{ route('admin.hotels.show', ['hotel' => $hotel->id]) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
