@extends('user.layouts.main')

@section('title', 'Отель')

@section('content')
    <div class="modal" id="myModal1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="deleteUserModalLabel">Комментарии</p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @guest
                        <div class="alert-danger container">
                            <p>Комментарии могут оставлять только <a href="{{ route('register') }}">зарегистрированные</a> или <a href="{{ route('login') }}">авторизированные</a> пользователи</p>
                        </div>
                    @else
                        <div class="container">
                            <div>
                                <form method="POST" action="{{route('hotels.comments.store', $hotel->id)}}">
                                    @csrf
                                    <div>
                                        <div>
                                            <label for="exampleFormControlTextarea1"></label>
                                            <textarea class="form-control" name="description"
                                                      placeholder="Оставьте свой комментарий"
                                                      id="exampleFormControlTextarea1" required></textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <div>
                                                <button type='submit' class="btn btn-sm btn-outline-primary">
                                                    Добавьте комментарий
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endguest
                    @if(isset($hotel->comments))
                        @foreach($hotel->comments as $comment)
                            <div class="container" style="padding-top: 20px">
                                <div style="border-bottom: 1px solid black;">
                                    <div>
                                        <span>{{$comment->user->name}}</span>
                                        <div>
                                            <p>
                                                {{$comment->description}}
                                            </p>
                                        </div>
                                        <p>{{$comment->dateAsCarbon->diffForHumans()}}</p>
                                    </div>
                                    @guest
                                        <div>

                                        </div>
                                    @else
                                        @if ($comment->user_id === auth()->user()->id )
                                            <div style="padding-bottom: 10px;">
                                                <a data-toggle="modal" href="#myModal2_{{$comment->id}}"
                                                   class="btn btn-primary">Редактировать</a>
                                            </div>
                                            <div class="modal fade" id="myModal2_{{$comment->id}}"
                                                 data-backdrop="static" tabindex="-1" role="dialog"
                                                 aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <p class="modal-title" id="deleteUserModalLabel">Изменение комментария</p>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <form action="{{route('hotels.comments.update', ['hotel' => $hotel->id, 'comment' => $comment->id])}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="flex justify-center">
                                                                <div>
                                                                    <textarea style="width: 498px" name="description" id="description">{{$comment->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                        class="btn btn-sm btn-outline-primary">Изменить
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif(auth()->user()->role_id === 1)
                                            <div style="padding-bottom: 10px;">
                                                <a data-toggle="modal" href="#myModal2_{{$comment->id}}"
                                                   class="btn btn-primary">Редактировать</a>
                                            </div>
                                            <div>
                                                <form action="{{ route('admin.comments.destroy', ['comment' => $comment->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="">
                                                        Удалить
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="modal fade" id="myModal2_{{$comment->id}}"
                                                 data-backdrop="static" tabindex="-1" role="dialog"
                                                 aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <p class="modal-title" id="deleteUserModalLabel">Изменение комментария</p>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <form action="{{route('hotels.comments.update', ['hotel' => $hotel->id, 'comment' => $comment->id])}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="flex justify-center">
                                                                <div>
                                                                    <textarea style="width: 498px" name="description" id="description">{{$comment->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                        class="btn btn-sm btn-outline-primary">Изменить
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endguest
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="display: flex">
        <div class="card mb-3 mt-5" style="width: 1295px; height: auto; margin: 0 auto;">
            <img src="{{ asset("storage/$hotel->image") }}" class="img-fluid"
                 alt="{{ $hotel->name }}">
            <div class="card-body">
                <strong class="card-title"> {{ $hotel->name }}</strong>
                <div class="stars mr-2" style="width: 195px">
                    <form action="{{route('hotels.rating.store')}}" class="class">
                        <input type="hidden" name="get-rate" content="{{route('hotels.rating.show', $hotel->id)}}">
                        <input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" class="hide" name="hotel_id" id="{{$hotel->id}}"
                               data-set-value="{{$hotel->id}}">
                        <input class="star star-5" id="star-5" type="radio" data-item-value="5" name="star"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" data-item-value="4" name="star"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" data-item-value="3" name="star"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" data-item-value="2" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" data-item-value="1" name="star"/>
                        <label class="star star-1" for="star-1"></label>
                    </form>
                </div>
                <div class="mx-8" style="display: flex">
                    <p style="padding-right: 5px">Оценка:</p>
                    <span id="exact-rating"></span>
                </div>
                <div>
                    <p style="padding-right: 5px">К-во проголосовавших:</p>
                    <p>{{ $users->count() }}</p>
                </div>
                <strong class="card-title">{{ $hotel->address }}</strong>
                <p class="card-text">{{ $hotel->description }}</p>
                <a data-toggle="modal" href="#myModal1" class="btn btn-primary">Оставить комментарий</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($hotel->rooms as $room)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body h-100">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $room->hotel->name }}</h6>
                            <p class="card-text">Площадь: {{ $room->area }} м²</p>
                            <p class="card-text">Price: {{ $room->price }} UAH</p>
                            <a href="{{ route('user.rooms.show', ['room' => $room->id]) }}"
                               class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="map">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 20,
                center: {lat: parseFloat(locations.lat), lng: parseFloat(locations.lng)},
            });
            setMarkers(map);
        }
        const locations = <?php print json_encode($markers) ?>;

        function setMarkers(map) {
              const marker =  new google.maps.Marker({
                    position: {lat: parseFloat(locations.lat), lng: parseFloat(locations.lng)},
                    map,
                    label: {
                        fontSize: "8pt",
                    }
                });
            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });

            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        }
    </script>
@endsection

