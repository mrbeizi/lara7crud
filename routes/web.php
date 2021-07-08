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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register','AuthController@getRegister')->name('register')->middleware('guest');
Route::post('/register','AuthController@postRegister')->middleware('guest');
Route::get('/login','AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/login','AuthController@postLogin')->middleware('guest');
Route::get('/logout','AuthController@logout')->middleware('auth')->name('logout');

Route::get('/home','HomeController@index')->middleware('auth')->name('home');

Route::resource('data-user', 'UserController')->middleware('auth');

Route::get('contact','ContactController@index')->name('contact');

Route::resource('data-people', 'PeopleController');