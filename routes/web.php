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
Route::get('/adduser', 'UserController@index')->name('adduser');
Route::post('/create', 'UserController@create')->name('create');
Route::get('/userlist', 'UserController@userlist')->name('userlist');
Route::get('/create_request', 'HomeController@create_request')->name('create_request');
Route::post('/adminUploadFile', 'HomeController@adminUploadFile')->name('adminUploadFile');
Route::get('/allrequests', 'RequestController@index')->name('allrequests');
Route::get('/addrequest', 'RequestController@create')->name('addrequest');
Route::post('/storerequest', 'RequestController@store')->name('storerequest');
Route::get('/view/{id}', 'RequestController@show');
Route::get('/edit/{id}', 'RequestController@edit')->name('editrequest');
Route::post('/updaterequest/{id}', 'RequestController@update')->name('updaterequest');
Route::get('/deleterequest/{id}', 'RequestController@destroy')->name('deleterequest');

