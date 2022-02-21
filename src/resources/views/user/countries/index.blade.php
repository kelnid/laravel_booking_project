@extends('user.layouts.main')

@section('title', 'Главная')

@section('content')
    @guest
    @else
        <div class="container">
            <p>{{ auth()->user()->name }}, куда дальше?</p>
            <p>Начните новый год с путешествий.</p>
            <div class="row row-cols-3">
                @foreach($countries as $country)
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $country->name }}</h5>
                                <a href="{{ route('user.hotels.index', ['country' => $country->id]) }}" class="card-link">Перейти</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endguest
@endsection

