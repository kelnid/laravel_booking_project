@extends('admin.layouts.main')

@section('title', 'Создать задачу')

@section('content')
    <div class="container create-task-block">
        <form method="POST" action="{{ route('admin.rooms.store') }}" class="create-task-form">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Название">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bed">Кровать</label>
                <input id="bed" class="form-control @error('bed') is-invalid @enderror" name="bed">
                @error('bed')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="area">Площадь</label>
                <input type="text" class="form-control @error('area') is-invalid @enderror" name="area" placeholder="Площадь">
                @error('area')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="hotel">Отель</label>
                <select class="form-control" id="hotel" name="hotel">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
