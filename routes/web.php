<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Main ROUTE
Route::get('/', 'App\Http\Controllers\AuthController@loginview')->name('login')->middleware('guest');
// Route::get('/default', 'App\Http\Controllers\AuthController@default');
Route::get('/dashboard', 'App\Http\Controllers\pages@index');
Route::get('/toll', 'App\Http\Controllers\pages@toll');
Route::get('/nontoll', 'App\Http\Controllers\pages@nontoll');
Route::get('/activitydetail', 'App\Http\Controllers\pages@activitydetail');
Route::get('/location', 'App\Http\Controllers\pages@location');
Route::get('/kategori', 'App\Http\Controllers\pages@kategori');
Route::get('/users', 'App\Http\Controllers\pages@users');
Route::get('/allusers', 'App\Http\Controllers\pages@allusers');
Route::get('/lognontol', 'App\Http\Controllers\pages@lognontol');
Route::get('/pengembangan', 'App\Http\Controllers\pages@pengembangan');

//End Main Route

//Action Route
Route::post('/login', 'App\Http\Controllers\AuthController@authenticate');
Route::get('/register', 'App\Http\Controllers\AuthController@registerview');

//Location
Route::post('/location', 'App\Http\Controllers\pages@addlocation');
Route::get('/location/{id}', 'App\Http\Controllers\pages@editlocation');
Route::post('/location/update', 'App\Http\Controllers\pages@updatelocation');
Route::get('/location/delete/{id}', 'App\Http\Controllers\pages@deletelocation');

//Kategori
Route::post('/kategori', 'App\Http\Controllers\pages@addkategori');
Route::get('/kategori/{id}', 'App\Http\Controllers\pages@editkategori');
Route::post('/kategori/update', 'App\Http\Controllers\pages@updatekategori');
Route::get('/kategori/delete/{id}', 'App\Http\Controllers\pages@deletekategori');




