<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [RedirectsController::class, 'redirectToDashboard'])->name('dashboard');

});

Route::get('password/reset', function () {
    return view('auth.reset-password');
})->name('reset-password');

Route::fallback(function () {
    return redirect('/login');
});