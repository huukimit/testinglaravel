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

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index',
]);

Route::get('login', [
    'as'   => 'auth.getLoginPage',
    'uses' => 'AuthController@getLoginPage',
]);

Route::get('register', [
    'as'   => 'auth.getRegisterPage',
    'uses' => 'AuthController@getRegisterPage',
]);

Route::post('login', [
    'as'   => 'auth.postLogin',
    'uses' => 'AuthController@postLogin',
]);

Route::post('register', [
    'as'   => 'auth.postRegister',
    'uses' => 'AuthController@postRegister',
]);

Route::get('logout', [
    'as'   => 'auth.logout',
    'uses' => 'AuthController@logout'
]);