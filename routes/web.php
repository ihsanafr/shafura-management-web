<?php

use App\Http\Controllers\Customers\ContactController;
use App\Http\Controllers\Customers\ListController;
use App\Http\Controllers\Customers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('users', UserController::class);

    Route::resource('products', ProductController::class);

    Route::resource('customers/lists', ListController::class)->parameters([
        'lists' => 'listCustomer'
    ]);

    Route::resource('customers/services', ServiceController::class)->parameters([
        'services' => 'serviceCustomer'
    ]);

    Route::resource('customers/contacts', ContactController::class)->parameters([
        'contacts' => 'contactCustomer'
    ]);

    Route::get('agenda', function () {
        return view('pages.agenda.index');
    });

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings/{user}', [SettingsController::class, 'update'])->name('settings.update');

});
