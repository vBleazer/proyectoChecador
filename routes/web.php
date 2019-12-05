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

Route::get('/test/', function () {
    echo "holA";
}); 


Auth::routes();
	
Route::get('/home', 'HomeController@index')->name('home');

// USUARIOS
Route::get('/users/','UserController@index')->name('users');
Route::get('/user/{id}','UserController@show')->name('user');
Route::post('/user/','UserController@store')->name('user');
Route::put('/user/','UserController@update')->name('user');
Route::delete('/userdestroy/{id}','UserController@destroy');




