@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <a href="{{ route('rooms.index') }}">Список отелей</a>
@endsection
