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

// all sheets for user on main page
Route::get('/', 'SheetController@all');
Route::get('/sheets/{id}', 'SheetController@show');
Route::delete('/sheets/{id}', 'SheetController@delete');

Route::post('/sheets/upload', 'UploadController@uploadSubmit');

Route::get('/images/{id}', 'ImageController@show');
Route::get('/images/{id}/edit', 'ImageController@edit');
Route::put('/images/{id}', 'ImageController@update');
Route::delete('/images/{id}', 'ImageController@delete');

Auth::routes();




