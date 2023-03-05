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
Route::get('/', 'App\Http\Controllers\AuthController@page_login');
Route::get('/default', 'App\Http\Controllers\AuthController@default');
Route::get('/dashboard', 'App\Http\Controllers\pages@index');
Route::get('/activity', 'App\Http\Controllers\pages@activity');
Route::get('/activitydetail', 'App\Http\Controllers\pages@activitydetail');
Route::get('/location', 'App\Http\Controllers\pages@location');
Route::get('/kategori', 'App\Http\Controllers\pages@kategori');
Route::get('/user', 'App\Http\Controllers\pages@user');
Route::get('/lognontol', 'App\Http\Controllers\pages@lognontol');
Route::get('/pengembangan', 'App\Http\Controllers\pages@pengembangan');

//CRUD ROUTE



