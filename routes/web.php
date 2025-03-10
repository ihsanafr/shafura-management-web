<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('products', function () {
    return view('pages.product');
});

Route::get('customers/lists', function () {
    return view('pages.customer.list');
});

Route::get('customers/contacts', function () {
    return view('pages.customer.contact');
});

Route::get('customers/services', function () {
    return view('pages.customer.services');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth.register');
});
