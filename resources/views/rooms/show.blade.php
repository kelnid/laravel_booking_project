@extends('layouts.main')

@section('title', 'Список задач')

@section('content')
    <h1 class="title">Комната - {{ $room->name }}</h1>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $room->hotel->name }}</h6>
                        <p class="card-text">{{ $room->area }}</p>
                        <p class="card-text">{{ $room->bed }}</p>
                        <a href="#" class="card-link">Редактировать</a>
                        <a href="#" class="card-link">Удалить</a>
{{--                        <a href="{{ route("rooms.index", ['hotel' => $hotel->id]) }}" class="card-link">Перейти</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

