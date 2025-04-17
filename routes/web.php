<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CostumersController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('users', UserController::class);

    Route::resource('products', ProductController::class);

    Route::resource('customers', CostumersController::class)->parameters([
        'customers' => 'listCustomer'
    ]);

    Route::resource('services', ServiceController::class)->parameters([
        'services' => 'serviceCustomer'
    ]);

    Route::resource('contacts', ContactController::class)->parameters([
        'contacts' => 'contactCustomer'
    ]);

    Route::prefix('agenda')->group(function () {
        Route::get('/', [CalendarController::class, 'index']);
        Route::post('store', [CalendarController::class, 'store']);
        Route::post('update', [CalendarController::class, 'update']);
        Route::post('delete', [CalendarController::class, 'destroy']);
    });

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings/{user}', [SettingsController::class, 'update'])->name('settings.update');
});
