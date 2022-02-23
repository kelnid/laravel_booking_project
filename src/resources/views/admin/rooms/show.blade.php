@extends('admin.layouts.main')

@section('title', 'Номер')

@section('content')
    <h1 class="title">Номер - {{ $room->name }}</h1>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black">{{ $room->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted" style="color: black">{{ $room->hotel->name }}</h6>
                        <p class="card-text" style="color: black">Площадь: {{ $room->area }} м²</p>
                        <p class="card-text" style="color: black">{{ $room->bed }}</p>
                        <a href="{{ route('admin.rooms.edit', ['room' => $room->id]) }}"
                           class="card-link">Редактировать</a>

                        <form action="{{ route('admin.rooms.destroy', ['room' => $room->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>

                        <form method="POST" action="{{ route('admin.bookings.store') }}" class="create-task-form">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <div class="form-group">
                                <label for="date" style="color: black">Дата заезда</label>
                                <input type="date" name="settlement_date" placeholder="Название">
                            </div>
                            <div class="form-group">
                                <label for="release_date" style="color: black">Дата выселения</label>
                                <input type="date" name="release_date" placeholder="Название">
                            </div>
                            <button type="submit" class="btn btn-primary">Забронировать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

