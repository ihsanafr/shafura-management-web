<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    });

    Route::resource('users', UserController::class);
});

Route::get('products', function () {
    return view('pages.products.index');
});

Route::get('customers/lists', function () {
    return view('pages.customer.list.index');
});

Route::get('customers/contacts', function () {
    return view('pages.customer.contact.index');
});

Route::get('customers/services', function () {
    return view('pages.customer.service.index');
});

// Route::get('users', function () {
//     return view('pages.users.index');
// });

// Route::get('users/create', function () {
//     return view('pages.users.create');
// });

// Route::get('users/edit', function () {
//     return view('pages.users.edit');
// });

///

Route::get('products/show', function () {
    return view('pages.products.show');
});
