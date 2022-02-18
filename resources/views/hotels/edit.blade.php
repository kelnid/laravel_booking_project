@extends('layouts.main')

@section('title', "Редактировать отель $hotel->name")

@section('content')
    <div class="container create-task-block">
        <form action="{{ route('hotels.update', ['hotel' => $hotel->id]) }}" method="POST" class="create-task-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="{{ $hotel->name }}">
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Название" value="{{ $hotel->address }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ $hotel->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="country">Страна</label>
                <select class="form-control" id="country" name="country_id">
                    @foreach($countries as $country)
                        <option
                            {{ $country->id === $hotel->country_id ? 'selected' : '' }}
                            value="{{ $country->id }}">{{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
