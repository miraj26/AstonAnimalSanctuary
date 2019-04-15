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

Route::group(['middleware' => ['auth', 'admin']], function(){
	Route::get('/pending', 'DashboardController@pending')->name('pending');
	Route::get('/requests', 'DashboardController@requests')->name('requests');
	Route::get('animals/index','AnimalController@index')->name('display_animal');
	Route::resource('animals', 'AnimalController');
	Route::post('/pending/{adoption}/{animal}', ['as' => 'review', 'uses' => 'DashboardController@review']);
	Route::get('/user/{username}', 'UserController@show')->name('user');
});

Route::group(['middleware' => ['auth', 'user']], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/requestmade','HomeController@requested')->name('display_request');
	Route::get('/availablepets', 'HomeController@pets')->name('available_pets');
	Route::get('/adoption_requests/{animal}', 'AdoptionRequestController@create');
	Route::put('adoption_requests/{animal}', 'AdoptionRequestController@update');
	Route::patch('adoption_requests/{animal}', 'AdoptionRequestController@update');
	Route::get('/allrequests', 'HomeController@allrequest')->name('all_requests');
	Route::get('home/{user}/edituser', 'HomeController@edit');
	
	Route::put('home/{user}', 'HomeController@update');
	Route::patch('home/{user}', 'HomeController@update');
});
