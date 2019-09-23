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

use App\Http\Controllers\NewsController;

Route::get('/', 'NewsController@index');
Route::get('/news/{news}', 'NewsController@show');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'admin'], function () {

    Route::get('/create', 'NewsController@create');
    Route::get('/update/{news}', 'NewsController@edit');

    Route::post('/news/store', 'NewsController@store');

    Route::post('/news/update/{news}', 'NewsController@update');

    Route::post('/news/delete/{news}', 'NewsController@delete');


});
