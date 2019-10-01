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


Route::get('/', 'NewsController@index');
Route::get('/news/{news}', 'NewsController@show');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'admin'], function () {

    Route::get('/create', 'NewsController@create');
    Route::get('/news/{news}/edit', 'NewsController@edit');
    Route::post('/news/store', 'NewsController@store');
    Route::patch('/news/{news}', 'NewsController@update');
    Route::delete('/news/{news}', 'NewsController@delete');


    Route::post('/news/{news}/coords/store', 'CoordsController@store');



    Route::patch('/news/{news}/coords/{coords}/update', 'CoordsController@update');

    Route::delete('/news/{news}/coords/{coords}', 'CoordsController@destroy');



});
