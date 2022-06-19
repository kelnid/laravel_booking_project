@extends('user.layouts.main')

@section('title', 'Мои бронирования')

@section('content')
    <div class="container" style="padding-top: 200px">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($bookings as $booking)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title" style="color: black">{{ $booking->name }}</p>
                                <p class="card-subtitle mb-2 text-muted" style="color: black">{{ $booking->hotel->name }}</p>
                                <p class="card-text" style="color: black">Price: {{ $booking->price }} UAH</p>
                                <p class="card-text" style="color: black">Дата заезда
                                    - {{ $booking->pivot->settlement_date }}</p>
                                <p class="card-text" style="color: black">Дата выезда - {{ $booking->pivot->release_date }}</p>
                                <a href="{{route('user.rooms.show', $booking->id)}}">Перейти</a>
                                <a data-bs-toggle="modal" class="btn btn-sm btn-outline-danger"
                                   data-bs-target="#deleteBookingModal_{{$booking->pivot->id}}"
                                   data-action="{{ route('hotels.bookings.destroy', $booking->pivot->id) }}">Отменить бронь</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteBookingModal_{{$booking->pivot->id}}"
                         data-backdrop="static" tabindex="-1" role="dialog"
                         aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title" id="deleteUserModalLabel">Действительно хотите отменить бронь?</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('hotels.bookings.destroy', $booking->pivot->id) }}" method="POST"
                                      class="flex justify-center mb-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Отменить бронь</button>
                                </form>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection
