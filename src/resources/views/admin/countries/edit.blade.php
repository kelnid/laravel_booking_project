@extends('admin.layouts.main')

@section('title', "Редактировать страну $country->name")

@section('content')
    <div class="container create-task-block">
        <form action="{{ route('admin.countries.update', ['country' => $country->id]) }}" method="POST" class="create-task-form " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="{{ $country->name }}">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Изображение</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
