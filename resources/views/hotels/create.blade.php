@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <form method="POST" action="{{ route('hotels.store') }}">
        @csrf
        <input type="text" name="test">
        <button type="submit">Send</button>
    </form>
@endsection
