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
