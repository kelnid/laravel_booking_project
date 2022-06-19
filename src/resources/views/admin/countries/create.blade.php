@extends('admin.layouts.main')

@section('title', 'Добавить страну')

@section('content')
    <div class="container create-task-block">
        <form method="POST" action="{{ route('admin.countries.store') }}" class="create-task-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Название">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
