<?php

use App\Http\Livewire\Studios\Show;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Studios\Register;
use App\Http\Livewire\Studios\Dashboard;
use App\Http\Controllers\SocialController;
use App\Http\Livewire\Products\Show as PS;
use App\Http\Livewire\Contracts\Show as SC;
use App\Http\Livewire\Events\Pages\Webinar;
use App\Http\Livewire\Carts\Dashboard as Cart;
use App\Http\Livewire\Chats\Dashboard as Chat;
use App\Http\Livewire\Studios\ListFreelancers;
use App\Http\Livewire\Events\Dashboard as Event;
use App\Http\Livewire\Wishlists\Dashboard as WS;
use App\Http\Controllers\PaymentHandlerController;
use App\Http\Livewire\Events\Pages\WebinarAttendant;
use App\Http\Livewire\Payments\Dashboard as Payment;
use App\Http\Livewire\Products\Dashboard as Product;
use App\Http\Livewire\Contracts\Dashboard as Contract;
use App\Http\Livewire\Notifications\Dashboard as Notif;
use App\Http\Livewire\Uploads\Dashboard as Upload;

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
Route::get('auth/{provider}', [SocialController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return redirect('dashboard');
    // return now()->addDays(10)->format('Y-m-d H:i:s');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/payments/handling', [PaymentHandlerController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/notifications', Notif::class)->name('notif.dashboard');
    Route::get('/wishlists', WS::class)->name('wishlist.dashboard');
    Route::get('/chats', Chat::class)->name('chat.dashboard');
    Route::get('/user/{id}', Show::class)->name('studio.show');
    Route::get('/freelancers', ListFreelancers::class)->name('studio.lists');
    Route::get('/products', Product::class)->name('product.dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/payments', Payment::class)->name('payments.dashboard');
    Route::get('/contracts', SC::class)->name('contracts.show');
    Route::get('/contracts/{id}', Contract::class)->name('contracts.dashboard');
    Route::get('/cart', Cart::class)->name('cart.dashboard');
});

Route::get('/products/{id}', PS::class)->name('product.show');
Route::middleware(['auth:sanctum', 'verified', 'isCustomer'])->get('/studio/register', Register::class)->name('studio.register');
Route::middleware(['auth:sanctum', 'verified', 'isFreelancer'])->get('/user/studio/{id}', Dashboard::class)->name('studio.dashboard');
Route::middleware(['auth:sanctum', 'verified', 'isFreelancer'])->get('/studio/uploads/{id}', Upload::class)->name('studio.uploads');

Route::get('/event', Event::class)->name('event.dashboard');
Route::get('/event/webinar', Webinar::class)->name('webinar.dashboard');
Route::get('/event/webinar/attend/{id}', WebinarAttendant::class)->name('webinar.attend');