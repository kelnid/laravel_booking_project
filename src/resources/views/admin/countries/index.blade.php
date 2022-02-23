
@extends('admin.layouts.main')

@section('title', 'Главная')

@section('content')
    @guest
    @else
        <div class="container">
            <p>{{ auth()->user()->name }}, куда дальше?</p>
            <p>Начните новый год с путешествий.</p>
            <div class="row row-cols-3">
                @foreach($countries as $country)
                    <div style="margin: 30px">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <img src="{{ asset("storage/$country->image") }}" alt="palmo" width="250px">
                                <h5 style="color: black;">{{ $country->name }}</h5>
                                <a href="{{ route('admin.countries.edit', ['country' => $country->id]) }}" class="card-link">Редактировать</a>
                                <a href="{{ route('admin.hotels.create') }}">Добавить отель</a>
                                <a href="{{ route('admin.hotels.index', ['country' => $country->id]) }}" class="card-link">Перейти</a>
                                <form action="{{ route('admin.countries.destroy', ['country' => $country->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endguest
@endsection
