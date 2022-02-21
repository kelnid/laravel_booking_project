@extends('admin.layouts.main')

@section('title', "Редактировать номер $room->name")

@section('content')
    <div class="container create-task-block">
        <form action="{{ route('admin.rooms.update', ['room' => $room->id]) }}" method="POST" class="create-task-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="{{ $room->name }}">
            </div>
            <div class="form-group">
                <label for="bed">Вид кровати</label>
                <input type="text" class="form-control" id="bed" name="bed" placeholder="Вид кровати" value="{{ $room->bed }}">
            </div>
            <div class="form-group">
                <label for="area">Площадь</label>
                <input type="text" class="form-control" id="area" name="area" placeholder="Название" value="{{ $room->area }}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
