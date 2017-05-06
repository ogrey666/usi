<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

// Rejestracja resourceful route dla kontrolerów
Route::resource('doctor', 'DoctorController');

// Akcje RESTful
Route::post('doctor/create', array('as' => 'doctor', 'uses' => 'DoctorController@create'));
