<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});Route::get('password/reset', function () {
    return view('auth.reset-password');
})->name('reset-password');

Route::fallback(function () {
    return redirect('/login');
});