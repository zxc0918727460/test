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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home','HomeController@index');
Route::get('/create','HomeController@create');
Route::get('/update','HomeController@update');
Route::get('/check','HomeController@check');
Route::get('/ticket', 'CheckMember@index');
Route::get('/ticket/{id}', 'CheckMember@show');
Route::get('/update/{id}', 'CheckMember@update');
Route::post('/ticket', 'CheckMember@store');
Route::delete('/ticket/{id}', 'CheckMember@destroy');
