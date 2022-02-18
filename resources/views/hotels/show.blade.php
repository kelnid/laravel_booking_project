@extends('layouts.main')

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
                        <a href="{{ route('rooms.create') }}">Добавить номер</a>
                        <a href="{{ route("hotels.edit", ['hotel' => $hotel->id]) }}" class="card-link">Редактировать</a>
                        <form action="{{ route('hotels.destroy', ['hotel' => $hotel->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                        <a href="{{ route("rooms.index", ['hotel' => $hotel->id]) }}" class="card-link">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
