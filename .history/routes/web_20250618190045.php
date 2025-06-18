<?php

use App\Livewire\Chat;
use App\Livewire\Analytics;
use App\Livewire\PlaceOrder;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('{{Auth::}}/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('/dashboard/chat', Chat::class)->name('chat');
    Route::get('/dashboard/analytics', Analytics::class)->name('analytics');
    Route::get('/dashboard/place-order', PlaceOrder::class)->name('place-order');
});

require __DIR__.'/auth.php';