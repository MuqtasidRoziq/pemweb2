<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerAuthController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', ProductCategoriesController::class)->names('categories');
    Route::resource('products', ProductsController::class)->names('products');
})->middleware(['auth', 'verified']);

Route::group(['prefix' => 'customer'], function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        //tampilkan halaman login 
        Route::get('login', 'login')->name('customer.login');
        //aksi login 
        Route::post('login', 'store_login')->name('customer.store_login');
        //tampilkan halaman register 
        Route::get('register', 'register')->name('customer.register');
        //aksi register 
        Route::post('register', 'store_register')->name('customer.store_register');
        //aksi logout 
        Route::post('logout', 'logout')->name('customer.logout');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
