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


Route::get('/', 'App\Http\Controllers\PagesController@index')->name('index');

Route::get('/login', 'App\Http\Controllers\LoginController@store')->name('login');
Route::get('/logout', 'App\Http\Controllers\LoginController@destroy')->name('logout');

Route::get('/register', 'App\Http\Controllers\PagesController@register');
Route::post('/register', 'App\Http\Controllers\RegisterController@store')->name('register');

Route::get('/item/{id}', 'App\Http\Controllers\ItemController@show')->name('item');

Route::get('/item', 'App\Http\Controllers\PagesController@index');

Route::get('/profile', 'App\Http\Controllers\PagesController@profile');

Route::get('/topup', 'App\Http\Controllers\PagesController@topup');
Route::post('/topup', 'App\Http\Controllers\TopupController@update');
