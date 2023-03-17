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
Route::get('/dashboard', 'App\Http\Controllers\pages@index');
Route::get('/toll', 'App\Http\Controllers\pages@toll');
Route::get('/nontoll', 'App\Http\Controllers\pages@nontoll');

Route::get('/location', 'App\Http\Controllers\pages@location');
Route::get('/kategori', 'App\Http\Controllers\pages@kategori');
Route::get('/users', 'App\Http\Controllers\pages@users');
Route::get('/allusers', 'App\Http\Controllers\pages@allusers');
Route::get('/lognontol', 'App\Http\Controllers\pages@lognontol');
Route::get('/pengembangan', 'App\Http\Controllers\pages@pengembangan');
Route::get('/tollhistori', 'App\Http\Controllers\pages@tollhistori');
Route::get('/nontollhistori', 'App\Http\Controllers\pages@nontollhistori');
Route::get('/pengembanganhistori', 'App\Http\Controllers\pages@pengembanganhistori');

//End Main Route

//Action Route
Route::post('/login', 'App\Http\Controllers\AuthController@authenticate');
Route::get('/register', 'App\Http\Controllers\AuthController@registerview');
Route::post('/register', 'App\Http\Controllers\AuthController@store');

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

//User
Route::post('/allusers', 'App\Http\Controllers\pages@addallusers');
Route::get('/allusers/{id}', 'App\Http\Controllers\pages@editallusers');
Route::post('/allusers/update/{id}', 'App\Http\Controllers\pages@updateallusers');
Route::get('/allusers/delete/{id}', 'App\Http\Controllers\pages@deleteallusers');

Route::post('/users/update', 'App\Http\Controllers\pages@updateusers');

//Activity
Route::post('/toll', 'App\Http\Controllers\pages@addtollactivity');
Route::post('/nontoll', 'App\Http\Controllers\pages@addnontollactivity');
Route::post('/pengembangan', 'App\Http\Controllers\pages@pengembanganactivity');
Route::get('/activitydetail/{id}', 'App\Http\Controllers\pages@activitydetail');
Route::post('/activitydetail/update/', 'App\Http\Controllers\pages@ubahdata');





