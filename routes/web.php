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

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/display','AnimalController@display')->name('display_animal');
Route::post('/login/custom', [
	'uses' => 'LoginController@login',
	'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', function(){
		return view('home');
	})->name('home');
	Route::get('/dashboard', function(){
		return view('dashboard');
	})->name('dashboard');
});