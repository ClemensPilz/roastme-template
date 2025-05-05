<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/roast', function () {
    return view('roast');
})->name('roast');

Route::post('/roast', [App\Http\Controllers\RoastController::class, 'index'])->middleware('throttle:roast');

Route::get('/about', function () {
    return view('about');
})->name('about');
