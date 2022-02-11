@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <form method="POST" action="{{ route('rooms.store') }}">
        @csrf
        <input type="text" name="test">
        <button type="submit">Send</button>
    </form>
@endsection
