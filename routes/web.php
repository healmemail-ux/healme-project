<?php

namespace App\Http\Controllers;
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

//Route::get('/', function () {
//return view('welcome');
//});
Route::get('/detail/{barang}', 'App\Http\Controllers\HomeController@detail');

Route::resource('/users', 'App\Http\Controllers\UserController'::class);
Route::resource('/barangs', 'App\Http\Controllers\BarangController'::class);
Route::resource('/lelangs', 'App\Http\Controllers\LelangController'::class);
Route::resource('/history_lelangs', 'App\Http\Controllers\History_lelangController'::class);
Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register.index');
Route::post('/register', 'App\Http\Controllers\RegisterController@store')->name('register.store');
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@check_login')->name('login.check_login');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');
Route::get('/logout', 'App\Http\Controllers\DashboardController@logout')->name('dashboard.logout');

Route::resource('/', 'App\Http\Controllers\HomeController'::class);

