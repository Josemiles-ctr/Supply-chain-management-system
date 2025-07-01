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
<<<<<<< HEAD
use App\Livewire\ManufacturerInventory;
use App\Livewire\ManufacturerRawmaterialOrder;

//use App\Http\Controllers\InventoryController;
//use App\Livewire\Inventory;
=======
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\VendorDashboardController;
>>>>>>> 6373de49a1b63414805af41dfd507bd2ab3c95a9

Route::get('/', function () {
    return view('getstarted');
})->name('getstarted');


Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
   ->middleware(['auth', 'verified'])
    ->name('dashboard');

<<<<<<< HEAD
    

=======
// Default authenticated user routes
>>>>>>> 6373de49a1b63414805af41dfd507bd2ab3c95a9Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/dashboard/chat', Chat::class)->name('chat');
    Route::get('/dashboard/analytics', Analytics::class)->name('analytics');
    Route::get('/dashboard/place-order', PlaceOrder::class)->name('place-order');
    Route::get('/dashboard/inventory', InventoryManagement::class)->name('inventory');
    Route::get('/dashboard/manufacturer-rawmaterials', ManufacturerInventory::class)->name('manufacturer-rawmaterials');
    Route::get('/dashboard/manufacturer-rawmaterial-orders', ManufacturerRawmaterialOrder::class)->name('manufacturer-rawmaterial-orders');
    Route::get('chat', Chat::class)->name('chat');
    Route::get('analytics', Analytics::class)->name('analytics');
    Route::get('/inventory/dashboard', [InventoryController::class, 'dashboard'])->name('inventory.dashboard');
});

// Customer dashboard and inventory routes
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer/inventory', [InventoryController::class, 'customerInventory'])->name('customer.inventory');
});

// Vendor dashboard and inventory routes
Route::middleware(['auth:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');
    Route::get('/vendor/inventory', [InventoryController::class, 'vendorInventory'])->name('vendor.inventory');

});
require __DIR__.'/auth.php';