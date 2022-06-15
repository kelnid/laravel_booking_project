<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [CountryController::class, 'indexCountries']);

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['admin'],
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
        Route::delete('{country}', [CountryController::class, 'destroy'])->name('destroy');
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
    Route::group([
        'as' => 'bookings.',
        'prefix' => 'bookings',
    ], function () {
        Route::get('/create/test', [BookingController::class, 'create'])->name('create');
        Route::post('/', [BookingController::class, 'store'])->name('store');
        Route::put('/{booking}', [BookingController::class, 'update'])->name('update');
    });
    Route::group([
        'as' => 'comments.',
        'prefix' => 'comments'
    ], function () {
        Route::get('/', [CommentsController::class, 'index'])->name('index');
        Route::put('{hotel}/comments/{comment}', [CommentsController::class, 'update'])->name('update');
        Route::delete('/destroy/{comment}', [CommentsController::class, 'destroy'])->name('destroy');
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
        Route::get('/search', [CountryController::class, 'search'])->name('search');
    });
    Route::group([
        'as' => 'hotels.',
        'prefix' => 'hotels',
    ], function () {
        Route::get('/{country?}', [HotelController::class, 'indexHotel'])->name('index');
        Route::get('/show/{hotel}', [HotelController::class, 'showHotel'])->name('show');
    });
    Route::group([
        'as' => 'rooms.',
        'prefix' => 'rooms',
    ], function () {
        Route::get('/{hotel?}', [RoomController::class, 'indexRooms'])->name('index');
        Route::get('/show/{room}', [RoomController::class, 'showRoom'])->name('show');
    });
    Route::group([
        'as' => 'bookings.',
        'prefix' => 'bookings',
    ], function () {
        Route::get('/create/test', [BookingController::class, 'create'])->name('create');
        Route::post('/', [BookingController::class, 'store'])->name('store');
        Route::put('/{booking}', [BookingController::class, 'update'])->name('update');
        Route::delete('/{booking}', [BookingController::class, 'destroy'])->name('destroy');
    });
});

Route::group([
    'as' => 'hotels.',
    'prefix' => 'hotels'
], function () {
    Route::group([
        'as' => 'bookings.',
        'prefix' => 'bookings'
    ], function () {
        Route::get('/my-bookings', [BookingController::class, 'index'])->name('index');
        Route::post('/', [BookingController::class, 'storeBooking'])->name('storeBooking');
        Route::delete('/destroy/{room}', [BookingController::class, 'destroy'])->name('destroy');
    });
    Route::group([
        'as' => 'comments.',
        'prefix' => '{hotel}/comments',
    ], function () {
        Route::post('/', [CommentsController::class, 'store'])->name('store');
        Route::put('/{comment}', [CommentsController::class, 'update'])->name('update');
    });
});

Auth::routes();

Route::get('auth/activate', [App\Http\Controllers\Auth\ActivationController::class, 'activate'])->name('activate');
Route::get('auth/activate/resend', [App\Http\Controllers\Auth\ActivationResendController::class, 'showResendForm'])->name('auth.activate.resend');
Route::post('auth/activate/resend', [App\Http\Controllers\Auth\ActivationResendController::class, 'resend']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

