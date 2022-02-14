@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <h1 class="title">Список номеров</h1>
    <div class="container">
        <div class="row row-cols-3">
            @foreach($rooms as $room)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $room->hotel->name }}</h6>
                            <p class="card-text">{{ $room->area }}</p>
                            <a href="#" class="card-link">Редактировать</a>
                            <a href="#" class="card-link">Удалить</a>
                            <a href="{{ route("rooms.show", ['room' => $room->id]) }}" class="card-link">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

