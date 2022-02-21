@extends('admin.layouts.main')

@section('title', 'Добавить отель')

@section('content')
    <div class="container create-task-block">
        <form method="POST" action="{{ route('admin.hotels.store') }}" class="create-task-form">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text"  name="name" placeholder="Название">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Адрес</label>
                <input type="text" name="address" placeholder="Адрес">
            </div>
            <div class="form-group">
                <label for="country">Страна</label>
                <select class="form-control" id="country" name="country">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
