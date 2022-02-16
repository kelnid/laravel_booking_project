@extends('layouts.main')

@section('title', 'Создать задачу')

@section('content')
    <div class="container create-task-block">
        <form method="POST" action="{{ route('countries.store') }}" class="create-task-form">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" id="name" name="name" placeholder="Название">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
