<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CaategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Models\BoardingHouse;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [CaategoryController::class, 'show'])->name('category.show');

Route::get('/city/{slug}', [CityController::class, 'show'])->name('city.show');

Route::get('/find-kost', [BoardingHouseController::class, 'find'])->name('find-kost');
Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kost.results');
Route::get('/kost/{slug}', [BoardingHouseController::class, 'show'])->name('kost.show');
Route::get('/kost/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('kost.rooms');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');