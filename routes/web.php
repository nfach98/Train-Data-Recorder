<?php

use Illuminate\Support\Facades\Route;
use App\Events\FormSubmitted;

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/monitoring/{type}', [App\Http\Controllers\MonitoringController::class, 'index']);

Route::get('/location', [App\Http\Controllers\LocationController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/counter', function() {
	return view('counter');
});

Route::get('/sender', function() {
	return view('sender');
});

Route::post('/sender', function() {
	$text = request()->content;
	event(new FormSubmitted($text));

	return redirect()->to('/sender');
});

Route::post('/motorcar', [App\Http\Controllers\MonitoringController::class, 'getMotorCar']);
Route::post('/motorcar-all', [App\Http\Controllers\MonitoringController::class, 'getAllMotorCar']);
Route::post('/motor', [App\Http\Controllers\MonitoringController::class, 'getMotor']);
Route::post('/trailer', [App\Http\Controllers\MonitoringController::class, 'getTrailer']);