<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [CountryController::class, 'index']);

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => 'admin'
], function () {
    Route::group([
        'as' => 'countries.',
        'prefix' => 'countries',
    ], function () {
        Route::get('/', [CountryController::class, 'index'])->name('index');
        Route::get('/create/test', [CountryController::class, 'create'])->name('create');
        Route::post('/', [CountryController::class, 'store'])->name('store');
        Route::get('/{country}', [CountryController::class, 'show'])->name('show');
        Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('edit');
        Route::put('/{country}', [CountryController::class, 'update'])->name('update');
        Route::delete('/{country}', [CountryController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as' => 'hotels.',
        'prefix' => 'hotels',
    ], function () {
        Route::get('/{country?}', [HotelController::class, 'index'])->name('index');
        Route::get('/create/test', [HotelController::class, 'create'])->name('create');
        Route::post('/', [HotelController::class, 'store'])->name('store');
        Route::get('/show/{hotel}', [HotelController::class, 'show'])->name('show');
        Route::get('/{hotel}/edit', [HotelController::class, 'edit'])->name('edit');
        Route::put('/{hotel}', [HotelController::class, 'update'])->name('update');
        Route::delete('/{hotel}', [HotelController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as' => 'rooms.',
        'prefix' => 'rooms',
    ], function () {
        Route::get('/{hotel?}', [RoomController::class, 'index'])->name('index');
        Route::get('/create/test', [RoomController::class, 'create'])->name('create');
        Route::post('/', [RoomController::class, 'store'])->name('store');
        Route::get('/show/{room}', [RoomController::class, 'show'])->name('show');
        Route::get('/{room}/edit', [RoomController::class, 'edit'])->name('edit');
        Route::put('/{room}', [RoomController::class, 'update'])->name('update');
        Route::delete('/{room}', [RoomController::class, 'destroy'])->name('destroy');
    });
});

Route::group([
    'as' => 'user.',
    'prefix' => 'user',
], function () {
    Route::group([
        'as' => 'countries.',
        'prefix' => 'countries',
    ], function () {
        Route::get('/', [CountryController::class, 'indexCountries'])->name('index');
    });

    Route::group([
        'as' => 'hotels.',
        'prefix' => 'hotels',
    ], function () {
        Route::get('/{country?}', [HotelController::class, 'indexHotel'])->name('index');
    });

    Route::group([
        'as' => 'rooms.',
        'prefix' => 'rooms',
    ], function () {
        Route::get('/{hotel?}', [RoomController::class, 'indexRooms'])->name('index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
