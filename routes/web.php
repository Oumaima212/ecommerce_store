<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('livewire.home');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::get('/collections/{slug}', [CollectionController::class, 'show'])->name('collections.show');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact');





