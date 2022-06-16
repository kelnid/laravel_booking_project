@extends('user.layouts.main')

@section('title', 'Отель')

@section('content')
    <style>
        .stars {
            width: 400px;
            display: flex;
            justify-content: space-around;
            align-items: baseline;
        }
        input.star {
            display: none;
        }
        label.star {
            float: right;
            padding: 5px;
            font-size: 28px;
            color: #444;
            transition: all .2s;
        }
        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }
        input.star-10:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }
        input.star-1:checked ~ label.star:before { color: #F62; }
        label.star:hover { transform: rotate(-15deg) scale(1.3); }
        label.star:before {
            content: '\f006';
            font-family: FontAwesome, serif;
        }

        .class {
            display: flex;
            flex-direction: row-reverse;
        }

        #exact-rating {
            height: 30px;
        }
    </style>
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
                            <p>Комментарии могут оставлять только зарегистрированные пользователи</p>
                        </div>
                    @else
                        <div class="container">
                            <div>
                                <form method="POST" action="{{route('hotels.comments.store', $hotel->id)}}">
                                    @csrf
                                    <div>
                                        <div>
                                            <label for="exampleFormControlTextarea1"></label>
                                            <textarea class="form-control" name="description" placeholder="Оставьте свой комментарий" id="exampleFormControlTextarea1" required></textarea>
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
                                        @if ($comment->user_id === auth()->user()->id)
                                            <div style="padding-bottom: 10px;">
                                                <a data-toggle="modal" href="#myModal2_{{$comment->id}}" class="btn btn-primary">Редактировать</a>
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
                                                                <div class="mb-3 xl:w-96">
                                                                    <textarea name="description" id="description" rows="3">{{$comment->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-sm btn-outline-primary">Изменить
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
       <div class="mt-5" style="padding-top: 830px; padding-right: 5px">
           <div id="map" style="height: 150px; width: 300px"></div>
       </div>
       <div class="card mb-3 mt-5" style="width: 1295px; height: auto; margin: 0 auto;">
           <img src="{{ asset("storage/$hotel->image") }}" class="img-fluid"
                alt="{{ $hotel->name }}">
           <div class="card-body">
               <h5 class="card-title"> {{ $hotel->name }}</h5>
               <div class="stars mr-2">
                   <form action="{{route('hotels.rating.store')}}" class="class">
                       <input type="hidden" name="get-rate" content="{{route('hotels.rating.show', $hotel->id)}}">
                       <input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
                       <input type="hidden" class="hide" name="hotel_id" id="{{$hotel->id}}" data-set-value="{{$hotel->id}}">
                       <input class="star star-10" id="star-10" type="radio" data-item-value="10" name="star"/>
                       <label class="star star-10" for="star-10"></label>
                       <input class="star star-9" id="star-9" type="radio" data-item-value="9" name="star"/>
                       <label class="star star-9" for="star-9"></label>
                       <input class="star star-8" id="star-8" type="radio" data-item-value="8" name="star"/>
                       <label class="star star-8" for="star-8"></label>
                       <input class="star star-7" id="star-7" type="radio" data-item-value="7" name="star"/>
                       <label class="star star-7" for="star-7"></label>
                       <input class="star star-6" id="star-6" type="radio" data-item-value="6" name="star"/>
                       <label class="star star-6" for="star-6"></label>
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
               <div class="mx-8">
                   <span id="exact-rating" class="mt-2 text-3xl"></span>
               </div>
               <h5 class="card-title">{{ $hotel->address }}</h5>
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
                            <a href="{{ route('user.rooms.show', ['room' => $room->id]) }}" class="card-link">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

