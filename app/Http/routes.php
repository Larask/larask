<?php

Route::get('/', 'WelcomeController@index');
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index',]);

Route::get('register', ['as' => 'register.create', 'uses' => 'RegistrationController@create']);
Route::post('register', ['as' => 'register.store', 'uses' => 'RegistrationController@store']);
