@extends('layouts.main')

@section('title', 'Номер')

@section('content')
    <h1 class="title">Номер - {{ $room->name }}</h1>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $room->hotel->name }}</h6>
                        <p class="card-text">{{ $room->area }}</p>
                        <p class="card-text">{{ $room->bed }}</p>
                        <a href="{{ route("rooms.edit", ['room' => $room->id]) }}" class="card-link">Редактировать</a>
                        <form action="{{ route('rooms.destroy', ['room' => $room->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

