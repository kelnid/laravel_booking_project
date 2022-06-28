@extends('user.layouts.main')

@section('title', 'Номер')

@section('content')
    <div class="container" style="display: flex">
        <div class="row row-cols-3" style="padding-top: 200px; padding-right: 20px">
            <div class="col">
                <div class="card" style="width: 300px;">
                    <div class="card-body">
                        <strong class="card-title" style="color: black">{{ $room->name }}</strong>
                        <p class="card-subtitle mb-2 text-muted" style="color: black">{{ $room->hotel->name }}</p>
                        <p class="card-text" style="color: black">Площадь: {{ $room->area }} м²</p>
                        <p class="card-text" style="color: black">Цена: {{ $room->price }} UAH</p>
                        <p class="card-text" style="color: black">{{ $room->bed }}</p>
                        @csrf
                        @guest
                            <div class="form-group">
                                <label for="settlement_date" style="color: black">Дата заезда</label>
                                <input type="date" name="settlement_date" disabled>
                            </div>
                            <div class="form-group" style="padding-top: 20px; padding-bottom: 20px">
                                <label for="release_date" style="color: black">Дата выезда</label>
                                <input type="date" name="release_date" disabled>
                            </div>
                        @else
                            <form method="POST" action="{{ route('hotels.bookings.storeBooking') }}">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <label for="settlement_date" style="color: black">Дата заезда</label>
                                <input type="text" name="settlement_date"  readonly="readonly" size="12" class="date"/>
                                <label for="release_date" style="color: black">Дата выезда</label>
                                <input type="text" name="release_date"  readonly="readonly" size="12" class="date2"/>
                                <script>
                                    var availableDates = <?php print json_encode($range) ?>;

                                    function available(date) {
                                        dates = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
                                        if ($.inArray(dates, availableDates) !== -1) {
                                            return [false, "","Available"];
                                        } else {
                                            return [true,"","unAvailable"];
                                        }
                                    }

                                    $('.date').datepicker({ minDate:0, beforeShowDay: available });
                                </script>
                                <script>
                                    var availableDates = <?php print json_encode($range) ?>;

                                    function available(date) {
                                        dates = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
                                        if ($.inArray(dates, availableDates) !== -1) {
                                            return [false, "","Available"];
                                        } else {
                                            return [true,"","unAvailable"];
                                        }
                                    }

                                    $('.date2').datepicker({  minDate:0,  beforeShowDay: available });
                                </script>
                                <button type="submit" class="btn btn-primary">Забронировать</button>
                            </form>
                            @error('settlement_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endguest
                        @guest
                            <div class="alert-danger container">
                                <p>Бронировать номера могут только <a href="{{ route('register') }}">зарегистрированные</a>пользователи</p>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-top: 200px">
            <input type="hidden" name="room_id" value="{{ $room->id }}">
            <div class="portfolio-item row">
                @foreach($room->images as $image)
                    <div class="item selfie col-lg-3 col-md-4 col-6 col-sm" style="padding-right: 10px">
                        <a href="{{ asset("storage/$image->image") }}" class="fancylight popup-btn"
                           data-fancybox-group="light">
                            <img src="{{ asset("storage/$image->image") }}" style="width: 200px; height: 200px">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

