@extends('admin.layouts.main')

@section('title', "Редактировать страну $country->name")

@section('content')
    <div class="container" style="padding-top: 200px; width: 800px">
        <form action="{{ route('admin.countries.update', ['country' => $country->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="{{ $country->name }}">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Изображение</label>
                <input class="form-control @error('name') is-invalid @enderror" type="file" id="image" name="image">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
