<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

use App\Livewire\Chat;
use App\Livewire\Analytics;
use App\Livewire\ManageInventory;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use App\Livewire\OrdersToManufacturer;
use App\Livewire\PlaceOrder;
use App\Livewire\Checkout;

Route::get('/', function () {
    return view('getstarted');
})->name('getstarted');

Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

// Protected routes for authenticated users
Route::middleware(['auth'])->group(function () {

    // Dashboard pages
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Settings
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Functional pages
    Route::get('/dashboard/chat', Chat::class)->name('chat');
    Route::get('/dashboard/analytics', Analytics::class)->name('analytics');
    Route::get('/dashboard/inventory', ManageInventory::class)->name('inventory');
    
    // Customer-only: Place and checkout orders
    Route::get('/dashboard/place-order', PlaceOrder::class)->name('place-order');
    Route::get('/dashboard/checkout', Checkout::class)->name('checkout');

    // Manufacturer: view incoming orders
    Route::get('dashboard/orders', OrdersToManufacturer::class)->name('orders-to-manufacturer');
});

require __DIR__.'/auth.php';
