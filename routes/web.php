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


Route::get('/', 'SearchController@show');
Route::get('/city/{city}', 'CityController@show');

Route::get('search', 'SearchController@searchData');
Route::get('cities/import', 'CityController@import')->name('import');
Route::get('cities/export', 'CityController@export');
Route::get('cities/geocode', 'CityController@geocode');
Route::get('cities/importFromXLSX', 'CityController@importFromXLSX');

// For testing: detail of the city with hardsting data
Route::get('/detail', function () {
    return view('detail');
});