<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () { return view('home'); });
Route::get('/attractions', function () { return view('attractions_and_facilities'); });
Route::get('/zoo_booking', function () { return view('zoo_booking'); });
Route::get('/hotel_booking', function () { return view('hotel_booking'); });
Route::get('/accessibility', function () { return view('accessibility'); });
Route::get('/my_account', function () { return view('my_account'); });
Route::get('/my_rewards', function () { return view('my_rewards'); });
Route::get('/my_bookings', function () { return view('my_bookings'); });
Route::get('/about_us', function () { return view('about_us'); });
Route::get('/contact_us', function () { return view('contact_us'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/zooBooking/book', [App\Http\Controllers\ZooBookingController::class, 'create']);
Route::post('/zooBooking/update', [App\Http\Controllers\ZooBookingController::class, 'update']);
Route::post('/zooBooking/delete', [App\Http\Controllers\ZooBookingController::class, 'delete']);
Route::get('/zooBooking/get', [App\Http\Controllers\ZooBookingController::class, 'get']);

Route::post('/hotelBooking/book', [App\Http\Controllers\HotelBookingController::class, 'create']);
Route::get('/hotelBooking/get', [App\Http\Controllers\HotelBookingController::class, 'get']);
Route::post('/hotelBooking/delete', [App\Http\Controllers\HotelBookingController::class, 'delete']);
Route::post('/hotelBooking/update', [App\Http\Controllers\HotelBookingController::class, 'update']);


Route::get('/rooms/get', [App\Http\Controllers\RoomsController::class, 'get']);
Route::get('/rewards/get', [App\Http\Controllers\RewardsController::class, 'get']);
