<?php

<<<<<<< HEAD
=======
use App\Livewire\Chat;
use App\Livewire\Analytics;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
>>>>>>> 474feefdcda2e483bce19c8052d93b643feeca61
use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->group(function(){
    Route::get('/orders', function(){
        return view('orders.index');
    })->name('orders.index');
});

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

<<<<<<< HEAD
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
=======
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('chat', Chat::class)->name('chat');
    Route::get('analytics', Analytics::class)->name('analytics');
});
>>>>>>> 474feefdcda2e483bce19c8052d93b643feeca61

require __DIR__.'/auth.php';