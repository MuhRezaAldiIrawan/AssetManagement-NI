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

Route::get('/', 'App\Http\Controllers\AuthController@page_login');
Route::get('/default', 'App\Http\Controllers\AuthController@default');
Route::get('/dashboard', 'App\Http\Controllers\pages@index');
Route::get('/activity', 'App\Http\Controllers\pages@activity');
Route::get('/location', 'App\Http\Controllers\pages@location');

