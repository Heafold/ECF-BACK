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

Route::get('/admin', [Controller::class, 'admin'])->name('admin');

Route::get('/admin/produits', [Controller::class, 'showproducts'])->name('adminproduct');

Route::get('/admin/nouveau', [Controller::class, 'new'])->name('new');

Route::post('/admin/nouveau', [Controller::class, 'store']);

Route::get('/produits', [Controller::class, 'products'])->name('products');

Route::get('/produits/{produit}', [Controller::class, 'product'])->name('product');

Route::get('/categories/{category}', [Controller::class, 'category'])->name('category');

Route::get('/contact', function () {
    return view('contact');
});



