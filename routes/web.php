<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login-page');
});

Route::get('/cart', function () {
    return view('cart-page');
});

Route::get('/favorites', function () {
    return view('favorites-page');
});