<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;

Route::get('/', function () {
    $products = Product::where('is_active', true)->get();
    return view('index', ['products' => $products]);
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

Route::get('/product-detail/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('product-detail', ['product' => $product]);
})->name('product-detail');