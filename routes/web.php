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

    //Deleted customers page
    Route::prefix('customers/deleted')->group(function () {
        Route::get('/', [CostumersController::class, 'indexDeleted'])->name('customers.deleted');
        Route::get('/{trashedCustomer}', [CostumersController::class, 'showDeleted'])->name('customers.deleted.show');
        Route::delete('/{trashedCustomer}', [CostumersController::class, 'fullyDelete'])->name('customers.deleted.delete');
        Route::post('/{trashedCustomer}', [CostumersController::class, 'restoreDeleted'])->name('customers.deleted.restore');
        Route::delete('/', [CostumersController::class, 'deleteAll'])->name('customers.deleted.deleteAll');
    });

    //Customers page
    Route::resource('customers', CostumersController::class)->parameters([
        'customers' => 'listCustomer'
    ]);

    //Deleted services page
    Route::prefix('services/deleted')->group(function () {
        Route::get('/', [ServiceController::class, 'indexDeleted'])->name('services.deleted');
        Route::get('/{trashedService}', [ServiceController::class, 'showDeleted'])->name('services.deleted.show');
        Route::delete('/{trashedService}', [ServiceController::class, 'fullyDelete'])->name('services.deleted.delete');
        Route::post('/{trashedService}', [ServiceController::class, 'restoreDeleted'])->name('services.deleted.restore');
        Route::delete('/', [ServiceController::class, 'deleteAll'])->name('services.deleted.deleteAll');
    });

    //Service page
    Route::resource('services', ServiceController::class)->parameters([
        'services' => 'serviceCustomer'
    ]);

    //Deleted contacts page
    Route::prefix('contacts/deleted')->group(function () {
        Route::get('/', [ContactController::class, 'indexDeleted'])->name('contacts.deleted');
        Route::get('/{trashedContact}', [ContactController::class, 'showDeleted'])->name('contacts.deleted.show');
        Route::delete('/{trashedContact}', [ContactController::class, 'fullyDelete'])->name('contacts.deleted.delete');
        Route::post('/{trashedContact}', [ContactController::class, 'restoreDeleted'])->name('contacts.deleted.restore');
        Route::delete('/', [ContactController::class, 'deleteAll'])->name('contacts.deleted.deleteAll');
    });

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
    Route::singleton('settings', SettingsController::class);

    //send email (test only)
    if (app()->environment('local')) {
        Route::post('send-test-mail', [DashboardController::class, 'sendEmail'])->name('mail');
    }
});
