@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <h1 class="title">Список стран</h1>
    <div class="container">
        <div class="row row-cols-3">
            @foreach($countries as $country)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $country->name }}</h5>
                            <img src="{{ $country->image_path }}" width="100px" height="200px">
                            <a href="#" class="card-link">Редактировать</a>
                            <a href="#" class="card-link">Удалить</a>
                            <a href="{{ route("hotels.index", ['country' => $country->id]) }}" class="card-link">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
