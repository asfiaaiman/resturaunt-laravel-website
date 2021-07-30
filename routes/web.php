<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodtypeController;
use App\Http\Controllers\FoodDetailController;
use App\Http\Controllers\HomeController;
use App\Models\Foodtype;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
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


Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'messages_store'])->name('home.store');
Route::get('/detailedMenu', [HomeController::class, 'detailedMenu'])->name('detailedMenu');


Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('orders.show');

});

Route::prefix('foodtypes')->group(function () {
    Route::get('/', [FoodtypeController::class, 'index'])->name('foodtypes');
    Route::get('/show/{id}', [FoodtypeController::class, 'show'])->name('foodtypes.show');
    Route::get('create', [FoodtypeController::class, 'create'])->name('foodtypes.create');
    Route::post('store', [FoodtypeController::class, 'store'])->name('foodtypes.store');
    Route::get('{id}/edit', [FoodtypeController::class, 'edit'])->name('foodtypes.edit');
    Route::patch('{id}', [FoodtypeController::class, 'update'])->name('foodtypes.update');
    Route::get('/{id}/delete', [FoodtypeController::class, 'destroy'])->name('foodtypes.destroy');
    Route::post('/storeStatus', [FoodTypeController::class, 'storeStatus'])->name('foodtypes.storeStatus');

});

Route::prefix('foods')->group(function () {
    Route::get('/', [FoodDetailController::class, 'index'])->name('foods');
    Route::get('/show/{id}', [FoodDetailController::class, 'show'])->name('foods.show');
    Route::get('create', [FoodDetailController::class, 'create'])->name('foods.create');
    Route::post('/store', [FoodDetailController::class, 'store'])->name('foods.store');
    Route::get('/{id}/edit', [FoodDetailController::class, 'edit'])->name('foods.edit');
    Route::patch('{id}', [FoodDetailController::class, 'update'])->name('foods.update');
    Route::get('{id}/delete', [FoodDetailController::class, 'destroy'])->name('foods.destroy');
    Route::post('/storeStatus', [FoodDetailController::class, 'storeStatus'])->name('foods.storeStatus');

});

Route::prefix('messages')->group(function () {
    Route::get('/', [MessageController::class, 'index'])->name('messages');
    Route::get('/show/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/storeStatus', [MessageController::class, 'storeStatus'])->name('messages.storeStatus');
});



Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders');
});

Route::prefix('clients')->group(function () {
    Route::get('/signup', [ClientController::class, 'signup'])->name('clients.signup')->middleware('guest');
    Route::post('store', [ClientController::class, 'store'])->name('clients.store')->middleware('guest');
    Route::get('/signin', [ClientController::class, 'signin'])->name('clients.signin')->middleware('guest');
    Route::post('/sign_in', [ClientController::class, 'storeClients'])->name('signin')->middleware('guest');
    Route::get('/profile', [ClientController::class, 'profile'])->name('clients.profile')->middleware('auth');
    Route::get('/logout',[ClientController::class, 'logout'])->name('logout')->middleware('auth');
});




