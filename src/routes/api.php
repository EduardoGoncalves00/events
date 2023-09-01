<?php

use App\Http\Controllers\ControllerApi\CategoriesController;
use App\Http\Controllers\ControllerApi\EventsController;
use App\Http\Controllers\ControllerApi\TicketsController;
use App\Http\Controllers\ControllerApi\ZonesController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(CategoriesController::class)->group(function () {
    Route::get('/index_categories', 'index')->name('index_categories_api');
    Route::post('/created_categories', 'created')->name('created_categories_api');
    Route::put('/update_categories/{id}', 'update')->name('update_categories_api');
    Route::delete('/destroy_categories/{id}', 'destroy')->name('destroy_categories_api');
});

Route::controller(EventsController::class)->group(function () {
    Route::get('/index_events', 'index')->name('index_events_api');
    Route::post('/created_events', 'created')->name('created_events_api');
    Route::put('/update_events/{id}', 'update')->name('update_events_api');
    Route::delete('/destroy_events/{id}', 'destroy')->name('destroy_events_api');
});

Route::controller(ZonesController::class)->group(function () {
    Route::get('/index_zones', 'index')->name('index_zones_api');
    Route::post('/create_zones', 'create')->name('create_zones_api');  
    Route::put('/update_zones/{id}', 'update')->name('update_zones_api');
    Route::delete('/destroy_zones/{id}', 'destroy')->name('destroy_zones_api');
});

Route::controller(TicketsController::class)->group(function () {
    Route::get('/index_tickets', 'index')->name('index_tickets_api');
    Route::post('/store_tickets', 'store')->name('store_tickets_api');  
    Route::put('/update_tickets/{id}', 'update')->name('update_tickets_api');
    Route::delete('/destroy_tickets/{id}', 'destroy')->name('destroy_tickets_api');
});


Route::post('stripe', [StripePaymentController::class, 'stripePost']);