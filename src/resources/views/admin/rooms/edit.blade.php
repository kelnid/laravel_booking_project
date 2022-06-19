@extends('admin.layouts.main')

@section('title', "Редактировать номер $room->name")

@section('content')
    <div class="container" style="padding-top: 200px; width: 800px">
        <form action="{{ route('admin.rooms.update', ['room' => $room->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $room->name }}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="bed">Вид кровати</label>
                <input type="text" class="form-control" id="bed" name="bed" value="{{ $room->bed }}">
            </div>
            @error('bed')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $room->price }}">
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="area">Площадь</label>
                <input type="text" class="form-control  @error('area') is-invalid @enderror" id="area" name="area" value="{{ $room->area }}">
            </div>
            @error('area')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
