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
