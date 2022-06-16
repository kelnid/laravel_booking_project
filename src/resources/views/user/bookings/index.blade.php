@extends('user.layouts.main')

@section('title', 'Мои бронирования')

@section('content')
    <div class="container" style="padding-top: 200px">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($rooms as $room)
                @foreach($room->bookings as $booking)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <p class="card-title" style="color: black">{{ $room->name }}</p>
                                <p class="card-subtitle mb-2 text-muted"
                                   style="color: black">{{ $room->hotel->name }}</p>
                                <p class="card-text" style="color: black">Price: {{ $room->price }} UAH</p>
                                <p class="card-text" style="color: black">Дата заезда
                                    - {{ $booking->settlement_date }}</p>
                                <p class="card-text" style="color: black">Дата выезда - {{ $booking->release_date }}</p>
                                <form action="{{route('hotels.bookings.destroy', $booking->id)}}" method="POST"
                                      class="flex justify-center mb-2">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Отменить бронь</button>
                                </form>
                                <a href="{{route('user.rooms.show', $room->id)}}">Перейти</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
