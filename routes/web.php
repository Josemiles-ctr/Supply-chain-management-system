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
});
// Route::get('privacy-policy',function(){
//     return view('privacy-policy');
// })->name('privacy-policy');
// Route::get('terms-of-service',function(){
//     return view('terms-of-service');
// })->name('terms-of-service');