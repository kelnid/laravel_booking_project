@extends('admin.layouts.main')

@section('title', 'Добавить отель')

@section('content')
    <div class="container" style="padding-top: 200px; width: 800px">
        <form method="POST" action="{{ route('admin.hotels.store', ['country' => $country]) }}" class="create-task-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Название">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description"></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Адрес</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Адрес">
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="country">Страна</label>
                <select class="form-control" id="country" name="country_id">
                        <option {{ $country === $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}
                        </option>
                </select>
            </div>
            <div class="form-group">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
