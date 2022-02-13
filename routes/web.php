<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'countries.',
    'prefix' => 'countries',
], function() {
    Route::get('/', [CountryController::class, 'index'])->name('index');
    Route::get('/create', [CountryController::class, 'create'])->name('create');
    Route::post('/', [CountryController::class, 'store'])->name('store');
    Route::get('/{country}', [CountryController::class, 'show'])->name('show');
    Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('edit');
    Route::put('/{country}', [CountryController::class, 'update'])->name('edit');
    Route::delete('/{country}', [CountryController::class, 'destroy'])->name('destroy');
});

Route::group([
    'as' => 'hotels.',
    'prefix' => 'hotels',
], function() {
    Route::get('/', [HotelController::class, 'index'])->name('index');
    Route::get('/create', [HotelController::class, 'create'])->name('create');
    Route::post('/', [HotelController::class, 'store'])->name('store');
    Route::get('/{hotel}', [HotelController::class, 'show'])->name('show');
    Route::get('/{hotel}/edit', [HotelController::class, 'edit'])->name('edit');
    Route::put('/{hotel}', [HotelController::class, 'update'])->name('edit');
    Route::delete('/{hotel}', [HotelController::class, 'destroy'])->name('destroy');
});

Route::group([
    'as' => 'rooms.',
    'prefix' => 'rooms',
], function() {
    Route::get('/', [RoomController::class, 'index'])->name('index');
    Route::get('/create', [RoomController::class, 'create'])->name('create');
    Route::post('/', [RoomController::class, 'store'])->name('store');
    Route::get('/{room}', [RoomController::class, 'show'])->name('show');
    Route::get('/{room}/edit', [RoomController::class, 'edit'])->name('edit');
    Route::put('/{room}', [RoomController::class, 'update'])->name('edit');
    Route::delete('/{room}', [RoomController::class, 'destroy'])->name('destroy');
});


