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

Route::view('/','auth.login');

Auth::routes();

Route::get('/home', 'PostController@home')->name('home');

Auth::routes();

Route::get('/about', 'PostController@About')->name('about');

Auth::routes();

Route::get('/User_Setting', 'PostController@Setting')->name('Setting');

Auth::routes();

Route::get('/Course', 'PostController@Course')->name('Course');

Auth::routes();

Route::post('/Course', 'PostController@Course')->name('Course');

Auth::routes();

Route::get('/Add', 'PostController@Add')->name('Add_Course');

Auth::routes();

Route::post('/Add', 'PostController@Add')->name('Add_Course');

Auth::routes();

Route::get('/Error', 'PostController@Add')->name('Add_Course');

Auth::routes();

Route::get('/not', 'PostController@not')->name('Add_Course');
