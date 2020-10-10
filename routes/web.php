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

Auth::routes();

// ADMIN
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');

//LANDING PAGE
Route::get('/', 'LandingController@index')->name('landing.home');
// CAROUSEL
Route::get('/carousel/create', 'HomeController@carouselCreate');
Route::post('/carousel/store', 'HomeController@carouselStore')->name('carousel.store');
Route::get('carousel/destroy/{id}', 'HomeController@carouselDestroy');
// CALENDAR
Route::get('/calendar/create', 'HomeController@calendarCreate');
Route::post('/calendar/store', 'HomeController@calendarStore')->name('calendar.store');
Route::get('/calendar/download/{id}', 'HomeController@calendarDownload')->name('calendar.download');
Route::get('calendar/destroy/{id}', 'HomeController@calendarDestroy');
// SPEAKER
Route::get('/speaker/create', 'HomeController@speakerCreate');
Route::post('/speaker/store', 'HomeController@speakerStore')->name('speaker.store');
Route::get('speaker/destroy/{id}', 'HomeController@speakerDestroy');
// ASSISTAN
Route::get('/assistan', 'HomeController@assistan')->name('assistan');
// ALLY
Route::get('/ally/create', 'HomeController@allyCreate');
Route::post('/ally/store', 'HomeController@allyStore')->name('ally.store');
Route::get('ally/destroy/{id}', 'HomeController@allyDestroy');

//REGISTRO
Route::get('/city/{id}', 'RegisterController@cityShow');
Route::get('/register', 'RegisterController@index');
Route::post('/register/create', 'RegisterController@registerStore')->name('register.store');

//OTROS
Route::get('/table', 'HomeController@table')->name('tables');
