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

Route::group(['middleware' => ['auth', 'CekRole:superadmin']], function(){

    //Logout
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

    // Main Route
    Route::get('/dashboard', 'App\Http\Controllers\pages@index');
    // Route::get('/dashboard', 'App\Http\Controllers\pages@ChartActivity');
    Route::get('/toll', 'App\Http\Controllers\ActivityController@toll');
    Route::get('/nontoll', 'App\Http\Controllers\ActivityController@nontoll');
    Route::get('/pengembangan', 'App\Http\Controllers\ActivityController@pengembangan');
    Route::get('/location', 'App\Http\Controllers\LocationController@location');
    Route::get('/kategori', 'App\Http\Controllers\KategoriController@kategori');
    Route::get('/users', 'App\Http\Controllers\UsersController@users');
    Route::get('/allusers', 'App\Http\Controllers\UsersController@allusers');

    //Location
    Route::post('/location', 'App\Http\Controllers\LocationController@addlocation');
    Route::get('/location/{id}', 'App\Http\Controllers\LocationController@editlocation');
    Route::post('/location/update', 'App\Http\Controllers\LocationController@updatelocation');
    Route::get('/location/delete/{id}', 'App\Http\Controllers\LocationController@deletelocation');

    //Kategori
    Route::post('/kategori', 'App\Http\Controllers\KategoriController@addkategori');
    Route::get('/kategori/{id}', 'App\Http\Controllers\KategoriController@editkategori');
    Route::post('/kategori/update', 'App\Http\Controllers\KategoriController@updatekategori');
    Route::get('/kategori/delete/{id}', 'App\Http\Controllers\KategoriController@deletekategori');

    //User
    Route::post('/allusers', 'App\Http\Controllers\UsersController@addallusers');
    Route::get('/allusers/{id}', 'App\Http\Controllers\UsersController@editallusers');
    Route::post('/allusers/update/{id}', 'App\Http\Controllers\UsersController@updateallusers');
    Route::get('/allusers/delete/{id}', 'App\Http\Controllers\UsersController@deleteallusers');
    Route::post('/users/update/{id}', 'App\Http\Controllers\UsersController@updateusers');

    //Activity
    Route::post('/toll', 'App\Http\Controllers\ActivityController@addtollactivity');
    Route::post('/nontoll', 'App\Http\Controllers\ActivityController@addnontollactivity');
    Route::post('/pengembangan', 'App\Http\Controllers\ActivityController@pengembanganactivity');
    Route::get('/tollhistori', 'App\Http\Controllers\ActivityController@tollhistori');
    Route::get('/nontollhistori', 'App\Http\Controllers\ActivityController@nontollhistori');
    Route::get('/pengembanganhistori', 'App\Http\Controllers\ActivityController@pengembanganhistori');
    Route::get('/activitydetail/{id}', 'App\Http\Controllers\ActivityController@activitydetail');
    Route::post('/activitydetail/update/', 'App\Http\Controllers\ActivityController@ubahdata');
    Route::post('/activitydetail/{id}', 'App\Http\Controllers\ActivityController@approve');
    Route::post('/activitydetail/rejected/{id}', 'App\Http\Controllers\ActivityController@rejected');

    //Print 
    Route::get('/print_location', 'App\Http\Controllers\LocationController@print_location');
    Route::get('/print_kategori', 'App\Http\Controllers\KategoriController@print_kategori');
    Route::get('/print_allusers', 'App\Http\Controllers\UsersController@print_allusers');
    Route::get('/print_listbarang', 'App\Http\Controllers\BarangController@print_listbarang');
    Route::get('/print_detail/{id}', 'App\Http\Controllers\ActivityController@print_detail');
    Route::get('/print_activity_toll/{startdate}/{enddate}', 'App\Http\Controllers\ActivityController@print_activity_toll');
    Route::get('/print_activity_nontoll/{startdate}/{enddate}', 'App\Http\Controllers\ActivityController@print_activity_nontoll');
    Route::get('/print_activity_pengembangan/{startdate}/{enddate}', 'App\Http\Controllers\ActivityController@print_activity_pengembangan');
    // Route::get('/toll/cari','App\Http\Controllers\pages@cari');

    //Barang
    Route::get('/listbarang', 'App\Http\Controllers\BarangController@listbarang');
    Route::post('/listbarang', 'App\Http\Controllers\BarangController@addbarang');
    Route::get('/logbarang', 'App\Http\Controllers\BarangController@logbarang');
    Route::post('/listbarang/tambahstock/{id}', 'App\Http\Controllers\BarangController@updatestock');
    Route::post('/listbarang/kurangstock/{id}', 'App\Http\Controllers\BarangController@minusstock');



});

// Auth ROUTE
Route::get('/', 'App\Http\Controllers\AuthController@loginview')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@authenticate');
Route::get('/register', 'App\Http\Controllers\AuthController@registerview');
Route::post('/register', 'App\Http\Controllers\AuthController@store');







