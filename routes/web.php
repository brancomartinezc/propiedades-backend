<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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
    return view('auth/login');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('properties', 'App\Http\Controllers\PropertyController');

Route::resource('cities', 'App\Http\Controllers\CityController');

Route::resource('users', 'App\Http\Controllers\UserController');

Route::resource('photos', 'App\Http\Controllers\PhotoController');

Route::get('/properties/{id}/photos', [PropertyController::class,'photos']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
