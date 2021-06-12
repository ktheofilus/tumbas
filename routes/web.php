<?php

use Illuminate\Support\Facades\Auth;
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



//idex
Route::get('/', 'App\Http\Controllers\PagesController@index')->name('index');

Route::get('/login', 'App\Http\Controllers\LoginController@store')->name('login');
Route::get('/logout', 'App\Http\Controllers\LoginController@destroy')->name('logout');

Route::get('/register', 'App\Http\Controllers\PagesController@register');
Route::post('/register', 'App\Http\Controllers\RegisterController@store')->name('register');
Route::get('/profile', 'App\Http\Controllers\PagesController@profile');

//item
Route::get('/item/{id}', 'App\Http\Controllers\ItemController@show')->name('item');
Route::get('/item', 'App\Http\Controllers\PagesController@index');


//item pge
Route::get('/addtocart/{id}', 'App\Http\Controllers\TransactionController@add');
Route::get('/buy/{id}', 'App\Http\Controllers\TransactionController@buy');

//profilepage
Route::get('/topup', 'App\Http\Controllers\PagesController@topup');
Route::post('/topup', 'App\Http\Controllers\TopupController@update');
Route::get('/deletecart/{id}', 'App\Http\Controllers\TransactionController@delete');
Route::get('/cart', 'App\Http\Controllers\PagesController@cart');

Route::post('/checkout', 'App\Http\Controllers\TransactionController@checkout');
Route::get('/transaction', 'App\Http\Controllers\PagesController@complete');

Route::get('/sell', 'App\Http\Controllers\PagesController@sell');
Route::post('/sell', 'App\Http\Controllers\ItemController@store');
