@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <div class="countries">
        <div class="country">
            <a href="{{ route('hotels.index') }}">Украина</a>
        </div>
        <div class="country">
            <a href="{{ route('hotels.index') }}">Париж</a>
        </div>
        <div class="country">
            <a href="{{ route('hotels.index') }}">Германия</a>
        </div>
    </div>
@endsection
