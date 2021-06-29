<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodtypeController;
use App\Http\Controllers\FoodDetailController;
use App\Http\Controllers\HomeController;
use App\Models\Foodtype;

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



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('layouts.admin.main');
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



