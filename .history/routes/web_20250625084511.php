<?php

use App\Livewire\Chat;
use App\Livewire\Analytics;
use App\Livewire\PlaceOrder;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\InventoryManagement;
use App\Livewire\RawmaterialOrders;  
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\ManufacturerInventory;

//use App\Http\Controllers\InventoryController;
//use App\Livewire\Inventory;

Route::get('/', function () {
    return view('getstarted');
})->name('getstarted');


Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
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
    Route::get('/dashboard/inventory', InventoryManagement::class)->name('inventory');
    Route::get('/dashboard/manufacturer-rawmaterials', ManufacturerInventory::class)->name('manufacturer-rawmaterials');
    Route::get('/dashboard/rawmaterial-orders', RawmaterialOrders::class)->name('rawmaterial-orders');
});
require __DIR__.'/auth.php';