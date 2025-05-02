<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CostumersController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    //Home page
    Route::get('/', [DashboardController::class, 'index']);

    //Users page
    Route::resource('users', UserController::class);

    //Deleted products page
    Route::prefix('products/deleted')->group(function () {
        Route::get('/', [ProductController::class, 'indexDeleted'])->name('products.deleted');
        Route::get('/{trashedProduct}', [ProductController::class, 'showDeleted'])->name('products.deleted.show');
        Route::delete('/{trashedProduct}', [ProductController::class, 'fullyDelete'])->name('products.deleted.delete');
        Route::post('/{trashedProduct}', [ProductController::class, 'restoreDeleted'])->name('products.deleted.restore');
        Route::delete('/', [ProductController::class, 'deleteAll'])->name('products.deleted.deleteAll');
    });

    //Products page
    Route::resource('products', ProductController::class);

    //Customers page
    Route::resource('customers', CostumersController::class)->parameters([
        'customers' => 'listCustomer'
    ]);

    //Service page
    Route::resource('services', ServiceController::class)->parameters([
        'services' => 'serviceCustomer'
    ]);

    //Contacts page
    Route::resource('contacts', ContactController::class)->parameters([
        'contacts' => 'contactCustomer'
    ]);

    //Agenda pages
    Route::prefix('agenda')->group(function () {
        Route::get('/', [CalendarController::class, 'index']);
        Route::post('store', [CalendarController::class, 'store']);
        Route::post('update', [CalendarController::class, 'update']);
        Route::post('delete', [CalendarController::class, 'destroy']);
    });

    //Settings page
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings/{user}', [SettingsController::class, 'update'])->name('settings.update');

    //send email (test only)
    if (app()->environment('local')) {
        Route::post('send-test-mail', [DashboardController::class, 'sendEmail'])->name('mail');
    }
});
