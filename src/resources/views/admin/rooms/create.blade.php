@extends('admin.layouts.main')

@section('title', 'Создать задачу')

@section('content')
    <div class="container create-task-block">
        <form method="POST" action="{{ route('admin.rooms.store') }}" class="create-task-form">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text"  name="name" placeholder="Название">
            </div>
            <div class="form-group">
                <label for="bed">Кровать</label>
                <input id="bed" name="bed">
            </div>
            <div class="form-group">
                <label for="area">Площадь</label>
                <input type="text" name="area" placeholder="Площадь">
            </div>
            <div class="form-group">
                <label for="hotel">Отель</label>
                <select id="hotel" name="hotel">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
