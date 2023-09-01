<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ZonesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(EventsController::class)->middleware(['auth'])->group(function () {
    Route::get('/index_events', 'index')->name('index_events');
    Route::get('/my_events', 'myEvents')->name('my_events');
    Route::get('/create_event', 'create')->name('create_event');
    Route::post('/store_event', 'store')->name('store_event');
    Route::get('/edit_event/{id}', 'edit')->name('edit_event');
    Route::put('/update_event/{id}', 'update')->name('update_event');
    Route::get('/destroy_event/{id}', 'destroy')->name('destroy_event');
});

Route::controller(CategoriesController::class)->middleware(['auth'])->group(function () {
    Route::get('/index_categories', 'index')->name('index_categories');
    Route::post('/store_category', 'store')->name('store_category');
    Route::get('/edit_category/{id}', 'edit')->name('edit_category');
    Route::put('/update_category/{id}', 'update')->name('update_category');
    Route::get('/destroy_category/{id}', 'destroy')->name('destroy_category');
});

Route::controller(TicketsController::class)->middleware(['auth'])->group(function () {
    Route::get('/index_tickets', 'index')->name('index_tickets');
    Route::get('/create_ticket', 'create')->name('create_ticket');
    Route::get('/store_ticket', 'storeTicket')->name('store_ticket');
    Route::get('/buy_ticket/{eventId}', 'buyTicket')->name('buy_ticket');
    Route::get('/edit_ticket/{id}', 'edit')->name('edit_ticket');
    Route::put('/update_ticket/{id}', 'update')->name('update_ticket');
    Route::get('/destroy_ticket/{id}', 'destroy')->name('destroy_ticket');
});

Route::controller(ZonesController::class)->middleware(['auth'])->group(function () {
    Route::get('/index_zones', 'index')->name('index_zones');
    Route::post('/store_zone', 'store')->name('store_zone');
    Route::get('/edit_zone/{id}', 'edit')->name('edit_zone');
    Route::put('/update_zone/{id}', 'update')->name('update_zone');
    Route::get('/destroy_zone/{id}', 'destroy')->name('destroy_zone');
});

Route::controller(ShoppingCartController::class)->middleware(['auth'])->group(function () {
    Route::get('/index_shoppingcart', 'index')->name('index_shoppingcart');
    Route::post('/add_cart/{eventId}', 'addCart')->name('add_cart');
    Route::get('/index_payment', 'payment')->name('index_payment');
    Route::post('/action_payment', 'actionPayment')->name('action_payment');
});