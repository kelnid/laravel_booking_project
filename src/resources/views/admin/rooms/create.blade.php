@extends('admin.layouts.main')

@section('title', 'Создать комнату')

@section('content')
    <div class="container" style="padding-top: 200px; width: 800px">
        <form method="POST" action="{{ route('admin.rooms.store', ['hotel' => $hotel]) }}" class="create-task-form">
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
                <label for="price">Цена</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="hotel">Отель</label>
                <select class="form-control" id="country" name="country_id">
                    <option {{ $hotel === $hotel->id ? 'selected' : '' }} value="{{ $hotel->id }}">{{ $hotel->name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
