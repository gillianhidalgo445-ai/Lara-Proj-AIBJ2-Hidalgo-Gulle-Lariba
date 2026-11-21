<?php

use Illuminate\Support\Facades\Route;

// Each page has its own route. The ->name() lets us write route('about') in Blade.
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
