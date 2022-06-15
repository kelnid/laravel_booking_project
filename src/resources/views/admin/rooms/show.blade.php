@extends('admin.layouts.main')

@section('title', 'Номер')

@section('content')
    <div class="container" style="padding-top: 200px">
        <div class="portfolio-item row">
            @foreach($images as $image)
                <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                    <a href="{{ asset("storage/$image->image") }}" class="fancylight popup-btn" data-fancybox-group="light">
                        <img src="{{ asset("storage/$image->image") }}" alt="hy" style="width: 200px; height: 200px">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <h5 class="card-title" style="color: black">{{ $room->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted" style="color: black">{{ $room->hotel->name }}</h6>
                        <p class="card-text" style="color: black">Площадь: {{ $room->area }} м²</p>
                        <p class="card-text" style="color: black">Price: {{ $room->price }} UAH</p>
                        <p class="card-text" style="color: black">{{ $room->bed }}</p>
                        <a href="{{ route('admin.rooms.edit', ['room' => $room->id]) }}"
                           class="card-link">Редактировать</a>
                        <form action="{{ route('admin.rooms.destroy', ['room' => $room->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                        <form method="POST" action="{{ route('hotels.bookings.storeBooking') }}"
                              class="create-task-form">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <div class="form-group">
                                <label for="settlement_date" style="color: black">Дата заезда</label>
                                <input type="date" name="settlement_date">
                            </div>
                            <div class="form-group">
                                <label for="release_date" style="color: black">Дата выселения</label>
                                <input type="date" name="release_date">
                            </div>
                            @error('settlement_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button data-toggle="modal" data-target-id="1" data-target="#myModal" type="submit"
                                    class="btn btn-primary">Забронировать
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <strong>Вы успешно забронировали номер!</strong>
                </div>
            </div>
        </div>
    </div>
@endsection

