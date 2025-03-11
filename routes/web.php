<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
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

Route::get('login', function () {
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth.register');
});

Route::get('users', function () {
    return view('pages.user.index');
});

Route::get('users/create', function () {
    return view('pages.user.create');
});

Route::get('users/edit', function () {
    return view('pages.user.edit');
});

Route::get('products/show', function () {
    return view('pages.products.show');
});
