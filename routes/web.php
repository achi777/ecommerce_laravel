<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('products',ProductController::class);
Route::get('/carts', [App\Http\Controllers\CartController::class, 'index'])->name('carts.index');
Route::post('/carts', [App\Http\Controllers\CartController::class, 'store'])->name('carts.store');
Route::delete('/carts/{cart}', [App\Http\Controllers\CartController::class, 'destroy'])->name('carts.destroy');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::resource('/carts', CartController::class)->only(['index', 'store', 'destroy']);

//Route::get('/products/create', function () {
//    $product = new App\Models\Product;
//    $product->name = 'Example Product ' . rand(100, 999);
//    $product->description = 'This is an example product';
//    $product->price = rand(10, 100);
//    $product->image = 'example.jpg';
//    $product->save();
//    return 'Product created successfully!';
//});
