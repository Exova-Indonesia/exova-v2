<?php

use App\Http\Livewire\Studios\Show;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Studios\Dashboard;
use App\Http\Livewire\Products\Dashboard as Product;
use App\Http\Livewire\Carts\Dashboard as Cart;
use App\Http\Livewire\Chats\Dashboard as Chat;
use App\Http\Livewire\Contracts\Dashboard as Contract;

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

Route::get('/', function () {
    return session()->get('cart');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/contracts/{id}', Contract::class)->name('contracts.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/chats', Chat::class)->name('chat.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/user/{id}', Show::class)->name('studio.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/user/studio/{id}', Dashboard::class)->name('studio.dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/products', Product::class)->name('product.dashboard');
Route::get('/cart', Cart::class)->name('cart.dashboard');
