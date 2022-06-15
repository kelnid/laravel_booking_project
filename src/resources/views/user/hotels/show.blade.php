@extends('user.layouts.main')

@section('title', 'Отель')

@section('content')
    <div class="modal" id="myModal1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal title</h4>
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
                                            <textarea class="form-control" name="description"
                                                      placeholder="Оставьте свой комментарий"
                                                      id="exampleFormControlTextarea1" required></textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <div>
                                                <button type='submit' class="btn btn-sm btn-outline-primary">Добавьте
                                                    комментарий
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
                                <div>
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
                                            <div>
                                                <a data-toggle="modal" href="#myModal2_{{$comment->id}}"
                                                   class="btn btn-primary">Редактировать</a>
                                            </div>
                                            <div class="modal fade" id="myModal2_{{$comment->id}}"
                                                 data-backdrop="static" tabindex="-1" role="dialog"
                                                 aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <p class="modal-title" id="deleteUserModalLabel">Изменение
                                                                комментария</p>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{route('hotels.comments.update', ['hotel' => $hotel->id, 'comment' => $comment->id])}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="flex justify-center">
                                                                <div class="mb-3 xl:w-96">
                                                                    <textarea name="description" id="description"
                                                                              rows="3">{{$comment->description}}</textarea>
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
    <div class="card mb-3 mt-5" style="width: 1295px; height: auto; margin: 0 auto;">
        <img src="{{ asset("storage/$hotel->image") }}" class="img-fluid"
             alt="{{ $hotel->name }}">
        <div class="card-body">
            <h5 class="card-title"> {{ $hotel->name }}</h5>
            <h5 class="card-title">{{ $hotel->address }}</h5>
            <p class="card-text">{{ $hotel->description }}</p>
            <a data-toggle="modal" href="#myModal1" class="btn btn-primary">Оставить комментарий</a>
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
                               class="card-link">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
