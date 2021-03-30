<?php

use Illuminate\Support\Facades\Route;
use App\Events\FormSubmitted;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

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