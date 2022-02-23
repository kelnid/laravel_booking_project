@extends('admin.layouts.main')

@section('title', 'Добавить страну')

@section('content')
    <div class="container create-task-block">
        <form method="POST" action="{{ route('admin.countries.store') }}" class="create-task-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" id="name" name="name" placeholder="Название">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Изображение</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
