<?php

use App\Http\Controllers\Customers\ContactController;
use App\Http\Controllers\Customers\ListController;
use App\Http\Controllers\Customers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    });

    Route::resource('users', UserController::class);

    Route::resource('products', ProductController::class);

    Route::resource('customers/lists', ListController::class);

    Route::resource('customers/services', ServiceController::class);

    Route::resource('customers/contacts', ContactController::class);

    Route::get('agenda', function () {
        return view('pages.agenda.index');
    });
});
