<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('home');

Route::get('/produits', function () {
    return view('products');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/12-smartphone', function () {
    return view('category');
});

Route::get('/12-iphone-xs', function () {
    return view('product');
});

