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

Route::get('/', 'LandingController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/carousel/create', 'HomeController@carouselCreate');
Route::get('/table', 'HomeController@table')->name('tables');
Route::post('/carousel/store', 'HomeController@carouselStore')->name('carousel.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
