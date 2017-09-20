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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create_request', 'HomeController@create_request')->name('create_request');
Route::post('/adminUploadFile', 'HomeController@adminUploadFile')->name('adminUploadFile');
Route::get('/allrequest', 'RequestController@index')->name('allrequest');
