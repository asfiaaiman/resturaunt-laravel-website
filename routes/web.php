<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ClientController,
};
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'messages_store'])->name('home.store');
Route::get('/detailedMenu', [HomeController::class, 'detailedMenu'])->name('detailedMenu');

Route::prefix('clients')->group(function () {
    Route::get('/signup', [ClientController::class, 'signup'])->name('clients.signup')->middleware('guest');
    Route::post('store', [ClientController::class, 'store'])->name('clients.store')->middleware('guest');
    Route::get('/signin', [ClientController::class, 'signin'])->name('clients.signin')->middleware('guest');
    Route::post('/sign_in', [ClientController::class, 'storeClients'])->name('signin')->middleware('guest');
    Route::get('/profile', [ClientController::class, 'profile'])->name('clients.profile')->middleware('auth');
    Route::get('/logout',[ClientController::class, 'logout'])->name('logout')->middleware('auth');
});




