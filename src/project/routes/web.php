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

/** Auth **/
Route::get('/login',  [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/login',  [ 'as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout',  [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

/** Orders */
Route::get('/',  [ 'as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home/page1',  [ 'as' => 'page1', 'uses' => 'HomeController@index']);
Route::get('/page2',  [ 'as' => 'page2', 'uses' => 'HomeController@index']);