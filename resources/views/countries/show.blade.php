@extends('layouts.main')

@section('title', 'Список задач')

@section('content')
    <h1 class="title">Страна - {{ $country->name }}</h1>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $country->name }}</h5>
                        <a href="{{ route("countries.edit", ['country' => $country->id]) }}" class="card-link">Редактировать</a>
                        <form action="{{ route('countries.destroy', ['country' => $country->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
