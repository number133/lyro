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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/songs', [
    'as' => 'songs.index',
    'uses' => 'SongsController@index'
]);

Route::get('/songs/create', 'SongsController@create');

Route::post('/songs/store', [
    'as' => 'songs.store',
    'uses' => 'SongsController@store'
]);

Route::get('/songs/show/{song}', [
    'as' => 'songs.show',
    'uses' => 'SongsController@show'
]);

Route::get('/songs/edit/{song}', [
    'as' => 'songs.edit',
    'uses' => 'SongsController@edit'
]);

Route::delete('/songs/destroy/{song}', [
    'as' => 'songs.destroy',
    'uses' => 'SongsController@destroy'
]);