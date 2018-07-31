<?php

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



Route::post('/auth', 'UserController@checkAuth')->name('auth');
Route::get('/check_login', 'UserController@checkLogin')->name('check_login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::post('/create_account', 'UserController@create_account')->name('create_account');


Auth::routes();

