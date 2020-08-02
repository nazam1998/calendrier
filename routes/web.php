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

Route::get('/', "WelcomeController@index");

Auth::routes();
Route::post('event/store','EventController@storeCalendar')->name('event.storeCalendar');
Route::get('event/{event}/valider','EventController@valider')->name('event.valider');
Route::get('event/{event}/invalider','EventController@invalider')->name('event.invalider');
Route::post('event/{event}/update', 'EventController@updateAdmin')->name('event.updateAdmin');
Route::delete('event/{event}/delete', 'EventController@destroyAdmin')->name('event.destroyAdmin');
Route::resource('event', 'EventController');
Route::get('/home', 'HomeController@index')->name('home');
